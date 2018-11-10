<?php

namespace Litecms\Document\Repositories\Eloquent;

use Litecms\Document\Interfaces\DocumentRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class DocumentRepository extends BaseRepository implements DocumentRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.document.document.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.document.document.model.model');
    }
}
