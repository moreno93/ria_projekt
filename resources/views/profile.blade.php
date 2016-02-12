@extends('layouts.app')

@section('header')
    <h3>Profile page</h3>
@endsection

@section('content')
    <div class="col-lg-2">
        <div class="block">
            <div class="block">
                <div class="thumbnail">
                    <div class="thumb">
                        @if( $user->profile_pic != '')
                            <img src="{{ asset($user->profile_pic) }}" alt="">
                        @else
                            <img src="{{ asset('images/profile_pic/default.jpg') }}" alt="">         
                        @endif
                        <div class="thumb-options">
                            <span>
                                @if( Auth::user()->id == $user->id)
                                    <form action="{{ url('/profile/update_pic') }}" method="POST" class="block" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button id="btnfile" class="btn btn-icon btn-success" onclick="$('#profile_pic').trigger('click'); return false;">
                                            <i class="icon-pencil"></i>
                                        </button>

                                        <div style="display:none;" class="file_wrapper">
                                             <input name="profile_pic" type="file" id="profile_pic" onchange="this.form.submit()"> 
                                        </div>
                                    </form>                                    
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="caption text-center">
                        <h6>
                        {{ $user->name }}
                        <small>{{ $user->profession }}</small>
                        </h6>
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
                    <li>
                        <a data-toggle="tab" href="#security">Change password</a>
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
                            <form action="{{ url('/profile/remove_friend_request') }}" method="POST" class="block" role="form">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_2_id" value="{{ $user->id }}">
                                <div class="text-right">
                                    <input type="submit" value="Remove friend request" class="btn btn-danger">
                                </div>
                            </form>
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
                            <form action="{{ url('/profile/remove_friend') }}" method="POST" class="block" role="form">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_1_id" value="{{ $user->id }}">
                                <div class="text-right">
                                    <input type="submit" value="Unfriend" class="btn btn-danger">
                                </div>
                            </form> 
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

                        @if( $user->portfolio != '')
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Portfolio:</label>
                                    <h4>{{ $user->portfolio }}</h4>
                                </div>
                            </div>
                        @endif

                        @if( $user->diploma_certificate != '')
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Diploma certificate:</label>
                                    <h4>{{ $user->diploma_certificate }}</h4>
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
                                @if( Auth::user()->friends_count != '')
                                    <li>
                                        <div class="statistics-info">
                                            <a data-toggle="tab" href="#friend_list" title="Friends" class="bg-success"><i class="icon-user-plus"></i></a>
                                            <strong>{{ Auth::user()->friends_count }}</strong>

                                        </div>
                                        <div class="progress progress-micro">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ Auth::user()->friends_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ Auth::user()->friends_count }}%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                        <span>Friends</span>
                                    </li>
                                @endif
                                <!--
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
                                -->
                            </ul>
                        </div>
                        <!-- /Statistic -->
                        <!-- Recent activity -->
                        <div class="block">
                            <h6 class="heading-hr"><i class="icon-people"></i> Recent activity</h6>
                            <ul class="media-list">
                                @if(DB::table('auditions')
                                    ->join('audition_user', 'auditions.id', '=', 'audition_user.audition_id')
                                    ->where('audition_user.user_id', '=', Auth::user()->id)
                                    ->count() 
                                )
                                    @foreach($auditions = $user_audition as $audition)
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="#" class="media-heading">{{ $audition->audition_name}}</a>
                                                    <span class="media-notice">{{ $audition->city}} | {{ $audition->country}}</span>
                                                </div>
                                                {{ $audition->description }}
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <a href="#" class="media-heading">No activity to display</a>
                                            </div>
                                            Search for auditions!
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- /recent activity -->
                    </div>
                
                    <div class="tab-pane fade" id="settings">
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

                                <div class="form-group{{ $errors->has('portfolio') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Portfolio</label>
                                            <textarea style="resize:none" class="form-control" rows="5" name="portfolio">{{ Auth::user()->portfolio }}</textarea>
                                            @if ($errors->has('portfolio'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('portfolio') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('diploma_certificate') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Diploma certificate</label>
                                            <textarea style="resize:none" class="form-control" rows="5" name="diploma_certificate">{{ Auth::user()->diploma_certificate }}</textarea>
                                            @if ($errors->has('diploma_certificate'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('diploma_certificate') }}</strong>
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
                            <div class="text-right">
                                    <input type="reset" value="Cancel" class="btn btn-default">
                                    <input type="submit" value="Apply changes" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    
                    <div class="tab-pane fade" id="security">
                        <!-- Profile information -->
                        <form action="{{ url('/profile/update_password') }}" method="POST" class="block" role="form">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h6 class="heading-hr"><i class="icon-lock"></i>Security information:</h6>
                            <div class="block-inner">                            
                                @if($errors->has('old_password') || $errors->has('password') || $errors->has('password_confirmation'))
                                    <div class="form-group has-error">
                                @else
                                    <div class="form-group">
                                @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Old password:</label>
                                            <input type="password" name="old_password" placeholder="Enter old password" class="form-control">
                                            @if ($errors->has('old_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('old_password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
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
                                    </div>
                                    <br>
                                    <div class="row">
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
                            </div>
                            <div class="text-right">
                                <input type="reset" value="Cancel" class="btn btn-default">
                                <input type="submit" value="Apply changes" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="friends">       
                        @if(
                        DB::table('iiww')
                        ->where('user_2_id', '=', Auth::user()->id)
                        ->where('accepted', '=', 0)
                        ->count() 
                        )
                            <h6 class="heading-hr"><i class="icon-people"></i> Friend requests:</h6>
                            @foreach($friends = $user_friends as $friend)
                                <!-- Profile information -->
                                <form action="{{ url('/profile/accept_friend') }}" method="POST" class="block" role="form">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                            
                                    <ul class="media-list">
                                        <li class="media">
                                            <a class="pull-left" href="/profile/{{$friend->id}}">
                                                @if(Auth::user()->profile_pic != '')
                                                    <img width="40" height="40" src="{{ asset(Auth::user()->profile_pic) }}">
                                                @else
                                                    <img width="40" height="40" src="{{ asset('images/profile_pic/default.jpg') }}">
                                                @endif
                                            </a>
                                            <div class="pull-right">
                                                <input type="hidden" name="user_1_id" value="{{ $friend->id }}" class="btn btn-success">
                                                <input type="submit" value="Accept user" class="btn btn-success">
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="/profile/{{$friend->id}}" class="media-heading">{{$friend->name}}</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                                <br>
                            @endforeach
                        @endif 
                    </div>
                    <div class="tab-pane fade" id="friend_list">       
                        <h6 class="heading-hr"><i class="icon-people"></i> Friend list:</h6>
                            @foreach($friends = $user_friends_a as $friend)
                                <!-- Profile information -->                                                                                           
                                    <ul class="media-list">
                                        <li class="media">
                                            <a class="pull-left" href="/profile/{{$friend->id}}">
                                                @if($friend->profile_pic != '')
                                                    <img width="40" height="40" src="{{ asset($friend->profile_pic) }}">
                                                @else
                                                    <img width="40" height="40" src="{{ asset('images/profile_pic/default.jpg') }}">
                                                @endif
                                            </a>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <a href="/profile/{{$friend->id}}" class="media-heading">{{$friend->name}}</a>
                                                </div>
                                                {{$friend->about}}
                                            </div>
                                        </li>
                                    </ul>
                                <br>
                            @endforeach
                    </div>           
                </div>
            </div>
        </div>
    @endif
@endsection