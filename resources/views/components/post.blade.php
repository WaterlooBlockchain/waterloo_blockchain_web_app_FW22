<link rel="stylesheet" href="{{asset('css/Post.css')}}">

@if($theme === 'dark')
<div class="container_dark">
    <img class="img" src="{{$src}}"></img>            
    <div class="body_dark">
        <div class="tagline">
            @foreach ($tags as $tag)
                <div class="tag">{{$tag}}</div>
            @endforeach
        </div>
        <a href='/blog' class="post_title"><p class="dark">{{$title}}</p></a>
        <p class="content">{{$content}}</p>
    </div>
</div>
@else
<div class="container_light">
    <img class="img" src="{{$src}}"></img>            
    <div class="body_light">
        <div class="tagline">
            @foreach ($tags as $tag)
                <div class="tag">{{$tag}}</div>
            @endforeach
        </div>
        <a href='/blog' class="post_title"><p class="light">{{$title}}</p></a>
        <p class="content">{{$content}}</p>
    </div>
</div>
@endif