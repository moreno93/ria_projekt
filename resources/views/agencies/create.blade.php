@extends('layouts.app')

@section('header')
    <h3>Create an Agency</h3>
@endsection

@section('content')	
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/agencies') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('agency_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="agency_name" value="{{ old('agency_name') }}">

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
                            <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-plus"></i>Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection