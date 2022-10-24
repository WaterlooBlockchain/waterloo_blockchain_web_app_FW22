import styles from '../styles/PastEvents.module.css'

export default function PastEvents(props){

    return (
        <div className={styles.container}>
            <h1 className={styles.title}>{props.title}</h1>
            <p className={styles.date}>{props.date}</p>
            <p className={styles.content}>{props.content}</p>
        </div>
    )
}