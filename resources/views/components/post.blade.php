<link rel="stylesheet" href="{{asset('css/Post.css')}}">

@if($theme === 'dark')
<div class="container_dark">
    <img class="img" src="{{$src}}" width=346.27 height=179.34></img>            
    <div class="body_dark">
        <a href='/blog' class="post_title"><p class="light">{{$title}}</p></a>
        <div class="tagline">
            @foreach ($tags as $tag)
                <div class="tag">{{$tag}}</div>
            @endforeach
        </div>
        <p class="content">{{$content}}</p>
    </div>
</div>
@else
<div class="container_light">
    <img class="img" src="{{$src}}" width=346.27 height=179.34></img>            
    <div class="body_light">
        <a href='/blog' class="post_title"><p class="dark">{{$title}}</p></a>
        <div class="tagline">
            @foreach ($tags as $tag)
                <div class="tag">{{$tag}}</div>
            @endforeach
        </div>
        <p class="content">{{$content}}</p>
    </div>
</div>
@endif