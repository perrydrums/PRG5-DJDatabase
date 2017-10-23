@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $artist['name'] }}</h1>
            <hr>

            <table width="100%">
                @if(isset($artist['firstname']))
                <tr>
                    <td width="50%">Full name</td>
                    <td>{{ $artist['firstname'] . ' ' . $artist['lastname'] }}</td>
                </tr>
                @endif
                @if(isset($artist['alias']))
                <tr>
                    <td width="50%">Alias</td>
                    <td>{{ $artist['alias'] }}</td>
                </tr>
                @endif
                @if(isset($artist['website']))
                <tr>
                    <td width="50%">Website</td>
                    <td><a href="{{ $artist['website'] }}">{{ $artist['website'] }}</a></td>
                </tr>
                @endif
                @if(isset($artist['spotify']))
                <tr>
                    <td width="50%">Spotify</td>
                    <td><a href="{{ $artist['spotify'] }}">{{ $artist['spotify'] }}</a></td>
                </tr>
                @endif
                @if(isset($artist['soundcloud']))
                <tr>
                    <td width="50%">Soundcloud</td>
                    <td><a href="{{ $artist['soundcloud'] }}">{{ $artist['soundcloud'] }}</a></td>
                </tr>
                @endif
            </table>

        </div>
    </div>


@endsection
