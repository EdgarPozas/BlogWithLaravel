@extends('../layout/layout')

@section("title","Home")


@section("body")

    @foreach ($posts as $post)
        <div class="card card-item">
            <div class="card-body">
                <div class="card-title">
                    <h3>{{$post->title}}</h3>
                </div>
                <div class="card-text">{{substr($post->content,0,100)}}...</div>
                <a href="/post/{{$post->post_id}}" class="btn btn-primary mt-3">View</a>
            </div>
        </div>
    @endforeach

@endsection
