@extends('layouts.app')

@section('header')
    <h3>Edit an Agency</h3>
@endsection

@section('content')	
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ action('AgenciesController@update', ['id' => $agency->id]) }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('agency_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="agency_name" value="{{ $agency->agency_name }}">

                            @if ($errors->has('agency_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('agency_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="description" >{{ $agency->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('headquarters') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Headquarters</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="headquarters" value="{{ $agency->headquarters }}" >

                            @if ($errors->has('headquarters'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('headquarters') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('foundation_year') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Foundation year</label>

                        <div class="col-md-6">
                            <input type="number" min="1900" max="2020" class="form-control" name="foundation_year" value="{{ $agency->foundation_year }}" >

                            @if ($errors->has('foundation_year'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('foundation_year') }}</strong>
                                </span>
                            @endif
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