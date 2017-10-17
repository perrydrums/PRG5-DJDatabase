@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Recently added Parties</h1>
            <hr>

            @if (!count($parties))

                There are no parties...

            @endif
            @foreach($parties as $party)

            <table width="100%">
                <tr>
                    <td><h3><a href="/parties/{{ $party['id'] }}">{{ $party['name'] }}</a></h3></td>
                </tr>
                <tr>
                    <td width="50%">Time of event</td>
                    <td>{{ date('l, F jS [Y]', strtotime($party['date'])) }}</td>
                </tr>
            </table>

            <hr>

            @endforeach

        </div>
    </div>


@endsection
