@extends('layouts.app')
@section('content')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                    Stranica audicije sa id-em {{ $audition->id }} i imenom {{ $audition->audition_name }}
                    <br/>
                    {{ $audition->description }}
                        @if(Auth::user()->agency()->first()->id == $audition->agency_id)
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href ="/auditions/{{ $audition->id }}/edit">
                                    <button type="button" class="btn btn-primary">
                                    <i class="fa fa-btn"></i>Edit
                                    </button>
                                    </a>
                                    </button>
                                </div>

                                <div class="col-md-6 col-md-offset-4">
                                    <form class="delete" action="/auditions/{{ $audition->id }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".delete").submit(function(){
        return confirm("Are you sure you want to delete this item?");
    });
</script>

@endsection