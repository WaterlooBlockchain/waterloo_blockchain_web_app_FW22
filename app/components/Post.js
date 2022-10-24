import Image from 'next/image'
import Link from 'next/link'
import styles from '../styles/Post.module.css'
import Tagline from './Tagline'

export default function Post(props) {
    
    return (
        <div className={props.theme == 'dark' ? styles.container_dark : styles.container_light}>
            <div className={styles.header}>
                <Image className={styles.img} src={props.src} width={346.27} height={179.34} layout={'responsive'}></Image>            
            </div>
            <div className={[props.theme == 'dark' ? styles.body_dark : styles.body_light]}>  
                <div className={styles.tagline}>
                        <Tagline tags={props.tags}></Tagline>
                </div>
                <Link href='/blog'><p className={styles.title}>{props.title}</p></Link>
                <p className={styles.content}>{props.content}</p>
            </div>
        </div>
    )
}