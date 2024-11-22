<?php

namespace App\Policies;

use App\Models\Formulario;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FormularioPolicy
{
    /**
        * Perform pre-authorization checks.
    */
    // public function before(User $user, string $ability): bool|null
    // {
    //     if ($user->isAdministrator()) {
    //         return true;
    //     }

    //     return null;
    // }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Formulario $formulario): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->rol === 'Terapeuta' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Formulario $formulario): Response
    {
        // Solo terapeutas pueden actualizar un formulario
        // A los demas usuarios se les niega el acceso con un 404 como si no existiera
        return $user->rol === 'Terapeuta' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Formulario $formulario): Response
    {
        return $user->rol === 'Terapeuta' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Formulario $formulario): Response
    {
        return $user->rol === 'Admin' ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Formulario $formulario): Response
    {
        return $user->rol === 'Admin' ? Response::allow() : Response::denyAsNotFound();
    }
}
