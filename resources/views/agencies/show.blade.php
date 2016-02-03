@extends('layouts.app')
@section('content')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

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
                            <div class="col-md-6 col-md-offset-4">
                                <form class="delete" action="/agencies/{{ $agency->id }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
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