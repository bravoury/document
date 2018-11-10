<?php

namespace Litecms\Document\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Document\Models\Document;

class DocumentPolicy
{

    /**
     * Determine if the given user can view the document.
     *
     * @param UserPolicy $user
     * @param Document $document
     *
     * @return bool
     */
    public function view(UserPolicy $user, Document $document)
    {
        if ($user->canDo('document.document.view') && $user->isAdmin()) {
            return true;
        }

        return $document->user_id == user_id() && $document->user_type == user_type();
    }

    /**
     * Determine if the given user can create a document.
     *
     * @param UserPolicy $user
     * @param Document $document
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('document.document.create');
    }

    /**
     * Determine if the given user can update the given document.
     *
     * @param UserPolicy $user
     * @param Document $document
     *
     * @return bool
     */
    public function update(UserPolicy $user, Document $document)
    {
        if ($user->canDo('document.document.edit') && $user->isAdmin()) {
            return true;
        }

        return $document->user_id == user_id() && $document->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given document.
     *
     * @param UserPolicy $user
     * @param Document $document
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Document $document)
    {
        return $document->user_id == user_id() && $document->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given document.
     *
     * @param UserPolicy $user
     * @param Document $document
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Document $document)
    {
        if ($user->canDo('document.document.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given document.
     *
     * @param UserPolicy $user
     * @param Document $document
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Document $document)
    {
        if ($user->canDo('document.document.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
