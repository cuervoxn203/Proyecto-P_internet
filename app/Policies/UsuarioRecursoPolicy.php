<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UsuarioRecurso;
use Illuminate\Auth\Access\Response;

class UsuarioRecursoPolicy
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
    public function view(User $user, UsuarioRecurso $usuarioRecurso): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UsuarioRecurso $usuarioRecurso): Response
    {
        //
        return $user->id === $usuarioRecurso->user_id ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UsuarioRecurso $usuarioRecurso): Response
    {
        //
        return $user->rol === 'Admin' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UsuarioRecurso $usuarioRecurso): Response
    {
        //
        return $user->rol === 'Admin' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UsuarioRecurso $usuarioRecurso): Response
    {
        //
        return $user->rol === 'Admin' ? Response::allow() : Response::denyAsNotFound();
    }
}
