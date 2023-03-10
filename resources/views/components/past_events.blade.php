<link rel="stylesheet" href="{{asset('css/PastEvents.css')}}">
<div class="past_event_container">
        <h1 class="past_event_title">{{$title}}</h1>
        <p class="past_event_date">{{date('m/d/Y', strtotime($date))}}</p>
        <p class="past_event_content">{{$content}}</p>
        @if($image !== NULL)
        <img class="img" src="{{$image}}" width=480 height=360></img>
        @endif
</div>
