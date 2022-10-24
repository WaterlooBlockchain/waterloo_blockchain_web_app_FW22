import styles from '../styles/Panel.module.css'
import Image from 'next/image'

export default function Panel(props){

    return (
        <div className={styles.container}>
            <div className={styles.header}>
                <div className={styles.icon}>
                    {props.icon}
                </div>
                <div className={styles.header_content}>
                    <p className={styles.subheader}>{props.subheader}</p>
                    <p className={styles.title}>{props.title}</p>          
                </div>
            </div>
            <div className={styles.body}>
                <p className={styles.content}>{props.content}</p>
            </div>
        </div>
    )
}