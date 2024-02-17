<x-layout>
    <x-slot name="title">
        All blogs
    </x-slot>
    <div>
        @foreach ($blogs as $blog)
            <h2><a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a>
            </h2>
            <small>{{ $blog->created_at->diffForHumans() }} </small><br/>
            <a href={{"categories/".$blog->category->slug}}> {{$blog->category->name }}</a>
            <p>
                <?= $blog->intro ?>
            </p>
        @endforeach
    </div>
</x-layout>
