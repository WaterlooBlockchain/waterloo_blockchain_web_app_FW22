@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/Home.css')}}">

<div class="home">
    <div class="hero">
        <div class="intro">
            <p class="blockchain_title">BLOCKCHAIN @</p>
            <h1 class="uwaterloo_title title">UWaterloo</h1>

            <div class="hero-buttons">
                <a class="button" href='https://discord.gg/Wk8n4MTMwf'>
                    <p>Join the Community<p>
                    <div class="fa-brands fa-discord fa-xl discord_icon"></div>
                </a>
                <a class="button" href='https://vote.uwblockchain.ca/#/'  target="_blank" rel="noreferrer">
                    <p>Vote on Proposals<p>
                </a>
            </div>
        </div>
        <div class="main_post">
          <img class="read_article" src="{{asset('images/read_article.png')}}" ></img>
            <div class="post_body">
                @include('components.post', [
                    'theme' => 'light',
                    'src' => $latest_post->image,
                    'title' => $latest_post->title,
                    'tags' => explode(",", $latest_post->tags),
                    'content' => $latest_post->content,
                    'isFeatured' => $latest_post->isFeatured
                    ])
                <a href='/blog' class="see_more_posts">See More Posts &gt;</a>
            </div>
        </div>
    </div>
    <div class="about_container">
        <h1 class="about_title">About the Club</h1>
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
                'icon' => 'fa-solid fa-hammer fa-2xl',
                'header' => 'Learn with Us',
                'title' => 'Workshops',
                'content' =>'Our current events are primarily targeted at skill development, examples include hackathons, CTFs, workshops and educational seminars. We average around 50 student participants for in-person events, providing educational and technical resources to fellow developers (new and veterans).'
            ])
            @include('components.panel', [
                'icon' => 'fa-solid fa-newspaper fa-2xl',
                'header' => 'Educate with Us',
                'title' => 'Research',
                'content' =>'We create value for the broader blockchain community through research and development, our membership has a wide range of technical backgrounds, with some developing start-ups in the Defi and NFT space, and some who were just onboarded to the Web3 space. DYOR!'
            ])
    </div>
    
    <!-- <div class="past_events_container">
        @include('components.past_events', [
            'icon' => "sample.jpg",
            'title' => "NEAR Smart Contract Workshop",
            'date' => "02/16/2023",
            'content' => "Learned how to create smart contracts in Rust on the NEAR blockchian.",
            'image' => "sample.jpg"
        ])
    </div> -->
    <div class="blog_container">
          <h1 class="blog_title">Read Our Work</h1>
          <div class="blogs">
            @foreach ($blog_posts as $post)
                @include('components.post', [
                'theme' => 'dark',
                'isFeatured' => $post->isFeatured,
                'src' => $post->image,
                'title' => $post->title,
                'tags' => explode(",", $post->tags),
                'content' => $post->content
                ])
            @endforeach
            </div>
            <a href='/blog' class="see_more_posts">See More Posts &gt;</a>
          </div>  
</div>
@stop
