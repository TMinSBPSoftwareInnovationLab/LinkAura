<template>
    <main>
        <!-- header content area -->
        <div id="home" class="scroll-mt-[100px] grid grid-cols-1 md:grid-cols-2">
            <div class="flex flex-col md:flex-col p-6 justify-center">
                <div class="flex flex-col md:flex-col w-full">
                    <p class="px-5 py-5 text-[25px] md:text-[28px] font-bold text-md-custom-25">
                        Everything You Need To <br> Build Your <span class="text-[#dc143c]">Mini Website </span>
                    </p>
                    <p class="px-5 text-[18px] md:text-[20px] text-gray-400">
                        Powerful features designed to help you <span class="text-[#dc143c] font-semibold">create, customize, and share </span>your mini website effortlessly.
                    </p>
                </div>
                <div class="flex flex-col md:flex-col">
                    <p class="p-5 pt-0 pb-0 text-gray-4500">
                        Packages start at just ₹999.
                    </p>
                </div>
                <div class="flex flex-col md:flex-col p-5">
                    <router-link to="/login" target="_blank">
                        <button type="button" class="text-white bg-[#DC143C] box-border border border-transparent hover:bg-success-strong focus:ring-4 focus:success-subtle shadow-xs font-medium leading-5 rounded-full text-sm px-4 py-2.5 focus:outline-none w-50 uppercase">Create mini website</button>
                    </router-link>
                </div>
            </div>

            <div class="p-6">
                <img :src="homeImage" alt="Users" class="w-full">
            </div>
        </div>
        <!-- header content area /.-->

        <!-- Features section -->
        <!-- heading us image -->
        <div id="feature" class="scroll-mt-[100px] flex items-center justify-center w-full h-[200px] bg-fixed bg-center bg-no-repeat bg-cover relative overflow-hidden" 
            :style="{ 
                backgroundImage: `url(${aBG})`, 
                backgroundSize: 'cover',
                backgroundPosition: 'center'
            }"
        >
            <div class="absolute inset-0 bg-black/30"></div>

            <h1 class="custom-fade-in text-white items-center justify-center uppercase font-black px-5 tracking-[0.2em] text-3xl relative z-10 drop-shadow-lg">
                LinkAura Features
            </h1>
        </div>
        <!-- heading image -->

        <!-- content area -->
        <div  class="w-full "  :style="{ backgroundImage: `url(${fBG})`, backgroundSize: '100%', }">
            <div class="grid grid-cols-1 md:grid-cols-2 w-full max-w-7xl mx-auto py-16 gap-10">

                <!-- LEFT CONTENT -->
                <div class="flex flex-col justify-center w-full px-6 md:px-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                        Everything You Need to Build a Mini Website
                    </h2>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        No technical skills required. Build a professional mini website using
                        simple forms, ready-made templates, and instant live preview.
                    </p>

                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center gap-3">
                            <DocumentTextIcon class="size-5 text-[#780e7a]" /> Easy form-based setup
                        </li>
                        <li class="flex items-center gap-3">
                            <DevicePhoneMobileIcon class="size-5 text-[#780e7a]" /> Mobile-friendly design
                        </li>
                        <li class="flex items-center gap-3">
                            <ShareIcon class="size-5 text-[#780e7a]" /> One smart shareable link
                        </li>
                    </ul>
                    <router-link to="/login" target="_blank">
                        <button class="mt-8 w-fit bg-[#dc143c] text-white px-8 py-3 rounded-xl shadow-lg hover:bg-[#780e7a]  transition" >
                            Create Mini Website
                        </button>
                    </router-link>
                </div>
                <!-- LEFT /. -->

                <!-- RIGHT FEATURE CARDS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 px-6 md:px-10">

                    <!-- Feature Card -->
                    <div
                        class="group bg-white border border-gray-200 rounded-2xl p-6
                            shadow-sm hover:shadow-xl transition duration-300"
                    >
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-xl
                                bg-indigo-50 text-[#681c6a]
                                group-hover:bg-[#681c6a] group-hover:text-white transition"
                        >
                            📱
                        </div>

                        <h3 class="mt-4 text-lg font-semibold text-[#681c6a]">
                            Mobile Friendly
                        </h3>

                        <p class="mt-2 text-[#681c6a] text-sm">
                            Looks perfect on mobile, tablet, and desktop devices.
                        </p>
                    </div>

                    <!-- Feature Card -->
                    <div class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-xl transition">
                        <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-[#681c6a] group-hover:bg-[#681c6a] group-hover:text-white transition">
                            🎨
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-gray-900">
                            Multiple Templates
                        </h3>
                        <p class="mt-2 text-gray-600 text-sm">
                            Choose from modern, business-ready templates.
                        </p>
                    </div>

                    <!-- Feature Card -->
                    <div class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-xl transition">
                        <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-[#681c6a] group-hover:bg-[#681c6a] group-hover:text-white transition">
                            🔗
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-gray-900">
                            One Smart Link
                        </h3>
                        <p class="mt-2 text-gray-600 text-sm">
                            Share all your business details using one link.
                        </p>
                    </div>

                    <!-- Feature Card -->
                    <div class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-xl transition">
                        <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-[#681c6a] group-hover:bg-[#681c6a] group-hover:text-white transition">
                            📨
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-gray-900">
                            Enquiry & Leads
                        </h3>
                        <p class="mt-2 text-gray-600 text-sm">
                            Collect customer enquiries and feedback easily.
                        </p>
                    </div>

                </div>
                <!-- RIGHT /. -->
            </div>
        </div>
        <!-- content area /. -->
        <!-- Features section /. -->

        <!-- how it works -->
        <div id="howItWork" class="scroll-mt-[100px] flex bg-gray-50">
            <div class="container max-w-6xl mx-auto ">
                <!-- Header Section -->
                <header class="text-center mb-12 p-10">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">How It Works</h1>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                        Follow three easy steps to create and publish your mini website instantly.
                    </p>
                </header>

                <!-- Process Steps Section -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-16">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center text-center mb-10 md:mb-0 md:w-1/3 px-4">
                        <div
                            class="w-20 h-20 rounded-full bg-blue-100
                                flex items-center justify-center mb-6
                                shadow-[inset_-4px_-4px_8px_rgba(255,255,255,0.9),_6px_6px_14px_rgba(0,0,0,0.18)]"
                        >
                            <div
                                class="w-14 h-14 rounded-full bg-white
                                    flex items-center justify-center
                                    shadow-[0_10px_20px_rgba(0,0,0,0.25)]
                                    transform translate-y-[-1px]"
                            >
                                <UserIcon class="w-6 h-6 text-[#780e7a]" />
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Register & Login</h3>
                        <p class="text-gray-600">
                            Create your account using email or mobile number and login to your dashboard.
                        </p>
                    </div>

                    <!-- Connecting Line (Desktop Only) -->
                    <div class="hidden md:block h-1 w-24 bg-blue-200 -mt-10"></div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center text-center mb-10 md:mb-0 md:w-1/3 px-4">
                        <div
                            class="w-20 h-20 rounded-full bg-green-200
                                flex items-center justify-center mb-6
                                shadow-[inset_-4px_-4px_8px_rgba(255,255,255,0.9),_6px_6px_14px_rgba(0,0,0,0.18)]"
                        >
                            <div
                                class="w-14 h-14 rounded-full bg-white
                                    flex items-center justify-center
                                    shadow-[0_10px_20px_rgba(0,0,0,0.25)]
                                    transform translate-y-[-1px]"
                            >
                                <DocumentIcon class="w-6 h-6 text-[#780e7a]" />
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Fill Your Business Details</h3>
                        <p class="text-gray-600">
                            Add company info, services, products, social links, enquiry form, and feedback.
                        </p>
                    </div>

                    <!-- Connecting Line (Desktop Only) -->
                    <div class="hidden md:block h-1 w-24 bg-green-200 -mt-10"></div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center text-center md:w-1/3 px-4">
                        <div
                            class="w-20 h-20 rounded-full bg-purple-200
                                flex items-center justify-center mb-6
                                shadow-[inset_-4px_-4px_8px_rgba(255,255,255,0.9),_6px_6px_14px_rgba(0,0,0,0.18)]"
                        >
                            <div
                                class="w-14 h-14 rounded-full bg-white
                                    flex items-center justify-center
                                    shadow-[0_10px_20px_rgba(0,0,0,0.25)]
                                    transform translate-y-[-1px]"
                            >
                                <ShareIcon class="w-6 h-6 text-[#780e7a]" />
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Publish & Share</h3>
                        <p class="text-gray-600">
                            Choose your favorite template, publish your mini website, and share your link anywhere.
                        </p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="w-24 h-1 bg-gray-300 mx-auto mb-16"></div>

            </div>
        </div>
        <!-- how it works /. -->

        <!-- templates --> 
        <div id="webTemp" class="scroll-mt-[100px] flex flex-col w-full bg-gradient-to-r from-[#fcf7f4] to-[#fbe8da] pb-10">
            <div class="max-w-6xl mx-auto relative" @mouseenter="pause" @mouseleave="play" >
                <div class="flex items-center justify-center gap-4 mb-10 pt-5">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-center
                            bg-gradient-to-r from-[#1d082d] to-[#c11e43]
                            bg-clip-text text-transparent tracking-tight uppercase px-4
                            text-shadow-yellow-300
                            ">
                        Templates
                    </h2>
                </div>

                <!-- template image area -->
                <div class="overflow-hidden">
                    <div
                        class="flex transition-transform duration-500 ease-out"
                        :style="{ transform: `translateX(-${index * slideWidth}%)` }"
                    >
                            <div
                            v-for="(item, i) in collectTemp"
                            :key="i"
                            class="w-full md:w-1/3 flex-shrink-0 p-4"
                            >
                            <div class="bg-white rounded-xl shadow-lg p-2">
                                <img :src="item" class="w-full h-full object-contain" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LEFT -->
                <button
                @click="prev" class="absolute top-1/2 left-3 -translate-y-1/2 -translate-x-2 md:-translate-x-6 bg-white p-3 rounded-full shadow-lg z-10 border-1 border-gray-800">
                    <ChevronLeftIcon class="w-6 h-6" />
                </button>

                <!-- RIGHT -->
                <button @click="next" class="absolute top-1/2 right-3 -translate-y-1/2 translate-x-2 md:translate-x-6 bg-white p-3 rounded-full shadow-lg z-10 border-1 border-gray-800" >
                    <ChevronRightIcon class="w-6 h-6" />
                </button>

                <!-- DOTS -->
                <div class="flex justify-center mt-8 space-x-2">
                    <button
                        v-for="i in totalDots"
                        :key="i"
                        @click="goTo(i - 1)"
                        class="h-3 rounded-full transition-all duration-300"
                        :class="index === i - 1 ? 'w-8 bg-blue-900' : 'w-3 bg-gray-300'"
                    />
                </div>
            </div>
        </div>
        <!-- templates /. -->

        <!-- pricing -->
        <div id="pricing" class="scroll-mt-[100px] flex flex-col w-full">
            <div class="bg-[#0b1f4a] py-20">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-0 px-4">
                    <!-- BASIC -->
                    <div class="relative bg-white rounded-xl shadow-lg flex md:scale-92">
                    <!-- Price bar -->
                    <div class="w-14 bg-red-600 flex items-center justify-center rounded-l-xl">
                        <span class="text-white text-sm font-semibold rotate-[-90deg] whitespace-nowrap">
                        <!-- ₹1,239 <br> (₹1,050 + ₹189 GST) / 3 Months -->
                         ₹999 / 3 Months
                        </span>
                    </div>

                    <div class="flex-1 px-2 py-5">
                        <div class="flex flex-col w-full text-center p-5">
                            <h3 class="text-3xl font-semibold text-red-500 mb-6">Basic</h3>
                        </div>
                        <div class="flex flex-col w-full px-2 pt-0">
                            <ul class="text-[15px] font-semibold leading-loose">
                                <li>🛍️ Add up to 5 Products </li>
                                <li>🛠️ Add up to 5 Services</li>
                                <li>🖼️ Upload 5 Gallery Images</li>
                                <li>🔄 Unlimited Updates</li>
                                <li>✍ Customer Enquiry Section</li>
                                <li>⭐ Customer Feedback Section</li>
                                <li>🎨 Custom Theme Colors</li>
                                <li>🔥 Trending Tags to boost sales</li>
                                <li>✨ New Arrival Labels for fresh stock</li>
                                <li>📤 Social Media Sharing:
                                    <ul class="px-10">
                                        <li>Facebook Share</li>
                                        <li>Instagram Share</li>
                                        <li>WhatsApp Share</li>
                                    </ul>
                                </li>
                                <li>📞 One-Touch Actions:
                                    <ul class="px-10">
                                        <li>Direct Call</li>
                                        <li>Direct WhatsApp Chat</li>
                                        <li>Direct Email Contact</li>
                                    </ul>
                                </li>
                                <li>🔓 Access: Dashboard active for 30 days post-expiry</li>
                                <li>📩 Enquiries: Leads collected & saved; renew to unlock</li>
                            </ul>
                        </div>
                        <div class="flex flex-col text-center p-5">
                            <router-link to="/login" target="_blank">
                                <button class="mt-8 bg-red-600 text-white px-6 py-2 rounded-full text-sm font-semibold">
                                BUY NOW
                                </button>
                            </router-link>
                        </div>
                    </div>
                    </div>

                    <!-- STANDARD -->
                    <div class="relative bg-white rounded-xl shadow-lg flex shadow-3xl">
                        <!-- Price bar -->
                        <div class="w-14 bg-[#681c6a] flex items-center justify-center rounded-l-xl">
                            <span class="text-white text-sm font-semibold rotate-[-90deg] whitespace-nowrap">
                            <!-- ₹2,124 <br>(₹1,800 + ₹324 GST) / 6 Months -->
                             ₹1499 / 6 Months
                            </span>
                        </div>

                        <div class="flex-1 px-2 py-5">
                            <div class="flex flex-col w-full text-center p-5">
                                <h3 class="text-3xl font-semibold text-gray-700 mb-6">Standard</h3>
                            </div>
                            <div class="flex flex-col w-full px-2 pt-0">
                                <ul class="text-[15px] font-semibold leading-loose">
                                    <li>🛍️ Add up to 15 Products </li>
                                    <li>🛠️ Add up to 15 Services</li>
                                    <li>🖼️ Upload 15 Gallery Images</li>
                                    <li>🔄 Unlimited Updates</li>
                                    <li>✍ Customer Enquiry Section</li>
                                    <li>⭐ Customer Feedback Section</li>
                                    <li>🎨 Custom Theme Colors</li>
                                    <li>🔥 Trending Tags to boost sales</li>
                                    <li>✨ New Arrival Labels for fresh stock</li>
                                    <li>📤 Social Media Sharing:
                                        <ul class="px-10">
                                            <li>Facebook Share</li>
                                            <li>Instagram Share</li>
                                            <li>WhatsApp Share</li>
                                        </ul>
                                    </li>
                                    <li>📞 One-Touch Actions:
                                        <ul class="px-10">
                                            <li>Direct Call</li>
                                            <li>Direct WhatsApp Chat</li>
                                            <li>Direct Email Contact</li>
                                        </ul>
                                    </li>
                                    <li>🔓 Access: Dashboard active for 60 days post-expiry</li>
                                    <li>📩 Enquiries: Leads collected & saved; renew to unlock</li>
                                </ul>
                            </div>
                            <div class="flex flex-col text-center p-5">
                                <router-link to="/login" target="_blank">
                                    <button class="mt-8 bg-[#681c6a] text-white px-6 py-2 rounded-full text-sm font-semibold">
                                    BuY NOW
                                    </button>
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <!-- PREMIUM -->
                    <div class="relative bg-white rounded-xl shadow-lg flex md:scale-92">
                        <!-- Price bar -->
                        <div class="w-14 bg-green-600 flex items-center justify-center rounded-l-xl">
                            <span class="text-white text-sm font-semibold rotate-[-90deg] whitespace-nowrap">
                            <!-- ₹3,540 <br>(₹3,000 + ₹540 GST) / 12 Months -->
                             ₹2,999 / 12 Months
                            </span>
                        </div>

                        <div class="flex-1 px-2 py-5">
                            <div class="flex flex-col w-full text-center p-5">
                                <h3 class="text-3xl font-semibold text-gray-700 mb-6">Premium</h3>
                            </div>
                            <div class="flex flex-col w-full px-2 pt-0">
                                <ul class="text-[15px] font-semibold leading-loose">
                                    <li>🛍️ Add up to 30 Products </li>
                                    <li>🛠️ Add up to 30 Services</li>
                                    <li>🖼️ Upload 30 Gallery Images</li>
                                    <li>🔄 Unlimited Updates</li>
                                    <li>✍ Customer Enquiry Section</li>
                                    <li>⭐ Customer Feedback Section</li>
                                    <li>🎨 Custom Theme Colors</li>
                                    <li>🔥 Trending Tags to boost sales</li>
                                    <li>✨ New Arrival Labels for fresh stock</li>
                                    <li>📤 Social Media Sharing:
                                        <ul class="px-10">
                                            <li>Facebook Share</li>
                                            <li>Instagram Share</li>
                                            <li>WhatsApp Share</li>
                                        </ul>
                                    </li>
                                    <li>📞 One-Touch Actions:
                                        <ul class="px-10">
                                            <li>Direct Call</li>
                                            <li>Direct WhatsApp Chat</li>
                                            <li>Direct Email Contact</li>
                                        </ul>
                                    </li>
                                    <li>🔓 Access: Dashboard active for 90 days post-expiry</li>
                                    <li>📩 Enquiries: Leads collected & saved; renew to unlock</li>
                                </ul>
                            </div>
                            <div class="flex flex-col text-center p-5">
                                <router-link to="/login" target="_blank">
                                    <button class="mt-8 bg-green-600 text-white px-6 py-2 rounded-full text-sm font-semibold">
                                    BUY NOW
                                    </button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pricing /. -->

        <!-- footer -->
        <div class="flex flex-col w-full">
            <p class="text-gray-800 font-bold text-[12px] text-center p-10">
                © {{ new Date().getFullYear() }} LinkAura, a Digital Mini-Website & Smart Card Platform. All Rights Reserved.
            </p>
        </div>
        <!-- footer /. -->
    </main>
    
</template>

<script>
    import homeImage from '@/assets/images/websiteImages/home_page_image1.png'
    import aBG from '@/assets/images/mini_website/com_images/bg1.jpg'
    import template1 from '@/assets/images/websiteImages/templates/website1_thumb1.png'
    import template2 from '@/assets/images/websiteImages/templates/website2_thumb1.png'
    import template3 from '@/assets/images/websiteImages/templates/website3_thumb1.png'
    import template4 from '@/assets/images/websiteImages/templates/website4_thumb1.png'
    import fBG from '@/assets/images/mini_website/com_images/bg6.jpg'
    import { PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon, ChevronLeftIcon, ChevronRightIcon, UserIcon, DocumentIcon ,ShareIcon, DocumentTextIcon, DevicePhoneMobileIcon } from '@heroicons/vue/24/solid'

    import { ref, computed, onMounted, onBeforeUnmount } from 'vue'

    export default {
        name: 'WebMainPage',
        components: {PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon, ChevronLeftIcon, ChevronRightIcon, UserIcon, DocumentIcon ,ShareIcon, DocumentTextIcon, DevicePhoneMobileIcon},
        setup() {
            const collectTemp = [
                template1,
                template2,
                template3,
                template4,
            ]

            const index = ref(0)
            const slideWidth = ref(100)
            let interval = null

            const slidesPerView = () => (window.innerWidth >= 768 ? 3 : 1)

            const updateWidth = () => {
                slideWidth.value = 100 / slidesPerView()
            }

            const maxIndex = computed(() => {
                return collectTemp.length - slidesPerView()
            })

            const next = () => {
                index.value = index.value < maxIndex.value ? index.value + 1 : 0
            }

            const prev = () => {
                index.value = index.value > 0 ? index.value - 1 : maxIndex.value
            }

            const goTo = (i) => {
                ndex.value = i
            }

            const play = () => {
                interval = setInterval(next, 4000)
            }

            const pause = () => {
                clearInterval(interval)
            }

            onMounted(() => {
                updateWidth()
                window.addEventListener('resize', updateWidth)
                play()
            })

            onBeforeUnmount(() => {
                pause()
                window.removeEventListener('resize', updateWidth)
            })

            return {
                fBG,
                homeImage,
                aBG,
                collectTemp,
                index,
                slideWidth,
                totalDots: maxIndex.value + 1,
                next,
                prev,
                goTo,
                play,
                pause,
            }
        },
    }
</script>


<style>
    @media (min-width: 768px) and (max-width: 805px) {
        .text-md-custom-25 {
            font-size: 25px !important;
        }
    }
</style>