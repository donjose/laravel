@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Edit Permission </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('permissions-edit',$permission) }}
            </ol>
        </div>
        <div class = "col-sm-8">
            <div class = "title-action">
                <a href = "{{route('admin.permissions.index')}}" class = "btn btn-primary"><span class = "icon"><i
                                class = "fa fa-arrow-left"></i></span> back</a>
            </div>
        </div>

    </div>

    <div class = "wrapper wrapper-content" id = "app">
        <div class = "fadeInRightBig">
            <div class = "row">
                <div class = "col-md-12">
                    @include('admin.includes.errors')

                    <div class = "ibox float-e-margins">
                        <div class = "ibox-title">
                            <h5>Edit Permission</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    <form method = "post" action = "{{route('admin.permissions.update',$permission->id)}}"
                                          enctype = "multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}



                                        <div class="form-group">
                                            <label for="display_name" class="control-label">Name (Display Name)</label>
                                            <p class="control">
                                                <input type="text" class="form-control" name="display_name" id="display_name" value="{{$permission->display_name}}">
                                            </p>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="control-label">Slug (NOT EDITABLE)</label>
                                            <p class="control">
                                                <input type="text" class="form-control" name="name" id="name" value="{{$permission->name}}" disabled>
                                            </p>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label">Description</label>
                                            <p class="control">
                                                <input type="text" value="" class="form-control" name="description" id="description" placeholder="Describe what this permission does" value="{{$permission->description}}">
                                            </p>
                                        </div>


                                        <div class = "form-group ">
                                            <button class = "btn btn-primary btn-lg"><i class = "fa fa-save"></i> Save</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection

