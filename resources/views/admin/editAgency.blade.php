@extends('layouts.app')

@section('header')
    <h3>Edit an Agency</h3>
@endsection

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ action('AdminAgencyController@update', ['id' => $agency->id]) }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="agency_name" value="{{ $agency->agency_name }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Headquarters</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="headquarters" value="{{ $agency->headquarters }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="description" value="{{ $agency->description }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-edit"></i>Edit
                            </button>
                        </div>
                    </div>
                </form>
                <div class="col-md-6 col-md-offset-4">
                    <a href ="/admin">
                        <button class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i>Back
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection