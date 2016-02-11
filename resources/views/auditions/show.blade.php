@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <br>
                <div class="jumbotron">
                    <h1><strong>{{ $audition->audition_name }}</strong></h1>
                    <p>
                        <span>Budget: <i>{{ $audition->budget }}</i></span>
                        <br>
                        <span>Location: <i>{{ $audition->city }},{{ $audition->country }}</i></span>
                        <br>
                        <span>Started: <i>{{ date('F d, Y', strtotime($audition->created_at)) }}</i></span>
                    </p>
                    <p>{{ $audition->description }}</p>
                    <p>           
                        @if(Auth::user()->agency()->first())
                            @if(!Auth::user()->agency->auditions->contains($audition))
                                @if(!$audition->users->contains(Auth::user())) 
                                    <div class="col-md-6 col-md-offset-4">
                                        <a href ="/auditions/{{ $audition->id }}/apply">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa fa-btn">Apply To Audition</i>
                                            </button>
                                        </a>
                                    </div>
                                @else
                                    <div class="col-md-6 col-md-offset-4">
                                        <h3>You are applied to this audition</h3>
                                    </div>
                                @endif
                            @endif
                        @elseif(!$audition->users->contains(Auth::user())) 
                            <div class="col-md-6 col-md-offset-4">
                                <a href ="/auditions/{{ $audition->id }}/apply">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa fa-btn">Apply To Audition</i>
                                    </button>
                                </a>
                            </div>
                        @else
                            <div class="col-md-6 col-md-offset-4">
                                <h3>You are applied to this audition</h3>
                            </div>
                        @endif
                        
                         
                    </p>

                        <div class="row">
                            <div class="col-md-12">
                            @if(Auth::user()->agency()->first())
                                @if(Auth::user()->agency()->first()->id == $audition->agency_id)
                                    
                                    <div class="inline">
                                        <a href ="/auditions/{{ $audition->id }}/edit">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa fa-btn">Edit</i>
                                            </button>
                                        </a>
                                    </div>

                                    <div class="inline">
                                        <a href ="/auditions/{{ $audition->id }}/users">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa fa-btn">Show Applied Users</i>
                                            </button>
                                        </a>
                                    </div>

                                    <div class="inline">
                                        <form class="delete" action="/auditions/{{ $audition->id }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div> 

                                @endif
                            @endif
                            </div>
                        </div>
                </div>

                <div class="col-md-10 col-md-offset-1">
                  <h2>Available roles</h2>         
                  <table class="table table-hover table-responsive">
                    <thead>
                      <tr>
                        <th>Role</th>
                        <th>Positions</th>
                        <th>Salary</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Director</td>
                        <td>{{ $audition->num_directors }}</td>
                        <td>{{ $audition->pay_directors }}</td>
                      </tr>
                      <tr>
                        <td>Producer</td>
                        <td>{{ $audition->num_producers }}</td>
                        <td>{{ $audition->pay_producers }}</td>
                      </tr>
                      <tr>
                        <td>Cameraman</td>
                        <td>{{ $audition->num_cameraman }}</td>
                        <td>{{ $audition->pay_cameraman }}</td>
                      </tr>
                      <tr>
                        <td>Film Editor</td>
                        <td>{{ $audition->num_film_editors }}</td>
                        <td>{{ $audition->pay_film_editors }}</td>
                      </tr>
                      <tr>
                        <td>Sound Designer</td>
                        <td>{{ $audition->num_sound_designers }}</td>
                        <td>{{ $audition->pay_sound_designers }}</td>
                      </tr>
                      <tr>
                        <td>Actor</td>
                        <td>{{ $audition->num_actors }}</td>
                        <td>{{ $audition->pay_actors }}</td>
                      </tr>
                      <tr>
                        <td>Extra</td>
                        <td>{{ $audition->num_extras }}</td>
                        <td>{{ $audition->pay_extras }}</td>
                      </tr>                                                                                        
                    </tbody>
                  </table>
                </div>
        </div>
    </div>
</div>
<br>

<script>
    $(".delete").submit(function(){
        return confirm("Are you sure you want to delete this item?");
    });
</script>

@endsection