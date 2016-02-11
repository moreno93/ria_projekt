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
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group{{ $errors->has('audition_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name of your Audition</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="audition_name" value="{{ $audition->audition_name }}">

                            @if ($errors->has('audition_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('audition_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Country</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="country" value="{{ $audition->country }}">

                            @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">City</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="city" value="{{ $audition->city }}">

                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('budget') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Current budget (USD)</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="budget" value="{{ $audition->budget }}">

                            @if ($errors->has('budget'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('budget') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('num_directors') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">How many directors</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="num_directors" value="{{ $audition->num_directors }}">

                            @if ($errors->has('num_directors'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('num_directors') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pay_directors') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Director pay</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pay_directors" value="{{ $audition->pay_directors }}">

                            @if ($errors->has('pay_directors'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pay_directors') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('num_producers') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">How many producers</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="num_producers" value="{{ $audition->num_producers }}">

                            @if ($errors->has('num_producers'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('num_producers') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pay_producers') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Producer pay</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pay_producers" value="{{ $audition->pay_producers }}">

                            @if ($errors->has('pay_producers'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pay_producers') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('num_cameraman') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">How many cameramen</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="num_cameraman" value="{{ $audition->num_cameraman }}">

                            @if ($errors->has('num_cameraman'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('num_cameraman') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pay_cameraman') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Cameraman pay</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pay_cameraman" value="{{ $audition->pay_cameraman }}">

                            @if ($errors->has('pay_cameraman'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pay_cameraman') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('num_film_editors') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">How many film editors</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="num_film_editors" value="{{ $audition->num_film_editors }}">

                            @if ($errors->has('budget'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('num_film_editors') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pay_film_editors') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Film editor pay</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pay_film_editors" value="{{ $audition->pay_film_editors }}">

                            @if ($errors->has('pay_film_editors'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pay_film_editors') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('num_sound_designers') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">How many sound designers</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="num_sound_designers" value="{{ $audition->num_sound_designers }}">

                            @if ($errors->has('num_sound_designers'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('num_sound_designers') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pay_sound_designers') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Sound designer pay</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pay_sound_designers" value="{{ $audition->pay_sound_designers }}">

                            @if ($errors->has('pay_sound_designers'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pay_sound_designers') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('num_actors') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">How many actors</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="num_actors" value="{{  $audition->num_actors }}">

                            @if ($errors->has('num_actors'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('num_actors') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pay_actors') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Actor pay</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pay_actors" value="{{  $audition->pay_actors }}">

                            @if ($errors->has('pay_actors'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pay_actors') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('num_extras') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">How many extras</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="num_extras" value="{{  $audition->num_extras }}">

                            @if ($errors->has('num_extras'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('num_extras') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pay_extras') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Extras pay</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pay_extras" value="{{  $audition->pay_extras }}">

                            @if ($errors->has('pay_extras'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pay_extras') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Describe your Audition</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="description">{{  $audition->description }}</textarea>

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
                                <i class="fa fa-btn fa-plus"></i>Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection