<x-layout>
    <x-slot name="title">
        {{$blog->title}}
    </x-slot>
    <h1>{{ $blog->title }} </h1>
    <p>{!! $blog->body !!}</p>
    <a href="/">Back</a>
</x-layout>
