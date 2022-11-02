/** @type {import('next').NextConfig} */

const isDev = process.env.NODE_ENV === 'development'

const nextConfig = {
  assetPrefix: isDev ? './' : 'https://csclub.uwaterloo.ca/~uwblockchain/',
  reactStrictMode: true,
  swcMinify: true, 
  images: {
    loader: 'akamai',
    path: './'
  },
  optimizeFonts: false
}

export default nextConfig
