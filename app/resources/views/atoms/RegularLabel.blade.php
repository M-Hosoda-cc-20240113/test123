@php
/**
 * @var string $text テキスト
 * @var string $class スタイルクラス
 */
@endphp
<span class="RegularLabel {{ $class ?? '' }}">{{ $text ?? '' }}</span>
