@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @if ($user)
                    <div class="panel-heading" style="text-align: center">Hello, {{ $user['firstname'] }}!</div>
                @else
                    <div class="panel-heading" style="text-align: center">Welcome to the DJ Database!</div>
                @endif
                <div class="panel-body">
                    <h2 style="text-align: center">Check out some</h2>
                    <table width="35%" style="text-align: center; margin: 40px auto">
                        <tr>
                            <td><a href="artists" class="btn btn-success btn-lg" style="color: white;">Artists</a></td>
                            <td><a href="parties" class="btn btn-success btn-lg" style="color: white;">Parties</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
