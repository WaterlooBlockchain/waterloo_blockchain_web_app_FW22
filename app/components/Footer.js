import Image from 'next/image'
import Link from 'next/link'
import styles from '../styles/Footer.module.css'
import { FaTwitter, FaInstagram, FaLinkedin, FaDiscord} from 'react-icons/fa'

const Footer = () => {

    return (
        <div className={styles.footer}>
            <div className={styles.container}>
                <div className={styles.logo}>
                    <Image src='/uw_blockchain.png' width={63} height={72} layout={'responsive'}></Image>
                </div>
                <div className={styles.text}>
                    <p className={styles.uwaterloo}>Waterloo</p>
                    <div className={styles.line}>
                        <h1 className={styles.blockchain}>Blockchain</h1>
                        <p className={styles.c}>© 2022</p>
                    </div>
                </div>
            </div>
            <div className={styles.socials}>
                <div className={styles.socials_button}><a href='https://twitter.com/wlooblockchain' target="_blank" rel="noreferrer"><FaTwitter className={styles.icons} /></a></div>
                <div className={styles.socials_button}><a href='https://www.instagram.com/waterlooblockchain/' target="_blank" rel="noreferrer"><FaInstagram className={styles.icons} /></a></div>
                <div className={styles.socials_button}><a href='https://www.linkedin.com/company/uwblockchainclub/?originalSubdomain=ch' target="_blank" rel="noreferrer"><FaLinkedin className={styles.icons} /></a></div>
                <div className={styles.socials_button}><a href='https://discord.gg/YCBA3n7Xn8' target="_blank" rel="noreferrer"><FaDiscord className={styles.icons} /></a></div>
            </div>
        </div>
    )
}

export default Footer;