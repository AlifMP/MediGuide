@extends('layouts.adminLay')

@section('contents')
    <section class="users" id="users">
        <div class="users-content">
            <h1 class="title">Data Users</h1>
            <button onclick="location.href='/adduser'">New User</button>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><img src="{{ $user->pfp }}" alt="picture-of-user" class="pfp"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="/edit/user/{{ $user->id }}">Edit</a> | <a
                                href="/delete/user/{{ $user->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
