import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        minify: 'esbuild', // Compacta o JavaScript nativamente
        cssMinify: true,   // Remove todos os espaços e quebras do CSS
        reportCompressedSize: false,
        chunkSizeWarningLimit: 1000,
    }
});