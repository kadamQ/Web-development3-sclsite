<?php

namespace App\Policies;

use App\models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($ability == 'update' && $user->isAdmin)
            {
                return true;
            }
            if ($ability == 'delete' && $user->isAdmin)
            {
                return true;
            }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\models\Post  $post
     * @return mixed
     */

    public function view(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\models\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id == $post->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\models\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user ->id ==$post->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\models\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return $user->id ==$post->user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\models\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        return $user ->id ==$post->user->id;
    }
}
