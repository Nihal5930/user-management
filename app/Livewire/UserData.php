<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserData extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['refreshUserData' => '$refresh', 'refreshUserDetails' => '$refresh'];

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->dispatch('editUser', $user->toArray());
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        $this->dispatch('refreshUserData');
        $this->dispatch('refreshUserDetails');
    }

    public function render()
    {
        return view('livewire.user-data', [
            'users' => User::latest()->paginate(5)
        ]);
    }
}
