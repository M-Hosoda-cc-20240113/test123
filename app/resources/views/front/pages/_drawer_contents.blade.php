<nav class="p-drawerContents">
    <ul>
        <li>@include('front.header._link_login_logout')</li>
        @auth
            <li class="u-mt-5">@include('front.header._link_mypage')</li>
            @if(Auth::getUser()->is_admin ?? false)
                <li class="u-mt-5"><a href="{{ route('admin.index') }}">管理者トップ</a></li>
            @endif
            <li class="u-mt-5"><a href="{{ route('front.user.edit') }}">ユーザー情報編集</a></li>
            <li class="u-mt-5"><a href="{{ route('password.request') }}">パスワード変更</a></li>
            <li class="u-mt-5"><a href="{{ route('email.request') }}">メールアドレス変更</a></li>
            <li class="u-mt-5"><a href="{{ route('contact.input') }}">お問い合わせ</a></li>
            @if(!Auth::getUser()->is_admin)
                <li class="u-mt-5"><a href="{{ route('front.user.skill.form') }}">スキル編集</a></li>
                <li class="u-mt-5"><a href="{{ route('front.user.delete.form') }}">退会</a></li>
            @endif
        @endauth
    </ul>
</nav>
