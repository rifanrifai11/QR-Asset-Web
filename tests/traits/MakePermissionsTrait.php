<?php

use Faker\Factory as Faker;
use App\Models\Permissions;
use App\Repositories\PermissionsRepository;

trait MakePermissionsTrait
{
    /**
     * Create fake instance of Permissions and save it in database
     *
     * @param array $permissionsFields
     * @return Permissions
     */
    public function makePermissions($permissionsFields = [])
    {
        /** @var PermissionsRepository $permissionsRepo */
        $permissionsRepo = App::make(PermissionsRepository::class);
        $theme = $this->fakePermissionsData($permissionsFields);
        return $permissionsRepo->create($theme);
    }

    /**
     * Get fake instance of Permissions
     *
     * @param array $permissionsFields
     * @return Permissions
     */
    public function fakePermissions($permissionsFields = [])
    {
        return new Permissions($this->fakePermissionsData($permissionsFields));
    }

    /**
     * Get fake data of Permissions
     *
     * @param array $postFields
     * @return array
     */
    public function fakePermissionsData($permissionsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'display_name' => $fake->word,
            'description' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $permissionsFields);
    }
}
