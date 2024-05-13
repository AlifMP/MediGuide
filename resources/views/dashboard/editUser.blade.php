@extends('layouts.adminEdit')

@section('contents')
    <section class="users" id="users">
        <div class="users-content">
            <h1 class="title">Edit User</h1>
            <form action="/edit/user" method="POST">
                @csrf
                @foreach ($users as $user)
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-floating mb-3">
                        <input type="name"
                            class="form-control
                        @error('name')
                            is-invalid
                        @enderror "
                            id="floatingInput" placeholder="nama lengkap" name="name" required autofocus
                            value="{{ $user->name }}">
                        <label for="floatingInput">Nama Lengkap</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email"
                            class="form-control
                        @error('email')
                        is-invalid
                    @enderror"
                            id="floatingEmail" placeholder="email@example.com" name="email" required
                            value="{{ $user->email }}">
                        <label for="floatingEmail">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select mb-3" id="floatingSelect" aria-label="Select Role" name="role"
                            placeholder="Role" required>
                            <option selected value="user">User</option>
                            <option value="doctor">Doctor</option>
                            <option value="admin">Admin</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                    </div>
                    <div class="btnn">
                        <a href="/users">Cancel</a>
                        <button type="submit">Save</button>
                    </div>
                @endforeach
            </form>
        </div>
    </section>
@endsection
