@php
/**
 * @var string $text テキスト
 * @var string $class スタイルテキスト
 * @var string $class2 スタイルテキスト
 * @var string $placeholder プレースホルダー
 * @var string $type タイプ
 * @var string $name name属性
 */
@endphp
<div class="RegularInput {{ $class ?? '' }}">
  <p class="RegularInput__name {{ $class2 ?? '' }}">{{ $text ?? ''}}</p>
  <label class="RegularInput__label">
    <input name="{{ $name ?? '' }}" type="{{ $type ?? '' }}" placeholder="{{ $placeholder ?? '' }}" class="RegularInput__field" type="text" value="">
  </label>
</div>

