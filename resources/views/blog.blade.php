@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/Blog.css')}}">

<div class="blog_container">
              <h1 class="title">Blog</h1>
              <div class="featured_container">
                <div class="featured"><p>FEATURED</p></div>
                <div class="content_container">
                  <h1 class="blog_title">Tokens vs Coins, what&apos;s the difference?</h1>
                  <div class="blog_content">
                  Cryptocurrency coins and tokens are both considered digital assets as they are both non tangible assets that are created and traded and stored in digital format.
                    A cryptocurrency coin is a native currency on the blockchain, it is a medium of exchange and is also something that stores value. 
                   
                    This is used to purchase goods and services as well as something that could be used to exchange for something else like fiat currency. 
                   
                    Tokens are not so similar, they are digital assets but they don&apos;t have their own blockchain. They operate on the crypto coins blockchain like Ethereum; like Dai and Tether.  
                   
                    As coins rely on the blockchain itself, tokens need smart contracts which are arrays of code that expedite trades and payments of the users. Crypto tokens like cryptocurrency can also be used to hold value and be exchanged but they can also be used to represent physical assets , utility, services or even other digital assets. They are also used as a governance mechanism for voting on the upgrades and future decisions of specific protocols.
                  
                    Crypto coins and tokens are both digital assets; coins can be used to allow individuals to make payments with their own currency whereas tokens can be used for many other purposes.
                </div>
                </div>
                <div class="img_container"><img class="featured_img" src="{{asset('images/token.jpg')}}" width=275 height=250></img></div>
              </div>
              <div class="blog_grid">
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
            </div>
@stop
