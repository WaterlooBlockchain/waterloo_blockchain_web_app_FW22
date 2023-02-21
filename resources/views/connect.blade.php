@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/Partnerships.css')}}">
<div class="container">
    <h1 class="title">Contact UW Blockchain Club</h1>
    <div class="contact_container">
        <div class="contacts">
        <i class="fa fa-envelope fa-2xl icons"></i><p class="contacts">uwaterlooblockchain@gmail.com</p>
        </div>
        <div class="contacts">
        <i class="fa-brands fa-discord fa-2xl icons"></i><a href='https://discord.gg/PW9HjVp4G6' class="contacts" target="_blank" rel="noreferrer">Join Discord</a>
        </div>
        <div class="contacts">
        <i class="fa-brands fa-instagram fa-2xl icons"></i><a href='https://www.instagram.com/blockchainuw/' class="contacts" target="_blank" rel="noreferrer">@blockchainuw</a>
        </div>
        <div class="contacts">
        <i class="fa-brands fa-twitter fa-2xl icons"></i><a href='https://twitter.com/uw_blockchain' class="contacts" target="_blank" rel="noreferrer">@uw_blockchain</a>
        </div>
        <div class="contacts">
        <i class="fa-brands fa-linkedin fa-2xl icons"></i><a href='https://www.linkedin.com/company/uwblockchainclub/' class="contacts" target="_blank" rel="noreferrer">University of Waterloo Blockchain Club</a>
        </div>
    </div>

    <h1 class="partnership_title">Current Partnerships</h1>
    <div class="partnership_container">
        @foreach ($partnerships as $partner)
            @if ($partner->isCurrent == 1)
                @include('components.partnership', [
                    'link' => $partner->link,
                    'src' => $partner->image,
                    'name' => $partner->name
                ])
            @endif
        @endforeach
    </div>

    <h1 class="partnership_title">Past Partnerships</h1>
    <div class="partnership_container">
        @foreach ($partnerships as $partner)
            @if ($partner->isCurrent != 1)
                @include('components.partnership', [
                    'link' => $partner->link,
                    'src' => $partner->image,
                    'name' => $partner->name
                ])
            @endif
        @endforeach
    </div>
    @include('components.sponsorship')
</div>