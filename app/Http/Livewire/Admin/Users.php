<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class Users extends Component
{
    public $first_name, $email, $last_name, $password;
    public $modal = false;
    public $users;
    public $role = 'user';

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function render()
    {
        $this->users = User::all();
        return view('livewire.admin.users.index')->layout('layouts.admin.app');
    }

    public function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }

    public function openModal($bool){
        $this->modal = $bool;
    }

    public function create(){
        $this->resetInputFields();
        $this->openModal(true);
    }

    public function save(){

        $this->validate();

        $user_data = [
                        'first_name' => $this->first_name,
                        'last_name' => $this->last_name,
                        'email' => $this->email,
                        'role' => $this->role,
                        'password' => Hash::make($this->password),
                        ];

        $user = User::where('email','=',$this->email)->first();

        if($user){
            $user->update($user_data);
        }else{
            $user = User::create($user_data);
        }

        $this->openModal(false);
    }

    public function edit($id){
        $this->modal = true;
        $user = User::find($id);
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->password = '';
        $this->role = 'user';
    }

}
