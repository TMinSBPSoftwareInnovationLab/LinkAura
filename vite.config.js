import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            '@assets': path.resolve(__dirname, 'resources/assets'),
        },
    },
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true, // Fail if port already in use
        cors: true,       // Allow cross-origin requests
        hmr: {
            host: '192.168.1.117',
        },
    },
});
