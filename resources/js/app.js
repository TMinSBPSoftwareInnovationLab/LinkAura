import './bootstrap';
import '../css/app.css';
import '../css/custom.css';

import axios from 'axios';
import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import { createPinia } from 'pinia';
import VueSweetalert2 from 'vue-sweetalert2';
import Vue3Toastify from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

import { ModuleRegistry, AllCommunityModule } from 'ag-grid-community';

// ✅ AG Grid
ModuleRegistry.registerModules([AllCommunityModule]);

// ✅ Axios default config (important for auth)
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// ✅ CSRF cookie
// axios.get('/sanctum/csrf-cookie');
await axios.get('/sanctum/csrf-cookie');

// 🚀 Inertia setup
createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob([
            './Pages/**/*.vue',
            './Views/**/*.vue',
            './Website/**/*.vue'
        ]);

        let path = `./Pages/${name}.vue`;

        // fallback if not found in Pages
        if (!pages[path]) {
            path = `./${name}.vue`;
        }

        return resolvePageComponent(path, pages);
    },

    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        const pinia = createPinia();

        app.use(plugin);
        app.use(pinia);
        app.use(VueSweetalert2);
        app.use(Vue3Toastify, {
            autoClose: 3000,
            position: "top-right",
        });

        // ✅ global components (optional but useful)
        app.component('Link', Link);
        app.component('Head', Head);

        app.mount(el);
    },

    progress: {
        color: '#4B5563', // top loading bar
    },
});