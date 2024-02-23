@props(['blog','currentCategory'])
<div class="col-md-4 mb-4">
    <div class="card">
        <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top" alt="..." />
        <div class="card-body">
            <h3 class="card-title">{{ $blog->title }}</h3>
            <p class="fs-6 text-secondary">
                <a href="{{ '/blogs/user/' . $blog->author->username }}">{{ $blog->author->name }}</a>
                <span> - {{ $blog->created_at->diffForHumans() }}</span>
            </p>
            <a href={{ '/categories/' . $blog->category->slug }}
              class="badge rounded-pill bg-primary text-decoration-none">
              {{ $blog->category->name }}</a>
            <p class="card-text">
                {{ $blog->body }}
            </p>
            <a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>
