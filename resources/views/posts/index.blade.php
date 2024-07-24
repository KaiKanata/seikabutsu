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
                <p class='body'>{{ $post->body }}</p>
            </div>
            @endforeach 
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
</x-app-layout>