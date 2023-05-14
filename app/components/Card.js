import styles from '../styles/Card.module.css'
import Image from 'next/image'

const Card = ( props ) => {
  // set the status based on whether the event is in the past or not
  const today = new Date();
  const eventDate = new Date(props.date);
  const isPastEvent = today > eventDate;
  const status = isPastEvent ? 'COMPLETED' : 'UPCOMING';

  return (
    <div className={styles.card}>
      <div className={styles.cardImage}>
        <img src={props.imageUrl} alt={props.title} />
      </div>
      <div className={styles.cardText}>
        <h2>{props.title}</h2>
        <p className={styles.cardDescription}> {props.description}</p>
        <div className={styles.line}></div>
        <p><Image classname={styles.cardImg} src="/calendar-icon.png" width={13} height={13} alt="Calendar" layout="fixed"/> {props.date} {props.time}</p>
        <p><Image classname={styles.cardImg} src="/location-icon.png" width={13} height={13} alt="Location" layout="fixed"/>{props.location}</p>
      </div>
      <div className={styles.cardStatus}>
        <p>{status}</p>
      </div>
    </div>
  )
}

export default Card
