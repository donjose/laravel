@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Create User </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('users-create') }}
            </ol>
        </div>
        <div class = "col-sm-8">
            <div class = "title-action">
                <a href = "{{route('admin.users.index')}}" class = "btn btn-primary"><span class = "icon"><i
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
                            <h5>Create User</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <form method = "post" action = "{{route('admin.users.store')}}"
                              enctype = "multipart/form-data">
                            <div class = "ibox-content">
                                <div class = "row">
                                    <div class = "col-md-6">

                                        {{csrf_field()}}
                                        <div class = "tabs-container">
                                            <ul class = "nav nav-tabs">
                                                <li class = "active"><a data-toggle = "tab" href = "#general"
                                                                  aria-expanded = "true">General</a>
                                                </li>
                                                <li><a data-toggle = "tab" href = "#roles"
                                                                  aria-expanded = "true">Roles </a></li>
                                                <li><a data-toggle = "tab" href = "#social"
                                                                  aria-expanded = "true">Social Media Profiles</a></li>
                                                <li><a data-toggle = "tab" href = "#profile"
                                                                  aria-expanded = "false">Profile</a></li>
                                                <li><a data-toggle = "tab" href = "#seller"
                                                                  aria-expanded = "false">Seller Profile</a></li>
                                                <li><a data-toggle = "tab" href = "#address"
                                                       aria-expanded = "false">Address</a></li>
                                            </ul>
                                            <div class = "tab-content">
                                                <div id = "general" class = "tab-pane active">
                                                    <div class = "panel-body">
                                                        <div class = "form-group">
                                                            <label class = "control-label">Name <span
                                                                        class = "text-danger">*</span></label>
                                                            <input type = "text" name = "name" required
                                                                   class = "form-control"
                                                                   value = "{{old('name')}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Email <span
                                                                        class = "text-danger">*</span></label>
                                                            <input type = "email" name = "email" required
                                                                   class = "form-control"
                                                                   value = "{{old('email')}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Password <span
                                                                        class = "text-danger">*</span></label>
                                                            <input type = "password" name = "password" required
                                                                   class = "form-control" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Password Confirm<span
                                                                        class = "text-danger">*</span></label>
                                                            <input type = "password" name = "password_confirmation"
                                                                   required
                                                                   class = "form-control" />
                                                        </div>

                                                        <div class = "form-group">
                                                            <label class = "control-label">Avatar</label>
                                                            <input type = "file" name = "avatar" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Phone </label>
                                                            <input type = "text" name = "phone" class = "form-control"
                                                                   value = "{{old('phone')}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Skype </label>
                                                            <input type = "text" name = "skype" class = "form-control"
                                                                   value = "{{old('skype')}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Address </label>
                                                            <textarea name = "address"
                                                                      class = "form-control">{{old('address')}}</textarea>
                                                        </div>
                                                        <div class = "form-group ">
                                                            <button class = "btn btn-primary btn-lg"><i
                                                                        class = "fa fa-save"></i> Save
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div id = "roles" class = "tab-pane">
                                                    <div class = "panel-body">
                                                        <div class = "form-group">
                                                            <label for = "roles" class = "control-label">Roles:</label>
                                                            <input type = "hidden" name = "roles"
                                                                   :value = "rolesSelected" />

                                                            @foreach ($roles as $role)
                                                                <div class = "form-group">
                                                                    <label><input type = "checkbox"
                                                                                  v-model = "rolesSelected"
                                                                                  value = "{{$role->id}}"> {{$role->display_name}}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id = "social" class = "tab-pane">
                                                    <div class = "panel-body">
                                                        <div class = "form-group">
                                                            <label class = "control-label">Facebook</label>
                                                            <input type = "url" class = "form-control"
                                                                   name = "facebook_url"
                                                                   value = "{{old('facebook_url')}}">
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Twitter</label>
                                                            <input type = "url" class = "form-control"
                                                                   name = "twitter_url"
                                                                   value = "{{old('twitter_url')}}">
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Google+</label>
                                                            <input type = "url" class = "form-control"
                                                                   name = "google_url" value = "{{old('google_url')}}">
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Linked In</label>
                                                            <input type = "url" class = "form-control"
                                                                   name = "instagram"
                                                                   value = "{{old('linked_in_url')}}">
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Website URL</label>
                                                            <input type = "url" class = "form-control"
                                                                   name = "website_url"
                                                                   value = "{{old('website_url')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id = "profile" class = "tab-pane">
                                                    <div class = "panel-body">
                                                        <div class = "form-group">
                                                            <label class = "control-label">Gender</label>
                                                            <label class = "checkbox-inline">
                                                                <input type = "radio" name = "gender" value = "male"
                                                                       @if(old('gender') == 'male') checked @endif> Male
                                                            </label>
                                                            <label class = "checkbox-inline">
                                                                <input type = "radio" name = "gender" value = "female"
                                                                       @if(old('gender') == 'female') checked @endif>
                                                                Female
                                                            </label>
                                                        </div>
                                                        <div class = "form-group" id = "data_1">
                                                            <label class = "control-label">Birth Date </label>
                                                            <div class = "input-group date">
                                                                <span class = "input-group-addon" style = ""><i
                                                                            class = "fa fa-calendar"></i></span><input
                                                                        class = "form-control datepicker"
                                                                        name = "birth_date" value = "" type = "text">
                                                            </div>
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">About</label>
                                                            <textarea class = "form-control"
                                                                      name = "about">{{old('about')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id = "seller" class = "tab-pane">
                                                    <div class = "panel-body">
                                                        <h2>Seller Profile</h2>
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id = "address" class = "tab-pane">
                                                    <div class = "panel-body">
                                                        <h2>Address</h2>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                    <div class = "col-md-6">


                                        <div id = "seller" v-if = "(rolesSelected.indexOf(6) != undefined)">
                                            <h2>Seller Account</h2>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script>
        $(function () {
            $('.datepicker').datetimepicker({format: 'YYYY-MM-DD'});
        });
    </script>

@endsection

@section('scripts')

    @parent
    <script src = "{{ asset('assets/js/vue.js') }}"></script>
    <!-- CKeditor -->
    <script src = "{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src = "{{asset('AjexFileManager/ajex.js')}}"></script>
    <!-- datepicker -->
    <script src = "{{asset('assets/js/plugins/datetimepicker/moment.js')}}"></script>
    <script src = "{{asset('assets/js/plugins/datetimepicker/bootstrap-datetimepicker.js')}}"></script>
    <link rel = "stylesheet" href = "{{asset('assets/js/plugins/datetimepicker/bootstrap-datetimepicker.min.css')}}" />

@endsection