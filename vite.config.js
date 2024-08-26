import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      'vue': 'vue/dist/vue.esm-bundler.js'
    }
  },
  root: 'src/resources/js',
  build: {
    outDir: '../../../public/js',
    emptyOutDir: true,
    rollupOptions: {
      input: 'src/resources/js/main.js',
    },
  },
});
