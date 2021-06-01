@php
  /**
   * @var \App\Services\Contact\ShowContactForm\ShowContactFormResponse $response
   */
@endphp
<!-- class, action, methodを変更しないでください -->
<form class="formrun" action="https://form.run/api/v1/r/frzv3ab5jrd83ayr2qsfbr2h" method="post">
  <!-- ↓自由に要素を追加・編集することができます -->
  <p class="c-text u-mt-20">お名前<span class="c-label--sm c-label--warning u-ml-10">必須</span></p>
  <input class="c-input u-mt-5" name="お名前" value="{{ $response->getUser()->sei ?? '' }}&#160;{{ $response->getUser()->mei ?? '' }}" type="text" placeholder="お名前入力欄">
  {{-- お名前 --}}

  <p class="c-text u-mt-20">メールアドレス<span class="c-label--sm c-label--warning u-ml-10">必須</span></p>
  <input placeholder="tanaka@example.com" value="{{ $response->getUser()->email ?? '' }}" class="c-input u-mt-5" name="メールアドレス" type="text" data-formrun-type="email" data-formrun-required>
  <p data-formrun-show-if-error="メールアドレス" class="c-text--warning u-mt-5">メールアドレスを正しく入力してください</p>
  {{-- メールアドレス --}}

  <p class="c-text u-mt-20">お問い合わせ内容<span class="c-label--sm c-label--warning u-ml-10">必須</span></p>
  <textarea class="c-input u-mt-5" rows="20" style="resize: none" name="お問い合わせ" data-formrun-required></textarea>
  {{-- お問い合わせ --}}

  <label class="p-checkbox u-fs-14 u-mt-20">
    <p>個人情報利用同意<span class="c-label--warning c-label--sm u-ml-10">必須</span></p>
    <input name="個人情報利用同意" data-formrun-required type="checkbox">
    <div class="p-checkbox__indicator"></div>
  </label>
  <p class="c-text--warning" data-formrun-show-if-error="個人情報利用同意">同意してください</p>

  <!-- ボット投稿をブロックするためのタグ -->
  <div class="_formrun_gotcha">
    <style media="screen">._formrun_gotcha {position:absolute!important;height:1px;width:1px;overflow:hidden;}</style>
    <label for="_formrun_gotcha">If you are a human, ignore this field</label>
    <input type="text" name="_formrun_gotcha" id="_formrun_gotcha" tabindex="-1">
  </div>

  <button class="c-button u-mt-20" type="submit" data-formrun-error-text="未入力の項目があります" data-formrun-submitting-text="送信中...">送信</button>
</form>
