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
                @if(isset($artist['genre']))
                    <tr>
                        <td width="50%">Genre</td>
                        <td>{{ $artist['genre_name'] }}</td>
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

            <a href="/artists/{{ $artist['id'] }}/edit">Edit</a>



            <div style="margin-top: 100px;">

                <hr>

                {!! Form::open(['route' => ['comments.store', $artist['id']], 'method' => 'POST']) !!}

                {{ Form::label('message', 'Comment') }}
                {{ Form::textarea('message', null, array('class' => 'form-control')) }}

                {{ Form::hidden('resource_type', 'artist') }}

                {{ Form::submit('Place comment', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}

                {!! Form::close(); !!}

            </div>

            @foreach($artist['comments'] as $comment)

                @php
                $comment_user = new \App\User();
                $comment_username = null;
                if ($comment_user->find($comment['user_id'])) {
                    $comment_username = $comment_user->find($comment['user_id'])->getAttribute('username');
                }
                @endphp

                <div style="margin-top: 30px;">

                    <div style="margin-left: 50px;">

                        <p>
                            <i>{{ $comment->created_at }}</i><br>
                            <b>{{ $comment_username }} said:</b>
                        </p>

                        <p>
                            {{ $comment->message }}
                        </p>

                    </div>

                    <hr>
                </div>

            @endforeach

        </div>
    </div>


@endsection
