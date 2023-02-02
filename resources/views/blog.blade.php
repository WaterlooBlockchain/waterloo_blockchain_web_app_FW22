@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/Blog.css')}}">

<div class="blog_container">
  <h1 class="title">Blog</h1>
  @foreach ($blog_posts as $post)
    @if($post->isFeatured == 1)
      <div class="featured_container">
      <div class="featured">
        <p>FEATURED</p>
      </div>
      <div class="content_container">
        <h1 class="blog_title">{{$post->title}}</h1>
        <div class="blog_content">
          {{$post->content}}
        </div>
      </div>
      <div class="img_container"><img class="featured_img" src="{{$post->image}}" width=275 height=250></img></div>
    </div>
    @endif
  @endforeach
  
  <div class="blog_grid">
    @foreach ($blog_posts as $post)
      @if ($post->isFeatured != 1)
        @include('components.post', [
          'theme' => 'dark',
          'src' => $post->image,
          'title' => $post->title,
          'tags' => explode(",", $post->tags),
          'content' => $post->content
        ])
      @endif
    @endforeach
  </div>
</div>
@stop