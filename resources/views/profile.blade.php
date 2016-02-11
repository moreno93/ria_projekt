@extends('layouts.app')

@section('header')
    <h3>Profile page</h3>
    <small>User profile layout</small>
@endsection

@section('content')
    <div class="col-lg-2">
        <div class="block">
            <div class="block">
                <div class="thumbnail">
                    <div class="thumb">
                        <img src="{{ $user->profile_pic }}" alt="">         
                        <div class="thumb-options">
                            <span>
                                <form action="{{ url('/profile/update_pic') }}" method="POST" class="block" role="form" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button id="btnfile" class="btn btn-icon btn-success" onclick="$('#profile_pic').trigger('click'); return false;">
                                        <i class="icon-pencil"></i>
                                    </button>
                                    <div style="display:none;" class="file_wrapper">
                                         <input name="profile_pic" type="file" id="profile_pic" onchange="this.form.submit()"> 
                                    </div>
                                    
                                    <a class="btn btn-icon btn-success" href="#">
                                        <i class="icon-remove"></i>
                                    </a>
                                </form>
                            </span>
                        </div>
                    </div>
                    <div class="caption text-center">
                        <h6>
                        {{ $user->name }}
                        <small>{{ $user->profession }}</small>
                        </h6>
                        <div class="icons-group">
                            <a class="tip" title="" href="#" data-original-title="Google Drive">
                                <i class="icon-google-drive"></i>
                            </a>
                            <a class="tip" title="" href="#" data-original-title="Twitter">
                                <i class="icon-twitter"></i>
                            </a>
                            <a class="tip" title="" href="#" data-original-title="Github">
                                <i class="icon-github3"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                
            @if( Auth::user()->id == $user->id)
                <ul class="nav nav-list">
                    <li class="nav-header">
                        My Profile
                        <i class="icon-accessibility"></i>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings">General Info</a>
                    </li>
                    @if(
                    DB::table('iiww')
                    ->where('user_2_id', '=', Auth::user()->id)
                    ->where('accepted', '=', 0)
                    ->count()                    
                    )
                        <li>
                            <a data-toggle="tab" href="#friends">Friend requests<span class="label label-danger">
                            {{ DB::table('iiww')
                            ->where('user_2_id', '=', Auth::user()->id)
                            ->where('accepted', '=', 0)
                            ->count() 
                            }}</span></a>
                        </li>
                    @endif
                    <li>
                        <a data-toggle="tab" href="#activity">Activity</a>
                    </li>
                </ul>  
            @endif       
        </div>   
    </div>
    @if( Auth::user()->id != $user->id)
        <div class="col-lg-10">

                    <!-- Page tabs -->
                    <div class="tabbable page-tabs">
                        
                        <div class="tab-content">
                                    @if(
                                    DB::table('iiww')
                                    ->where('user_1_id', '=', Auth::user()->id)
                                    ->where('user_2_id', '=', $user->id)
                                    ->count()
                                    ||
                                    DB::table('iiww')
                                    ->where('user_1_id', '=', $user->id)
                                    ->where('user_2_id', '=', Auth::user()->id)
                                    ->count()
                                    )
                                        
                                        @if(
                                        DB::table('iiww')
                                        ->where('user_1_id', '=', Auth::user()->id)
                                        ->where('user_2_id', '=', $user->id)
                                        ->where('accepted', '=', 0)
                                        ->count()
                                        ||
                                        DB::table('iiww')
                                        ->where('user_1_id', '=', $user->id)
                                        ->where('user_2_id', '=', Auth::user()->id)
                                        ->where('accepted', '=', 0)
                                        ->count()
                                        )
                                            <div class="text-right">
                                                <a href="#" class="btn btn-success">{{ $user->name }} didn't accept your request</a>
                                            </div>
                                        @elseif(
                                        DB::table('iiww')
                                        ->where('user_1_id', '=', Auth::user()->id)
                                        ->where('user_2_id', '=', $user->id)
                                        ->where('accepted', '=', 1)
                                        ->count()
                                        ||
                                        DB::table('iiww')
                                        ->where('user_1_id', '=', $user->id)
                                        ->where('user_2_id', '=', Auth::user()->id)
                                        ->where('accepted', '=', 1)
                                        ->count()
                                        )
                                            <div class="text-right">
                                                <a href="#" class="btn btn-success">{{ $user->name }} is your friend</a>
                                            </div>
                                        @endif

                                    @else
                                    <form action="{{ url('/profile/add_friend') }}" method="POST" class="block" role="form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="user_2_id" value="{{ $user->id }}">
                                        <div class="text-right">
                                            <input type="submit" value="Add friend" class="btn btn-success">
                                        </div>
                                    </form>
                                    @endif
                                    <!-- Profile information -->
                                        <h6 class="heading-hr"><i class="icon-user"></i> Profile information:</h6>

                                        <div class="block-inner">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Full name:</label>
                                                    <h4>{{ $user->name }}</h4>
    
                                                </div>

                                            </div>
                                                                             
                                            
                                            @if( $user->about != '')
                                                    
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>About:</label>
                                                        <h4>{{ $user->about }}</h4>

                                                    </div>

                                                </div>
                                            @endif
                                            

                                            <div class="row">
                                                <div class="col-md-6">
                                                    @if( $user->address->address_line1 != '')
                                                        <label>Address line 1:</label>
                                                        <h4>{{ $user->address->address_line1 }}</h4>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    @if( $user->address->address_line2 != '')
                                                        <label>Address line 2:</label>
                                                        <h4>{{ $user->address->address_line2 }}</h4>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            
                                                                             
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        @if( $user->address->city != '')
                                                            <label>City:</label>
                                                            <h4>{{ $user->address->city }}</h4>
                                                        @endif

                                                    </div>
                                                    <div class="col-md-4">
                                                        @if( $user->address->state != '')
                                                            <label>State/Province:</label>
                                                            <h4>{{ $user->address->state }}</h4>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        @if( $user->address->zip_code != '')
                                                            <label>Zip code:</label>
                                                            <h4>{{ $user->address->zip_code }}</h4>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email:</label>
                                                        <h4>{{ $user->email }}</h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if( $user->address->country != '')
                                                            <label>Country:</label>
                                                            <h4>{{ $user->address->country }}</h4>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- /profile information -->

                            </div>
                        </div>
                        <!-- /page tabs -->

                    </div>
                </div>
        </div>

    @else
        <div class="col-lg-10">

                        <!-- Page tabs -->
                        <div class="tabbable page-tabs">
                            
                            <div class="tab-content">

                                <!-- First tab -->
                                <div class="tab-pane active fade in" id="activity">

                                    <!-- Statistics -->
                                    <div class="block">
                                        <ul class="statistics list-justified">
                                            <li>
                                                <div class="statistics-info">
                                                    <a href="#" title="" class="bg-success"><i class="icon-user-plus"></i></a>
                                                    <strong>12,476</strong>
                                                </div>
                                                <div class="progress progress-micro">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                                <span>User registrations</span>
                                            </li>
                                            <li>
                                                <div class="statistics-info">
                                                    <a href="#" title="" class="bg-warning"><i class="icon-point-up"></i></a>
                                                    <strong>621,873</strong>
                                                </div>
                                                <div class="progress progress-micro">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                                <span>Total clicks</span>
                                            </li>
                                            <li>
                                                <div class="statistics-info">
                                                    <a href="#" title="" class="bg-info"><i class="icon-cart-plus"></i></a>
                                                    <strong>562</strong>
                                                </div>
                                                <div class="progress progress-micro">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                                        <span class="sr-only">90% Complete</span>
                                                    </div>
                                                </div>
                                                <span>New orders</span>
                                            </li>
                                            <li>
                                                <div class="statistics-info">
                                                    <a href="#" title="" class="bg-danger"><i class="icon-coin"></i></a>
                                                    <strong>$45,360</strong>
                                                </div>
                                                <div class="progress progress-micro">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                        <span class="sr-only">70% Complete</span>
                                                    </div>
                                                </div>
                                                <span>General balance</span>
                                            </li>
                                            <li>
                                                <div class="statistics-info">
                                                    <a href="#" title="" class="bg-primary"><i class="icon-people"></i></a>
                                                    <strong>562K+</strong>
                                                </div>
                                                <div class="progress progress-micro">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                        <span class="sr-only">50% Complete</span>
                                                    </div>
                                                </div>
                                                <span>Total users</span>
                                            </li>
                                            <li>
                                                <div class="statistics-info">
                                                    <a href="#" title="" class="bg-info"><i class="icon-facebook"></i></a>
                                                    <strong>36,290</strong>
                                                </div>
                                                <div class="progress progress-micro">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 93%;">
                                                        <span class="sr-only">93% Complete</span>
                                                    </div>
                                                </div>
                                                <span>Facebook fans</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /statistics -->


                                    <!-- Search line -->
                                    <form action="#" class="search-line block" role="form">
                                        <span class="subtitle"><i class="icon-pencil3"></i> Search Activity:</span>
                                        <div class="input-group">
                                            <div class="search-control">
                                                <input type="text" class="form-control autocomplete" placeholder="What are you looking for?">
                                                <select multiple="multiple" class="multi-select-search" tabindex="2">
                                                    <option value="Everywhere" selected="selected">Everywhere</option> 
                                                    <option value="Users">Users</option> 
                                                    <option value="Profiles">Profiles</option> 
                                                    <option value="Images">Images</option> 
                                                    <option value="Connections">Connections</option> 
                                                    <option value="Gallery">Gallery</option> 
                                                    <option value="Posts">Posts</option> 
                                                </select>
                                            </div>
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button">Search</button>
                                            </span>
                                        </div>
                                    </form> 
                                    <!-- /search line -->

                                    <!-- WYSIWYG editor -->
                                    <h6><i class="icon-bubble6"></i> Share your thoughts</h6>
                                    <form class="block well" action="#" role="form">
                                        <div class="block-inner">
                                            <textarea class="editor" placeholder="Create new entry..."></textarea>
                                        </div>
                                        <div class="form-actions text-right">
                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                    <!-- /WYSIWYG editor -->


                                    <!-- Alert -->
                                    <div class="alert alert-warning fade in block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <i class="icon-info"></i> Nullam tincidunt dapibus nisi. Aenean porttitor egestas dolor, ut pretium enim vehicula at. Vivamus vulputate risus felis, eget blandit urna aliquam at
                                    </div>
                                    <!-- /alert -->


                                    <!-- Recent activity -->
                                    <div class="block">
                                        <h6 class="heading-hr"><i class="icon-people"></i> Recent activity</h6>
                                        <ul class="media-list">
                                            <li class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/300" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <a href="#" class="media-heading">Eugene Kopyov</a>
                                                        <span class="media-notice">December 10, 2013 / 10:20 pm</span>
                                                    </div>
                                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                                </div>
                                            </li>

                                            <li class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/300" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <a href="#" class="media-heading">Martin Wolf</a>
                                                        <span class="media-notice">December 12, 2013 / 10:14 pm</span>
                                                    </div>
                                                    Cras tempus pretium ligula, quis viverra purus eleifend et.
                                                </div>
                                            </li>

                                            <li class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/300" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <a href="#" class="media-heading">Duncan McMart</a>
                                                        <span class="media-notice">January 3, 2014 / 12:14 pm</span>
                                                    </div>
                                                    Quisque dignissim nibh nec massa egestas interdum. Proin congue vulputate velit, sodales mattis neque tempor a.
                                                </div>
                                            </li>

                                            <li class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/300" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <a href="#" class="media-heading">Lucy Smith</a>
                                                        <span class="media-notice">January 22, 2014 / 10:26 pm</span>
                                                    </div>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget orci non sem sodales dictum.
                                                </div>
                                            </li>

                                            <li class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/300" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <a href="#" class="media-heading">Angel Nowak</a>
                                                        <span class="media-notice">January 24, 2014 / 10:20 am</span>
                                                    </div>
                                                    Mauris vulputate bibendum justo non pretium. Sed eleifend, est vitae pellentesque condimentum, lacus ligula consectetur dolor, a congue metus odio ut neque.
                                                </div>
                                            </li>

                                            <li class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/300" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <a href="#" class="media-heading">Barbara Madison</a>
                                                        <span class="media-notice">February 2, 2014 / 10:47 pm</span>
                                                    </div>
                                                    Nullam vel massa blandit turpis sodales consectetur. Maecenas non mattis purus. Nullam vitae risus eu est.
                                                </div>
                                            </li>

                                            <li class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/300" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <a href="#" class="media-heading">James Willings</a>
                                                        <span class="media-notice">February 16, 2014 / 07:28 am</span>
                                                    </div>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus lacus, consequat et dui ut, ullamcorper sollicitudin lorem. Donec gravida eget nisi eget congue. Sed varius sollicitudin adipiscing.
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /recent activity -->

                                </div>
                                <!-- /first tab -->

                                <!-- Fifth tab -->
                                <div class="tab-pane fade" id="settings">

                                    <!-- Profile information -->
                                    <form action="{{ url('/profile/update') }}" method="POST" class="block" role="form">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <h6 class="heading-hr"><i class="icon-user"></i> Profile information:</h6>

                                        <div class="block-inner">
                                                                                    
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Full name</label>
                                                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>                                  
                                            
                                            <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>About</label>
                                                        <textarea style="resize:none" class="form-control" rows="5" name="about">{{ Auth::user()->about }}</textarea>
                                                        @if ($errors->has('about'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('about') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>

                                            @if($errors->has('address_line1') || $errors->has('address_line2') )
                                                <div class="form-group has-error">
                                            @else
                                                <div class="form-group">
                                            @endif

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Address line 1</label>
                                                        <input type="text" name="address_line1" value="{{ Auth::user()->address->address_line1 }}" class="form-control">
                                                        @if ($errors->has('address_line1'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('address_line1') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Address line 2</label>
                                                        <input type="text" name="address_line2" value="{{ Auth::user()->address->address_line2 }}" class="form-control">
                                                        @if ($errors->has('address_line2'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('address_line2') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @if($errors->has('city') || $errors->has('state') || $errors->has('zip_code'))
                                                <div class="form-group has-error">
                                            @else
                                                <div class="form-group">
                                            @endif
                                  
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>City</label>
                                                        <input type="text" name="city" value="{{ Auth::user()->address->city }}" class="form-control">
                                                        @if ($errors->has('city'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('city') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>State/Province</label>
                                                        <input type="text" name="state" value="{{ Auth::user()->address->state }}" class="form-control">
                                                        @if ($errors->has('state'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('state') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>ZIP code</label>
                                                        <input type="text" name="zip_code" value="{{ Auth::user()->address->zip_code }}" class="form-control">
                                                        @if ($errors->has('zip_code'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('zip_code') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                        <input type="text" name="email" readonly="readonly" value="{{ Auth::user()->email }}" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Your country:</label>
                                                        <select name="country" data-placeholder="{{ Auth::user()->address->country }}" class="select-full" tabindex="2">
                                                            <option value=""></option> 
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Croatia">Croatia</option> 
                                                            <option value="Cameroon">Cameroon</option> 
                                                            <option value="Canada">Canada</option> 
                                                            <option value="Cape Verde">Cape Verde</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <h6 class="heading-hr"><i class="icon-lock"></i> Security information:</h6>
                                
                                        @if($errors->has('password') || $errors->has('password_confirmation'))
                                            <div class="form-group has-error">
                                        @else
                                            <div class="form-group">
                                        @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>New password:</label>
                                                    <input type="password" name="password" placeholder="Enter new password" class="form-control">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Repeat password:</label>
                                                    <input type="password" name="password_confirmation" placeholder="Repeat new password" class="form-control">
                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            </br>

                                          

                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Profile visibility: </label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="visibility" class="styled" checked="checked">
                                                            Visible to everyone
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="visibility" class="styled">
                                                            Visible to friends only
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="visibility" class="styled">
                                                            Visible to my connections only
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="visibility" class="styled">
                                                            Visible to my colleagues only
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Notifications: </label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="styled" checked="checked">
                                                            Password expiration notification
                                                        </label>
                                                    </div>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="styled" checked="checked">
                                                            New message notification
                                                        </label>
                                                    </div>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="styled" checked="checked">
                                                            New task notification
                                                        </label>
                                                    </div>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="styled">
                                                            New contact request notification
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <input type="reset" value="Cancel" class="btn btn-default">
                                            <input type="submit" value="Apply changes" class="btn btn-success">
                                        </div>

                                    </form>
                                    <!-- /profile information -->

                                </div>
                                <!-- /fifth tab -->

                                <!-- Fifth tab -->
                                <div class="tab-pane fade" id="friends">

                                    <!-- Profile information -->
                                    <form action="{{ url('/profile/accept_friend') }}" method="POST" class="block" role="form">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <h6 class="heading-hr"><i class="icon-user"></i> Friend requests:</h6>

                                        <div class="block-inner">
                                            @if(
                                            DB::table('iiww')
                                            ->where('user_2_id', '=', Auth::user()->id)
                                            ->where('accepted', '=', 0)
                                            ->count() 
                                            )
                                                @foreach($friends = $user_friends as $friend)
                                                    <p>{{$friend->name}}</p>
                                                @endforeach
                                            @endif
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- /page tabs -->

                    </div>
                </div>
        </div>
    @endif
@endsection