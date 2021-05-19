@php
    /**
     * @var \App\Models\User $user
     * @var \App\Models\EmailReset $email_reset
     */
@endphp
{{ $user->sei }}さま

Aegisより、メールアドレス変更のご案内です。
今後の通知をこちらのメールアドレスにお送りすることでお間違いない場合は、
下記アドレスより変更を確定してください。
再設定が完了するまでは、現在設定されているのメールアドレスへ御連絡致します。

▼変更完了アドレス▼
{{ route('email.reset', ['token' => $email_reset->token, 'email_hash' => $user->email_hash]) }}

@include('front.emails.footer')