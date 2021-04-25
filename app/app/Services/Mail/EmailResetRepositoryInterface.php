<?php


namespace App\Services\Mail;


use App\Models\EmailReset;

interface EmailResetRepositoryInterface
{
    /**
     * @param string $token
     * @return EmailReset|null
     */
    public function findByToken(string $token): ?EmailReset;

    /**
     * @param string $wanna_change_email
     * @return EmailReset
     */
    public function save(string $wanna_change_email): EmailReset;

    /**
     * @param EmailReset $email_reset
     */
    public function delete(EmailReset $email_reset);
}