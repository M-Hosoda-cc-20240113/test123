<header class="p-header">
    <div class="p-header__loginWrap">
        <a href="{{ route('front.index') }}" class="p-header__textLink mr-a">
            <img src="" alt="">
        </a>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                @if (Route::has('register'))
                    @include('atoms.RegularBtn', ['text' => '新規登録はこちら', 'class' => 'w-15 h-40px', 'link' => route('register')])
                @endif
                    <a href="{{ route('login') }}" class="p-header__textLink ml-15">ログイン</a>
                    <!-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">RegisterUser</!-->
            @endauth
        @endif
        <!-- @include('atoms.RegularBtn', ['text' => '新規登録はこちら', 'class' => 'w-15 h-40px'])
        <a href="" class="p-header__textLink">ログイン</a>  -->
    </div>
</header>
