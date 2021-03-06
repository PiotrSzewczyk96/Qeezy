<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Permission;
use App\Models\User;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if($user->hasPermission('permissions-viewany')) {
            return true;
        }

        return false;
    }
    
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function update(User $user)
    {
        if($user->hasPermission('permissions-update')) {
            return true;
        }

        return false;
    }
}
