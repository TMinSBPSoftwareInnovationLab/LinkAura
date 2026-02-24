import { createRouter, createWebHistory } from 'vue-router'
import Index from '../WebSite/Index.vue';
import Login from '../Views/Login.vue';
import ForgotPass from '../Views/Forgot_pass.vue'
import Registration from '../Views/Registration.vue';
import Dashboard from '@/Pages/Dashboard.vue';
import Company_details from '@/Pages/Components/Mini_website_components/Company_details.vue';
import Website_Temp_2 from '@/Pages/Mini_Website_Pages/Website_Temp_2.vue';
import Website_Temp_1 from '@/Pages/Mini_Website_Pages/Website_Temp_1.vue';
import Website_Temp_3 from '@/Pages/Mini_Website_Pages/Website_Temp_3.vue';
import Website_Temp_4 from '@/Pages/Mini_Website_Pages/Website_Temp_4.vue';
import Website_Temp_5 from '@/Pages/Mini_Website_Pages/Website_Temp_5.vue';
import Website_Temp_6 from '@/Pages/Mini_Website_Pages/Website_Temp_6.vue';
import Mini_Website_Temp from '@/Pages/Components/Mini_website_components/Mini_Website_Temp.vue';
import Address from '@/Pages/Components/Mini_website_components/Address.vue';
import Aboutus from '@/Pages/Components/Mini_website_components/Aboutus.vue';
import MediaLinks from '@/Pages/Components/Mini_website_components/MediaLinks.vue';
import Products from '@/Pages/Components/Mini_website_components/Products.vue';
import Service from '@/Pages/Components/Mini_website_components/Service.vue';
import Gallery from '@/Pages/Components/Mini_website_components/Gallery.vue';
import PaymentDetails from '@/Pages/Components/Mini_website_components/PaymentDetails.vue';
import FeedbackVerify from '@/Pages/FeedbackVerify.vue';
import MiniWeb_enquiry from '@/Pages/MiniWeb_enquiry.vue';

const routes = [
    { path: '/', component: Index, meta: { title: 'Home | LinkAura', public: true } },
    { path: '/login', component: Login, meta: { title: 'Login | LinkAura', public: true } },
    { path: '/ForgotPass', component: ForgotPass, meta: { title: 'Forgot Password | LinkAura', public: true } },
    { path: '/registration', component: Registration, meta: { title: 'Registration | LinkAura', public: true } },
    { path: '/dashboard', component: Dashboard,meta: { title: 'Dashboard | LinkAura' } },
    { path: '/Company_details', component: Company_details,meta: { title: 'Company Details | LinkAura' } },
    { path: '/Website_temp', component: Mini_Website_Temp,meta: { title: 'WebsiteTemp | LinkAura' } },
    { path: '/Address', component: Address,meta: { title: 'Address | LinkAura' } },
    { path: '/Aboutus', component: Aboutus,meta: { title: 'About Us | LinkAura' } },
    { path: '/MediaLinks', component: MediaLinks,meta: { title: 'Media Links | LinkAura' } },
    { path: '/Products', component: Products,meta: { title: 'Products | LinkAura' } },
    { path: '/Service', component: Service,meta: { title: 'Service | LinkAura' } },
    { path: '/Gallery', component: Gallery,meta: { title: 'Gallery | LinkAura' } },
    { path: '/PaymentDetails', component: PaymentDetails,meta: { title: 'Payment Details | LinkAura' } },
    { path: '/FeedbackVerify', component: FeedbackVerify,meta: { title: 'Feedback Verify | LinkAura' } },
    { path: '/MiniWebEnquiry', component: MiniWeb_enquiry,meta: { title: 'Feedback Verify | LinkAura' } },

    // { path: '/Website_Temp_6', component: Website_Temp_6,meta: { title: 'Website6 | LinkAura' } }, // for testing purpose
    // { path: '/Website_Temp_1', component: Website_Temp_1,meta: { title: 'Website1 | LinkAura' } },
    // { path: '/Website_Temp_2', component: Website_Temp_2,meta: { title: 'Website2 | LinkAura' } },
    // { path: '/:company/Website_Temp_1', component: Website_Temp_1,meta: { title: 'Theme 1 | Digital Card', public: true} },
    // { path: '/:company/Website_Temp_2', component: Website_Temp_2,meta: { title: 'Theme 1 | Digital Card', public: true} },
    {
        path: '/:company/Website_Temp_:themeIdEnc',
        name: 'DynamicWebsiteTemp',
        meta: { public: true },
        component: { render: () => null },
        beforeEnter: (to, from, next) => {
            try {
                const decodedId = atob(to.params.themeIdEnc)

                const map = {
                    1: Website_Temp_1,
                    2: Website_Temp_2,
                    3: Website_Temp_3,
                    4: Website_Temp_4,
                    5: Website_Temp_5,
                    6: Website_Temp_6,
                }

                if (!map[decodedId]) return next('/')

                to.matched[0].components.default = map[decodedId]
                next()
            } catch (error){
                console.error("Invalid themeIdEnc:", error)
                next('/')
            }
        }
    }

    

];



const router = createRouter({
  history: createWebHistory(),
  routes,
})

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

export default router