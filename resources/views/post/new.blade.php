@extends('../layout/layout')

@section("title","New post")


@section("body")


    <div class="card p-4">
        <h1>New post</h1>
        @if ($code==200)
            <div class="alert alert-success" role="alert">
                Post created successfully
            </div>
        @endif
        @if ($code==400)
            <div class="alert alert-danger" role="alert">
                Check the fields
            </div>
        @endif
        <form action="/post-new" method="post">
            @csrf
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" placeholder="The adventure of" required>
            <label for="">Content</label>
            <textarea name="content" rows="8" cols="80" class="form-control" required placeholder="Post something amazing....."></textarea>
            <input type="submit" value="Post" class="btn btn-primary mt-3">
        </form>
    </div>

@endsection
