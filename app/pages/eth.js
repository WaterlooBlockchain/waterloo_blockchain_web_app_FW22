import Head from 'next/head'
import Image from 'next/image'
import styles from '../styles/ETH.module.css'

//import components
import Header from '../components/Header.js'
import Footer from '../components/Footer'
import ScrollToTop from '../components/ScrollToTop'
import Card from '../components/Card'

export default function Home() {
    return (
      <div className={styles.container}>
          <Head>
              <title>ETHGlobal WATERLOO</title>
              <meta name="description" content="description..." />
              <meta name="viewport" content="width=device-width, initial-scale=1" />
              <link rel="icon" href="/uw_blockchain.png" />
          </Head>
  
          <div className={styles.body} id={styles.body_id}>
              <main className={styles.main}>
                  <Header></Header>
                  <div className={styles.intro}>
                    <div >
                        <div className={styles.titleContainer}>
                            <h1 className={styles.ethtitle}>ETHGlobal</h1>
                            <h1 className={styles.city}>WATERLOO</h1>
                            <p className={styles.text}>
                                Thursday, June 22, 2023 - Sunday, June 25, 2023
                            </p>
                        </div>

                        <h1 className={styles.text}>WORKSHOPS</h1>
                        <div className={styles.application}>

                            <Card
                                title="Workshop 1"
                                description="Card description goes here"
                                imageUrl="/uw_blockchain.png"
                                date="June 24, 2023"
                                time="@ Time AM/PM"
                                location="Waterloo"
                            />

                            <Card
                                title="Workshop 2"
                                description="Card description goes here"
                                imageUrl="/uw_blockchain.png"
                                date="June 24, 2023"
                                time="@ Time AM/PM"
                                location="Waterloo"
                            />
                            <Card
                                title="Workshop 3"
                                description="Card description goes here"
                                imageUrl="/uw_blockchain.png"
                                date="June 24, 2023"
                                time="@ Time AM/PM"
                                location="Waterloo"
                            />
                            <Card
                                title="Workshop 4"
                                description="Card description goes here"
                                imageUrl="/uw_blockchain.png"
                                date="June 24, 2023"
                                time="@ Time AM/PM"
                                location="Waterloo"
                            />
                            <Card
                                title="Workshop 5"
                                description="Card description goes here"
                                imageUrl="/uw_blockchain.png"
                                date="June 24, 2023"
                                time="@ Time AM/PM"
                                location="Waterloo"
                            />
                            <Card
                                title="Workshop 6"
                                description="Card description goes here"
                                imageUrl="/uw_blockchain.png"
                                date="June 24, 2023"
                                time="@ Time AM/PM"
                                location="Waterloo"
                            />
                            <Card
                                title="Workshop 7"
                                description="Card description goes here"
                                imageUrl="/uw_blockchain.png"
                                date="June 24, 2023"
                                time="@ Time AM/PM"
                                location="Waterloo"
                            />

                        </div>
                    </div>
                 </div>
              </main>
  
              <ScrollToTop className={styles.scroll}></ScrollToTop>
              <Footer></Footer>
          </div>
      </div>
    );
}