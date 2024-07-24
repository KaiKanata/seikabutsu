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
       </div>
       <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a>
       </div>
       <div class="footer">
           <a href="/dashboard">BACK</a>
       </div>
</x-app-layout>