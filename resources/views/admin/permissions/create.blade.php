@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Create Permissions </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('permissions-create') }}
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
                            <h5>Create Permission</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    <form method = "post" action = "{{route('admin.permissions.store')}}"
                                          enctype = "multipart/form-data">
                                        {{csrf_field()}}


                                        <div class="block">
                                            <label>
                                            <input type = "radio" v-model="permissionType" name="permission_type" value="basic"> Basic Permission</label>
                                            <label>
                                            <input type = "radio"  v-model="permissionType" name="permission_type" value="crud"> CRUD Permission
                                            </label>
                                        </div>

                                        <div class="form-group" v-if="permissionType == 'basic'">
                                            <label for="display_name" class="control-label">Name (Display Name)</label>
                                            <p class="control">
                                                <input type="text" class="form-control" name="display_name" id="display_name">
                                            </p>
                                        </div>

                                        <div class="form-group" v-if="permissionType == 'basic'">
                                            <label for="name" class="control-label">Slug</label>
                                            <p class="control">
                                                <input type="text" class="form-control" name="name" id="name">
                                            </p>
                                        </div>

                                        <div class="form-group" v-if="permissionType == 'basic'">
                                            <label for="description" class="control-label">Description</label>
                                            <p class="control">
                                                <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does">
                                            </p>
                                        </div>

                                        <div class="form-group" v-if="permissionType == 'crud'">
                                            <label for="resource" class="control-label">Resource</label>
                                            <p class="control">
                                                <input type="text" class="form-control" name="resource" id="resource" v-model="resource" placeholder="The name of the resource">
                                            </p>
                                        </div>

                                        <div class="row" v-if="permissionType == 'crud'">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" v-model="crudSelected" value="create"> Create
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox"  v-model="crudSelected" v-model="crudSelected" value="read">Read
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox"  v-model="crudSelected" value="update">Update
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" v-model="crudSelected" value="delete">Delete
                                                    </label>
                                                </div>
                                            </div> <!-- end of .column -->

                                            <input type="hidden" name="crud_selected" :value="crudSelected">

                                            <div class="col-md-8">
                                                <table class="table table-responsive" v-if="resource.length >= 3 && crudSelected.length > 0">
                                                    <thead>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Description</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="item in crudSelected">
                                                        <td v-text="crudName(item)"></td>
                                                        <td v-text="crudSlug(item)"></td>
                                                        <td v-text="crudDescription(item)"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionType: 'basic',
                resource: '',
                crudSelected: ['create', 'read', 'update', 'delete']
            },


            methods: {
                crudName: function(item) {
                    return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function(item) {
                    return item.toLowerCase() + "-" + app.resource.toLowerCase();
                },
                crudDescription: function(item) {
                    return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                }
            }
        });

    </script>
   
@endsection

@section('scripts')

    @parent
    <script src="{{ asset('assets/js/vue.js') }}"></script>
    @endsection