<ul>
    @foreach ($responses as $response)
        <li data-title="{{ $name = $response->NAME }}" data-text="{{ $response->TEXT }}" class="quick-response-item">
            <a href="#">
                @if (strlen( $name ) > 60)
                    {{ substr( $name , 0, 60) . '...' }}
                @else
                {{ $name }}
                @endif
            </a>
            <div class="actions-btn">
                <button data-id='{{ $response->RESPONSE_ID }}' data-action="edit" class="btn btn-outline-danger btn-sm">
                    @include('chat.icons.edit')
                </button>
                <button data-id='{{ $response->RESPONSE_ID }}' data-action="delete" class="btn btn-outline-primary btn-sm">
                    @include('chat.icons.trash')
                </button>
            </div>
        </li>
    @endforeach
</ul>