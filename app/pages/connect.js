import Head from 'next/head'
import Header from "../components/Header"
import styles from '../styles/Connect.module.css'
import { FaTwitter, FaInstagram, FaLinkedin, FaDiscord, FaEnvelope} from 'react-icons/fa'
import Partnership from '../components/Partnership'
import ScrollToTop from '../components/ScrollToTop'
import Footer from '../components/Footer'
import Sponser from '../components/Sponser'


export default function Connect() {
    return (
        <div className={styles.container}>
          <Head>
            <title>Contact UW Blockchain</title>
            <meta name="description" content="Contact the University of Waterloo Blockchain Club" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="icon" href="/uw_blockchain.png" />
          </Head>
          <div className={styles.body}>
           <main className={styles.main}>
            <Header></Header>
            <h1 className={styles.title}>Contact UW Blockchain Club</h1>
            <div className={styles.contact_container}>
              <div className={styles.contacts}>
              <FaEnvelope></FaEnvelope><p>contact@waterlooblockchain.ca</p>
              </div>
              <div className={styles.contacts}>
              <FaDiscord></FaDiscord><a href='https://discord.gg/PW9HjVp4G6' target="_blank" rel="noreferrer">Join Discord</a>
              </div>
              <div className={styles.contacts}>
              <FaInstagram></FaInstagram><a href='https://www.instagram.com/waterlooblockchain/' target="_blank" rel="noreferrer">@waterlooblockchain</a>
              </div>
              <div className={styles.contacts}>
              <FaTwitter></FaTwitter><a href='https://twitter.com/wlooblockchain' target="_blank" rel="noreferrer">@WaterlooBlockchain</a>
              </div>
              <div className={styles.contacts}>
              <FaLinkedin></FaLinkedin><a href='https://www.linkedin.com/company/uwblockchainclub/' target="_blank" rel="noreferrer">Waterloo Blockchain</a>
              </div>
            </div>
            <h1 className={styles.partnership_title}>Past Partnerships</h1>
            <div className={styles.partnership_container}>
              <Partnership src='/binance.svg' link='https://www.binance.com/en'></Partnership>
              <Partnership src='/jackal.svg' link='https://jackalprotocol.com/'></Partnership>
              <Partnership src='/hedera.png' link='https://hedera.com/' name='Hedera'></Partnership>
              <Partnership src='https://assets.website-files.com/62cf2791756a0740d63fff00/6305b597261554d0fa0058a4_Mark-Solid-Grey.png' name='Sonr' link='https://sonr.io/'></Partnership>
              <Partnership src='https://docs.axelar.dev/_next/image?url=%2Flogo%2Flogo.png&w=32&q=75' name='Axelar' link='https://axelar.network/'></Partnership>
              <Partnership src='https://learnweb3.io/brand/logo-blue.png' link='https://learnweb3.io/'></Partnership>
              <Partnership src='https://hypotenuse.ca/img/navbar-logo.png' link='https://hypotenuse.ca/' name='Hypotenuse'></Partnership>
              <Partnership src='https://www.rbcroyalbank.com/dvl/v1.0/assets/images/logos/rbc-logo-shield.svg' name='Royal Bank of Canada' link='https://www.rbcroyalbank.com/personal.html'></Partnership>
              <Partnership src='https://images.ctfassets.net/q5ulk4bp65r7/3TBS4oVkD1ghowTqVQJlqj/2dfd4ea3b623a7c0d8deb2ff445dee9e/Consumer_Wordmark.svg' link='https://www.coinbase.com/'></Partnership>
            </div>
            <div className={styles.sponsor_container}>
            <Sponser></Sponser>
            </div>
            
          <ScrollToTop></ScrollToTop>
          <Footer></Footer>
          </main>
          </div>
        </div>
      )
}