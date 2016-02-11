@extends('layouts.app')

@section('header')
    <h3>Home page</h3>
@endsection

@section('content')
    @if (Auth::guest())
        <div class="panel-body">
            You must create an account in order to apply to for auditions!
            <a href="{{ url('/register') }}">
                <button type="button" class="btn btn-danger">
                    <i class="fa fa-btn"></i>Register
                </button>
            </a>
        </div>
    @else

    @endif
@endsection