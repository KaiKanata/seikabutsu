<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="Post_title">
                <h1>Bland Name</h1>
                <input type="text" name="post[title]" value="{{ $post->title}}">
            </div>
            <div class="Post_body">
                <h2>キャプション</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
                <input type="text" name="post[image_path]" placeholder="ImagePath">
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/dashboard">BACK</a>
        </div>
</x-app-layout>