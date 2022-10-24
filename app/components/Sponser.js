import Image from 'next/image'
import Link from 'next/link'
import styles from '../styles/Sponser.module.css'

export default function Sponser() {
    
    return (
        <div className={styles.container}>
            <div className={styles.img}>
            <a href='/sponsership.pdf' download><Image src='/sponsership_package.png' width={105} height={138} layout={'responsive'}></Image></a>
            </div>
            <div className={styles.content}>
                <h1 className={styles.title}>Work With Us</h1>
                <p className={styles.text}>We are currently seeking partners who can provide any or all the following: employment oppoprtunities, mentorship, educational resources and support; event planning/financing, as well as contribute to our strategic plan. </p>
                <a href='/sponsership.pdf' className={styles.download} download>Download our sponsership package</a>
            </div>
        </div>
    )
}