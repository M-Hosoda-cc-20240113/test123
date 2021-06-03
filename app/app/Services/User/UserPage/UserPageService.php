<?php


namespace App\Services\User\UserPage;


use App\Services\Note\NoteRepositoryInterface;
use App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface;
use App\Services\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserPageService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * @var RelLevelSkillUSerRepositoryInterface
     */
    private $relLevelSKillUser_repository;

    /**
     * @var NoteRepositoryInterface
     */
    private $note_repository;

    /**
     * UserPageService constructor.
     * @param \App\Services\User\UserRepositoryInterface $user_repository
     * @param \App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface $relLevelSKillUser_repository
     * @param \App\Services\Note\NoteRepositoryInterface $note_repository
     */
    public function __construct(
        UserRepositoryInterface $user_repository,
        RelLevelSkillUSerRepositoryInterface $relLevelSKillUser_repository,
        NoteRepositoryInterface $note_repository
    ) {
        $this->user_repository = $user_repository;
        $this->relLevelSKillUser_repository = $relLevelSKillUser_repository;
        $this->note_repository = $note_repository;
    }

    public function exec(): UserPageResponse
    {
        $user_id = Auth::user()->id;
        $response = new UserPageResponse();

        $user = $this->user_repository->fetchWithProjectsThroughApplicationOrAssignment($user_id);
        $response->setUser($user);

        $LevelSkillUSer = $this->relLevelSKillUser_repository->fetchByUserId($user_id);
        $response->setRelLevelSkillUSer($LevelSkillUSer);

        $notes = $this->note_repository->all();
        $response->setNotes($notes);

        return $response;
    }
}
