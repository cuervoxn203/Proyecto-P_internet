<?php

namespace App\Policies;

use App\Models\Recurso;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RecursoPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->rol === 'Admin') {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Recurso $recurso): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        //
        return $user->rol === 'Terapeuta' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Recurso $recurso): Response
    {
        //
        return $user->rol === 'Terapeuta' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Recurso $recurso): Response
    {
        //
        return $user->rol === 'Terapeuta' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Recurso $recurso): Response
    {
        //
        return $user->rol === 'Admin' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Recurso $recurso): Response
    {
        //
        return $user->rol === 'Admin' ? Response::allow() : Response::denyAsNotFound();
    }
}
