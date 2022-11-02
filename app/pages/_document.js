import { Head, Html, Main, NextScript} from "next/document";

export default function Document() {
    return (
        <Html>
            <Head>
                <link rel="icon" href="./uw_blockchain.png" />
                <link rel="preconnect" href="https://fonts.googleapis.com" />
                <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin='true' />
                <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />                
                <meta content="width=device-width, initial-scale=1" />
        </Head>
        <body>
            <Main />
            <NextScript />
        </body>
        </Html>
        
    )
}