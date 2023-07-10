
@if ( ( $total = $conversations->count() ) > 0 )
    <ul class="conversation-lists mt-2">
        @foreach( $conversations as $conversation )
            <li class="d-flex justify-content-between align-items-center {{ $type = $conversation->type }}">
                <div class="left-content d-flex justify-flex-start">
                    <div class="profile-pic">
                        <img src="{{ $conversation->sender->profileImage() }}" 
                            alt="{{ $conversation->USER_FNAME }}" class="profile-pic">
                    </div>
                    <div class="name-date-text">
                        <p class="name-date">
                            <a href="" class="u-name">
                                {{ $conversation->sender->USER_FNAME }}
                            </a>
                            <span class="msg-time text-muted">
                                {{ $conversation->sentAt() }}
                            </span>
                        </p>
                        <p class="text">
                            {!! $conversation->text !!}
                        </p>
                        
                        @if ( ! $conversation->offer )   
                            <div class="media-wraper">
                                @foreach ($conversation->media() as $media)
                                    <div class="media-item">
                                        <div class="previwe-wrap">
                                            {{
                                                $media->preview()
                                            }}
                                        </div>
                                        <a title="{{ $media->FILE_NAME }}" class="download-media" download="" href="{{ $media->URL }}">
                                            {{ substr($media->FILE_NAME,0,7) }} @include('chat.icons.download') ( {{ $media->size() }} )
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else 

                            <div class="offer-bot">
                                <div class="title-price">
                                    <h4 class="d-flex justify-content-between">
                                        <a href="#" class="offer-title">
                                            {{ ($offer = $conversation->offer())->gig->GIG_NAME }}
                                        </a>
                                        <span class="offer-price">${{ $offer->PRICE }}</span>
                                    </h4>
                                </div>
                                <p class="text-muted offer-desc">
                                    {{ $offer->DESCRIPTION }}
                                </p>
                                <div class="incudes">
                                    <h4>Your Offer Includes</h4>
                                    <span>
                                        @include('chat.icons.revision')
                                        @php
                                            if ( ( $r = $offer->REVISION ) <= 1 ) {
                                                echo $r . ' Revision';
                                            } else {
                                                echo $r > 20 ? 'Unlimited Revisions' : $r . ' Revisions';
                                            }
                                        @endphp
                                    </span>
                                    <span>
                                        @include('chat.icons.clock')
                                        @php
                                            if ( ( $d = $offer->DELIVERY ) <= 1 ) {
                                                echo $d . ' Day';
                                            } else {
                                                echo $d . ' Days';
                                            }
                                        @endphp
                                    </span>
                                </div>
                                <form  class="offer-accept-form offer-actions d-flex justify-content-end align-items-center">
                                    @csrf
                                    @if ( $offer->STATUS == 1 )

                                        @if ( $offer->SENT_TO == session()->get('active_user')->USER_ID )
                                            <a style="text-decoration: underline" class="offer-action-btn" href="{{ route('order') }}">
                                                View Order
                                            </a>
                                            
                                            <button type="button" class="btn btn-sm btn-success" disabled>
                                                Offer Accepted
                                            </button>
                                        @else 
                                            <a style="color:#fff;" class="btn btn-sm btn-success offer-action-btn" href="{{ route('order.requirements') }}">
                                                Send Requirements
                                            </a>
                                        @endif

                                    @elseif ( $offer->STATUS == 2 )
                                        <button type="button" class="btn btn-sm btn-success" disabled>
                                            Offer Withdrawn
                                        </button>
                                    @else 
                                       @if ( $offer->SENT_TO == session()->get('user')->USER_ID )
                                            <input type="hidden" name="accept_offer" value="{{ $offer->QUOTE_ID }}">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                Accept Offer
                                            </button>
                                       @else 
                                            <input type="hidden" name="withdraw_offer" value="{{ $offer->QUOTE_ID }}">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                Withdraw offer
                                            </button>
                                       @endif
                                    @endif
                                    
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="right-content">
                    {{-- <button class="action-btn d-flex justify-content-center align-items-center">
                        @include('chat.icons.ellipse')
                    </button> --}}
                </div>
            </li>
        @endforeach
    </ul>
@else 
    <h3 class="no-conversations">No Conversation</h3>
@endif