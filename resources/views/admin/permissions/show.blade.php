@extends('admin.layouts.app')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Vhiew Permission</h2>
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('permissions-show', $permission) }}
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('admin.permissions.index')}}" class="btn btn-primary"><span class="icon"><i
                                class="fa fa-arrow-left"></i></span> Back</a>
            </div>
        </div>

    </div>

    <div class="wrapper wrapper-content">
        <div class="fadeInRightBig">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.includes.status')

                    <div class = "ibox float-e-margins">
                        <div class = "ibox-title">
                            <h5>Show Permission</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    @if($permission)
                                        <div class="widget-head-color-box navy-bg p-lg text-center">
                                            <div class="m-b-md">
                                                <h2 class="font-bold no-margins">
                                                    {{$permission->display_name}}
                                                </h2>
                                                <small>{{$permission->name}}</small>
                                            </div>

                                        </div>
                                        <div class="widget-text-box">
                                            {{$permission->description}}
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