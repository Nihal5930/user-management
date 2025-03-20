<?php
namespace App\Services;

use App\Models\Detail;
use App\Models\User;
use App\Events\RefreshUserDetails;
use Livewire\Livewire;

class UserService
{
    public function saveUserDetails(User $user)
    {
        $full_name = trim("{$user->firstname} {$user->middlename} {$user->lastname}");
        $middle_initial = $user->middlename ? substr($user->middlename, 0, 1) . '.' : null;
        $gender = $this->getGenderFromPrefix($user->prefixname);

        Detail::updateOrCreate(
            ['user_id' => $user->id, 'key' => 'full_name'],
            ['value' => $full_name, 'type' => 'detail']
        );

        Detail::updateOrCreate(
            ['user_id' => $user->id, 'key' => 'middle_initial'],
            ['value' => $middle_initial, 'type' => 'detail']
        );

        Detail::updateOrCreate(
            ['user_id' => $user->id, 'key' => 'avatar'],
            ['value' => $user->photo, 'type' => 'detail']
        );

        Detail::updateOrCreate(
            ['user_id' => $user->id, 'key' => 'gender'],
            ['value' => $gender, 'type' => 'detail']
        );

    }

    private function getGenderFromPrefix($prefix)
    {
        return in_array($prefix, ['Mr.', 'Sir']) ? 'Male' : (in_array($prefix, ['Ms.', 'Mrs.', 'Madam']) ? 'Female' : 'Other');
    }
}
