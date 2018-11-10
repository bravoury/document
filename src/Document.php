<?php

namespace Litecms\Document;

use User;

class Document
{
    /**
     * $document object.
     */
    protected $document;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Document\Interfaces\DocumentRepositoryInterface $document)
    {
        $this->document = $document;
    }

    /**
     * Returns count of document.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.document.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->document->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\DocumentUserCriteria());
        }

        $document = $this->document->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('document::' . $view, compact('document'))->render();
    }
}
