<div class="p-header">
  <div class="p-header__container">
    <a href="/">
      <img class="p-header__logo" src="{{ asset('images/logo/aegis.svg') }}" alt="">
    </a>
    <nav class="p-nav">
      <ul class="p-nav__list">
        {{ $slot }}
      </ul>
    </nav>
  </div>
</div>
