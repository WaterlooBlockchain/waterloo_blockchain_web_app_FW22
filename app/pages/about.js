import Head from 'next/head'
import Header from "../components/Header"
import styles from '../styles/About.module.css'

import { BsPeopleFill, BsNewspaper } from 'react-icons/bs'
import { FaHammer } from 'react-icons/fa'
import PastEvents from '../components/PastEvents'
import Panel from '../components/Panel'
import Footer from '../components/Footer'
import Sponser from '../components/Sponser'

import ScrollToTop from '../components/ScrollToTop'

export default function About() { 
    return (
        <div className={styles.container}>
          <Head>
            <title>About UW Blockchain</title>
            <meta name="description" content="About the University of Waterloo Blockchain Club" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="icon" href="/uw_blockchain.png" />
          </Head>
          <div className={styles.body} id={styles.body_id}>
           <main className={styles.main}>
            <Header></Header>
            <div className={styles.content}>
              <h1 className={styles.title}>
                Our Mission
              </h1>
              <p className={styles.text}>
              Our mission is to bring together a community of passionate individuals to explore and work in blockchain ecosystems like Web3 companies or their own startup. We facilitate and promote growth through events, including technical workshops, meetups with industry experts, and supporting student attendance at conferences. We are nurturing Waterloo&apos;s blockchain community, creating spaces for new connections and exchanging ideas through events. 
              </p>
            </div>
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
            <div className={styles.past_events_container}>
            <h1>Our Past Events</h1>
            <div className={styles.past_events}>
              <PastEvents 
                title='Encode DeFi-101'
                date='10/03/2022'
                content='This week, Encode workshop is teaching you all about Decentralized Finance! What&apos;s DeFi? Come find out!'
              />
               <PastEvents 
                title='Building a Tax Token on Ethereum'
                date='10/01/2022'
                content='If you are worried about not having the skill set to follow along the workshop, no worries. This workshop is made with beginners in mind. This easy to follow workshop will have you making a tax token on Ethereum in no time!'
              />
                <PastEvents 
                title='The Merge Crypto Dinner'
                date='09/16/2022'
                content='A UWBC X RBC event. After years of waiting, the Merge is finally here! What a better way to celebrate than in Waterloo, the home of Vitalik!'
              />
            </div>
            </div>
            <div className={styles.sponser_container}>
              <Sponser></Sponser>
            </div>
            <ScrollToTop className={styles.scroll}></ScrollToTop>
            <Footer />
          </main>
          </div>
        </div>
      )
}