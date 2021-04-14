@php
/**
 * @var string $class スタイルクラス
 */
@endphp
<ul class="RegularList {{ $class ?? '' }}">
  <li class="RegularList__item--header">メニュー</li>
  <li class="RegularList__item"><a class="RegularList__itemInner" href="/">基本情報編集</a></li>
  <li class="RegularList__item"><a class="RegularList__itemInner" href="/">詳細情報編集</a></li>
  <li class="RegularList__item"><a class="RegularList__itemInner" href="/">スキル編集</a></li>
  <li class="RegularList__item"><a class="RegularList__itemInner" href="/">パスワード変更</a></li>
</ul>
