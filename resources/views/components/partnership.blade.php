<link rel="stylesheet" href="{{asset('css/Partnerships.css')}}">
<div class="partnership">
    @if (empty($name))
        <a href={{$link}}><img src={{$src}} class="partner_img_noname"></img></a>
    @else
        <a href={{$link}}><img src={{$src}} class="partner_img"></img></a>
        <a href={{$link}} class='partner_name'><h1>{{$name}}</h1></a>
    @endif

</div>
