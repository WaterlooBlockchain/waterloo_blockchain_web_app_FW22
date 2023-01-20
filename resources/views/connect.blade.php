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
    <h1 class="partnership_title">Past Partnerships</h1>
    <div class="partnership_container">
        @include('components.partnership', [
            'link' => 'https://www.binance.com/en',
            'src' => asset('images/binance.svg'),
            'name' => ''
        ])
        @include('components.partnership', [
            'link' => 'https://sonr.io/',
            'src' => 'https://assets.website-files.com/62cf2791756a0740d63fff00/6305b597261554d0fa0058a4_Mark-Solid-Grey.png',
            'name' => 'SONR'
        ])
        @include('components.partnership', [
            'link' => 'https://axelar.network/',
            'src' => 'https://docs.axelar.dev/_next/image?url=%2Flogo%2Flogo.png&w=32&q=75',
            'name' => 'Axelar'
        ])
        @include('components.partnership', [
            'link' => 'https://learnweb3.io/',
            'src' => 'https://learnweb3.io/brand/logo-blue.png',
            'name' => ''
        ])
        @include('components.partnership', [
            'link' => 'https://hypotenuse.ca/',
            'src' => 'https://hypotenuse.ca/img/navbar-logo2.png',
            'name' => 'Hypotenuse Labs'
        ])
        @include('components.partnership', [
            'link' => 'https://www.rbcroyalbank.com/personal.html',
            'src' => 'https://www.rbcroyalbank.com/dvl/v1.0/assets/images/logos/rbc-logo-shield.svg',
            'name' => 'Royal Bank of Canada'
        ])
        @include('components.partnership', [
            'link' => 'https://www.coinbase.com/',
            'src' => 'https://images.ctfassets.net/q5ulk4bp65r7/3TBS4oVkD1ghowTqVQJlqj/2dfd4ea3b623a7c0d8deb2ff445dee9e/Consumer_Wordmark.svg',
            'name' => ''
        ])
    </div>
    @include('components.sponsorship')
</div>