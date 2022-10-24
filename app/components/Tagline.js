import Image from 'next/image'
import Link from 'next/link'
import styles from '../styles/Post.module.css'


export default function Tagline(props){
    let tags= [];
    for (const i in props.tags) {
        tags.push(
            <div className={styles.tag}>
                {props.tags[i]}
            </div>
            )
        }
    return (
        tags
    )
}