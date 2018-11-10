            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('document::document.label.name'))
                       -> placeholder(trans('document::document.placeholder.name'))!!}
                </div>

                <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="files" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('document::document.label.document_files') }}
                        </label>
                        <div class='col-lg-3 col-sm-12'>
                            {!! $document->files('files')
                            ->url($document->getUploadUrl('files'))
                            ->mime(config('filer.allowed_extensions'))
                            ->files()!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                            {!! $document->files('files')
                            ->editor()!!}
                        </div>
                    </div>
                </div>
            </div>