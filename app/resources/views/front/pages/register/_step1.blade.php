<form class="" action="{{ route('auth.register')}}" method="POST">
    {{csrf_field()}}
    <div class="front-register-ItemWrap mt-50">
        <div class="front-register-ItemLeft">
            <span class="mr-10 align-self-center">氏名</span>
            @include('atoms.RegularLabel', ['text' => '必須'])
        </div>
        <div class="front-register-ItemRight">
            @include('atoms.RegularInput', [
              'text'        => '姓',
              'class'       => 'd-flex f-end w-50',
              'class2'      => 'align-self-center mr-10',
              'placeholder' => '山田',
              'type'        => 'text',
              'name'        => 'sei',
              'value'       => old('sei')
              ])
            @if ($errors->first('sei'))
                ※{{$errors->first('sei')}}
            @endif
            @include('atoms.RegularInput', [
              'text'        => '名',
              'class'       => 'd-flex f-end w-50',
              'class2'      => 'align-self-center mr-10',
              'placeholder' => '太郎',
              'type'        => 'text',
              'name'        => 'mei',
              'value'       => old('mei')
              ])
            @if ($errors->first('mei')
                ※{{$errors->first('mei')}}
            @endif
        </div>
    </div>

    <div class="front-register-ItemWrap mt-20">
        <div class="front-register-ItemLeft">
            <span class="mr-10 align-self-center">フリガナ</span>
            @include('atoms.RegularLabel', ['text' => '必須'])
        </div>
        <div class="front-register-ItemRight">
            @include('atoms.RegularInput', [
              'text'        => 'セイ',
              'class'       => 'd-flex f-end w-50',
              'class2'      => 'align-self-center mr-10',
              'placeholder' => 'ヤマダ',
              'type'        => 'text',
              'name'        => 'sei_kana',
              'value'       => old('sei_kana')
              ])
            @if ($errors->first('sei_kana'))
                ※{{$errors->first('sei_kana')}}
            @endif
            @include('atoms.RegularInput', [
              'text'        => 'メイ',
              'class'       => 'd-flex f-end w-50',
              'class2'      => 'align-self-center mr-10',
              'placeholder' => 'タロウ',
              'type'        => 'text',
              'name'        => 'mei_kana',
              'value'       => old('mei_kana')
              ])
            @if ($errors->first('mei_kana'))
                ※{{$errors->first('mei_kana')}}
            @endif
        </div>
    </div>

    <div class="front-register-ItemWrap mt-20">
        <div class="front-register-ItemLeft">
            <span class="mr-10 align-self-center">生年月日</span>
            @include('atoms.RegularLabel', ['text' => '必須'])
        </div>
        <div class="front-register-ItemRight">
            @include('atoms.RegularInput', [
              'class'       => 'd-flex f-start',
              'class2'      => 'align-self-center mr-10',
              'placeholder' => '19920708',
              'type'        => 'text',
              'name'        => 'birthday',
              'value'       => old('birthday')
              ])
            @if ($errors->first('birthday'))
                ※{{$errors->first('birthday')}}
            @endif
        </div>
    </div>

    <div class="front-register-ItemWrap mt-20">
        <div class="front-register-ItemLeft">
            <span class="mr-10 align-self-center">メールアドレス</span>
            @include('atoms.RegularLabel', ['text' => '必須'])
        </div>
        <div class="front-register-ItemRight">
            @include('atoms.RegularInput', [
              'class'       => 'd-flex f-start',
              'class2'      => 'align-self-center mr-10',
              'placeholder' => 'mail@example.com',
              'type'        => 'text',
              'name'        => 'email',
              'value'       => old('email')
              ])
            @if ($errors->first('email'))
                ※{{$errors->first('email')}}
            @endif
        </div>
    </div>

    <div class="front-register-ItemWrap mt-20">
        <div class="front-register-ItemLeft">
            <span class="mr-10 align-self-center">電話番号</span>
            @include('atoms.RegularLabel', ['text' => '必須'])
        </div>
        <div class="front-register-ItemRight">
            @include('atoms.RegularInput', [
              'class'       => 'd-flex f-start',
              'class2'      => 'align-self-center mr-10',
              'placeholder' => '09012345678（ハイフン不要）',
              'type'        => 'text',
              'name'        => 'tel',
              'value'       => old('tel')
              ])
            @if ($errors->first('tel'))
                ※{{$errors->first('tel')}}
            @endif
        </div>
    </div>

    <div class="front-register-ItemWrap mt-20 pb-20">
        <div class="front-register-ItemLeft">
            <span class="mr-10 align-self-center">パスワード</span>
            @include('atoms.RegularLabel', ['text' => '必須'])
        </div>
        <div class="front-register-ItemRight">
            @include('atoms.RegularInput', [
              'class'   => 'd-flex f-start',
              'class2'  => 'align-self-center mr-10',
              'type'    => 'password',
              'name'    => 'password'
              ])
            @if ($errors->first('password'))
                ※{{$errors->first('password')}}
            @endif
        </div>
    </div>
    <input type="hidden" name="project_id" value="{{ $project_id ?? '' }}">
    <button class="RegularBtn w-20 m0a" type="submit">登録</button>
</form>
