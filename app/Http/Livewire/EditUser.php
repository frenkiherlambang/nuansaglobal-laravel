<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditUser extends ModalComponent
{
    public int|User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {

        return view('livewire.edit-user', ['user' => $this->user]);
    }
}
