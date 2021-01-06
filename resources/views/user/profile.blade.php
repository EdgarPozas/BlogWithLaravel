@extends('../layout/layout')

@section("title","Profile")


@section("body")

    <div class="card p-4">
        <h1>Update profile</h1>
        @if ($code==200)
            <div class="alert alert-success" role="alert">
                User updated successfully
            </div>
        @endif
        @if ($code==400)
            <div class="alert alert-danger" role="alert">
                Check the fields
            </div>
        @endif
        <form action="{{ route('user.update',Auth::user())}}" method="post">
            @method("PUT")
            @csrf
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Edgar Pozas" required value="{{Auth::user()->name}}">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email@domain.com" required value="{{Auth::user()->email}}">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="*************" required value="{{Auth::user()->password}}">
            <input type="submit" value="Update" class="btn btn-primary mt-3">
        </form>
        <form action="{{route('user.destroy',Auth::user())}}" method="post" class="mt-3">
            @method("DELETE")
            @csrf
            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Do you really want delete your profile?')">
        </form>
    </div>
    <div class="card p-4">
        <h1>My posts</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->posts as $post)
                    <tr>
                        <td>{{$post->post_id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td><a href="/post/{{$post->post_id}}">Ver...</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
