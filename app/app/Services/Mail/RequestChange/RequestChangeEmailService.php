<?php


namespace App\Services\Mail\RequestChange;


use App\Models\User;
use App\Services\Mail\EmailResetRepositoryInterface;
use App\Services\Notification\ChangeEmail\NotificationChangeEmailServiceInterface;
use App\Services\User\UserRepositoryInterface;

/**
 * Class RequestChangeEmailService
 * @package App\Services\Mail\RequestChange
 */
class RequestChangeEmailService
{
    /**
     * @var NotificationChangeEmailServiceInterface
     */
    private $notification_email_change;

    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * @var EmailResetRepositoryInterface
     */
    private $email_reset_repository;

    /**
     * RequestChangeEmailService constructor.
     * @param NotificationChangeEmailServiceInterface $notification_email_change
     * @param UserRepositoryInterface $user_repository
     * @param EmailResetRepositoryInterface $email_reset_repository
     */
    public function __construct(
        NotificationChangeEmailServiceInterface $notification_email_change,
        UserRepositoryInterface $user_repository,
        EmailResetRepositoryInterface $email_reset_repository
    ) {
        $this->notification_email_change = $notification_email_change;
        $this->user_repository = $user_repository;
        $this->email_reset_repository = $email_reset_repository;
    }


    /**
     * @param User $auth_user
     * @param string $wanna_change_email
     */
    public function exec(User $auth_user, string $wanna_change_email)
    {
        if ($auth_user->email === $wanna_change_email) {
            // 変更したいメールアドレスが現在設定しているメールアドレスの場合は変更できない
            $this->notification_email_change->sendMailForUnableUser($auth_user);
            return;
        }

        if ($this->user_repository->findByEmail($wanna_change_email)) {
            // 既にAegisに登録されている場合は変更できない
            $this->notification_email_change->sendMailForUnableUser($auth_user);
            return;
        }

        $email_reset = $this->email_reset_repository->save($wanna_change_email);
        $this->notification_email_change->sendMail($auth_user, $email_reset);
    }
}
