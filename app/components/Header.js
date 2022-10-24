import Image from 'next/image'
import Link from 'next/link'
import styles from '../styles/Header.module.css'
import { useRouter } from 'next/router'

export default function Header(){
    const router = useRouter();
    return (
        <div className={styles.header_flex}>
            <div className={`${styles.flex_row} ${router.pathname == '/' ? styles.active : styles.flex_row}`}><Link href={'/'}><p>HOME</p></Link></div>
            <div className={`${styles.flex_row} ${router.pathname == '/about' ? styles.active : styles.flex_row}`}><Link href={'/about'}><p>ABOUT</p></Link></div>
            <div className={`${styles.flex_row_icon}`}><Link href={'/'}><Image className={styles.icon} src='/uw_blockchain.png' width={63} height={71}></Image></Link></div>
            <div className={`${styles.flex_row} ${router.pathname == '/blog' ? styles.active : styles.flex_row}`}><Link href={'/blog'}><p>BLOG</p></Link></div>
            <div className={`${styles.flex_row} ${router.pathname == '/connect' ? styles.active : styles.flex_row}`}><Link href={'/connect'}><p>CONNECT</p></Link></div>
        </div>
    )
}