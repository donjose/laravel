@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Show Administrator </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('administrators-show',$admin) }}
            </ol>
        </div>
        <div class = "col-sm-8">
            <div class = "title-action">
                <a href = "{{route('admin.administrators.index')}}" class = "btn btn-primary"><span class = "icon"><i
                                class = "fa fa-arrow-left"></i></span> back</a>
            </div>
        </div>

    </div>

    <div class = "wrapper wrapper-content">
        <div class = "fadeInRightBig">
            <div class = "row">
                <div class = "col-md-12">
                    @include('admin.includes.status')

                    <div class = "ibox float-e-margins">
                        <div class = "ibox-title">
                            <h5>Show Administrator</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    @if($admin)
                                        <div class="widget-head-color-box navy-bg p-lg text-center">
                                            <div class="m-b-md">
                                                <h2 class="font-bold no-margins">
                                                    {{$admin->name}}
                                                </h2>
                                                <small>{{$admin->toles}}</small>
                                            </div>
                                            <img src="{{$admin->avatar ?: '/assets/img/avatars/profile_image.png'}}" class="img-circle circle-border m-b-md" alt="profile">
                                            <div>
                                                <ul>
                                                    @forelse ($admin->roles as $role)
                                                        <li>{{$role->display_name}} ({{$role->description}})</li>
                                                    @empty
                                                        <p>This user has not been assigned any roles yet</p>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="widget-text-box">
                                            <h4 class="media-heading">{{$admin->name}}</h4>
                                            <ul class="list-unstyled m-t-md">
                                                <li>
                                                    <span class="fa fa-envelope m-r-xs"></span>
                                                    <label>Email:</label>
                                                    {{$admin->email}}
                                                </li>
                                                <li>
                                                    <span class="fa fa-home m-r-xs"></span>
                                                    <label>Address:</label>
                                                    {{$admin->address ?: 'not set'}}
                                                </li>
                                                <li>
                                                    <span class="fa fa-phone m-r-xs"></span>
                                                    <label>Contact:</label>
                                                    {{$admin->phone ?: 'not set'}}
                                                </li>
                                                <li>
                                                    <span class="fa fa-skype m-r-xs"></span>
                                                    <label>Skype:</label>
                                                    {{$admin->skype ?: 'not set'}}
                                                </li>
                                            </ul>

                                            <div class="text-right">
                                                <a class = "btn btn-primary" href ="{{route('admin.administrators.edit',$admin->id)}}">Edit</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection