@php
/**
 * @var string $text
 * @var string $class
 */
@endphp
<button type="submit" class="c-button {{ $class ?? '' }}">{{ $text ?? '' }}</button>
