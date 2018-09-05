@extends('admin.layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div class = "row">
        <div class = "col-md-4">
            <div class = "ibox float-e-margins">
                <div class = "ibox-title">
                    <span class = "label label-success pull-right">Daily</span>
                    <h5>Accidents</h5>
                </div>
                <div class = "ibox-content">
                    <h1 class = "no-margins">37</h1>
                    <div class = "stat-percent font-bold text-success"><a href="#">view all</a></div>
                    <small>Today Accidents</small>
                </div>
            </div>
        </div>
        <div class = "col-md-4">
            <div class = "ibox float-e-margins">
                <div class = "ibox-title">
                    <span class = "label label-info pull-right"></span>
                    <h5>Lawyers Registered</h5>
                </div>
                <div class = "ibox-content">
                    <h1 class = "no-margins">12</h1>
                    <div class = "stat-percent font-bold text-info"><a href="#">view all</a></div>
                    <small>New Lawyers</small>
                </div>
            </div>
        </div>
        <div class = "col-md-4">
            <div class = "ibox float-e-margins">
                <div class = "ibox-title">
                    <span class = "label label-primary pull-right">Today</span>
                    <h5>Users Registered</h5>
                </div>
                <div class = "ibox-content">
                    <h1 class = "no-margins">37</h1>
                    <div class = "stat-percent font-bold text-navy">44% <a href="#">view all</a></div>
                    <small>New Users</small>
                </div>
            </div>
        </div>

    </div>
    <div class = "row">

    </div>
@endsection