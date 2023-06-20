@extends('user.user_master')

@section('user_page')
    <title>I</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('user-main-content')
    <div class="container">
        <div class="row mb-4 mt-3">
            <div class="row mb-4 mt-3">
            <!-- Top row -->
            <div class="col-xl-12 px-2 top-part">
                <div class="row align-items-center">

                    <div class="col-xl-3 all-cut-off-conv">
                        <div class="all-box">
                            <div class="conv-search d-flex justify-content-between align-items-center">
                                <div class="conversation">
                                    All Conversations ( {{ count( $senders ) }} )
                                </div>
                                <div class="search">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                       <div class="search-box">
                            <div class="search-close d-flex justify-content-between align-items-center">
                                <form style="w-75">
                                    <input type="text" class="form-control" id="search-user"
                                        placeholder="Search for a username">
                                </form>
                                <span role="button" class="close-search">Close</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom row -->
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-3 left-senders">
                        <ul class="sender-lists">
                            <!-- Senders -->
                            @foreach( $senders as $sender )
                                <li class="d-flex" role="link" data-url='{{ route("chat.index",["$sender->USERNAME"]) }}'>
                                    <div class="image-status">
                                        <img src="{{ $sender->profileImage() }}" class="profile-pic" alt="{{ $sender->USER_FNAME }}">
                                        <span class="online-status on-profile"></span>
                                    </div>
                                    <div class="w-100">
                                        <div class="name-status-fav d-flex justify-content-between align-items-center">
                                            <div class="u-name">
                                                {{ $sender->USER_FNAME }}
                                            </div>
                                            <div class="time-fav d-flex justify-content-between align-items-center">
                                                <span class="msg-time text-muted">
                                                    {{ ( $lastMessage = $sender->getLastMessage())->time ?? '' }}
                                                </span>
                                                <span class="favorite-icon">
                                                    @include('chat.icons.star')
                                                </span>
                                            </div>
                                        </div>
                                        <div class="msg-text-envelop d-flex justify-content-between align-items-center">
                                            <span class="message-txt">
                                                <!-- Get last message -->
                                                {{ $lastMessage->message ?? '' }}
                                            </span>
                                            <div class="msg-count-envelop mt-2 d-flex justify-content-between align-items-center">
                                                @if ( ( $unread = $sender->countUnread() ) > 0 )
                                                    <span class="msg-count">
                                                        {{ $unread }}
                                                    </span>
                                                @endif
                                                <a href="#" class="make-unread">
                                                    @if ( $unread > 0 ) 
                                                        @include('chat.icons.envelop')
                                                    @else 
                                                        @include('chat.icons.envelop-open')
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-xl-9 d-flex justify-content-center align-items-center" 
                        style="flex-direction:column;border:1px solid #ddd;border-left:none;border-top:none;"
                    >
                        @include('chat.icons.cut-off')
                        <h2>Pick up where you left off</h2>
                        <p class="text-muted">Select a conversation and chat away.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('user_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(window).on('click', e => {
        
            // search senders by username
            if ( e.type == 'input' && e.target == $('#search-user')[0]) {
                const searchTerm = $(e.target).val().toLowerCase();

                $('.sender-lists li').each(function() {

                    const username = $(this).data('user').toLowerCase();
                    const fname    = $(this).data('name').toLowerCase();

                    if (username.includes(searchTerm) || fname.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            if ( e.type == 'click' && ( e.target == $('.search')[0] || e.target == $('.close-search')[0] )) {
                $('.search-box').toggle();
                $('.all-box').toggle();
            } 
        });

    </script>
@endsection
