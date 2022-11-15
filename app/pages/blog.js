import Head from 'next/head'
import Header from "../components/Header"
import styles from '../styles/Blog.module.css'
import Post from '../components/Post'
import ScrollToTop from '../components/ScrollToTop'
import Footer from '../components/Footer'
import Image from 'next/image'

export default function About() {
    return (
        <div className={styles.container}>
          <Head>
            <title>Create Next App</title>
            <meta name="description" content="UW Blockchain Club Blog" />
            <link rel="icon" href="/uw_blockchain.png" />
          </Head>
          <div className={styles.body}>
           <main className={styles.main}>
            <Header></Header>
            <div className={styles.blog_container}>
              <h1 className={styles.title}>Blog</h1>
              <div className={styles.featured_container}>
                <div className={styles.featured}><p>FEATURED</p></div>
                <div className={styles.content_container}>
                  <h1 className={styles.blog_title}>Tokens vs Coins, what&apos;s the difference?</h1>
                  <p className={styles.content}>
                  {`Cryptocurrency coins and tokens are both considered digital assets as they are both non tangible assets that are created and traded and stored in digital format.
                    \nA cryptocurrency coin is a native currency on the blockchain, it is a medium of exchange and is also something that stores value. 
                    \nThis is used to purchase goods and services as well as something that could be used to exchange for something else like fiat currency. 
                    \nTokens are not so similar, they are digital assets but they don&apos;t have their own blockchain. They operate on the crypto coins blockchain like Ethereum; like Dai and Tether.  
                    \nAs coins rely on the blockchain itself, tokens need smart contracts which are arrays of code that expedite trades and payments of the users. Crypto tokens like cryptocurrency can also be used to hold value and be exchanged but they can also be used to represent physical assets , utility, services or even other digital assets. They are also used as a governance mechanism for voting on the upgrades and future decisions of specific protocols.
                    \nCrypto coins and tokens are both digital assets ; coins can be used to allow individuals to make payments with their own currency whereas tokens can be used for many other purposes.`}
                  </p>
                </div>
                <div className={styles.img_container}><Image className={styles.img} src='/token.jpg' width={275} height={250} layout={'responsive'}></Image></div>
              </div>
              <div className={styles.blog_grid}>
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
            </div>
            <ScrollToTop></ScrollToTop>
          <Footer></Footer>
          </main>
          </div>
        </div>
      )
}