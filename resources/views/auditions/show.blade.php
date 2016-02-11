@extends('layouts.app')
@section('content')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="jumbotron">
                  <h1>{{ $audition->audition_name }}</h1>
                  <p>...</p>
                  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
                </div>


                <!-- <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                    Stranica audicije sa id-em {{ $audition->id }} i imenom {{ $audition->audition_name }}
                        <br/>
                        {{ $audition->description }}
                            <div class="form-group">
                                @if(Auth::user()->agency()->first())
                                    @if(!Auth::user()->agency->auditions->contains($audition))
                                        @if(!$audition->users->contains(Auth::user())) 
                                            <div class="col-md-6 col-md-offset-4">
                                                <a href ="/auditions/{{ $audition->id }}/apply">
                                                <button type="button" class="btn btn-primary">
                                                <i class="fa fa-btn">Apply To Audition</i>
                                                </button>
                                                </a>
                                                </button>
                                            </div>
                                        @else
                                            <div class="col-md-6 col-md-offset-4">
                                                <h3>You are applied to this audition</h3>
                                            </div>
                                        @endif
                                    @endif
                                @endif

                                @if(!Auth::user()->agency()->first())
                                    @if(!$audition->users->contains(Auth::user()))
                                        <div class="col-md-6 col-md-offset-4">
                                            <a href ="/auditions/{{ $audition->id }}/apply">
                                            <button type="button" class="btn btn-primary">
                                            <i class="fa fa-btn">Apply To Audition</i>
                                            </button>
                                            </a>
                                            </button>
                                        </div>
                                    @else
                                        <div class="col-md-6 col-md-offset-4">
                                            <h3>You are applied to this audition</h3>
                                        </div>
                                    @endif
                                @endif

                                @if(Auth::user()->agency()->first())
                                    @if(Auth::user()->agency()->first()->id == $audition->agency_id)
                                        
                                        <div class="col-md-6 col-md-offset-4">
                                            <a href ="/auditions/{{ $audition->id }}/edit">
                                            <button type="button" class="btn btn-primary">
                                            <i class="fa fa-btn">Edit</i>
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
                                        <div class="col-md-6 col-md-offset-4">
                                            <a href ="/auditions/{{ $audition->id }}/users">
                                            <button type="button" class="btn btn-primary">
                                            <i class="fa fa-btn">Show Applied Users</i>
                                            </button>
                                            </a>
                                            </button>
                                        </div>
                                    @endif
                                @endif
                            </div>
                    </div>
                </div> -->
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