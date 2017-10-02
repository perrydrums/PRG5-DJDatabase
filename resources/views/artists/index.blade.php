@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Recently added Artists</h1>
            <hr>

            @foreach($artists as $artist)

            <table width="100%">
                <tr>
                    <td><h3><a href="/artists/{{ $artist['id'] }}">{{ $artist['name'] }}</a></h3></td>
                </tr>
                <tr>
                    <td width="50%">Full name</td>
                    <td>{{ $artist['firstname'] . ' ' . $artist['lastname'] }}</td>
                </tr>
            </table>

            <hr>

            @endforeach

        </div>
    </div>


@endsection
