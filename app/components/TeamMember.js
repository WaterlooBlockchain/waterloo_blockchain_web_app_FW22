import Image from 'next/image'
import styles from '../styles/TeamMember.module.css'

export default function TeamMember(props){
    return (
        <div className={styles.container}>
            <div className={styles.img_container}><Image className={styles.img} src={props.src} width={135} height={135} layout={'responsive'} key={props.name}></Image></div>
            <div className={styles.content}>
                <h1 className={styles.name}>{props.name}</h1>
                <p className={styles.title}>{props.title}</p>
            </div>
        </div>
    )
}