@extends('admin.layouts.app')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Permissions Management</h2>
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('permissions') }}
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('admin.permissions.create')}}" class="btn btn-primary"><span class="icon"><i
                                class="fa fa-plus"></i></span> Create New</a>
            </div>
        </div>

    </div>

    <div class="wrapper wrapper-content">
        <div class="fadeInRightBig">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.includes.status')

                    @if(count($permissions) > 0)
                        <form method="post" action="{{route('admin.permissions.mass_action')}}">
                            {{csrf_field()}}
                            <table class="table table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th><input type = "checkbox" id = "check-all" class = "i-checks"/></th>
                                    <th>Name</th>

                                    <th>Display Name</th>

                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td><input class="i-checks" type="checkbox" name="id[]" value="{{$permission->id}}"/>
                                        </td>
                                        <td>{{$permission->name}}</td>

                                        <td>{{$permission->display_name}}</td>

                                        <td>
                                            <a class = "btn btn-xs btn-outline btn-primary" href = "{{route('admin.permissions.edit',$permission)}}">Edit</a>
                                            <a class = "btn btn-xs btn-outline btn-default" href = "{{route('admin.permissions.show',$permission->id)}}">Show</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class = "form-inline">
                                            <div class = "form-group">
                                                <select class = "form-control" name = "mass_action" required>
                                                    <option value="">With Selected:</option>
                                                    <option value = "delete">Delete</option>
                                                </select>
                                            </div>
                                            <button class = "btn btn-primary">Apply</button>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </form>
                        {{ $permissions->links() }}
                    <!-- single delete form -->
                        <form action="" method="post">

                        </form>
                    @else
                        <div class = "alert alert-warning alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p>There is no Permissions in Database, please create a new one</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection