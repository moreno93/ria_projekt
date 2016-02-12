@extends('layouts.app')

@section('header')
    <h3>Home page</h3>
@endsection

@section('content')
    @if (Auth::guest())
          <!-- Heading Row -->
        <div class="row">
            <div class="col-md-5">
                <img class="img-responsive img-rounded" src="{{ asset('images/welcome.png') }}" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-5">
                <h2><strong>Join the community!</strong></h2>
                <p><h4>RIA projekt is a community oriented tool aimed to help moviemaking professionals and amateurs alike connect, crate bussiness relationships and advance their careers even faster.</h4></p>
                <a href="{{ url('/register') }}">
                    <button type="button" class="btn btn-danger">
                        <i class="fa fa-btn"></i>Register
                    </button>
                </a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>


        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    This is a well that is a great spot for a business tagline or phone number for easy access!
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <br><br>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <h2>Make friends and bussiness partners</h2>
                <p>Use search options to find other people in the same line of work or in your vicinity.</p>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Advertise your agency</h2>
                <p>Make your agency more visible by creating an agency profile page.</p>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Create or apply to auditions</h2>
                <p>Planning on creating a movie?<br>Or want to find work in making one?<br>
                Directors, producers, cameramen, sound engineers, actors, extras, etc. - they are all here.</p>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
    <!-- /.container -->
    @else

    @endif
@endsection