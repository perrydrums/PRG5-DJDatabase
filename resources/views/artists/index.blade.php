@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>
                Recently added Artists

                <span style="text-align: right">
                    @if($meta['is_content_manager'])

                        <a href="/artists/create" class="btn btn-default">Add</a>

                    @endif
                </span>

            </h1>
            <hr>

                <table width="100%">
                    <tr>
                        <td width="50%">
                            {!! Form::open(array('route' => 'filter.genre', 'class' => 'form-inline')) !!}

                            {{ csrf_field() }}

                            {{ Form::label('genre', 'Genre') }}

                            <select class="form-control" name="genre_id">
                                @foreach($genres as $genre)

                                    <option value={{ $genre['id'] }}>{{ $genre['name'] }}</option>

                                @endforeach
                            </select>

                            {{ Form::submit('Filter', array('class' => 'btn btn-default')) }}

                            {!! Form::close() !!}
                        </td>
                        <td>
                            <div style="color: red; text-align: right">
                                <?php
                                if (isset($_POST['genre_id'])) {
                                    $genre = new \App\Genre;
                                    $genre = $genre->find($_POST['genre_id']);

                                    echo 'Showing ' . $genre['name'] . ' artists';
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>

            <hr>

            @if (!count($artists))

                There are no artists...

            @endif
            @foreach($artists as $artist)

            <table width="100%">
                <tr>
                    <td><h3><a href="/artists/{{ $artist['id'] }}">{{ $artist['name'] }}</a></h3></td>
                </tr>
                <tr>
                    <td width="50%">Full name</td>
                    <td>{{ $artist['firstname'] . ' ' . $artist['lastname'] }}</td>
                </tr>
            </table>

            <hr>

            @endforeach

        </div>
    </div>


@endsection
