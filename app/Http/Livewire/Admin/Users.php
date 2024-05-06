<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Users extends Component
{
    public $name, $email;
    public $modal = false;

    public function render()
    {
        return view('livewire.admin.users.index');
    }
}
