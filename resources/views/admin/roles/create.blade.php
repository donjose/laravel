@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Create Role </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('roles-create') }}
            </ol>
        </div>
        <div class = "col-sm-8">
            <div class = "title-action">
                <a href = "{{route('admin.roles.index')}}" class = "btn btn-primary"><span class = "icon"><i
                                class = "fa fa-arrow-left"></i></span> back</a>
            </div>
        </div>

    </div>

    <div class = "wrapper wrapper-content" id ="app">
        <div class = "fadeInRightBig">
            <div class = "row">
                <div class = "col-md-12">
                    @include('admin.includes.errors')

                    <div class = "ibox float-e-margins">
                        <div class = "ibox-title">
                            <h5>Create Role</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    <form method = "post" action = "{{route('admin.roles.store')}}" enctype = "multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="display_name" class="control=label">Name (Human Readable)</label>
                                            <input type="text" class="form-control" name="display_name" value="{{old('display_name')}}" id="display_name">

                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control=label">Slug (Can not be changed)</label>
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control=label">Description</label>
                                            <input type="text" class="form-control" value="{{old('description')}}" id="description" name="description">
                                        </div>
                                        <input type="hidden" :value="permissionsSelected" name="permissions">
                                        <h2>Permissions Selected</h2>
                                        <hr/>
                                        @foreach ($permissions as $permission)
                                            <div class="form-group">
                                                <label>
                                                <input type="checkbox" v-model="permissionsSelected" value="{{$permission->id}}"> {{$permission->display_name}} <em>({{$permission->description}})</em></label>
                                            </div>
                                        @endforeach

                                        <div class = "form-group ">
                                            <button class = "btn btn-primary btn-lg"><i class = "fa fa-save"></i> Save
                                            </button>
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
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionsSelected: []
            }
        });
    </script>
@endsection
@section('scripts')

    @parent
    <script src="{{ asset('assets/js/vue.js') }}"></script>
@endsection