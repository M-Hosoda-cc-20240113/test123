<header class="Header">
    <div class="Header__loginWrap">
        <a href="" class="Header__textLink mr-a">Aegis</a> 
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class=" RegularBtn w-15 h-40px">
                    @include('atoms.RegularBtn', ['text' => '新規登録はこちら', 'class' => 'w-15 h-40px'])
                </a>
                @endif
                    <a href="{{ route('login') }}" class="Header__textLink ml-15">ログイン</a> 
                    <!-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a> -->
            @endauth
        @endif
        <!-- @include('atoms.RegularBtn', ['text' => '新規登録はこちら', 'class' => 'w-15 h-40px'])
        <a href="" class="Header__textLink">ログイン</a>  -->
    </div>
</header>