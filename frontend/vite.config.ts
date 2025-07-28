import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

export default defineConfig({
  root: 'public',
  plugins: [react()],
  server: {
    host: true,
    port: 3000,
    strictPort: true,
    fs: {
      strict: false,
    },
    watch: {
      usePolling: true
    },
    allowedHosts: 'all'
  },
  preview: {
    port: 3000,
  },
  resolve: {
    alias: {
      '@': '/src',
    },
  },
  build: {
    outDir: 'dist',
  }
})
