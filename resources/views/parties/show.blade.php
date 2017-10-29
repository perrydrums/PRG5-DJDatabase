@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $party['name'] }}</h1>
            <hr>
            <table width="100%">
                @if(isset($party['organizer']))
                    <tr>
                        <td width="50%">Organizer</td>
                        <td>{{ $party['organizer'] }}</td>
                    </tr>
                @endif
                @if(isset($party['location']))
                <tr>
                    <td width="50%">Location</td>
                    <td>{{ $party['location'] }}</td>
                </tr>
                @endif
                @if(isset($party['date']))
                <tr>
                    <td width="50%">Date</td>
                    <td>{{ $party['date'] . ' at ' . $party['time']}}</td>
                </tr>
                @endif
                @if(isset($party['picture']))
                <tr>
                    <td width="50%">Picture path</td>
                    <td>{{ $party['picture'] }}</td>
                </tr>
                @endif
            </table>

            <a href="/parties/{{ $party['id'] }}/edit">Edit</a>

            <div style="margin-top: 100px;">

                <hr>

                {!! Form::open(['route' => ['comments.store', $party['id']], 'method' => 'POST']) !!}

                {{ Form::label('message', 'Comment') }}
                {{ Form::textarea('message', null, array('class' => 'form-control')) }}

                {{ Form::hidden('resource_type', 'party') }}

                {{ Form::submit('Place comment', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}

                {!! Form::close(); !!}

            </div>

            @foreach($party['comments'] as $comment)

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
