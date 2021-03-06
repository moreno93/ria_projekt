@extends('layouts.app')

@section('header')
        <h3>Edit a User</h3>
@endsection

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ action('AdminController@update', ['id' => $user->id]) }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Profession</label>

                        <div class="col-md-6">
                            <select class="form-control" name="profession">
                              <option value="Director" @if($user->profession == 'Director') selected @endif>Director</option>
                              <option value="Producer" @if($user->profession == 'Producer') selected @endif>Producer</option>
                              <option value="Cameraman" @if($user->profession == 'Cameraman') selected @endif>Cameraman</option>
                              <option value="Film Editor" @if($user->profession == 'Film Editor') selected @endif>Film editor</option>
                              <option value="Sound Designer" @if($user->profession == 'Sound Designer') selected @endif>Sound designer</option>
                              <option value="Actor" @if($user->profession == 'Actor') selected @endif>Actor</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Interests</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="interests" value="{{ $user->interests }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">About</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="about" value="{{ $user->about }}"></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Portfolio</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="portfolio" value="{{ $user->portfolio }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Certificates</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="diploma_certificate" value="{{ $user->diploma_certificate }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-edit">Edit</i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="col-md-6 col-md-offset-4">
                    <a href ="/admin">
                        <button class="btn btn-primary">
                            <i class="fa fa-btn fa-user">Back</i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection