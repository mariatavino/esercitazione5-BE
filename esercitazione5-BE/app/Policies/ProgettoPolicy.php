<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Progetto;
use App\Models\User;

class ProgettoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Assume any authenticated user can view projects
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Progetto $progetto): bool
    {
        // Only the user who owns the project can view it
        return $user->id === $progetto->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Assume any authenticated user can create projects
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Progetto $progetto): bool
    {
        // Only the user who owns the project can update it
        return $user->id === $progetto->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Progetto $progetto): bool
    {
        // Only the user who owns the project can delete it
        return $user->id === $progetto->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Progetto $progetto): bool
    {
        // Assume only administrators can restore projects
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Progetto $progetto): bool
    {
        // Assume only administrators can force delete projects
        return $user->is_admin;
    }
}
