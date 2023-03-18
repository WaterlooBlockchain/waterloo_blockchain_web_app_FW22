<link rel="stylesheet" href="{{asset('css/Events.css')}}">
<div class="event_container">
        <h1 class="event_title">{{$title}}</h1>
        <p class="event_date">{{date('m/d/Y', strtotime($date))}}</p>
        <p class="event_content">{{$content}}</p>
        @if($image !== NULL)
        <img class="img" src="{{$image}}" width=480 height=360></img>
        @endif
</div>
