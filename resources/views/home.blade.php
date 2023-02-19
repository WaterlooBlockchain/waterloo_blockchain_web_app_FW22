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
                'src' => asset('images/header_1.jpg'),
                'title' => 'What is the Blockchain?',
                'tags' => ['#Blockchain', '#Cryptocurrency'],
                'content' => 'A blockchain is a system of transactions distributed across a network of computers. All blocks are connected to one another, and each block contains a number of transactions (a ledger).
                
                The ultimate goal of a blockchain is to allow digital information to be recorded and distributed, but to remain immutable. 
               
                This remarkable technology has several applications in numerous industries including travel, healthcare, real estate and especially decentralized finance (DeFi).'
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
          @include('components.post', [
                'theme' => 'dark',
                'src' => asset('images/web.jpg'),
                'title' => 'Web 2.0 vs Web 3.0',
                'tags' => ['#Blockchain', '#Web2' , '#Web3'],
                'content' => 'Web 2.0 and Web 3.0 are successive iterations of the web. Web 2.0 is the version that most people know and use today, which is the internet. The internet is where companies provide services to users in exchange for their data.
               
                Web 2.0 developed the growth of user-generated content along with its compatibility and usability for users. Web 3.0 is built on the concept of decentralization which refers to a system where control is transferred from a central authority to a distributed network.
               
                In Web 3.0, decentralized apps are run on the blockchain and the apps allow users to participate without giving up their data.'
            ])
            @include('components.post', [
                'theme' => 'dark',
                'src' => asset('images/bitcoin.jpg'),
                'title' => 'Bitcoin? What is it?',
                'tags' => ['#Blockchain', '#Cryptocurrency', '#Bitcoin'],
                'content' => 'Bitcoin is the first ever successful cryptocurrency and payment system to ever exist and it was first launched in 2009 by creator Satoshi Nakamoto who is a presumed pseudonymous person. 
                
                Bitcoin is a virtual currency that is designed to act as a form of money and payment that removes the need of a middleman in financial transactions. It can be rewarded to blockchain miners for their work on verifying transactions and it can also be bought on several exchanges.'
            ])
            @include('components.post', [
                'theme' => 'dark',
                'src' => asset('images/wallet.jpg'),
                'title' => 'Crypto Wallet, More than an Address Book?',
                'tags' => ['#Blockchain', '#Cryptocurrency', '#Technology'],
                'content' => ' A crypto wallet is where users can keep their private keys and passwords to gain access to their cryptocurrencies. 
                
                Wallets can come in several forms such as Hardware wallets(ledger, usb stick), or mobile apps like coinbase. Crypto wallets are crucial to anyone that owns crypto currency. 
                
                Unlike regular wallets, crypto wallets do not store your crypto, which is live on the blockchain; however it keeps your private keys that provide the proof of ownership that users have on the crypto. 
                
                If the users lose their private keys then they lose access to their crypto, so keep your wallet secure!'
            ])
            </div>
            <a href='/blog' class="see_more_posts">See More Posts &gt;</a>
          </div>  
</div>
@stop
