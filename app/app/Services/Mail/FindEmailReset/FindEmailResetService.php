<?php


namespace App\Services\Mail\FindEmailReset;


use App\Models\EmailReset;
use App\Services\Mail\EmailResetRepositoryInterface;

/**
 * Class FindEmailResetService
 * @package App\Services\Mail\FindEmailChange
 */
class FindEmailResetService
{
    /**
     * @var EmailResetRepositoryInterface
     */
    private $email_change_repository;

    /**
     * FindEmailResetService constructor.
     * @param EmailResetRepositoryInterface $email_change_repository
     */
    public function __construct(EmailResetRepositoryInterface $email_change_repository)
    {
        $this->email_change_repository = $email_change_repository;
    }

    /**
     * @param string $token
     * @return EmailReset|null
     */
    public function findByToken(string $token): ?EmailReset
    {
        return $this->email_change_repository->findByToken($token);
    }
}
