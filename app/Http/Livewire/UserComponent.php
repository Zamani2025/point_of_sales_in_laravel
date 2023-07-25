<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class UserComponent extends Component
{
    public $userDetails;
    public $searchByName;
    public $searchByEmail;
    public $searchUser = [];

    public function userDetail($user_id){
        $this->userDetails = Employee::find($user_id);
    }

    public function searchUserByName(){
        $this->searchUser = Employee::where('name', 'like', '%' . $this->searchByName  . '%')->get();
        // dd($this->searchUser);
    }
    public function searchUserByEmail(){
        $this->searchUser = Employee::where('email', 'like', '%' . $this->searchByEmail  . '%')->get();
        // dd($this->searchUser);
    }
    
    public function render()
    {
        $users = Employee::paginate(10);
        return view('livewire.user-component', compact('users'));
    }
}
