@php
/**
 * @var string $text テキスト
 * @var string $class スタイルクラス
 */
@endphp
<label class="RegularCheckbox {{ $class ?? '' }}">{{ $text ?? '' }}
  <input type="checkbox" id="{{ $id ?? '' }}" name="{{ $name ?? '' }}"/>
  <div class="RegularCheckbox__indicator"></div>
</label>
