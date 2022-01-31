<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; //indicamos que use boots en vez de live para el estilo paginador
    public $search;
    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orwhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(8);
        return view('livewire.admin.users-index', compact('users'));
    }
    public function clean() 
    {
      $this->resetPage('page');
    }
}
