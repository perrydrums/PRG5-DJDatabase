@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        Profile of {{ $c_user['username'] }}

                    </div>
                    <div class="panel-body">
                        <table width="75%" style="margin: 50px auto">
                            <tr>
                                <td width="50%">Full name:</td>
                                <td>{{ $c_user['firstname'] . ' ' . $c_user['lastname'] }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $c_user['email'] }}</td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td>{{ $c_user['gender'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($meta['is_admin'])

                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">
                            ADMIN SETTINGS
                        </div>
                        <div class="panel-body">

                            <h3 style="border-bottom: 1px solid lightgrey; padding-bottom: 5px">
                                User permissions settings
                            </h3>

                            <div class="table" width="100%">
                                <div class="tr">
                                    <span class="td">ID</span>
                                    <span class="td">Username</span>
                                    <span class="td">User</span>
                                    <span class="td">Content</span>
                                    <span class="td">Admin</span>
                                    <span class="td"></span>
                                </div>
                                @foreach($users as $user)
                                        <form class="tr tr-highlight" action="{{ route('admin.permissions') }}" method="POST">

                                            {{ csrf_field() }}

                                            <span class="td" style="padding-left: 4px; width: 30px">{{ $user['id'] }}</span>
                                            <span class="td" style="width: 300px">{{ $user['username'] }}</span>
                                            <span class="td" style="width: 80px">
                                                <input type="checkbox" name="user" {{ $user->hasRole('user') ? 'checked' : '' }}>
                                            </span>
                                            <span class="td" style="width: 80px">
                                                <input type="checkbox" name="content-manager" {{ $user->hasRole('content-manager') ? 'checked' : '' }}>
                                            </span>
                                            <span class="td" style="width: 80px">
                                                <input type="checkbox" name="admin" {{ $user->hasRole('admin') ? 'checked' : '' }} {{ $user['id'] == $c_user['id'] ? 'disabled' : '' }}>
                                            </span>
                                            <input type="hidden" name='user_id' value="{{ $user['id'] }}">
                                            <span class="td" style="text-align: right; padding-right: 4px;"><input type="submit" name="submit" value="Update" class="btn btn-default" {{ $user['id'] == $c_user['id'] ? 'disabled' : '' }}></span>

                                        </form>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>

@endsection
