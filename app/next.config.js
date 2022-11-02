/** @type {import('next').NextConfig} */

const isDev = process.env.NODE_ENV === 'development'

const nextConfig = {
  trailingSlash: true,
  basePath: isDev ? '' : '/~uwblockchain',
  assetPrefix: isDev ? './' : 'https://csclub.uwaterloo.ca/~uwblockchain/',
  reactStrictMode: true,
  swcMinify: true, 
  images: {
    loader: 'akamai',
    path: isDev ? './' : '/~uwblockchain/'
  },
  optimizeFonts: false
}

export default nextConfig
