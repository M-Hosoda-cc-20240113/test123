@auth
    @if(Auth::getUser()->is_admin ?? false)
        <a class="p-header__textLink" href="{{ route('admin.index') }}"><span class="c-text u-as-center">管理トップ</span></a>
    @endif
@endauth
