@props(['blogs', 'categories', 'currentCategory'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ isset($currentCategory) ? $currentCategory->name : 'Filter By Category' }}
            </button>
            <ul class="dropdown-menu">
                @foreach ($categories as $category)
                    <li><a class="dropdown-item" href="{{ '/categories/' . $category->slug }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
            <option value="">Filter by Tag</option>
        </select> --}}
    </div>
    <form action="" class="my-3">
        <div class="input-group mb-3">
            <input type="text" name="search" autocomplete="false" class="form-control"
                placeholder="Search Blogs with title..." value="{{ request('search') }}" />
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>
    <div class="row" id="blogs">
        @forelse ($blogs as $blog)
            <x-blog-card :blog="$blog" />
        @empty
            <p> There is no blog to show</p>
        @endforelse
    </div>
</section>
