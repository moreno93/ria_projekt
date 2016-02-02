@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Stranica agencije sa id-em {{ $agency->id }} i imenom {{ $agency->agency_name }}
                    <br/>
                    {{ $agency->description }}

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <a href ="/agencies/{{ $agency->id }}/edit">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-btn"></i>Edit
                        </button>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop