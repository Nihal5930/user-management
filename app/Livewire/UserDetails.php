<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserDetails extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['refreshUserDetails' => '$refresh'];

    public function render()
    {
        return view('livewire.user-details', [
            'userDetails' => User::with('details')->latest()->paginate(5)
        ]);
    }
}
