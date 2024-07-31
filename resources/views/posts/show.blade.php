<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
       <h1 class="title">
           {{ $post->title }}
       </h1>
       <div class="content">
           <div class="conten__post">
               <h3>キャプション</h3>
               <p>{{ $post->body }}</p>
           </div>
          <div class="like-section">
              @if(Auth::user()->isLike($post->id))
              <form action="{{route('unlike',['postId' => $post->id]) }}"method="POST">
                  @csrf
                  @method('POST')
                  <button type="submit" class="btn btn-danger">いいね解除</button>
              </form>
              @else
              <form action="{{ route('like',['postId' =>$post->id]) }}"method="POST">
                  @csrf
                  <button type="submit" class="btn btn-primary">いいね</button>
              </form>
              @endif
              <p>{{ $post->likes()->count() }}Likes</p>
          </div>
          
               <div>
                   {{$post->tag->name}}
               </div>
       </div>
       <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a>
       </div>
       <div class="footer">
           <a href="/dashboard">BACK</a>
       </div>
</x-app-layout>