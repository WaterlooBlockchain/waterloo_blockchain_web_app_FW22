<link rel="stylesheet" href="{{asset('css/Panel.css')}}">

<div class="panel_container">
    <div class="panel_header">
        <div class="panel_icon">
            <i class="{{$icon}}"></i>
        </div>
        <div class="panel_header_content">
            <p class="panel_subheader">{{$header}}</p>
            <p class="panel_title">{{$title}}</p>          
        </div>
    </div>
    <div class="panel_body">
        <p class="panel_content">{{$content}}</p>
    </div>
</div>
