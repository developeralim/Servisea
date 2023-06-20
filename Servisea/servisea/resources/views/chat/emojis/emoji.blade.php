@foreach ($emojis as $code => $name)
    <span class="emoji-icon" data-code="&#x{{ $code }};" data-name="{{ $name }}">&#x{{ $code }};</span>
@endforeach