<?php

namespace Litecms\Document\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class DocumentTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Document\Models\Document $document)
    {
        return [
            'id'                => $document->getRouteKey(),
            'key'               => [
                'public'    => $document->getPublicKey(),
                'route'     => $document->getRouteKey(),
            ], 
            'id'                => $document->id,
            'name'              => $document->name,
            'slug'              => $document->slug,
            'document_files'    => $document->document_files,
            'upload_folder'     => $document->upload_folder,
            'created_at'        => $document->created_at,
            'updated_at'        => $document->updated_at,
            'deleted_at'        => $document->deleted_at,
            'url'               => [
                'public'    => trans_url('document/'.$document->getPublicKey()),
                'user'      => guard_url('document/document/'.$document->getRouteKey()),
            ], 
            'status'            => trans('app.'.$document->status),
            'created_at'        => format_date($document->created_at),
            'updated_at'        => format_date($document->updated_at),
        ];
    }
}