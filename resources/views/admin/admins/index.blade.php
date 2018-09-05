@extends('admin.layouts.app')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Administrators Management</h2>
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('administrators') }}
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('admin.administrators.create')}}" class="btn btn-primary"><span class="icon"><i
                                class="fa fa-plus"></i></span> Create New</a>
            </div>
        </div>

    </div>

    <div class="wrapper wrapper-content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.includes.status')

                    @if(count($admins) > 0)
                        <form method="post" action="{{route('admin.administrators.mass_action')}}">
                            {{csrf_field()}}
                            <table class="table table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th><input type = "checkbox" id = "check-all" class = "i-checks"/></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td><input class="i-checks" type="checkbox" name="id[]" value="{{$admin->id}}"/>
                                        </td>
                                        <td>{{$admin->name}}</td>
                                        <td><a href = "mailto:{{$admin->email}}">{{$admin->email}}</a></td>
                                        <td>{{$admin->roles()->pluck('display_name')}}</td>
                                        <td>{{$admin->created_at->toFormattedDateString()}}</td>
                                        <td>{{$admin->updated_at->toFormattedDateString()}}</td>
                                        <td>
                                            <a class = "btn btn-xs btn-outline btn-primary" href = "{{route('admin.administrators.edit',$admin)}}">Edit</a>
                                            <a class = "btn btn-xs btn-outline btn-default" href = "{{route('admin.administrators.show',$admin->id)}}">Show</a>
                                            <a class = "btn btn-xs btn-outline btn-danger delete-btn" data-action="{{route('admin.administrators.destroy',$admin->id)}}" data-id="{{$admin->id}}" >Delete</a>
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
                        {{ $admins->links() }}
                    <!-- single delete form -->
                       @include('includes.delete')
                    @else
                        <div class = "alert alert-warning alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p>There is no Admins in Database, please create a new one</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection