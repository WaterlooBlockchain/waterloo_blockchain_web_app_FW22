import Head from 'next/head'
import Image from 'next/image'

import styles from '../styles/OlympiHacks.module.css'

import Header from '../components/Header.js'
import Footer from '../components/Footer'
import ScrollToTop from '../components/ScrollToTop'
import Partnership from '../components/Partnership'

export default function Home() {
  return (
    <div className={styles.container}>
      <Head>
        <title>OlympiHacks</title>
        <meta name="description" content="OlympiHacks Hackathon presented by Waterloo Blockchain on May 19 to 22nd." />
        <meta property="og:image" content={"https://i.imgur.com/rmHri4O.png"} />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="/uw_blockchain.png" />
      </Head>
      <div className={styles.body} id={styles.body_id}>
       <main className={styles.main}>
        <Header></Header>
        <div className={styles.intro}>
            <div className={styles.logo}>
                <Image src='/goose.png' width={1332} height={1551}></Image>
            </div>
            <div className={styles.shorten}>
                <h1 className={styles.blockchain}>Waterloo Blockchain</h1>
                <h1 className={styles.olympihacks}>OlympiHacks</h1>
                <p className={styles.text}>Improvise, adapt, overcome. Olympians advancing the adoption of technology.</p>
                <div className={styles.application}>
                    <div className={styles.button}>
                        <a className={styles.button_text} href="https://forms.gle/trC324ictJDSq4wJ6">Apply To Hack!</a>
                    </div>
                    <div className={styles.button}>
                        <a className={styles.button_text} href="https://forms.gle/VzyXtQisLUVLxLT26">Volunteer!</a>
                    </div>
                </div>
            </div>
        </div>
        <main className={styles.main}>
            <h1 className={styles.title}>Already applied? Check these out:</h1>
            <div className={styles.button}>
                <a className={styles.button_text} href="https://forms.gle/thujbTwx8uZLoAPd7">Travel Subsidy Form</a>
            </div>
            <div className={styles.button}>
                <a className={styles.button_text} href="https://olympihacks.devpost.com/">DevPost</a>
            </div>
            <div className={styles.button}>
                <a className={styles.button_text} href="https://discord.gg/JVpgUwPNTt">Discord</a>
            </div>
        </main>
      </main>
        <div className={styles.leftContainer}>
            <div className={styles.leftText}>
                <p>Attend in-person</p>
                <p>May 19th - 21st, 2023</p>
                <br />
                <p>At the University of Waterloo,</p>
                <p>Engineering 7</p>
            </div>
            <div className={styles.rightImage}>
                <Image className={styles.binance} src='/binanceEvent.jpg' width={4000} height={3000} layout='responsive' alt='binance event photo'></Image>
            </div>
        </div>
        <div className={styles.textContainer}>
            <div className={styles.title}>
                <h1>Sprint for Tracks</h1>
                <h1>Compete in Events</h1>
                <h1>Take Home Prizes</h1>
            </div>
            <p className={styles.text}>&quot;The most important thing in the Olympic Games is not to win but to take part, just as the most important thing in life is not the triumph but the struggle. The essential thing is not to have conquered but to have fought well.&quot;</p>

        </div>
        <main className={styles.main}>
            <div className={styles.title}>
                <h1>10K+ Monetary Prizes to Win!</h1>
                <Image src='/medals.png' width={1724} height={520} layout={'responsive'}></Image>
                <p className={styles.text}>Collect points to redeem merch, NFTs, memberships, and more!</p>
            </div>
        </main>
        <div className={styles.leftContainer}>
            <div className={styles.leftText}>
                <p>Join Waterloo Blockchain&apos;s</p>
                <p>Talent Pipeline for a Weekend</p>
                <p>Filled with Hacking and Games!</p>
            </div>
            <div className={styles.rightImage}>
                <Image className={styles.e7} src='/e7.jpg' width={4000} height={3000} layout='responsive' alt='binance event photo'></Image>
            </div>
        </div>
        <br />
        <main className={styles.main}>
            <div className={styles.title}>
                <h1>Current Sponsors</h1>
            </div>
            <div className={styles.sponsors}>
                <Partnership src='/SolanaFoundation.png' link='https://solana.com/'></Partnership>
                <Partnership src='/jackal.svg' link='https://jackalprotocol.com/'></Partnership>
                <Partnership src='/axelar.png' link='https://axelar.network/'></Partnership>
                <Partnership src='/quantstamp.png' link='https://quantstamp.com/'></Partnership>
                <Partnership src='/near.png' link='https://near.org/'></Partnership>
                <Partnership src='/starkware.png' link='https://starkware.co/'></Partnership>
                <Partnership src='/zellic.png' link='https://www.zellic.io/'></Partnership>
            </div>
            <div className={styles.title}><h1>Past Sponsors</h1></div>
            <div className={styles.partnership_container}>
                    <Partnership src='/binance.svg' link='https://www.binance.com/en'></Partnership>
                    <Partnership src='https://assets.website-files.com/62cf2791756a0740d63fff00/6305b597261554d0fa0058a4_Mark-Solid-Grey.png' name='Sonr' link='https://sonr.io/'></Partnership>
                    <Partnership src='https://docs.axelar.dev/_next/image?url=%2Flogo%2Flogo.png&w=32&q=75' name='Axelar' link='https://axelar.network/'></Partnership>
                    <Partnership src='https://learnweb3.io/brand/logo-blue.png' link='https://learnweb3.io/'></Partnership>
                    <Partnership src='https://hypotenuse.ca/img/navbar-logo.png' name="Hypotenuse Labs" link='https://hypotenuse.ca/'></Partnership>
                    <Partnership src='https://www.rbcroyalbank.com/dvl/v1.0/assets/images/logos/rbc-logo-shield.svg' name='Royal Bank of Canada' link='https://www.rbcroyalbank.com/personal.html'></Partnership>
                    <Partnership src='https://images.ctfassets.net/q5ulk4bp65r7/3TBS4oVkD1ghowTqVQJlqj/2dfd4ea3b623a7c0d8deb2ff445dee9e/Consumer_Wordmark.svg' link='https://www.coinbase.com/'></Partnership>
                </div>
        </main>
        <ScrollToTop className={styles.scroll}></ScrollToTop>
        <Footer></Footer>
      </div>
    </div>
  )
}
