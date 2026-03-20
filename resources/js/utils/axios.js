import axios from 'axios';
import { router } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';

// ✅ Base config
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.baseURL = window.location.origin;

// ✅ CSRF state
let csrfInitialized = false;

// ✅ Ensure CSRF cookie
async function ensureCsrf() {
    if (!csrfInitialized) {
        try {
            await axios.get('/sanctum/csrf-cookie');
            csrfInitialized = true;
        } catch (error) {
            console.error("CSRF init failed:", error);
        }
    }
}

// 🚀 REQUEST INTERCEPTOR
axios.interceptors.request.use(
    async (config) => {
        // ⚠️ avoid infinite loop
        if (!config.url.includes('/sanctum/csrf-cookie')) {
            await ensureCsrf();
        }

        return config;
    },
    (error) => Promise.reject(error)
);

// 🚀 RESPONSE INTERCEPTOR
axios.interceptors.response.use(
    (response) => response,

    (error) => {
        const status = error?.response?.status;

        // 🔥 419 CSRF expired
        if (status === 419) {
            csrfInitialized = false;
            toast.warning("Session expired. Refreshing...");

            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }

        // 🔥 401 Unauthorized
        if (status === 401) {
            toast.error("Unauthorized! Please login again.");

            setTimeout(() => {
                router.visit('/login');
            }, 1000);
        }

        // 🔥 403 Forbidden
        if (status === 403) {
            toast.error("Access denied!");
        }

        // 🔥 500 Server error
        if (status === 500) {
            toast.error("Server error! Try again later.");
        }

        return Promise.reject(error);
    }
);

// ✅ Export
export default axios;