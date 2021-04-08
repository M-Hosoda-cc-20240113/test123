@php
/**
 * @var string $text テキスト
 */
@endphp
<div class="Input">
  <p class="Input__name">{{ $text ?? ''}}</p>
  <label class="Input__label">
    <input class="Input__field" type="text" value="">
  </label>
</div>
