<div class="front-register-ItemWrap mt-50">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">氏名</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="front-register-ItemRight">
    @include('atoms.RegularInput', [
      'text' => '姓', 
      'class' => 'd-flex f-end w-50', 
      'class2' => 'align-self-center mr-10', 
      'placeholder' => '山田',
      'name' => 'sei'
      ])
    @include('atoms.RegularInput', [
      'text' => '名', 
      'class' => 'd-flex f-end w-50', 
      'class2' => 'align-self-center mr-10', 
      'placeholder' => '太郎',
      'name' => 'mei'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">フリガナ</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="front-register-ItemRight">
    @include('atoms.RegularInput', [
      'text' => 'セイ', 
      'class' => 'd-flex f-end w-50', 
      'class2' => 'align-self-center mr-10', 
      'placeholder' => 'ヤマダ',
      'name' => 'sei_kana'
      ])
    @include('atoms.RegularInput', [
      'text' => 'メイ', 
      'class' => 'd-flex f-end w-50',
      'class2' => 'align-self-center mr-10', 
      'placeholder' => 'タロウ',
      'name' => 'mei_kana'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">生年月日</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="front-register-ItemRight">
    @include('atoms.RegularInput', [
      'class' => 'd-flex f-start', 
      'class2' => 'align-self-center mr-10', 
      'placeholder' => '1992 / 07 / 08',
      'name' => 'birthday'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">メールアドレス</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="front-register-ItemRight">
    @include('atoms.RegularInput', [
      'class' => 'd-flex f-start', 
      'class2' => 'align-self-center mr-10', 
      'placeholder' => 'mail@example.com',
      'name' => 'email'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">電話番号</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="front-register-ItemRight">
    @include('atoms.RegularInput', [
      'class' => 'd-flex f-start', 
      'class2' => 'align-self-center mr-10', 
      'placeholder' => '09012345678（ハイフン不要）',
      'name' => 'tel'
      ])
  </div>
</div>

<div class="front-register-ItemWrap mt-20 pb-20">
  <div class="front-register-ItemLeft">
    <span class="mr-10 align-self-center">パスワード</span>
    @include('atoms.RegularLabel', ['text' => '必須'])
  </div>
  <div class="front-register-ItemRight">
    @include('atoms.RegularInput', [
      'class' => 'd-flex f-start', 'class2' => 'align-self-center mr-10',
      'type' => 'password',
      'name' => 'password'
      ])
  </div>
</div>

@include('atoms.RegularBtn', ['text' => '登録', 'class' => 'w-20 m0a'])
