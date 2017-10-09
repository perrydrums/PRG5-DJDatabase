@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $party['name'] }}</h1>
            <hr>

            {{--
                todo: Only display if data is set
                todo: Forearch loop through content
             --}}

            <table width="100%">
                <tr>
                    <td width="50%">Organizer</td>
                    <td>{{ $party['organizer'] }}</td>
                </tr>
                <tr>
                    <td width="50%">Location</td>
                    <td>{{ $party['location'] }}</td>
                </tr>
                <tr>
                    <td width="50%">Date</td>
                    <td>{{ $party['date'] . ' at ' . $party['time']}}</td>
                </tr>
                <tr>
                    <td width="50%">Picture path</td>
                    <td>{{ $party['picture'] }}</td>
                </tr>
            </table>

        </div>
    </div>


@endsection
