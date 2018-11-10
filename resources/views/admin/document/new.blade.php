<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">  {!! trans('document::document.names') !!} [{!! trans('document::document.text.preview') !!}]</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#document-document-entry' data-href='{!!guard_url('document/document/create')!!}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }} </button>
        </div>
    </div>
</div>