<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentControllerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
       
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comment $comment): Response
    {
        
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        
        return Response::allow();
 
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comment $comment): Response
    {
       
        if ($user->role === 'moderator' || $comment->user()) {
            return Response::allow();
        }

        return Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): Response
    {
       
        if ($user->role === 'moderator') {
            return Response::allow();
        }

        return Response::deny();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): Response
    {
       
        if ($user->role === 'moderator') {
            return Response::allow();
        }

        return Response::deny();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): Response
    {
        
        if ($user->role === 'moderator') {
            return Response::allow();
        }

        return Response::deny();
    }
}