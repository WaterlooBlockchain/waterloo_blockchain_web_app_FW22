@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/About.css')}}">

<div class="container">
    <div class="about_container">
        <h1 class="about_title">Our Mission</h1>
        <p class="about_content">
        Our mission is to bring together a community of passionate individuals to explore and work in blockchain ecosystems like Web3 companies or their own startup. We facilitate and promote growth through events, including technical workshops, meetups with industry experts, and supporting student attendance at conferences. We are nurturing Waterloo&apos;s blockchain community, creating spaces for new connections and exchanging ideas through events. 
        </p>
    </div>
    <div class="panel_section">
            @include('components.panel', [
                'icon' => 'fa-solid fa-user-group fa-2xl',
                'header' => 'Work with Us',
                'title' => 'Partnerships',
                'content' =>'Blockchain club creates an environment for organizations to connect with talented individuals passionate about the crypto space. We offer a direct line of communication to our community which can help disseminate projects, offers, and events.'
            ])
            @include('components.panel', [
                'icon' => 'fa-solid fa-newspaper fa-2xl',
                'header' => 'Learn with Us',
                'title' => 'Workshops',
                'content' =>'Our current events are primarily targeted at skill development, examples include hackathons, CTFs, workshops and educational seminars. We average around 50 student participants for in-person events, providing educational and technical resources to fellow developers (new and veterans).'
            ])
            @include('components.panel', [
                'icon' => 'fa-solid fa-hammer fa-2xl',
                'header' => 'Educate with Us',
                'title' => 'Research',
                'content' =>'We create value for the broader blockchain community through research and development, our membership has a wide range of technical backgrounds, with some developing start-ups in the Defi and NFT space, and some who were just onboarded to the Web3 space. DYOR!'
            ])
    </div>
    <div class="past_events_container">
        <h1 class="past_events_title">Our Past Events</h1>
        <div class="past_events_content">
        
        </div>
    </div>
</div>