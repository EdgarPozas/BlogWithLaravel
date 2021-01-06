@extends('../layout/layout')

@section("title","Register")


@section("body")


    <div class="card p-4">
        <h1>Register</h1>
        @if ($code==200)
            <div class="alert alert-success" role="alert">
                User created successfully
            </div>
        @endif
        @if ($code==400)
            <div class="alert alert-danger" role="alert">
                Check the fields
            </div>
        @endif
        <form action="/register" method="post">
            @csrf
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Edgar Pozas" required>
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email@domain.com" required>
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="*************" required>
            <input type="submit" value="Register" class="btn btn-primary mt-3">
        </form>
    </div>

@endsection
