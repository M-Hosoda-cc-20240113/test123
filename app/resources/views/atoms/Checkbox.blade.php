@php
/**
 * @var string $text テキスト
 * @var string $class スタイルクラス
 * @var string $name name属性
 */
@endphp
<label class="p-checkbox {{ $class ?? '' }}">{{ $text ?? '' }}
  <input value="{{ $value ?? '' }}" name="{{ $name ?? '' }}" type="checkbox" {{ $checked ?? '' }}/>
  <div class="p-checkbox__indicator"></div>
</label>
