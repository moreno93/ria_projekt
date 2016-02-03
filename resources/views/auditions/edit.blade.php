@extends('layouts.app')

@section('header')
    <h3>Edit an Audition</h3>
@endsection

@section('content')	
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ action('AuditionsController@update', ['id' => $audition->id]) }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('audition_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name of your Audition</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="audition_name" value="{{ $audition->audition_name }}">

                            @if ($errors->has('agency_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('audition_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Describe your Audition</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="description" >{{ $audition->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
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