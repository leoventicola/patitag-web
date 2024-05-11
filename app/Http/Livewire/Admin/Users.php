<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
class Users extends Component
{
    use WithPagination;

    public $search = '';
    public $first_name, $email, $last_name, $password;
    public $modal = false;
    public $users;
    public $roles;
    public $selectedRole;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
    ];

    public function render()
    {
        $this->users = User::all();
        $this->roles = Role::all();
        return view('livewire.admin.users.index')->layout('layouts.admin.app');
    }

    public function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
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
                        ];

        $user = User::where('email','=',$this->email)->first();

        if(!$user || ($user && $this->password != '')){
            $user_data['password'] = Hash::make($this->password);
        }

        if($user){
            $user->update($user_data);
        }else{
            $user = User::create($user_data);
        }
        $user->assignRole($this->selectedRole);
        $this->openModal(false);
    }

    public function edit($id){
        $this->modal = true;
        $user = User::find($id);
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->password = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
