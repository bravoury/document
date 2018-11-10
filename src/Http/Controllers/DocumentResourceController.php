<?php

namespace Litecms\Document\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Document\Http\Requests\DocumentRequest;
use Litecms\Document\Interfaces\DocumentRepositoryInterface;
use Litecms\Document\Models\Document;

/**
 * Resource controller class for document.
 */
class DocumentResourceController extends BaseController
{

    /**
     * Initialize document resource controller.
     *
     * @param type DocumentRepositoryInterface $document
     *
     * @return null
     */
    public function __construct(DocumentRepositoryInterface $document)
    {
        parent::__construct();
        $this->repository = $document;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Document\Repositories\Criteria\DocumentResourceCriteria::class);
    }

    /**
     * Display a list of document.
     *
     * @return Response
     */
    public function index(DocumentRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Document\Repositories\Presenter\DocumentPresenter::class)
                ->$function();
        }

        $documents = $this->repository->paginate();

        return $this->response->title(trans('document::document.names'))
            ->view('document::document.index', true)
            ->data(compact('documents'))
            ->output();
    }

    /**
     * Display document.
     *
     * @param Request $request
     * @param Model   $document
     *
     * @return Response
     */
    public function show(DocumentRequest $request, Document $document)
    {

        if ($document->exists) {
            $view = 'document::document.show';
        } else {
            $view = 'document::document.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('document::document.name'))
            ->data(compact('document'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new document.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(DocumentRequest $request)
    {

        $document = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('document::document.name')) 
            ->view('document::document.create', true) 
            ->data(compact('document'))
            ->output();
    }

    /**
     * Create new document.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(DocumentRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $document                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('document::document.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('document/document/' . $document->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/document/document'))
                ->redirect();
        }

    }

    /**
     * Show document for editing.
     *
     * @param Request $request
     * @param Model   $document
     *
     * @return Response
     */
    public function edit(DocumentRequest $request, Document $document)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('document::document.name'))
            ->view('document::document.edit', true)
            ->data(compact('document'))
            ->output();
    }

    /**
     * Update the document.
     *
     * @param Request $request
     * @param Model   $document
     *
     * @return Response
     */
    public function update(DocumentRequest $request, Document $document)
    {
        try {
            $attributes = $request->all();

            $document->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('document::document.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('document/document/' . $document->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('document/document/' . $document->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the document.
     *
     * @param Model   $document
     *
     * @return Response
     */
    public function destroy(DocumentRequest $request, Document $document)
    {
        try {

            $document->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('document::document.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('document/document/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('document/document/' . $document->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple document.
     *
     * @param Model   $document
     *
     * @return Response
     */
    public function delete(DocumentRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('document::document.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('document/document'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/document/document'))
                ->redirect();
        }

    }

    /**
     * Restore deleted documents.
     *
     * @param Model   $document
     *
     * @return Response
     */
    public function restore(DocumentRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('document::document.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/document/document'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/document/document/'))
                ->redirect();
        }

    }

}
