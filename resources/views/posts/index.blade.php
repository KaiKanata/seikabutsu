<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <h1>List</h1>
        <a href='/posts/create'>create</a>
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                <img src="{{ $post->image_path }}" alt="{{ $post->title }}">
                <div class="like-section">
              @if(Auth::user()->isLike($post->id))
              <form action="{{route('unlike',['postId' => $post->id]) }}"method="POST">
                  @csrf
                  @method('POST')
                  <button type="submit" class="btn btn-danger">いいね解除</button>
                  <a href="/likes/{{ $post->like }}">{{ $post->like }}</a>
              </form>
              @else
              <form action="{{ route('like',['postId' =>$post->id]) }}"method="POST">
                  @csrf
                  <button type="submit" class="btn btn-primary">いいね</button>
              </form>
              @endif
              <p>{{ $post->likes()->count() }}Likes</p>
                </div>
                {{--タグ機能--}}
               <div>
                   {{$post->tag->name}}
               </div>
                <p class='body'>{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
            </div>
            @endforeach 
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        <script>
            function deletePost(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        </div>
</x-app-layout>