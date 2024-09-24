<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddRole extends Component
{
    public $role_name;
    public $guardName = 'web'; // Default guard name, adjust if necessary
    public $showSuccessMessage = false;

    protected $rules = [
        'role_name' => 'required|string|max:255|unique:roles,name',
        'guardName' => 'nullable|string|max:255',
    ];

    public function addRole()
    {
        $this->validate();

        Role::create([
            'name' => $this->role_name,
            'guard_name' => $this->guardName,
        ]);

        $this->role_name = '';
        $this->guardName = 'web'; // Reset to default
        $this->showSuccessMessage = true;

        session()->flash('success', 'Role deleted successfully.');

        // Optionally, you can emit an event to notify the main component
        // $this->emit('roleAdded');
    }

    public function render()
    {
        return view('livewire.roles.add-role');
    }
}
