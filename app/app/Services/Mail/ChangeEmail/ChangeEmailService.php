<?php

namespace App\Services\Mail;

use App\Models\EmailReset;
use App\Models\User;
use App\Services\User\UserRepositoryInterface;

/**
 * Class ChangeEmailService
 * @package App\Services\Mail
 */
class ChangeEmailService
{
    /**
     * @var EmailResetRepositoryInterface
     */
    private $email_reset_repository;

    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * ChangeEmailService constructor.
     * @param EmailResetRepositoryInterface $email_reset_repository
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(
        EmailResetRepositoryInterface $email_reset_repository,
        UserRepositoryInterface $user_repository
    ) {
        $this->email_reset_repository = $email_reset_repository;
        $this->user_repository = $user_repository;
    }


    /**
     * メールアドレス変更処理
     *
     * @param User $user
     * @param EmailReset $email_reset
     */
    public function exec(User $user, EmailReset $email_reset)
    {
        $this->user_repository->changeEmail($user, $email_reset->wanna_change_email);
        $this->email_reset_repository->delete($email_reset);
    }
}
