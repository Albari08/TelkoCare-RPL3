import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import laravel from 'laravel-vite-plugin';
import autoprefixer from 'autoprefixer';

export default defineConfig({
  plugins: [
    react(),
    laravel({
      input: [
        'resources/js/app.jsx',
        'resources/sass/app.scss',
        'resources/css/style.css'
      ],
      refresh: true,
    })
  ],
  css: {
    preprocessorOptions: {
      scss: {
        // additionalData: `@import "resources/sass/app.scss";` // Remove if not needed
      }
    },
    postcss: {
      plugins: [
        autoprefixer
      ]
    }
  },
  build: {
    outDir: 'public',
    rollupOptions: {
      input: {
        app: 'resources/js/app.jsx',
        style: 'resources/css/style.css',
        sass: 'resources/sass/app.scss'
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: 'css/[name].[ext]'
      }
    },
    esbuild: {
      loader: 'jsx',
      include: /resources\/js\/.*\.[jt]sx?$/,
      exclude: [],
    },
  },
  server: {
    open: true,
    port: 3000,
    historyApiFallback: true
  }
});
