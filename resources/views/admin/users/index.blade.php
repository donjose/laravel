@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Users Management</h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('users') }}
            </ol>
        </div>
        <div class = "col-sm-8">
            <div class = "title-action">
                <a href = "{{route('admin.users.create')}}" class = "btn btn-primary"><span class = "icon"><i
                                class = "fa fa-plus"></i></span> Create New</a>
            </div>
        </div>

    </div>

    <div class = "wrapper wrapper-content">
        <div class = "animated fadeIn">
            <form action = "{{route('admin.users.index')}}" enctype = "application/x-www-form-urlencoded">
                <div class = "ibox-content m-b-sm border-bottom">
                    <div class = "row">
                        <div class = "col-sm-3">
                            <div class = "form-group">
                                <label class = "control-label" for = "name">Name</label>
                                <input type = "text" name = "name" class = "form-control"
                                       value = "{{app('request')->input('name')}}" />
                            </div>
                        </div>
                        <div class = "col-sm-3">
                            <div class = "form-group">
                                <label class = "control-label" for = "user_id">Role</label>
                                <select name = "role_id" class = "form-control">
                                    <option value = "" @if(app('request')->input('role_id') == null) selected = "" @endif>
                                        All
                                    </option>
                                    @if(count($roles) > 0)
                                        @foreach($roles as $role)
                                            <option value = "{{$role->id}}"
                                                    @if(app('request')->input('role_id') == $role->id)selected = ""@endif>{{$role->display_name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                        <div class = "col-sm-3">
                            <div class = "form-group">
                                <label class = "control-label" for = "type">User Type</label>
                                <select name = "type" class = "form-control">
                                    <option value = "" @if(app('request')->input('type') == null) selected = "" @endif>
                                        All
                                    </option>

                                            <option value = "user" @if(app('request')->input('type') == 'user')selected = ""@endif>User</option>
                                            <option value = "pro" @if(app('request')->input('type') == 'pro')selected = ""@endif>Pro</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">&nbsp;  </label>
                            <div class = "form-group">

                            <button class = "btn btn-primary">Show</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class = "row">
                <div class = "col-md-12">
                    <div class = "ibox">
                        <div class = "ibox-content">
                            @include('admin.includes.status')

                            @if(count($users) > 0)
                                <form method = "post" action = "{{route('admin.users.mass_action')}}">
                                    {{csrf_field()}}
                                    <table class = "table table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th><input type = "checkbox" id = "check-all" class = "i-checks" /></th>
                                            <th>@if(app('request')->input('order_by') != 'name')
                                                    <a href="{{route('admin.users.index')}}?order_by=name&direction=desc">
                                                        Name
                                                        <i class="fa fa-sort"></i>

                                                    </a>
                                                @else
                                                    @if(app('request')->input('direction') == 'desc')
                                                        <a href="{{route('admin.users.index')}}?order_by=name&direction=asc">
                                                            Name
                                                            <i class="fa fa-sort-up"></i>

                                                        </a>
                                                    @else
                                                        <a href="{{route('admin.products.index')}}?order_by=name&direction=desc">
                                                            Name
                                                            <i class="fa fa-sort-desc"></i>

                                                        </a>

                                                    @endif
                                                @endif</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Role</th>
                                            <th>@if(app('request')->input('order_by') != 'created_at')
                                                    <a href="{{route('admin.users.index')}}?order_by=created_at&direction=desc">
                                                        Created
                                                        <i class="fa fa-sort"></i>

                                                    </a>
                                                @else
                                                    @if(app('request')->input('direction') == 'desc')
                                                        <a href="{{route('admin.users.index')}}?order_by=created_at&direction=asc">
                                                            Created
                                                            <i class="fa fa-sort-up"></i>

                                                        </a>
                                                    @else
                                                        <a href="{{route('admin.users.index')}}?order_by=created_at&direction=desc">
                                                            Created
                                                            <i class="fa fa-sort-desc"></i>

                                                        </a>

                                                    @endif
                                                @endif</th>
                                            <th>Updated</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td><input class = "i-checks" type = "checkbox" name = "id[]"
                                                           value = "{{$user->id}}" />
                                                </td>
                                                <td>{{$user->name}}</td>
                                                <td><a href = "mailto:{{$user->email}}">{{$user->email}}</a></td>
                                                <td>{{$user->type}}</td>
                                                <td>
                                                        @foreach($user->roles()->pluck('display_name') as $role )
                                                            <div class="badge">{{$role}}</div>
                                                        @endforeach

                                                </td>
                                                <td>{{$user->created_at->toFormattedDateString()}}</td>
                                                <td>{{$user->updated_at->toFormattedDateString()}}</td>
                                                <td>
                                                    <a class = "btn btn-xs btn-outline btn-primary"
                                                       href = "{{route('admin.users.edit',$user)}}">Edit</a>
                                                    <a class = "btn btn-xs btn-outline btn-default"
                                                       href = "{{route('admin.users.show',$user->id)}}">Show</a>
                                                    <a class = "btn btn-xs btn-outline btn-danger delete-btn"
                                                       data-id = "{{$user->id}}" data-action = "{{route('admin.users.destroy',$user->id)}}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan = "6">
                                                <div class = "form-inline">
                                                    <div class = "form-group">
                                                        <select class = "form-control" name = "mass_action" required>
                                                            <option value = "">With Selected:</option>

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
                                {{ $users->appends(request()->input())->links() }}
                            <!-- single delete form -->
                               @include('includes.delete')
                            @else
                                <div class = "alert alert-warning alert-dismissable">
                                    <button aria-hidden = "true" data-dismiss = "alert" class = "close" type = "button">
                                        ×
                                    </button>
                                    <p>There is no Users in Database, please create a new one</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection