import Head from 'next/head'
import Image from 'next/image'
import styles from '../styles/ETH.module.css'
import React, { useState, useEffect } from 'react';

//import components
import Header from '../components/Header.js'
import Footer from '../components/Footer'
import ScrollToTop from '../components/ScrollToTop'
import Card from '../components/Card'

export default function Home() {
    return (
      <div className={styles.container}>
          <Head>
              <title>ETHGLOBAL WATERLOO</title>
              <meta name="description" content="description..." />
              <meta name="viewport" content="width=device-width, initial-scale=1" />
              <link rel="icon" href="/uw_blockchain.png" />
          </Head>
  
          <div className={styles.body} id={styles.body_id}>
              <main className={styles.main}>
                  <Header></Header>
                  <div className={styles.intro}>
                    <div >
                        <div className={styles.titleWrapper}>
                            <div className={styles.titleContainer}>
                                <h1 className={styles.ethtitle}>ETHGlobal</h1>
                                <h1 className={styles.city}>WATERLOO</h1>
                                <p className={styles.textDate}>
                                    Thursday, June 22, 2023 - Sunday, June 25, 2023
                                </p>
                                <p className={styles.text}>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit quam sed lobortis pulvinar. Sed pretium nec ligula a sodales. Donec vitae mattis nunc. Mauris nec porttitor risus.
                                </p>
                            </div>
                            <div className={styles.titleLogo}>
                                <Image className={styles.titleLogoImg} src="/ethglobal-waterloo-logo.svg" width={300} height={300} alt="EthLogo" layout="fixed"/>
                            </div>
                        </div>

                        <div className={styles.iframeContainer}>
                                <iframe className={styles.iframe} src='https://ethglobal.tv'/>
                        </div>

                        <div className={styles.submissions}>
                            <a className={styles.text} href='https://forms.gle/i8jNtD2RJQxTSM3d8'>Submit your event here.</a>
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