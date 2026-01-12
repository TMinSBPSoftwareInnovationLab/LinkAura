<template>
    <div>
        <!-- Mobile Top Bar -->
        <div class="md:hidden flex justify-between items-center bg-[#000b57] text-white p-4">
            <span class="font-semibold text-lg">{{ username }}</span>

            <!-- Toggle Button (Right Side) -->
            <button @click="open = !open" class="text-white text-3xl">
                ☰
            </button>
        </div>

        <!-- Sidebar -->
        <aside
            :class="[
                'fixed md:static top-0 left-0 h-screen w-72 text-white shadow-xl z-50 transition-transform duration-300 flex flex-col md:w-full lg:md:w-full',
                open ? 'translate-x-0' : '-translate-x-full md:translate-x-0'
            ]"
            style="background: #000b57;"
        >
            <!-- Profile Section -->
            <div v-if="1==2" class="flex flex-col items-center pt-8 pb-5 px-4 border-0 border-b-1 border-b-white bg-white "> <!--bg-yellow-100-->
                <img
                    :src="logo"
                    class="w-50 h-30"
                />
                <h2 class="mt-3 text-xl font-semibold text-gray-800">{{ username }}</h2>
                <p class="text-sm text-blue-100 text-gray-800">{{ email }}</p>
            </div>

            <!-- Profile Section -->
            <div class="flex flex-col items-center pt-8 pb-5 px-4 border-0 border-b-1 border-b-white bg-white">
                
                <img :src="logo" class="w-50 h-30" />

                <!-- Username + Edit Button -->
                <div class="flex items-center gap-2 mt-3">
                    <h2 class="text-xl font-semibold text-gray-800">{{ username }}</h2>
                    <span class="text-gray-800">
                    <!-- Edit Icon Button -->
                    <button 
                         @click="goToProfileEdit" 
                        class="text-blue-600 hover:text-blue-800 transition"
                        title="Edit Profile"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="gray">
                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                        </svg>

                    </button>
                    </span>
                </div>

                <p class="text-sm text-gray-600">{{ email }}</p>
            </div>


            <!-- Menu Items -->
            <nav class="flex-1 px-2 overflow-y-auto scrollbar-hide scroll-smooth">
                <div class="space-y-2 pb-10">
                    <button v-if="1==2"
                        v-for="item in menu"
                        :key="item.name"
                        @click="active = item.name"
                        :class="[
                            'flex items-center gap-4 w-full px-4 py-3 rounded-lg transition-all duration-200',
                            active === item.name ? 'bg-white/20' : 'hover:bg-white/10'
                        ]"
                    >
                        <component :is="item.icon" class="w-6 h-6" />
                        <span class="text-base">{{ item.name }}</span>
                    </button>

                    <button
                        v-for="item in menu"
                        :key="item.name"
                        @click="navigate(item)"
                        :class="[
                            'flex items-center gap-4 w-full px-4 py-3 rounded-lg transition-all duration-200',
                            active === item.name ? 'bg-white/30 font-semibold' : 'hover:bg-white/10'
                        ]"
                    >
                        <component :is="item.icon" class="w-6 h-6" />
                        <span class="text-base">{{ item.name }}</span>
                    </button>

                </div>
            </nav>

            <!-- Logout Button -->
            <div class="px-4 pb-6">
                <button
                    @click="logout"
                    class="flex items-center gap-4 w-full px-4 py-3 rounded-lg bg-white/20 hover:bg-white/30 transition"
                >
                    <ShareIcon class="w-6 h-6" />
                    <span class="text-base">Log Out</span>
                </button>
                
            </div>
                <span class="bg-yellow-50 p-1">
                    <p class="text-gray-800 font-bold text-[12px] text-center">
                        © {{ new Date().getFullYear() }} LinkAura, a Digital Mini-Website & Smart Card Platform. All Rights Reserved.
                    </p>
                </span>
        </aside>
    </div>
</template>


<script>
import { ref, computed, onMounted } from "vue";
import logo from '@/assets/images/commonImages/linkAura_logo.png'
import { useRouter } from 'vue-router';

import {
    HomeIcon,
    CheckBadgeIcon,
    InboxStackIcon,
    CheckCircleIcon,
    XCircleIcon,
    BuildingOfficeIcon,
    MapPinIcon,
    InformationCircleIcon,
    LinkIcon,
    RectangleGroupIcon,
    WrenchScrewdriverIcon,
    PhotoIcon,
    CreditCardIcon,
} from "@heroicons/vue/24/outline";
export default {
    name: "SideNavBar",

    setup() {
        const router = useRouter();
        const open = ref(false);
        const active = ref("");
        const username = ref("User");
        const email = ref("user@gmail.com");
        const userImage = ref("/default-avatar.png");
        const menu = ref([]);

        const user = JSON.parse(localStorage.getItem('user') || '{}');
        const isAdmin = user?.id === 1;

        const allMenus = {
            dashboard: [
                { name: "Dashboard", icon: HomeIcon, url: "/dashboard" },
                { name: "Feedback Verify", icon: CheckBadgeIcon, url: "/FeedbackVerify" },
                { name: "Card Enquiries", icon: InboxStackIcon, url: '/MiniWebEnquiry' },
                ...(isAdmin
                ? [
                    { name: "Billing Success", icon: CheckCircleIcon },
                    { name: "Billing Failure", icon: XCircleIcon },
                  ]
                : []),
            ],

            company_details: [
                { name: "Company Details", icon: BuildingOfficeIcon, url: "/Company_details" },
                { name: "Website Template", icon: BuildingOfficeIcon, url: "/Website_temp" },
                { name: "Address", icon: MapPinIcon, url:"/Address" },
                { name: "About Us", icon: InformationCircleIcon, url:"/Aboutus"},
                { name: "Media Links", icon: LinkIcon, url: "/MediaLinks" },
                { name: "Products", icon: RectangleGroupIcon, url: "/Products" },
                { name: "Services", icon: WrenchScrewdriverIcon, url: "/Service" },
                { name: "Gallery", icon: PhotoIcon, url: "/Gallery" },
                { name: "Payment Details", icon: CreditCardIcon, url: "/PaymentDetails" },
            ],
        };
        
        const flatMenus = computed(() => {
            return Object.values(allMenus).flat();
        });

        // Fetch user from localStorage
        onMounted(() => {
            const currentPath = window.location.pathname;
            const currentMenu = flatMenus.value.find(item => item.url === currentPath);
            active.value = currentMenu ? currentMenu.name : "";
            console.log("active.value : ",currentMenu)
            const user = JSON.parse(localStorage.getItem("user"));
            if (user) {
                username.value = user.name ?? "User";
                email.value = user.email ?? "email@example.com";
                userImage.value = user.profile ?? "/default-avatar.png";
            }

            const path = window.location.pathname;

            // if (path === "/dashboard") {
            if(/^\/(dashboard|FeedbackVerify|MiniWebEnquiry)/.test(path)){
                menu.value = allMenus.dashboard;
            } 
            else if (/^\/(Company_details|Website_temp|Address|Aboutus|MediaLinks|Products|Service|Gallery|PaymentDetails)/.test(path)) {
                menu.value = allMenus.company_details;
            }
        });

        // all methods here
        const goToProfileEdit = async() => {
            const userData = JSON.parse(localStorage.getItem("user"));
            if(userData.id) {
                alert(userData.id)
            }
            else{
                alert(userData.id)
            }
        }

        // logout
        const logout = () => {
            localStorage.clear();
            window.location.href = "/";
        }

        const navigate = (item) => {
            active.value = item.name;
            router.push(item.url);
        };

        return {
            user,
            isAdmin,
            navigate,
            menu,
            logout,
            open,
            active,
            username,
            email,
            userImage,
            menu,
            logo,
            goToProfileEdit,
        };
    }
};
</script>

<style>
/* Hide scrollbar (Chrome, Edge, Safari) */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar (Firefox) */
.scrollbar-hide {
    scrollbar-width: none;
}

</style>