    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#document" data-toggle="tab">{!! trans('document::document.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#document-document-edit'  data-load-to='#document-document-entry' data-datatable='#document-document-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#document-document-entry' data-href='{{guard_url('document/document')}}/{{$document->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('document-document-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('document/document/'. $document->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="document">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('document::document.name') !!} [{!!$document->name!!}] </div>
                @include('document::admin.document.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>