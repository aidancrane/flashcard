import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/sass/app.scss",
                "resources/sass/_variables.scss",
                "resources/js/app.js",
                "resources/js/set-editor-flashcard-manager.js",
                "resources/js/set-editor-metadata.js",
                "resources/js/test-mode-viewer.js",
                "resources/js/charts.js",
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: '127.0.0.1',
        },
    watch: {
        usePolling: true, // Enable polling for file changes
        interval: 1000,   // Polling interval in milliseconds
      },
    },
    resolve: {
        alias: {
          '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
});