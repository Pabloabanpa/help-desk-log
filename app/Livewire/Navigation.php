<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\User;

class Navigation extends Component
{
    public function render()
    {
        $users = User::all();   
        return view('livewire.navigation');
    }
}
