@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/Connect.css')}}">
<div class="connect_container">
    <h1 class="connect_title contact_title small_title">Contact UW Blockchain Club</h1>
    <div class="contact_container">
        <div class="contacts">
        <i class="fa fa-envelope fa-2xl icons"></i><a href="mailto:uwaterlooblockchain@gmail.com">uwaterloo<wbr>blockchain<wbr>@<wbr>gmail.com</a></p>
        </div>
        <div class="contacts">
        <i class="fa-brands fa-discord fa-2xl icons"></i><a href='https://discord.gg/PW9HjVp4G6' class="contacts" target="_blank" rel="noreferrer">Join Discord</a>
        </div>
        <div class="contacts">
        <i class="fa-brands fa-instagram fa-2xl icons"></i><a href='https://www.instagram.com/blockchainuw/' class="contacts" target="_blank" rel="noreferrer">@blockchain<wbr>uw</a>
        </div>
        <div class="contacts">
        <i class="fa-brands fa-twitter fa-2xl icons"></i><a href='https://twitter.com/uw_blockchain' class="contacts" target="_blank" rel="noreferrer">@uw_<wbr>blockchain</a>
        </div>
        <div class="contacts">
        <i class="fa-brands fa-linkedin fa-2xl icons"></i><a href='https://www.linkedin.com/company/uwblockchainclub/' class="contacts" target="_blank" rel="noreferrer">University of Waterloo Blockchain Club</a>
        </div>
    </div>

    <h1 class="connect_title small_title">Current Partnerships</h1>
    <div class="connect_title partnership_container">
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

    <h1 class="connect_title small_title">Past Partnerships</h1>
    <div class="connect_title partnership_container">
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
    <h1 class="connect_title title meet_team_title">Meet the Team</h1>
    <p class="connect_meet_subheading">The Waterloo Blockchain team is run by a group of hard-working volunteers. Our amazing team encompasses R&D, events, education, and much more.</p>
    <div class="connect_meet_grid">
        @foreach ($team_members as $member)
            @include('components.portrait', [
                'name' => $member->name,
                'src' => $member->image,
                'title' => $member->role,
                'link' => $member->link
            ])
        @endforeach
    </div>
</div>
@stop