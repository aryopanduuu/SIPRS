import {
    defineConfig,
    loadEnv
} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({
    command,
    mode
}) => {
    const env = loadEnv(mode, process.cwd())
    return {
        plugins: [
            laravel({
                input: ['resources/js/app.js'],
                refresh: true,
            }),
            vue({
                template: {
                    TransformAssetUrls: {
                        base: null,
                        includeAbsolute: false
                    },
                },
            }),
        ],
        resolve: {
            alias: {
                'vue': 'vue/dist/vue.esm-bundler.js'
            },
        },
        server: {
            open: env.VITE_APP_URL
        }
    }
});
