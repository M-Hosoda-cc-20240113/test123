@php
/**
 * @var \App\Services\Notification\RegisterUser\NotificationRegisterUserParameter $parameter
 */
@endphp
{{ $parameter->getSendUser()->sei }} {{ $parameter->getSendUser()->mei }}様

Aegisより、登録完了のご案内です。

==========================================
登録ありがとうございます。
Aegisのご登録が完了しました。

▼ログインはこちら▼
https://aegis-freelance.jp/login

==========================================

@include('front.emails.footer')
