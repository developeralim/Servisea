<ul class="sender-lists">
    <!-- Senders -->
    @foreach( $senders as $sender )
        <li data-user="{{ $sender->USERNAME }}" data-name="{{ $sender->USER_FNAME }}" role="link" data-url='{{ route("chat.index",["$sender->USERNAME"]) }}' class="{{ $sender->USERNAME == session('active_user')->USERNAME ? 'active-reciepient' : '' }}">
            <div class="warp-user d-flex">
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
                            <span class="msg-time text-muted m-0">
                                {{ ( $lastMessage = $sender->getLastMessage())->time ?? '' }}
                            </span>
                            {{-- <span class="favorite-icon">
                                @include('chat.icons.star')
                            </span> --}}
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
                            <a href="#" data-token="{{ csrf_token() }}" data-status="{{  $unread > 0 ? '0' : '1' }}" class="make-unread" data-sender="{{ $sender->USER_ID }}">
                                @if ( $unread > 0 ) 
                                    @include('chat.icons.envelop')
                                @else 
                                    @include('chat.icons.envelop-open')
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>