@extends('layouts.app')

@section('header')
    <h3><strong>{{ $agency->agency_name }}</strong><small>Agency Overview</small></h3> 
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="block">
                <div class="block">
                    <div class="thumbnail">
                        <div class="thumb">
                            <img src="/images/agency_pic/default.jpg" alt=""> 
                        </div> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h6>Headquaters:</h6>
                </div>       
                <div class="col-md-6">
                    <h6>Sisak</h6>   
                </div>    
            </div> 

            <div class="row">
                <div class="col-md-6">
                    <h6>Fundation year:</h6>
                </div>       
                <div class="col-md-6">
                    <h6>1902.</h6>
                </div>    
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h6>Owner:</h6>
                </div>       
                <div class="col-md-6">
                    <h6>Pero Peric</h6>
                </div>    
            </div>  

            <div class="row spacer">
                @if(Auth::user()->id == $agency->user_id)

                    <div class="col-md-6">
                        <a href ="/agencies/{{ $agency->id }}/edit">
                            <button type="button" class="btn btn-default">
                                <i class="fa fa-pencil"></i>Edit agency
                            </button>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <form class="delete" action="/agencies/{{ $agency->id }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-trash"></i>Delete
                            </button>
                        </form>
                    </div>

                @endif
            </div>
            <br>

        </div>

    <div class="col-md-10">

        <div class="row">
            <div class="col-md-12">
                <h4>Description</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {{ $agency->agency_description }}
            </div>
        </div>

        <div class="row spacer">
            <div class="col-md-8">
                <h4>Recent Auditions</h4>  
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12"> 
                
                <div class="btn-group">
                @if(Auth::user()->id == $agency->user_id)
                <a href="/auditions/create">
                  <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>Post an Audition</button>
                </a>
                @endif
                <a href="/auditions/agency/{{ $agency->id }}">
                  <button href="/auditions/agency/{{ $agency->id }}" type="button" class="btn btn-primary"><i class="fa fa-navicon"></i>Show all Auditions</button>
                </a>
                </div>
            </div>
        </div>
        <br>

        @foreach($agency->auditions as $audition)
        <a href ="/auditions/{{ $audition->id }}/">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">{{ $audition->audition_name }}</h3>
              </div>
              <div class="panel-body">
                {{ $audition->description }}
              </div>
            </div>
        </a>
        @endforeach

    </div>

<script>
    $(".delete").submit(function(){
        return confirm("Are you sure you want to delete this item?");
    });
</script>

@endsection