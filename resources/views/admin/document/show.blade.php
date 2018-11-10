    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('document::document.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#document-document-entry' data-href='{{guard_url('document/document/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($document->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#document-document-entry' data-href='{{ guard_url('document/document') }}/{{$document->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#document-document-entry' data-datatable='#document-document-list' data-href='{{ guard_url('document/document') }}/{{$document->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('document-document-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('document/document'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('document::document.name') !!}  [{!! $document->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('document::admin.document.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>