@php
  /**
   * @var \App\Models\User $user
   * @var \App\Models\EmailReset $email_reset
   */
@endphp
{{ $user->sei }} 様

Aegisより、メールアドレス変更のご案内です。

==========================================
下記アドレスよりURLよりメールアドレス変更を確定してください。

※再設定が完了するまでは、現在設定されているメールアドレスへ御連絡致します。

▼変更完了URL▼
{{ route('email.reset', ['token' => $email_reset->token, 'email_hash' => $user->email_hash]) }}

==========================================

@include('front.emails.footer')
