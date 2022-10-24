import Image from "next/image";
import styles from '../styles/Partnership.module.css'

export default function Partnership(props){
    return (
        <div className={styles.partnership}>
            <a href={props.link}><img src={props.src} className={props.name ? styles.partner_img : styles.partner_img_lg} width={64} height={64}></img></a>
            <a href={props.link}><h1 className={styles.partner_name}>{props.name}</h1></a>
        </div>
    )
}