@php
/**
 * @var string $class スタイルクラス
 * @var string $index チェックボックスの識別番号
 * @var string $text テキスト
 */
@endphp
<div class="Checkbox {{ $class }}">
  <input type="checkbox" id="box-{{ $index }}">
  <label for="box-{{ $index }}">{{ $text }}</label>
</div>