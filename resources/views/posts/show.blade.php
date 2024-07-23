<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Posts</title>
        <!--Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nuito:200,600" rel="stylesheet">
    </head>
    <body>
       <h1 class="title">
           {{ $post->title }}
       </h1>
       <div class="content">
           <div class="conten__post">
               <h3>キャプション</h3>
               <p>{{ $post->body }}</p>
           </div>
       </div>
       <div class="footer">
           <a href="/">BACK</a>
       </div>
    </body>
</html>