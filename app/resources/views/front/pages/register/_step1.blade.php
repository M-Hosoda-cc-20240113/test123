<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">氏名</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="d-flex w-70 m0a">
    @include('atoms.RegularInput', [
      'text' => '姓', 'class' => 'd-flex f-end', 'class2' => 'align-self-center mr-10', 'placeholder' => '山田'
      ])
    @include('atoms.RegularInput', [
      'text' => '名', 'class' => 'd-flex f-end', 'class2' => 'align-self-center mr-10', 'placeholder' => '太郎'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">フリガナ</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="d-flex w-70 m0a">
    @include('atoms.RegularInput', [
      'text' => 'セイ', 'class' => 'd-flex f-end', 'class2' => 'align-self-center mr-10', 'placeholder' => 'ヤマダ'
      ])
    @include('atoms.RegularInput', [
      'text' => 'メイ', 'class' => 'd-flex f-end', 'class2' => 'align-self-center mr-10', 'placeholder' => 'タロウ'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">生年月日</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="d-flex w-70 m0a">
    @include('atoms.RegularInput', [
      'class' => 'd-flex f-start', 'class2' => 'align-self-center mr-10', 'placeholder' => '1992 / 07 / 08'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">メールアドレス</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="d-flex w-70 m0a">
    @include('atoms.RegularInput', [
      'class' => 'd-flex f-start', 'class2' => 'align-self-center mr-10', 'placeholder' => 'mail@example.com'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">電話番号</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="d-flex w-70 m0a">
    @include('atoms.RegularInput', [
      'class' => 'd-flex f-start', 'class2' => 'align-self-center mr-10', 'placeholder' => '09012345678（ハイフン不要）'
      ])
  </div>
</div>
