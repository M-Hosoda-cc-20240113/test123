@php
/**
 * @var string $text テキスト
 * @var string $class スタイルクラス
 * @var string $link リンク
 */
@endphp
<a href="{{ $link ?? '' }}" class="RegularBtn {{ $class ?? '' }}" type="{{ $type ?? '' }}">{{ $text ?? '' }}</a>
