@extends('layouts.adminLay')

@section('contents')
    <section class="users" id="users">
        <div class="users-content">
            <h1 class="title">Data Users</h1>
            @if (session()->has('addsuccess'))
                <div class="alert alert-success" role="alert">
                    {{ session('addsuccess') }}
                </div>
            @endif
            @if (session()->has('updsuccess'))
                <div class="alert alert-success" role="alert">
                    {{ session('updsuccess') }}
                </div>
            @endif
            <button onclick="location.href='/adduser'">New User</button>
            <?php
            $i = 1;
            ?>
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
                        <td>{{ $i++ }}</td>
                        <td><img src="../assets/{{ $user->pfp }}" alt="picture-of-user" class="data-pfp"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="/edit/user/{{ $user->id }}">Edit</a> | <a href="/delete/user/{{ $user->id }}"
                                onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
