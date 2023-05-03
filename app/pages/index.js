import { useState, useEffect } from 'react'

import Head from 'next/head'
import Image from 'next/image'
import Link from 'next/link'

import { BsPeopleFill, BsNewspaper } from 'react-icons/bs'
import { FaHammer, FaDiscord } from 'react-icons/fa'

import styles from '../styles/Home.module.css'

import Header from '../components/Header.js'
import Post from '../components/Post.js'
import Panel from '../components/Panel.js'
import Footer from '../components/Footer'
import ScrollToTop from '../components/ScrollToTop'

export default function Home() {
  return (
    <div className={styles.container}>
      <Head>
        <title>UW Blockchain</title>
        <meta name="description" content="University of Waterloo Blockchain Club" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="/uw_blockchain.png" />
      </Head>
      <div className={styles.body} id={styles.body_id}>
       <main className={styles.main}>
        <Header></Header>
        <div className={styles.intro}>
          <h1 className={styles.blockchain}>BLOCKCHAIN @</h1>
          <h1 className={styles.uwaterloo}>UWaterloo</h1>
          <div className={styles.button}>
              <a href='https://discord.gg/Wk8n4MTMwf' target="_blank" rel="noreferrer" className={styles.button_text}>Join the Community</a>
              <div className={styles.discord_icon} >
                <Link href='https://discord.gg/Wk8n4MTMwf' ><FaDiscord className={styles.discord_icon} /></Link>
              </div>
          </div>
          <div className={styles.button}>
              <a href='https://vote.uwblockchain.ca/#/' target="_blank" rel="noreferrer" className={styles.button_text}>Vote on Proposals</a>
          </div>
          <div className={styles.button}>
          <a href='https://forms.gle/tNYGfB8xkuvG7K4s6' target="_blank" rel="noreferrer" className={styles.button_text}>Solidity Bootcamp</a>
          </div>
        </div>
        <div className={styles.read_article}><Image src='/read_article.png' width={1800} height={1700} layout={'responsive'}></Image></div>
        <div className={styles.main_post}>
          <Post 
            src='/header_1.jpg' 
            theme='light'
            tags={['#blockchain', '#education']} 
            title='What is the Blockchain?'
            content={`A blockchain is a system of transactions distributed across a network of computers. All blocks are connected to one another, and each block contains a number of transactions (a ledger).
            \n The ultimate goal of a blockchain is to allow digital information to be recorded and distributed, but to remain immutable. 
            \n This remarkable technology has several applications in numerous industries including travel, healthcare, real estate and especially decentralized finance (DeFi).`}
            ></Post>
            <div className={styles.see_more_posts}>
              <Link href='/blog'>See More Posts &gt;</Link>
            </div>
          </div>
          <div className={styles.about_container}>
            <h1 className={styles.title}>About the Club</h1>
            <p className={styles.about_content}>
            Our mission is to bring together a community of passionate individuals to explore and work in blockchain ecosystems like Web3 companies or their own startup. We facilitate and promote growth through events, including technical workshops, meetups with industry experts, and supporting student attendance at conferences. We are nurturing Waterloo&apos;s blockchain community, creating spaces for new connections and exchanging ideas through events. 
            </p>
            <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRrd1QvThWGWWjQZDGpmEY_Z8rqfPD_fpJDI_5NjtZ0iAZdVybe0BpUgCK3Cs3v76wpCIlrVYGb2URB/embed?start=true&loop=true&delayms=5000" frameBorder="0" width="960" height="569" allowFullScreen={true} mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>          </div>
          <div className={styles.panel_container}>
            <Panel
              icon={<BsPeopleFill className={styles.icon}/>}
              subheader='Work with Us'
              title='Partnerships'
              content='Blockchain club creates an environment for organizations to connect with talented individuals passionate about the crypto space. We offer a direct line of communication to our community which can help disseminate projects, offers, and events.'
            ></Panel>
             <Panel
              icon={<BsNewspaper className={styles.icon}/>}
              subheader='Learn with Us'
              title='Workshops'
              content='Our current events are primarily targeted at skill development, examples include hackathons, CTFs, workshops and educational seminars. We average around 50 student participants for in-person events, providing educational and technical resources to fellow developers (new and veterans).'
            ></Panel>
            <Panel
              icon={<FaHammer className={styles.icon}/>}
              subheader='Educate with Us'
              title='Research'
              content='We create value for the broader blockchain community through research and development, our membership has a wide range of technical backgrounds, with some developing start-ups in the Defi and NFT space, and some who were just onboarded to the Web3 space. DYOR!'
            ></Panel>
          </div>
          <div className={styles.blog_container}>
          <h1 className={styles.title}>Read Our Work</h1>
          <div className={styles.blogs}>
            <Post 
              src='/web.jpg' 
              theme='dark'
              tags={['#blockchain', '#Web2' , '#Web3']} 
              title='Web 2.0 vs Web 3.0'
              content={`Web 2.0 and Web 3.0 are successive iterations of the web. Web 2.0 is the version that most people know and use today, which is the internet. The internet is where companies provide services to users in exchange for their data.
              \n Web 2.0 developed the growth of user-generated content along with its compatibility and usability for users. Web 3.0 is built on the concept of decentralization which refers to a system where control is transferred from a central authority to a distributed network.
              \n In Web 3.0, decentralized apps are run on the blockchain and the apps allow users to participate without giving up their data.`}
            ></Post>
            <Post 
              src='/bitcoin.jpg' 
              theme='dark'
              tags={['#blockchain', '#bitcoin']} 
              title='Bitcoin? What is it?'
              content={`Bitcoin is the first ever successful cryptocurrency and payment system to ever exist and it was first launched in 2009 by creator Satoshi Nakamoto who is a presumed pseudonymous person. 
              \n Bitcoin is a virtual currency that is designed to act as a form of money and payment that removes the need of a middleman in financial transactions. It can be rewarded to blockchain miners for their work on verifying transactions and it can also be bought on several exchanges.`}
            ></Post>
            <Post 
              src='/wallet.jpg' 
              theme='dark'
              tags={['#blockchain', '#usage']} 
              title='Crypto Wallet, More than an Address Book?'
              content={`
              A crypto wallet is where users can keep their private keys and passwords to gain access to their cryptocurrencies. 
              \nWallets can come in several forms such as Hardware wallets(ledger, usb stick), or mobile apps like coinbase. Crypto wallets are crucial to anyone that owns crypto currency. 
              \nUnlike regular wallets, crypto wallets do not store your crypto, which is live on the blockchain; however it keeps your private keys that provide the proof of ownership that users have on the crypto. 
              \nIf the users lose their private keys then they lose access to their crypto, so keep your wallet secure!
              `}
            ></Post>
            </div>
            <div className={styles.see_more_posts}>
              <Link href='/blog'>See More Posts &gt;</Link>
            </div>
          </div>  
          <ScrollToTop className={styles.scroll}></ScrollToTop>
          <Footer></Footer>
      </main>
      </div>
    </div>
  )
}
