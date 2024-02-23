@props(['blog','randomBlogs'])
<x-layout>
    <!-- navbar -->
    <x-navbar />
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <a href="{{'/blogs/user/'.$blog->author->username}}"><i>by {{ $blog->author->name }}</i></a> <small>{{ $blog->created_at->diffForHumans() }}
                </small><br />
                <a href={{ '/categories/' . $blog->category->slug }}
                    class="badge rounded-pill bg-primary text-decoration-none">
                    {{ $blog->category->name }}</a>
                <p class="lh-md">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>
    <x-subscribe />
    <section class="blogs_you_may_like">
        <div class="container">
            <h3 class="text-center my-4 fw-bold">Blogs You May Like</h3>
            {{-- blogs you may like --}}
            <x-blog-you-may-like :randomBlogs="$randomBlogs"/>
        </div>
    </section>
    <!-- subscribe new blogs -->
    <!-- footer -->
    <x-footer />
</x-layout>
