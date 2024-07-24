<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h1>Bland Name</h1>
                <input type="text" name="post[title]" placeholder="ブランドネーム&シーズン" value="{{old('post.title')}}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>キャプション</h2>
                <textarea name="post[body]" placeholder="かっこいい">{{ old('post.body') }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                <input type="text" name="post[image_path]" placeholder="ImagePath">
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/dashboard">BACK</a>
        </div>
</x-app-layout>