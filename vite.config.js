import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                "resources/css/nav.css",
                "resources/css/bottombar.css",
                "resources/css/auth.css",
                'resources/js/app.js',
                'resources/css/app.css',
                "resources/js/bootstrap.js",
                "resources/js/nav.js",
                'resources/sass/app.scss'
            ],
            refresh: true,
        }),
    ],
});
