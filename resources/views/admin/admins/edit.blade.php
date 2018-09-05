@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Edit Administrator </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('administrators-edit',$admin) }}
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
                            <h5>Edit Administrator</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    <form method = "post" action = "{{route('admin.administrators.update', $admin->id )}}" enctype = "multipart/form-data">
                                        {{csrf_field()}}
                                        {{ method_field('PUT') }}

                                        <div class = "form-group">
                                            <label class = "control-labelt">Name <span
                                                        class = "text-danger">*</span></label>
                                            <input type = "text" name = "name" required class = "form-control"
                                                   value = "{{$admin->name}}" />
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-labelt">Email <span
                                                        class = "text-danger">*</span></label>
                                            <input type = "email" name = "email" required class = "form-control"
                                                   value = "{{$admin->email}}" />
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-labelt">New Password </label>
                                            <input type = "password" name = "password"
                                                   class = "form-control" />
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-labelt">New Password Confirm</label>
                                            <input type = "password" name = "password_confirmation"
                                                   class = "form-control" />
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
                                            <label class = "control-labelt">Phone </label>
                                            <input type = "text" name = "phone" class = "form-control"
                                                   value = "{{$admin->phone}}" />
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-labelt">Skype </label>
                                            <input type = "text" name = "skype" class = "form-control"
                                                   value = "{{$admin->skype}}" />
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-labelt">Address </label>
                                            <textarea name = "address"
                                                      class = "form-control">{{$admin->address}}</textarea>

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
                rolesSelected: {!! $admin->roles->pluck('id') !!}
            }
        });
    </script>
@endsection

@section('scripts')

    @parent
    <script src="{{ asset('assets/js/vue.js') }}"></script>
@endsection