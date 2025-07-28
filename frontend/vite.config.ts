import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

export default defineConfig({
  publicDir: 'public',   
  plugins: [react()],
  server: {
    host: '0.0.0.0',
    port: 3000,
    strictPort: true,
    hmr: false,
    proxy: {
      '/api': {
        target: 'http://backend:8000',
        changeOrigin: true,
        secure: false,
      },
    },
    fs: { strict: false },
    watch: { usePolling: true },
    allowedHosts: 'all',
  },
  resolve: { alias: { '@': '/src' } },
  build: { outDir: 'dist' },
})

