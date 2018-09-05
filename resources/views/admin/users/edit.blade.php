@extends('admin.layouts.app')

@section('content')

    <div class = "row wrapper border-bottom white-bg page-heading">
        <div class = "col-sm-4">
            <h2>Edit User </h2>
            <ol class = "breadcrumb">
                {{ Breadcrumbs::render('users-edit',$user) }}
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
                            <h5>Edit User {{$user->name}}</h5>
                            <div class = "ibox-tools">
                                <a class = "collapse-link">
                                    <i class = "fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class = "ibox-content">
                            <div class = "row">
                                <div class = "col-md-6">
                                    <form method = "post" action = "{{route('admin.users.update', $user->id )}}"
                                          enctype = "multipart/form-data">
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
                                                @if ($user->type == 'pro')
                                                    <li><a data-toggle = "tab" href = "#licensing"
                                                           aria-expanded = "false">Licensing & Insurance</a></li>
                                                @endif
                                                <li><a data-toggle = "tab" href = "#seller"
                                                       aria-expanded = "false">Seller Profile</a></li>
                                                <li><a data-toggle = "tab" href = "#address"
                                                       aria-expanded = "false">Address</a></li>
                                            </ul>
                                            <div class = "tab-content">
                                                <div id = "licensing" class = "tab-pane ">
                                                    <div class = "panel-body">
                                                        <button class = "btn btn-primary" @click = "addLicense($event)">
                                                            <i class = "fa fa-plus"></i> Add License
                                                        </button>
                                                    </div>
                                                </div>

                                                <div id = "general" class = "tab-pane active">
                                                    <div class = "panel-body">
                                                        <div class = "form-group">
                                                            <label class = "control-label">Name <span
                                                                        class = "text-danger">*</span></label>
                                                            <input type = "text" name = "name" required
                                                                   class = "form-control"
                                                                   value = "{{$user->name}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Type <span
                                                                        class = "text-danger">*</span></label>
                                                            <select name = "type" class = "form-control">
                                                                <option value = "user"
                                                                        @if($user->type == 'user') selected @endif>User
                                                                </option>
                                                                <option value = "pro"
                                                                        @if($user->type == 'pro') selected @endif>Pro
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Email <span
                                                                        class = "text-danger">*</span></label>
                                                            <input type = "email" name = "email" required
                                                                   class = "form-control"
                                                                   value = "{{$user->email}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">New Password </label>
                                                            <input type = "password" name = "password"
                                                                   class = "form-control" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">New Password Confirm</label>
                                                            <input type = "password" name = "password_confirmation"
                                                                   class = "form-control" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Avatar</label>
                                                            <input type = "file" name = "avatar" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Cover</label>
                                                            <input type = "file" name = "cover" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Phone </label>
                                                            <input type = "text" name = "phone" class = "form-control"
                                                                   value = "{{$user->phone}}" />
                                                        </div>

                                                        <div class = "form-group">
                                                            <label class = "control-label">Address </label>
                                                            <textarea name = "address"
                                                                      class = "form-control">{{$user->address}}</textarea>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div id = "profile" class = "tab-pane">
                                                    <div class = "panel-body">
                                                        <div class = "form-group">
                                                            <label class = "control-label">Company Name</label>
                                                            <input class = "form-control" name = "profile[company_name]"
                                                                   value = "{{$user->profile->company_name}}" />
                                                        </div>

                                                        <div class = "form-group">
                                                            <label class = "control-label">City</label>
                                                            <input class = "form-control" name = "profile[city]"
                                                                   value = "{{$user->profile->city}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Address 1 </label>
                                                            <input type = "text" name = "profile[address_1]"
                                                                   class = "form-control"
                                                                   value = "{{$user->profile->address_1}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Address 2 </label>
                                                            <input type = "text" name = "profile[address_2]"
                                                                   class = "form-control"
                                                                   value = "{{$user->profile->address_2}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Phone</label>
                                                            <input type = "text" name = "profile[phone]"
                                                                   class = "form-control"
                                                                   value = "{{$user->profile->phone}}" />
                                                        </div>

                                                        <div class = "form-group">
                                                            <label class = "control-label">State</label>
                                                            <select class = "form-control" name = "profile[state]">
                                                                @foreach($states as $code => $state)
                                                                    <option value = "{{$code}}"
                                                                            @if ($state == $user->profile->state || $code == $user->profile->state ) selected @endif>{{$state}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Zip Code</label>
                                                            <input class = "form-control" name = "profile[zip]"
                                                                   value = "{{$user->profile->zip}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">About</label>
                                                            <textarea name = "profile[about]"
                                                                      class = "form-control">{{$user->profile->about}}</textarea>
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
                                                <div id = "seller" class = "tab-pane">
                                                    <div class = "panel-body">
                                                        <div class = "form-group">
                                                            <label class = "control-labelt">Shop Name </label>
                                                            <input type = "text" name = "seller[shop_name]"
                                                                   class = "form-control"
                                                                   value = "{{$user->seller_profile->shop_name}}" />
                                                        </div>
                                                        <div class = "form-group">
                                                            <label class = "control-label">Shop Description </label>
                                                            <textarea name = "seller[shop_description]"
                                                                      class = "form-control">{{$user->seller_profile->shop_description}}</textarea>
                                                            <div class = "form-group">
                                                                <label class = "control-label">Shop Short
                                                                    Description </label>
                                                                <textarea name = "seller[shop_short_description]"
                                                                          class = "form-control">{{$user->seller_profile->shop_description}}</textarea>

                                                            </div>
                                                            <h2>Address</h2>
                                                            <div class = "form-group">
                                                                <label class = "control-label">State</label>
                                                                <select name = "seller[state]" id = "states"
                                                                        class = "form-control">
                                                                    @foreach($states as $code => $state)
                                                                        <option value = "{{$code}}"
                                                                                @if ($state == $user->seller_profile->state || $code == $user->seller_profile->state ) selected @endif>{{$state}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class = "form-group">
                                                                    <label class = "control-labelt">City </label>
                                                                    <input type = "text" name = "seller[city]"
                                                                           class = "form-control"
                                                                           value = "{{$user->seller_profile->city}}" />
                                                                </div>
                                                                <div class = "form-group">
                                                                    <label class = "control-labelt">Address 1 </label>
                                                                    <input type = "text" name = "seller[address_1]"
                                                                           class = "form-control"
                                                                           value = "{{$user->seller_profile->address_1}}" />
                                                                </div>
                                                                <div class = "form-group">
                                                                    <label class = "control-labelt">Address 2 </label>
                                                                    <input type = "text" name = "seller[address_1]"
                                                                           class = "form-control"
                                                                           value = "{{$user->seller_profile->address_2}}" />
                                                                </div>
                                                                <div class = "form-group">
                                                                    <label class = "control-labelt">Zip</label>
                                                                    <input type = "text" name = "seller[zip]"
                                                                           class = "form-control"
                                                                           value = "{{$user->seller_profile->zip}}" />
                                                                </div>
                                                                <div class = "form-group">
                                                                    <label class = "control-labelt">Phone</label>
                                                                    <input type = "text" name = "seller[phone]"
                                                                           class = "form-control"
                                                                           value = "{{$user->seller_profile->phone}}" />
                                                                </div>
                                                                <div class = "form-group">
                                                                    <label class = "control-labelt">Fax</label>
                                                                    <input type = "text" name = "seller[fax]"
                                                                           class = "form-control"
                                                                           value = "{{$user->seller_profile->fax}}" />
                                                                </div>
                                                                <div class = "form-group">
                                                                    <label class = "control-labelt">Website</label>
                                                                    <input type = "text" name = "seller[website]"
                                                                           class = "form-control"
                                                                           value = "{{$user->seller_profile->website}}" />
                                                                </div>
                                                                <h2>Shipping Address</h2>
                                                                <div class = "form-group">
                                                                    <label class = "control-label">State</label>
                                                                    <select name = "seller[shipping_state]"
                                                                            id = "shipping_states"
                                                                            class = "form-control">
                                                                        @foreach($states as $code => $state)
                                                                            <option value = "{{$code}}"
                                                                                    @if ($state == $user->seller_profile->shipping_state || $code == $user->seller_profile->shipping_state ) selected @endif>{{$state}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class = "form-group">
                                                                        <label class = "control-labelt">City </label>
                                                                        <input type = "text"
                                                                               name = "seller[shipping_city]"
                                                                               class = "form-control"
                                                                               value = "{{$user->seller_profile->shipping_city}}" />
                                                                    </div>
                                                                    <div class = "form-group">
                                                                        <label class = "control-labelt">Address
                                                                            1 </label>
                                                                        <input type = "text"
                                                                               name = "seller[shipping_address_1]"
                                                                               class = "form-control"
                                                                               value = "{{$user->seller_profile->shipping_address_1}}" />
                                                                    </div>
                                                                    <div class = "form-group">
                                                                        <label class = "control-labelt">Address
                                                                            2 </label>
                                                                        <input type = "text"
                                                                               name = "seller[shipping_address_2]"
                                                                               class = "form-control"
                                                                               value = "{{$user->seller_profile->shipping_address_2}}" />
                                                                    </div>
                                                                    <div class = "form-group">
                                                                        <label class = "control-labelt">Zip</label>
                                                                        <input type = "text"
                                                                               name = "seller[shipping_zip]"
                                                                               class = "form-control"
                                                                               value = "{{$user->seller_profile->shipping_zip}}" />
                                                                    </div>
                                                                    <h2>Billing Address</h2>
                                                                    <div class = "form-group">
                                                                        <label class = "control-label">State</label>
                                                                        <select name = "seller[billing_state]"
                                                                                id = "billing_states"
                                                                                class = "form-control">
                                                                            @foreach($states as $code => $state)
                                                                                <option value = "{{$code}}"
                                                                                        @if ($state == $user->seller_profile->billing_state || $code == $user->seller_profile->billing_state ) selected @endif>{{$state}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class = "form-group">
                                                                            <label class = "control-labelt">City </label>
                                                                            <input type = "text"
                                                                                   name = "seller[billing_city]"
                                                                                   class = "form-control"
                                                                                   value = "{{$user->seller_profile->billing_city}}" />
                                                                        </div>
                                                                        <div class = "form-group">
                                                                            <label class = "control-labelt">Address
                                                                                1 </label>
                                                                            <input type = "text"
                                                                                   name = "seller[billing_address_1]"
                                                                                   class = "form-control"
                                                                                   value = "{{$user->seller_profile->billing_address_1}}" />
                                                                        </div>
                                                                        <div class = "form-group">
                                                                            <label class = "control-labelt">Address
                                                                                2 </label>
                                                                            <input type = "text"
                                                                                   name = "seller[billing_address_2]"
                                                                                   class = "form-control"
                                                                                   value = "{{$user->seller_profile->billing_address_2}}" />
                                                                        </div>
                                                                        <div class = "form-group">
                                                                            <label class = "control-labelt">Zip</label>
                                                                            <input type = "text"
                                                                                   name = "seller[billing_zip]"
                                                                                   class = "form-control"
                                                                                   value = "{{$user->seller_profile->billing_zip}}" />
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{csrf_field()}}
                                                        {{ method_field('PUT') }}


                                                    </div>
                                                </div>

                                            </div>
                                            <div class = "form-group ">
                                                <button class = "btn btn-primary btn-lg"><i
                                                            class = "fa fa-save"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>

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
                    rolesSelected: {!! $user->roles->pluck('id') !!},
                    licenses: [],
                    insurances: []
                },
                methods: {
                    addLicense(event) {
                        this.licenses.push({
                            state: '',
                            type: '',
                            number: '',
                            expired: '',
                            is_verified: '',
                        })
                        event.preventDefault();
                    },
                    removeLicense(index, event) {
                        var _this = this;

                        if (confirm('Delete license')) {
                            if (_this.licenses[index].id != null) {


                                axios.get('/admin/users/delete_license/' + _this.licenses[index].id,).then(
                                    function (response) {

                                    }
                                ).catch(function (error) {

                                });

                            }
                            _this.licenses.splice(index, 1);


                        }
                        event.preventDefault();
                    }
                }
            });
        </script>
        @endsection

        @section('scripts')

            @parent
            <script src = "{{ asset('assets/js/vue.js') }}"></script>
@endsection