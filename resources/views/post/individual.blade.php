@extends('../layout/layout')

@section("title","Home")


@section("body")

    @if(Auth::check())
        @if ($post[0]->user_id==Auth::user()->user_id)
            @if ($code==200)
                <div class="alert alert-success" role="alert">
                    Post updated successfully
                </div>
            @endif
            @if ($code==400)
                <div class="alert alert-danger" role="alert">
                    Check the fields
                </div>
            @endif
            <div class="card p-2">
                <form action="{{route('post.update',$post[0])}}" method="post">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <div class="card-title">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$post[0]->title}}" class="form-control">
                        </div>
                        <div class="card-body">
                            <label for="">Content</label>
                            <textarea name="content" rows="8" cols="80" class="form-control">{{$post[0]->content}}</textarea>
                        </div>
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary">
                </form>
                <form action="{{route('post.destroy',$post[0])}}" method="post" class="mt-3">
                    @method("DELETE")
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Do you really want delete this post?')">
                </form>
            </div>

        @else
            <div class="card p-2">
                <div class="card-body">
                    <div class="card-title">
                        <h3>{{$post[0]->title}}</h3>
                    </div>
                    <div class="card-text">{{$post[0]->content}}</div>
                </div>
            </div>
        @endif
    @else
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>{{$post[0]->title}}</h3>
                </div>
                <div class="card-text">{{$post[0]->content}}</div>
            </div>
        </div>
    @endif

@endsection
