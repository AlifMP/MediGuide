@extends('layouts.adminLay')

@section('contents')
    <section class="users" id="users">
        <div class="users-content">
            <h1 class="title">New Users</h1>
            <form action="/adduser" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="role" placeholder="Role">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Save</button>
            </form>
        </div>
    </section>
@endsection
