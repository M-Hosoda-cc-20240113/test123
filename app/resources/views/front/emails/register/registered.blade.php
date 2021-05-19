@php
/**
 * @var \App\Services\Notification\RegisterUser\NotificationRegisterUserParameter $parameter
 */
@endphp

{{ $parameter->getSendUser()->sei }}　さま

ご登録が完了しました

▼Aegisへのアクセスはこちら▼
{{ route('login') }}

@include('front.emails.footer')
