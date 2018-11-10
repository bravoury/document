<?php

namespace Litecms\Document\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Document\Interfaces\DocumentRepositoryInterface;

class DocumentPublicController extends BaseController
{
    // use DocumentWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Document\Interfaces\DocumentRepositoryInterface $document
     *
     * @return type
     */
    public function __construct(DocumentRepositoryInterface $document)
    {
        $this->repository = $document;
        parent::__construct();
    }

    /**
     * Show document's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $documents = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->title(trans('$document::$document.names'))
            ->view('$document::public.document.index')
            ->data(compact('$documents'))
            ->output();
    }

    /**
     * Show document's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $documents = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->title(trans('$document::$document.names'))
            ->view('$document::public.document.index')
            ->data(compact('$documents'))
            ->output();
    }

    /**
     * Show document.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $document = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->response->title($$document->name . trans('$document::$document.name'))
            ->view('$document::public.document.show')
            ->data(compact('$document'))
            ->output();
    }

}
