import { createRouter, createWebHistory } from 'vue-router'

// Dynamic Imports (Lazy Loading)
const Index = () => import('../WebSite/Index.vue');
const Login = () => import('../Views/Login.vue');
const ForgotPass = () => import('../Views/Forgot_pass.vue');
const Registration = () => import('../Views/Registration.vue');
const Dashboard = () => import('@/Pages/Dashboard.vue');
const Company_details = () => import('@/Pages/Components/Mini_website_components/Company_details.vue');
const Website_Temp_1 = () => import('@/Pages/Mini_Website_Pages/Website_Temp_1.vue');
const Website_Temp_2 = () => import('@/Pages/Mini_Website_Pages/Website_Temp_2.vue');
const Website_Temp_3 = () => import('@/Pages/Mini_Website_Pages/Website_Temp_3.vue');
const Website_Temp_4 = () => import('@/Pages/Mini_Website_Pages/Website_Temp_4.vue');
const Website_Temp_5 = () => import('@/Pages/Mini_Website_Pages/Website_Temp_5.vue');
const Website_Temp_6 = () => import('@/Pages/Mini_Website_Pages/Website_Temp_6.vue');
const Mini_Website_Temp = () => import('@/Pages/Components/Mini_website_components/Mini_Website_Temp.vue');
const Address = () => import('@/Pages/Components/Mini_website_components/Address.vue');
const Aboutus = () => import('@/Pages/Components/Mini_website_components/Aboutus.vue');
const MediaLinks = () => import('@/Pages/Components/Mini_website_components/MediaLinks.vue');
const Products = () => import('@/Pages/Components/Mini_website_components/Products.vue');
const Service = () => import('@/Pages/Components/Mini_website_components/Service.vue');
const Gallery = () => import('@/Pages/Components/Mini_website_components/Gallery.vue');
const PaymentDetails = () => import('@/Pages/Components/Mini_website_components/PaymentDetails.vue');
const FeedbackVerify = () => import('@/Pages/FeedbackVerify.vue');
const MiniWeb_enquiry = () => import('@/Pages/MiniWeb_enquiry.vue');


const routes = [
    { path: '/', component: Index, meta: { title: 'Home | LinkAura', public: true } },
    { path: '/login', component: Login, meta: { title: 'Login | LinkAura', public: true } },
    { path: '/ForgotPass', component: ForgotPass, meta: { title: 'Forgot Password | LinkAura', public: true } },
    { path: '/registration', component: Registration, meta: { title: 'Registration | LinkAura', public: true } },
    { path: '/dashboard', component: Dashboard, meta: { title: 'Dashboard | LinkAura' } },
    { path: '/Company_details', component: Company_details, meta: { title: 'Company Details | LinkAura' } },
    { path: '/Website_temp', component: Mini_Website_Temp, meta: { title: 'WebsiteTemp | LinkAura' } },
    { path: '/Address', component: Address, meta: { title: 'Address | LinkAura' } },
    { path: '/Aboutus', component: Aboutus, meta: { title: 'About Us | LinkAura' } },
    { path: '/MediaLinks', component: MediaLinks, meta: { title: 'Media Links | LinkAura' } },
    { path: '/Products', component: Products, meta: { title: 'Products | LinkAura' } },
    { path: '/Service', component: Service, meta: { title: 'Service | LinkAura' } },
    { path: '/Gallery', component: Gallery, meta: { title: 'Gallery | LinkAura' } },
    { path: '/PaymentDetails', component: PaymentDetails, meta: { title: 'Payment Details | LinkAura' } },
    { path: '/FeedbackVerify', component: FeedbackVerify, meta: { title: 'Feedback Verify | LinkAura' } },
    { path: '/MiniWebEnquiry', component: MiniWeb_enquiry, meta: { title: 'Feedback Verify | LinkAura' } },

    // { path: '/Website_Temp_6', component: Website_Temp_6,meta: { title: 'Website6 | LinkAura' } }, // for testing purpose

    {
        path: '/:company/Website_Temp_:themeIdEnc',
        name: 'DynamicWebsiteTemp',
        meta: { public: true },
        component: { render: () => null }, // Placeholder
        beforeEnter: async (to, from, next) => {
            try {
                const decodedId = atob(to.params.themeIdEnc);
                const map = {
                    1: Website_Temp_1,
                    2: Website_Temp_2,
                    3: Website_Temp_3,
                    4: Website_Temp_4,
                    5: Website_Temp_5,
                    6: Website_Temp_6,
                };

                if (!map[decodedId]) return next('/');

                // Dynamic Import load ஆன பிறகு component செட் செய்கிறோம்
                const component = await map[decodedId]();
                to.matched[0].components.default = component.default;
                next();
            } catch (error) {
                console.error("Invalid themeIdEnc or Import error:", error);
                next('/');
            }
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta && to.meta.title) { // dynamic title set
        document.title = to.meta.title;
    } else {
        document.title = "LinkAura";
    }
    // Check if user is logged in
    const isLoggedIn = localStorage.getItem("user");
    // If route is NOT public and user not logged in → redirect to login
    if (!to.meta.public && !isLoggedIn) {
        return next("/login");
    }
    next();
});

export default router;