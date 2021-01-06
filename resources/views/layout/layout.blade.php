<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield("title")</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('/style.css')}}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light box">
            <div class="col-9 m-auto">
                <div class="row">

                    @if(Auth::check())
                        <div class="col-5">
                            <div class="row">
                                <a class="navbar-brand" href="/">LaravelBlog</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <div class="collapse navbar-collapse">
                                    <a href="/post-new">
                                        <button class="btn btn-outline-primary" type="submit">New post</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="collapse navbar-collapse">
                                    <a href="/profile">
                                        <button class="btn btn-outline-success" type="submit">{{Auth::user()->name}} - View Profile</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="row">
                                <div class="collapse navbar-collapse">
                                    <a href="/logout">
                                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-10">
                            <div class="row">
                                <a class="navbar-brand" href="/">LaravelBlog</a>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="row">
                                <div class="collapse navbar-collapse">
                                    <a href="/login">
                                        <button class="btn btn-outline-primary" type="submit">Login</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="row">
                                <div class="collapse navbar-collapse">
                                    <a href="/register">
                                        <button class="btn btn-outline-primary" type="submit">Register</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        <div class="mt-5 col-9 m-auto">
            <div class="row">
                @yield("body")
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    </body>
</html>
