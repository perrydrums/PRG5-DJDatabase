@extends('layouts.app')

@section('content')


    <div style="text-align: center; margin-top: 30vh">
        <h3>
            I'm sorry, you are not allowed to be here...
        </h3>
        <form action="/home">
            <input type="submit" value="Take me back!" class="btn btn-default"/>
        </form>
    </div>


@endsection