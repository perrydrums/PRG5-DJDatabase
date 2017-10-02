@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $artist['name'] }}</h1>
            <hr>

            {{--
                todo: Only display if data is set
                todo: Forearch loop through content
             --}}

            <table width="100%">
                <tr>
                    <td width="50%">Full name</td>
                    <td>{{ $artist['firstname'] . ' ' . $artist['lastname'] }}</td>
                </tr>
                <tr>
                    <td width="50%">Alias</td>
                    <td>{{ $artist['alias'] }}</td>
                </tr>
                <tr>
                    <td width="50%">Website</td>
                    <td><a href="{{ $artist['website'] }}">{{ $artist['website'] }}</a></td>
                </tr>
                <tr>
                    <td width="50%">Spotify</td>
                    <td><a href="{{ $artist['spotify'] }}">{{ $artist['spotify'] }}</a></td>
                </tr>
                <tr>
                    <td width="50%">Soundcloud</td>
                    <td><a href="{{ $artist['soundcloud'] }}">{{ $artist['soundcloud'] }}</a></td>
                </tr>
            </table>

        </div>
    </div>


@endsection
