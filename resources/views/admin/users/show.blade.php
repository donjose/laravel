@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Show User </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('users-show',$user) }}
            </ol>
        </div>
        <div class = "col-sm-8">
            <div class = "title-action">
                <a href = "{{route('admin.users.index')}}" class = "btn btn-primary"><span class = "icon"><i
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
                            <h5>Show User</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    @if($user)
                                        <div class="widget-head-color-box navy-bg p-lg text-center">
                                            <div class="m-b-md">
                                                <h2 class="font-bold no-margins">
                                                    {{$user->name}}
                                                </h2>
                                                <small>user</small>
                                            </div>
                                            <img src="{{$user->avatar ?: '/assets/img/avatars/profile_image.png'}}" class="img-circle circle-border m-b-md" alt="profile">
                                            <div>
                                                <ul>
                                                    @forelse ($user->roles as $role)
                                                        <p>{{$role->display_name}} ({{$role->description}})</p>
                                                    @empty
                                                        <p>This user has not been assigned any roles yet</p>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="widget-text-box">
                                            <h4 class="media-heading">{{$user->name}}</h4>
                                            <ul class="list-unstyled m-t-md">
                                                <li>
                                                    <span class="fa fa-envelope m-r-xs"></span>
                                                    <label>Email:</label>
                                                    {{$user->email}}
                                                </li>
                                                <li>
                                                    <span class="fa fa-home m-r-xs"></span>
                                                    <label>Address:</label>
                                                    {{$user->address ?: 'not set'}}
                                                </li>
                                                <li>
                                                    <span class="fa fa-phone m-r-xs"></span>
                                                    <label>Contact:</label>
                                                    {{$user->phone ?: 'not set'}}
                                                </li>
                                                <li>
                                                    <span class="fa fa-skype m-r-xs"></span>
                                                    <label>Skype:</label>
                                                    {{$user->skype ?: 'not set'}}
                                                </li>
                                            </ul>

                                            <div class="text-right">
                                                <a class = "btn btn-primary" href ="{{route('admin.users.edit',$user->id)}}">Edit</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">

                                    @if ($user->hasRole('manufacturer'))
                                        <h2>Seller Profile</h2>
                                        <table class="table">
                                            <tr>
                                                <td class="text-right">Shop Name:</td>
                                                <td> <strong> {{$user->seller_profile->shop_name}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Short Description:</td>
                                                <td> <strong> {{$user->seller_profile->shop_short_description}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Description:</td>
                                                <td> <strong> {{$user->seller_profile->shop_description}}</strong></td>
                                            </tr>
                                        </table>
                                        <h2>Company addresses</h2>
                                        <table class="table">
                                            <tr>
                                                <td class="text-right">Country:</td>
                                                <td> <strong> {{$user->seller_profile->country}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">State:</td>
                                                <td> <strong> {{$user->seller_profile->state}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">City:</td>
                                                <td> <strong> {{$user->seller_profile->city}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Address 1:</td>
                                                <td> <strong> {{$user->seller_profile->address_1}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Address 2:</td>
                                                <td> <strong> {{$user->seller_profile->address_2}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Zip:</td>
                                                <td> <strong> {{$user->seller_profile->zip}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Phone:</td>
                                                <td> <strong> {{$user->seller_profile->phone}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Fax:</td>
                                                <td> <strong> {{$user->seller_profile->fax}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Website:</td>
                                                <td> <strong> {{$user->seller_profile->website}}</strong></td>
                                            </tr>
                                        </table>
                                        <h2>Additional Information</h2>
                                        <table class="table">
                                            <tr>
                                                <td class="text-right">Federal Tax ID num.:</td>
                                                <td> <strong> {{$user->seller_profile->federal_tax_id_number}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Primary Contact:</td>
                                                <td> <strong> {{$user->seller_profile->contact_name}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Contact Phone:</td>
                                                <td> <strong> {{$user->seller_profile->contact_phone}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Customer service phone:</td>
                                                <td> <strong> {{$user->seller_profile->customer_service_phone}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Customer service email:</td>
                                                <td> <strong> {{$user->seller_profile->customer_service_email}}</strong></td>
                                            </tr>


                                        </table>
                                        <h2>Shipping Address</h2>
                                        <table class="table">
                                            <tr>
                                                <td class="text-right">Country:</td>
                                                <td> <strong> {{$user->seller_profile->shipping_country}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">State:</td>
                                                <td> <strong> {{$user->seller_profile->shipping_state}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">City:</td>
                                                <td> <strong> {{$user->seller_profile->shipping_city}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Address 1:</td>
                                                <td> <strong> {{$user->seller_profile->shipping_address_1}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Address 2:</td>
                                                <td> <strong> {{$user->seller_profile->shipping_address_2}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Zip:</td>
                                                <td> <strong> {{$user->seller_profile->shipping_zip}}</strong></td>
                                            </tr>

                                        </table>
                                        <h2>Bank Information</h2>
                                        <table class="table">
                                            <tr>
                                                <td class="text-right">Bank Name:</td>
                                                <td> <strong> {{$user->seller_profile->bank_name}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Bank Name:</td>
                                                <td> <strong> {{$user->seller_profile->bank_name}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Account Number:</td>
                                                <td> <strong> {{$user->seller_profile->account_number}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Account Type:</td>
                                                <td> <strong> {{$user->seller_profile->account_type}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Routing Number:</td>
                                                <td> <strong> {{$user->seller_profile->routing_number}}</strong></td>
                                            </tr>
                                         
                                        </table>
                                        <h2>Billing Address</h2>
                                        <table class="table">
                                            <tr>
                                                <td class="text-right">Country:</td>
                                                <td> <strong> {{$user->seller_profile->billing_country}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">State:</td>
                                                <td> <strong> {{$user->seller_profile->billing_state}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">City:</td>
                                                <td> <strong> {{$user->seller_profile->billing_city}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Address 1:</td>
                                                <td> <strong> {{$user->seller_profile->billing_address_1}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Address 2:</td>
                                                <td> <strong> {{$user->seller_profile->billing_address_2}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Zip:</td>
                                                <td> <strong> {{$user->seller_profile->billing_zip}}</strong></td>
                                            </tr>

                                        </table>
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