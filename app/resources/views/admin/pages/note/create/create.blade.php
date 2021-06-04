@extends('front.layout')

@section('title', 'お知らせ登録|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('admin.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent
  <div class="l-container">
    <div class="l-container">
      @include('admin.bread_crumb._BreadCrumb')
      <div class="l-main u-mt-20">
        <div class="p-mainItem">
          <h2 class="p-level2Heading">お知らせ登録</h2>

          @if($errors->all())
            <p class="c-text--bold u-mt-20">以下のエラーを修正してください</p>
            @foreach($errors->all() as $error)
              <p class="c-text--warning">{{ $error }}</p>
            @endforeach
          @endif

          <div class="p-register">
            <form action="{{ route('note.create') }}" method="post">
              {{ @csrf_field() }}
              <div class="p-register__row u-mt-20">
                <span class="p-register__title c-text--bold">お知らせタイトル</span>
                <div class="p-register__itemWrap">
                  <div class="p-register__item">
                    <input class="c-input u-w-60-pc" type="text"
                           placeholder="プレスリリースのお知らせ"
                           name="title"
                           value="{{ old('title') }}">
                  </div>
                </div>
              </div>
              <div class="p-register__row--spColumn">
                <p class="p-register__title c-text--bold u-w-100-sp">お知らせ詳細</p>
                <div class="p-register__itemWrap">
                  <div class="p-register__item">
                            <textarea class="c-input--light"
                                      name="contents"
                                      rows="10">{{ old('contents') }}</textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="c-button u-db u-m0a u-mt-30 u-w-15-pc">登録する</button>
            </form>
          </div>
          {{--   p-register   --}}
        </div>
      </div>
    </div>
  </div>
  @include('admin.footer.footer')
@endsection
