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
        </div>
    </div>


@endsection
