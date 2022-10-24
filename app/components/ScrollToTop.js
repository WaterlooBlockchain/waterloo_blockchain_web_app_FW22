import { useEffect, useState } from "react";
import styles from '../styles/ScrollToTop.module.css';
import { FaArrowUp } from 'react-icons/fa';

export default function ScrollToTop () {
      const scrollToTop = () => {
        window.scrollTo({
          top: 0,
          behavior: 'smooth' // for smoothly scrolling
        });
      };

      const [showButton, setShowButton] = useState(false);

      useEffect(() => {
        window.addEventListener("scroll", () => {
          if (window.pageYOffset && window.innerWidth >= 1920) {
            setShowButton(true);
          } else {
            setShowButton(false);
          }
        });
        window.addEventListener("resize", () => {
          if (window.innerWidth < 1920) {
            setShowButton(false);
          }
        });
      }, []);
    
    return (
        <>
          {showButton && (
            <div className={styles.scroll_to_top}>
              <FaArrowUp className={styles.icon} onClick={scrollToTop}></FaArrowUp>
            </div>
        )}
      </>
    )
}