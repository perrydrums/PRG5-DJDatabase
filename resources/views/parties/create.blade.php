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

            {!! Form::open(array('route' => 'parties.store')) !!}

                {{ csrf_field() }}

                {{ Form::label('name', 'Party title', array('class' => 'required')) }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}

                {{ Form::label('organizer', 'Organizer', array('class' => 'required')) }}
                {{ Form::text('organizer', null, array('class' => 'form-control')) }}

                {{ Form::label('location', 'Location', array('class' => 'required')) }}
                {{ Form::text('location', null, array('class' => 'form-control')) }}

                {{ Form::label('date', 'Date', array('class' => 'required')) }}
                {{ Form::date('date', \Carbon\Carbon::now(), array('class' => 'form-control')) }}

                {{ Form::label('time', 'Time', array('class' => 'required')) }}
                {{ Form::time('time', null, array('class' => 'form-control')) }}

                {{ Form::label('picture', 'Picture') }}
                {{ Form::text('picture', null, array('class' => 'form-control')) }}

                {{ Form::submit('Add', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}

            {!! Form::close() !!}
        </div>
    </div>


@endsection
