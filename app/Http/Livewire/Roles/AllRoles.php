<?php
namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AllRoles extends Component
{
    protected $roles;
    public $selectedRoleId, $showModal = false;

    public function editRole($id)
    {
        $this->selectedRoleId = $id;
        $this->showModal = true;
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            session()->flash('success', 'Role deleted successfully.');
        } else {
            session()->flash('error', 'Role not found.');
        }

        $this->roles = Role::paginate(10); // Refresh roles list
    }

    public function render()
    {
        $this->roles = Role::paginate(10) ?? [];
        return view('livewire.roles.all-roles', [
            'roles' => $this->roles,
        ]);
    }
    public function setActiveLinkView($view)
    {
        $this->emit('setActiveMenuItem', $view);
        $this->emit('handleSetContent', $view);
    }
}

