@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Add a new Artist</h1>
            <hr>

            @foreach ($errors->all() as $error)
                <span class="help-block">
                        <strong> {{ $error }} </strong>
                    </span>
            @endforeach

            {!! Form::model($artist, ['route' => ['artists.update', $artist->id], 'method' => 'PUT']) !!}

            {{ csrf_field() }}

            {{ Form::label('name', 'DJ Name', array('class' => 'required')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}

            {{ Form::label('firstname', 'First name', array('class' => 'required')) }}
            {{ Form::text('firstname', null, array('class' => 'form-control')) }}

            {{ Form::label('lastname', 'Last name', array('class' => 'required')) }}
            {{ Form::text('lastname', null, array('class' => 'form-control')) }}

            {{ Form::label('alias', 'DJ Alias') }}
            {{ Form::text('alias', null, array('class' => 'form-control')) }}

            {{ Form::label('website', 'Link to website') }}
            {{ Form::text('website', null, array('class' => 'form-control')) }}

            {{ Form::label('spotify', 'Link to Spotify') }}
            {{ Form::text('spotify', null, array('class' => 'form-control')) }}

            {{ Form::label('soundcloud', 'Link to soundcloud') }}
            {{ Form::text('soundcloud', null, array('class' => 'form-control')) }}

            {{ Form::label('picture', 'Photo') }}
            {{ Form::text('picture', null, array('class' => 'form-control')) }}

            {!! Html::linkRoute('artists.show', 'Discard changes', array($artist->id), array('class' => 'btn')) !!}

            {{ Form::Submit('Edit', array('class' => 'btn btn-success')) }}

            {!! Form::close() !!}

            {!! Form::open(['route' => ['artists.destroy', $artist->id], 'method' => 'DELETE']) !!}
                {{ Form::submit('Delete Artist', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        </div>
    </div>


@endsection
