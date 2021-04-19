@php
/**
 * @var string $text テキスト
 * @var string $class スタイルクラス
 */
@endphp
<label class="p-checkbox {{ $class ?? '' }}">{{ $text ?? '' }}
  <input type="checkbox"/>
  <div class="p-checkbox__indicator"></div>
</label>