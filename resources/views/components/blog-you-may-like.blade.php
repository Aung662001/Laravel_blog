<div class="row text-center">
   @foreach ($randomBlogs as $blog)
       <x-blog-card :blog="$blog"/>
   @endforeach
</div>