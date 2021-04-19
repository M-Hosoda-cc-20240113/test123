@php
/**
 * @var string $href
 * @var string $class
 * @var string $text
 */
@endphp
<a href="{{ $href ?? '' }}" class="{{ $class ?? '' }}">{{ $text ?? '' }}</a>