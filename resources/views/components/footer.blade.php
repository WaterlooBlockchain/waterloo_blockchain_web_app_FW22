<div class="footer">
    <link rel="stylesheet" href="{{asset('css/Footer.css')}}">
    <div class="indent">
        <div class="left_div">
            <div class="logo">
                <img src="{{asset('images/uw_blockchain.png')}}" width={63} height={72}></img>
            </div>
            <div class="text">
                <p class="uwaterloo">UWaterloo</p>
                <div class="line">
                    <h1 class="blockchain">Blockchain</h1>
                    <p class="c">© {{ date('Y') }}</p>
                </div>
            </div>
        </div>
        <div class="socials">
            @foreach ($socials as $social)
                @if ($social->name != 'Voting')
                    <div class="socials_button"><a href='{{$social->link}}' target="_blank" rel="noreferrer"><i class="{{$social->icon}}"></i></a></div>
                @endif
            @endforeach
        </div>
    </div>
</div>