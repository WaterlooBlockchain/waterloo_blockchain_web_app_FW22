@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/Blog.css')}}">

<div class="blog_container">
  <h1 class="featured_title title">Blog</h1>

  <div class="featured_grid">
      @foreach ($blog_posts as $post)
    @if($post->isFeatured == 1)
        @include('components.post', [
          'theme' => 'dark',
          'src' => $post->image, 
          'title' => $post->title,
          'tags' => explode(",", $post->tags),
          'content' => $post->content,
          'isFeatured' => $post->isFeatured,
        ])
    @endif
  @endforeach
  </div>

  
  <div class="blog_grid">
    @foreach ($blog_posts as $post)
      @if ($post->isFeatured != 1)
        @include('components.post', [
          'theme' => 'dark',
          'src' => $post->image, 
          'title' => $post->title,
          'tags' => explode(",", $post->tags),
          'content' => $post->content,
          'isFeatured' => $post->isFeatured,
        ])
      @endif
    @endforeach
  </div>
</div>
@stop