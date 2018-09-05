@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Create Administrator </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('administrators-create') }}
            </ol>
        </div>
        <div class = "col-sm-8">
            <div class = "title-action">
                <a href = "{{route('admin.administrators.index')}}" class = "btn btn-primary"><span class = "icon"><i
                                class = "fa fa-arrow-left"></i></span> back</a>
            </div>
        </div>

    </div>

    <div class = "wrapper wrapper-content" id="app">
        <div class = "fadeInRightBig">
            <div class = "row">
                <div class = "col-md-12">
                    @include('admin.includes.errors')

                    <div class = "ibox float-e-margins">
                        <div class = "ibox-title">
                            <h5>Create Administrator</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    <form method = "post" action = "{{route('admin.administrators.store')}}"
                                          enctype = "multipart/form-data">
                                        {{csrf_field()}}
                                        <div class = "form-group">
                                            <label class = "control-label">Name <span
                                                        class = "text-danger">*</span></label>
                                            <input type = "text" name = "name" required class = "form-control" value="{{old('name')}}"/>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label">Email <span
                                                        class = "text-danger">*</span></label>
                                            <input type = "email" name = "email" required class = "form-control" value="{{old('email')}}"/>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label">Password <span
                                                        class = "text-danger">*</span></label>
                                            <input type = "password" name = "password" required class = "form-control" />
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label">Password Confirm<span class = "text-danger">*</span></label>
                                            <input type = "password" name = "password_confirmation" required class = "form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="roles" class="control-label">Roles:</label>
                                            <input type="hidden" name="roles" :value="rolesSelected" />

                                            @foreach ($roles as $role)
                                                <div class="form-group">
                                                    <label><input type="checkbox" v-model="rolesSelected" value="{{$role->id}}"> {{$role->display_name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label">Avatar</label>
                                            <input type = "file" name = "avatar" />
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label">Phone </label>
                                            <input type = "text" name = "phone"  class = "form-control" value="{{old('phone')}}"/>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label">Skype </label>
                                            <input type = "text" name = "skype"  class = "form-control" value="{{old('skype')}}"/>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label">Address </label>
                                            <textarea name="address" class="form-control">{{old('address')}}</textarea>
                                        </div>
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
                auto_password: true,
                rolesSelected: [{!! old('roles') ? old('roles') : '' !!}]
            }
        });
    </script>
@endsection

@section('scripts')

    @parent
    <script src="{{ asset('assets/js/vue.js') }}"></script>
@endsection