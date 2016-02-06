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

                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">email</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Profession</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="profession" value="{{ $user->profession }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Interests</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="interests" value="{{ $user->interests }}">

                        </div>
                    </div>

                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-edit"></i>Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection