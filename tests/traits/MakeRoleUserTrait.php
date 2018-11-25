<?php

use Faker\Factory as Faker;
use App\Models\RoleUser;
use App\Repositories\RoleUserRepository;

trait MakeRoleUserTrait
{
    /**
     * Create fake instance of RoleUser and save it in database
     *
     * @param array $roleUserFields
     * @return RoleUser
     */
    public function makeRoleUser($roleUserFields = [])
    {
        /** @var RoleUserRepository $roleUserRepo */
        $roleUserRepo = App::make(RoleUserRepository::class);
        $theme = $this->fakeRoleUserData($roleUserFields);
        return $roleUserRepo->create($theme);
    }

    /**
     * Get fake instance of RoleUser
     *
     * @param array $roleUserFields
     * @return RoleUser
     */
    public function fakeRoleUser($roleUserFields = [])
    {
        return new RoleUser($this->fakeRoleUserData($roleUserFields));
    }

    /**
     * Get fake data of RoleUser
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRoleUserData($roleUserFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'role_id' => $fake->randomDigitNotNull
        ], $roleUserFields);
    }
}
