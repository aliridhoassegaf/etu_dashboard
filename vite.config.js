import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/vireo/pages/maps-leaflet.js',
                'resources/js/pages/charts-apex-area.js',
                'resources/js/pages/charts-apex-bar.js',
                'resources/js/pages/charts-apex-financial.js',
                'resources/js/pages/charts-apex-line.js',
                'resources/js/pages/charts-apex-mixed.js',
                'resources/js/pages/charts-apex-pie.js',
                'resources/js/pages/charts-chartjs.js',
                'resources/js/pages/charts-echarts.js',
                'resources/js/pages/charts-sparklines.js',
                'resources/js/pages/crypto-exchange.js',
                'resources/js/pages/crypto-wallet.js',
                'resources/js/pages/dashboards-analytics.js',
                'resources/js/pages/dashboards-crm.js',
                'resources/js/pages/dashboards-crypto.js',
                'resources/js/pages/dashboards-ecommerce.js',
                'resources/js/pages/dashboards-finance.js',
                'resources/js/pages/dashboards-healthcare.js',
                'resources/js/pages/dashboards-hr.js',
                'resources/js/pages/dashboards-jobs.js',
                'resources/js/pages/dashboards-lms.js',
                'resources/js/pages/dashboards-nft.js',
                'resources/js/pages/dashboards-podcast.js',
                'resources/js/pages/dashboards-pos.js',
                'resources/js/pages/dashboards-projects.js',
                'resources/js/pages/dashboards-sales.js',
                'resources/js/pages/dashboards-school.js',
                'resources/js/pages/dashboards-social.js',
                'resources/js/pages/dashboards-stocks.js',
                'resources/js/pages/nft-nft-details.js',
                'resources/js/pages/widgets.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
