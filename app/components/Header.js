import Image from 'next/image'
import Link from 'next/link'
import styles from '../styles/Header.module.css'
import { useRouter } from 'next/router'

export default function Header(){
    const router = useRouter();
    return (
        <div className={styles.header_flex}>
            <div className={`${styles.flex_row} ${router.pathname == '/' ? styles.active : styles.flex_row}`}><Link href={'/'}><p>HOME</p></Link></div>
            <div className={`${styles.flex_row} ${router.pathname == '/olympihacks' ? styles.active : styles.flex_row}`}><Link href={'/olympihacks'}><p>OlYMPIHACKS</p></Link></div>
            <div className={`${styles.flex_row_icon}`}><Link href={'/'}><Image className={styles.flex_row_icon} src='/logo.png' width={63} height={71} layout={'fixed'}></Image></Link></div>
            <div className={`${styles.flex_row} ${router.pathname == '/eth' ? styles.active : styles.flex_row}`}><Link href={'/eth'}><p>ETHGLOBAL</p></Link></div>
            <div className={`${styles.flex_row} ${router.pathname == '/connect' ? styles.active : styles.flex_row}`}><Link href={'/connect'}><p>CONNECT</p></Link></div>
        </div>
    )
}