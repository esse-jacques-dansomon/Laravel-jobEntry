import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/lib/animate/animate.min.css',
                'resources/assets/lib/owlcarousel/assets/owl.carousel.css',
                'resources/assets/css/bootstrap.min.css',
                'resources/assets/css/style.css',
                'resources/assets/css/app.css',
                'resources/css/app.css',

                'resources/js/app.js',
                "https://code.jquery.com/jquery-3.4.1.min.js",
                "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js",
                'resources/assets/lib/wow/wow.min.js',
                'resources/assets/lib/easing/easing.min.js',
                'resources/assets/lib/waypoints/waypoints.min.js',
                'resources/assets/lib/owlcarousel/owl.carousel.min.js',
                'resources/assets/js/main.js',
                'resources/assets/js/app.js'

            ],
            refresh: true,
        }),
        vue(
            {
                template: {
                    base: null,
                    includeAbsolute: false,
                },

            }
        ),
    ],
    resolve: {
        alias: {
            ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),
        }
    }
});
