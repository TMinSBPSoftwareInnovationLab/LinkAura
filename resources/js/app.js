import './bootstrap';
import '../css/app.css';
import '../css/custom.css'
import axios from 'axios';
import { createInertiaApp } from '@inertiajs/vue3'
import { createApp } from 'vue';
import App from './App.vue'
import router from './router/router';
import Index from './WebSite/Index.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import { createPinia } from 'pinia' 
import Vue3Toastify from 'vue3-toastify'
import 'vue3-toastify/dist/index.css';

import { ModuleRegistry, AllCommunityModule } from 'ag-grid-community';
// REGISTER MODULES (important)
ModuleRegistry.registerModules([AllCommunityModule]);
axios.get('/sanctum/csrf-cookie');

const app = createApp(App)
const pinia = createPinia()

app.use(pinia)
app.use(router)
app.use(VueSweetalert2);
app.use(Vue3Toastify, {
  autoClose: 3000,
  position: "top-right",
})

app.mount('#app')