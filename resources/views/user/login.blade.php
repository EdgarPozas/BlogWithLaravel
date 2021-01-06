@extends('../layout/layout')

@section("title","Login")

@section("body")

    <div class="card p-4">
        <h1>Login</h1>
        @if ($code==400)
            <div class="alert alert-danger" role="alert">
                Check the fields
            </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email@domain.com" required>
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="*************" required>
            <input type="submit" value="Login" class="btn btn-primary mt-3">
        </form>
    </div>

@endsection
