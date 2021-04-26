<?php


namespace App\Infrastructures\Repositories\Eloquent\EmailReset;


use App\Models\EmailReset;
use App\Services\Mail\EmailResetRepositoryInterface;

class EmailResetRepository implements EmailResetRepositoryInterface
{
    public function findByToken(string $token): ?EmailReset
    {
        return EmailReset::where('token', '=', $token)->first();
    }

    public function save(string $wanna_change_email): EmailReset
    {
        $token = $this->createToken();

        $email_reset = new EmailReset();
        $email_reset->wanna_change_email = $wanna_change_email;
        $email_reset->token = $token;
        $email_reset->created_at = now();
        $email_reset->save();

        return $email_reset;
    }

    /**
     * {@inheritDoc}
     */
    public function delete(EmailReset $email_reset)
    {
        $email_reset->delete();
    }

    /**
     * トークンの作成
     *
     * @return string
     */
    private function createToken(): string
    {
        return \Str::random(100);
    }
}
