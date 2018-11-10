            @include('document::public.document.partial.header')

            <section class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('document::public.document.partial.aside')
                        </div>
                        <div class="col-md-9 ">
                            <div class="area">
                                <div class="item">
                                    <div class="feature">
                                        <img class="img-responsive center-block" src="{!!url($document->defaultImage('images' , 'xl'))!!}" alt="{{$document->title}}">
                                    </div>
                                    <div class="content">
                                        <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('document::document.label.id') !!}
                </label><br />
                    {!! $document['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('document::document.label.name') !!}
                </label><br />
                    {!! $document['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('document::document.label.slug') !!}
                </label><br />
                    {!! $document['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="document_files">
                    {!! trans('document::document.label.document_files') !!}
                </label><br />
                    {!! $document['document_files'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="upload_folder">
                    {!! trans('document::document.label.upload_folder') !!}
                </label><br />
                    {!! $document['upload_folder'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('document::document.label.created_at') !!}
                </label><br />
                    {!! $document['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('document::document.label.updated_at') !!}
                </label><br />
                    {!! $document['updated_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('document::document.label.deleted_at') !!}
                </label><br />
                    {!! $document['deleted_at'] !!}
            </div>
        </div>
    </div>

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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



