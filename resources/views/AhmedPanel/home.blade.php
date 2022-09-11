@extends('AhmedPanel.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6" onclick="window.location='{{url('user_managements/users')}}'" style="cursor: pointer">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">group</i>
                </div>
                <div class="card-content">
                    <p class="category">{{__('admin.sidebar.users')}}</p>
                    <h3 class="title">{{\App\Models\User::count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="card card-stats" onclick="window.location='{{url('user_managements/categories')}}'" style="cursor: pointer">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">list_alt</i>
                </div>
                <div class="card-content">
                    <p class="category">{{__('admin.sidebar.categories')}}</p>
                    <h3 class="title">{{\App\Models\Category::count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6" onclick="window.location='{{url('app_content/sites')}}'" style="cursor: pointer">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">category</i>
                </div>
                <div class="card-content">
                    <p class="category">{{__('admin.sidebar.sites')}}</p>
                    <h3 class="title">{{\App\Models\Site::count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6" onclick="window.location='{{url('app_content/discounts')}}'" style="cursor: pointer">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">discount</i>
                </div>
                <div class="card-content">
                    <p class="category">{{__('admin.sidebar.discounts')}}</p>
                    <h3 class="title">{{\App\Models\Discount::count()}}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">  {{__('admin.Home.n_send_general')}} </h4>
                </div>
                <div class="card-content">
                    <form action="{{url('notification/send')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 btn-group required">
                                <label for="title">{{__('admin.Home.n_title')}} :</label>
                                <input type="text" required="" name="title" id="title" class="form-control" placeholder="{{__('admin.Home.n_enter_title')}}">
                            </div>
                            <div class="col-md-6 btn-group required">
                                <label for="msg">{{__('admin.Home.n_text')}} :</label>
                                <input type="text" required="" name="msg" id="msg" class="form-control" placeholder="{{__('admin.Home.n_enter_text')}}">
                            </div>
                            <div class="col-md-1 " style="margin-top: 50px">
                                <button type="submit" id="send" class="btn btn-primary">{{__('admin.Home.n_send')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">  {{__('admin.Home.n_send_custom')}} </h4>
                </div>
                <div class="card-content">
                    <form action="{{url('notification/send/custom')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 btn-group required">
                                <label for="user_id">{{__('admin.Home.user')}} :</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option>{{__('admin.Home.select_user')}}</option>
                                    @foreach(\App\Models\User::all() as $user)
                                        <option value="{{$user->getId()}}">{{$user->getUserName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 btn-group required">
                                <label for="title">{{__('admin.Home.n_title')}} :</label>
                                <input type="text" required="" name="title" id="title" class="form-control" placeholder="{{__('admin.Home.n_enter_title')}}">
                            </div>
                            <div class="col-md-4 btn-group required">
                                <label for="msg">{{__('admin.Home.n_text')}} :</label>
                                <input type="text" required="" name="msg" id="msg" class="form-control" placeholder="{{__('admin.Home.n_enter_text')}}">
                            </div>
                            <div class="col-md-1 " style="margin-top: 50px">
                                <button type="submit" id="send" class="btn btn-primary">{{__('admin.Home.n_send')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
