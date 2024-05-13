@extends('layouts.adminLay')

@section('contents')
    <section class="users" id="users">
        <div class="users-content">
            <h1 class="title">New User</h1>
            <form action="/adduser" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="name"
                        class="form-control
                        @error('name')
                            is-invalid
                        @enderror "
                        id="floatingInput" placeholder="nama lengkap" name="name" required autofocus
                        value="{{ old('name') }}">
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
                        value="{{ old('email') }}">
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
                <div class="form-floating mb-3">
                    <input type="password"
                        class="form-control
                     @error('password')
                            is-invalid
                        @enderror"
                        id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="btnn">
                    <a href="/users">Cancel</a>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection
