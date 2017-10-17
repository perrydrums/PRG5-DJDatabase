@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Add a new Party</h1>
            <hr>

                @foreach ($errors->all() as $error)
                    <span class="help-block">
                        <strong> {{ $error }} </strong>
                    </span>
                @endforeach

            {!! Form::model($party, ['route' => ['parties.update', $party->id], 'method' => 'PUT']) !!}

                {{ csrf_field() }}

                {{ Form::label('name', 'Party title', array('class' => 'required')) }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}

                {{ Form::label('organizer', 'Organizer', array('class' => 'required')) }}
                {{ Form::text('organizer', null, array('class' => 'form-control')) }}

                {{ Form::label('location', 'Location', array('class' => 'required')) }}
                {{ Form::text('location', null, array('class' => 'form-control')) }}

                {{ Form::label('date', 'Date', array('class' => 'required')) }}
                {{ Form::date('date', null, array('class' => 'form-control')) }}

                {{ Form::label('time', 'Time', array('class' => 'required')) }}
                {{ Form::time('time', null, array('class' => 'form-control')) }}

                {{ Form::label('picture', 'Picture') }}
                {{ Form::text('picture', null, array('class' => 'form-control')) }}

                {!! Html::linkRoute('parties.show', 'Discard changes', array($party->id), array('class' => 'btn')) !!}

                {{ Form::Submit('Edit', array('class' => 'btn btn-success')) }}

            {!! Form::close() !!}

            {!! Form::open(['route' => ['parties.destroy', $party->id], 'method' => 'DELETE']) !!}
                {{ Form::submit('Delete Party', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        </div>
    </div>


@endsection
