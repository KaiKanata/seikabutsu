<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Colleview</title>
        <!--Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nuito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>List</h1>
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                <img src="{{ $post->image_path }}" alt="{{ $post->title }}">
                <p class='body'>{{ $post->body }}</p>
            </div>
            @endforeach 
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>