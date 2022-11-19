/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  swcMinify: true, 
  async redirects() {
    return [
      {
        source: '/openproject',
        destination: 'https://blockchain-group.cs.uwaterloo.ca/openproject/',
        permanent: true
      }
    ]
  }
}

export default nextConfig
