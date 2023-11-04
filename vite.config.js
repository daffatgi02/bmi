import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
                "resources/js/auth.js",
                "resources/css/nav.css",
                "resources/js/nav.js"
            ],
            refresh: true,
        }),
    ],
});
