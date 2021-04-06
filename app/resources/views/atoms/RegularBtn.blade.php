@php
/**
 * @var string $text テキスト
 */
@endphp
<button href="{{ $link ?? '' }}" class="RegularBtn {{ $class }}">{{ $text }}</button>