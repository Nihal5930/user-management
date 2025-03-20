<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class UserForm extends Component
{
    use WithFileUploads;

    public $userId, $prefixname, $firstname, $middlename, $lastname, $email, $photo, $existingPhoto;

    protected $listeners = ['editUser' => 'loadUserData'];

    public function save()
    {
        $validatedData = $this->validate([
            'prefixname' => 'required|string|max:10',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'photo' => 'nullable|image|max:1024',
        ]);

        if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('profiles', 'public');
        } elseif ($this->existingPhoto) {
            $validatedData['photo'] = $this->existingPhoto;
        }

        User::updateOrCreate(
            ['id' => $this->userId],
            [
                'prefixname' => $this->prefixname,
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'photo' => $validatedData['photo'] ?? null,
            ]
        );

        $this->dispatch('refreshUserData');
        $this->dispatch('refreshUserDetails');

        session()->flash('message', 'User saved successfully!');
        $this->resetForm();
    }

    public function loadUserData($user)
    {
        $this->userId = $user['id'];
        $this->prefixname = $user['prefixname'];
        $this->firstname = $user['firstname'];
        $this->middlename = $user['middlename'];
        $this->lastname = $user['lastname'];
        $this->email = $user['email'];
        $this->existingPhoto = $user['photo'];
    }

    public function resetForm()
    {
        $this->userId = null;
        $this->prefixname = '';
        $this->firstname = '';
        $this->middlename = '';
        $this->lastname = '';
        $this->email = '';
        $this->photo = null;
        $this->existingPhoto = null;
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
