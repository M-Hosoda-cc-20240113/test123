<div class="l-sidebar u-dn-sp">
  <ul class="p-list {{ $class ?? '' }}">
    <li class="c-text p-list__item--header">メニュー</li>
    <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('password.request') }}">パスワード変更</a>
    </li>
    <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('email.request') }}">メールアドレス変更</a>
    </li>
    <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.edit') }}">ユーザー情報編集</a>
    </li>
    @if(!Auth::getUser()->is_admin)
      <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('contact.input') }}">お問い合わせ</a>
      </li>
      <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.skill.form') }}">スキル編集</a>
      </li>
      <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.delete.form') }}">退会</a>
      </li>
    @endif
  </ul>
</div>
{{--  l-sidebar  --}}
