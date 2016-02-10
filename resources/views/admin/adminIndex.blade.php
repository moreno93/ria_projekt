@extends('layouts.app')

@section('header')
    <h1>Admin panel</h1>
@endsection

@section('content')

    <h3>USERS</h3>
    <table border="1" width="80%">


        @foreach( $users as $user)
            <h2><tr>
                    <td>{{ $user->name }}</td>
                    <td><div class="col-md-6 col-md-offset-4">
                            <a href ="/admin/{{ $user->id }}/edit">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-btn"></i>Edit
                                </button>
                            </a>
                            </button>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <form class="delete" action="/admin/{{ $user->id }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>

            </h2>


        @endforeach
    </table>

    <h3>AGENCIES</h3>
    <table border="1" width="80%">


    @foreach( $agencies as $agency)
            <h2><tr>
                    <td>{{ $agency->agency_name }}</td>
                    <td><div class="col-md-6 col-md-offset-4">
                            <a href ="/adminAgency/{{ $agency->id }}/edit">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-btn"></i>Edit
                                </button>
                            </a>
                            </button>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <form class="deleteAgency" action="/adminAgency/{{ $agency->id }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>

            </h2>


    @endforeach
    </table>
@endsection
