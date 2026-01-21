<template>
    <main class="p-2 px-0 bg-gray-50 border-2 border-[#6b3f69]">
        <div class="max-w-[430px] pb-0 mx-auto grid grid-cols-1  bg-center bg-cover bg-no-repeat ">
            <!-- purchase message -->
             <div class="border-1 border-b-gray-400 border-t-0 border-l-0 border-r-0 justify-center items-center flex flex-col w-full bg-white p-2" v-if="!is_purchased">
                <p class="font-semibold text-[14px] text-geay-500">
                    After purchasing a paid plan, you can share this card with others.
                </p>
                <button  @click="gotoPlanPopup()"
                class="mt-2 w-[150px] text-gray bg-transparent border-1 border-[#2A7B9B] text-[#3d023a] py-2 rounded-xl transition hover:bg-[#2A7B9B] hover:text-white" >
                    Buy Paid Plan
                </button>
             </div>
            <!-- purchase message /. -->
             
            <!-- company details with contact details -->
             <div id="home" class="flex flex-col w-full">
                <!-- image section -->
                 <div class="flex flex-col justify-center items-center p-5 ">
                    <!-- <img  :src="defaultLogo" class="w-[200px] h-[200px] object-contain border-2 border-gray-200 rounded-full shadow-xl
                    " /> -->

                    <span v-if="logoImage">
                            <!-- <img :src="logo_path" alt="deafultLogo" class="w-[120px] h-[120px]"></img> -->
                             <div class="flex p-5 items-center justify-center text-center">
                                <img :src="logoImage" alt="defaultLogo" class="w-[150px] h-[150px] object-contain border-2 border-gray-200 rounded-full shadow-xl " />
                            </div>
                        </span>
                        <span v-else>
                                <img  :src="defaultLogo" class="w-[200px] h-[200px] object-contain border-2 border-gray-200 rounded-full shadow-xl " />
                        </span>
                 </div>
                <!-- image section /. -->
                
                <!-- company details and owners section -->
                <div class="flex flex-col text-center justify-center items-center p-5">
                    <p class="text-[15px] md:text-[18px] font-semibold uppercase">{{ companyName || "LinkAura" }}</p>
                    <p class="text-[14px] md:text-[16px] font-semibold">{{  ownerName || "B.Velan" }}</p>
                    <p class="text-[13px] md:text-[14px] font-semibold">{{ designation || "Managing Director" }}</p>
                </div>
                <!-- company details and owners section -->

                <!-- media links -->
                <div class="flex flex-col gap-3 mb-5 px-5 items-center">

                    <div class="flex items-center gap-4">

                        <!-- Facebook -->
                        <a :href="`${fb_link}`" target="_blank"
                        class="w-10 h-10 rounded-lg bg-[#3d023a] flex justify-center items-center hover:bg-[#1877F2] transition">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="white" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1 
                                .9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.3l-.4 3h-1.9v7A10 10 0 0 0 22 12"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a :href="`${inst_link}`" target="_blank"
                        class="w-10 h-10 rounded-lg bg-[#3d023a] flex justify-center items-center hover:bg-gradient-to-tr from-[#f9ce34] via-[#ee2a7b] to-[#6228d7] transition">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="white" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 
                                5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 
                                1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 
                                3.5A4.5 4.5 0 1 0 16.5 12 4.5 4.5 0 0 0 12 
                                7.5zm0 7.3A2.8 2.8 0 1 1 14.8 12 2.8 2.8 0 0 1 12 14.8zm4-8.9a1.1 1.1 0 
                                1 1-1.1-1.1 1.1 1.1 0 0 1 1.1 1.1z"/>
                            </svg>
                        </a>

                        <!-- WhatsApp -->
                        <a :href="`https://wa.me/${whatsappNo}`" target="_blank"
                        class="w-10 h-10 bg-[#3d023a] rounded-lg flex justify-center items-center hover:bg-[#25d366] transition">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="white" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M20 3.5A10.5 10.5 0 1 0 4.2 17.9L3 22l4.3-1.1A10.5 10.5 
                                0 1 0 20 3.5zm-8.6 15.1a8.3 8.3 0 0 1-4.2-1.2l-.3-.2-2.5.6.7-2.4-.2-.3A8.2 
                                8.2 0 1 1 11.4 18.6zm4.4-6.2c-.2-.1-1.3-.6-1.5-.7s-.4-.1-.6.1-.6.7-.7.8-.3.1-.6 
                                0a6.7 6.7 0 0 1-3.3-3 3.6 3.6 0 0 1-.4-.8c0-.2 0-.4.2-.6l.7-.8c.1-.2.1-.3 
                                0-.5L9.2 6c-.1-.2-.3-.4-.5-.4h-.5c-.2 0-.5.1-.7.3-.8.7-1.1 1.8-.7 
                                3a8.8 8.8 0 0 0 4.3 4.7c.6.3 1.2.5 1.6.6a3.8 3.8 0 0 0 1.7.1c.5-.1 1.3-.6 
                                1.5-1.1s.2-.9.1-1.1-.2-.2-.4-.3z"/>
                            </svg> -->

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                                <path d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.78.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-1.99-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.22.25-.86.85-.86 2.07 0 1.22.89 2.4 1.01 2.56.12.17 1.75 2.67 4.23 3.74.59.26 1.05.41 1.41.52.59.19 1.13.16 1.56.1.48-.07 1.47-.6 1.67-1.18.21-.58.21-1.07.15-1.18s-.22-.16-.47-.28z"/>
                            </svg>
                        </a>

                    </div>
                </div>
                <!-- media links /. -->


                <!-- contact and address section -->
                <div class="flex flex-col gap-4 p-5 bg-[#3d023a] text-white w-full max-w-[430px]">
                    <!-- Phone -->
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h.75a2.25 2.25 0 002.25-2.25v-2.977a1.125 1.125 0 00-.852-1.091l-4.548-1.137a1.125 1.125 0 00-1.11.331l-.97 1.08a11.252 11.252 0 01-4.503-4.504l1.08-.97a1.125 1.125 0 00.331-1.11L6.568 3.102A1.125 1.125 0 005.477 2.25H2.25A2.25 2.25 0 000 4.5v.75z"/>
                            </svg>
                        </div>
                        <div class="flex flex-col text-md font-semibold">
                            <a :href="`tel:+91${phoneNo}`" class="hover:underline">
                                <p class="font-bold text-[14px]"> +91 {{ phoneNo || "9876543210" }}</p>
                            </a>
                            <a :href="`tel:+91${whatsappNo}`" class="hover:underline">
                                <p class="font-bold text-[14px]">+91 {{  whatsappNo || "9876543210" }}</p>
                            </a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0L12 12 2.25 6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25"/>
                            </svg>
                        </div>
                        <div class="flex flex-col text-md font-semibold">
                            <a :href="`mailto:${emailID}`" class="hover:underline">
                                <p class="font-bold text-[14px]">{{ emailID || "info@linkaura.com" }}</p>
                            </a>
                        </div>
                    </div>

                    <!-- Website -->
                    <div class="flex items-center gap-4" v-if="1==2">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3.75a8.25 8.25 0 018.25 8.25A8.25 8.25 0 1112 3.75zm0 0c-1.746 0-3.5 1.753-3.5 3.5 0 1.75 1.754 3.5 3.5 3.5s3.5-1.75 3.5-3.5c0-1.747-1.754-3.5-3.5-3.5z"/>
                            </svg>
                        </div>
                        <div class="text-md font-bold">
                            <a href="www.linkAura.com" target="_blank" class="hover:underline">
                            www.linkaura.com
                            </a>
                        </div>
                    </div>

                    
                </div>

                
                <!-- Address area -->
                <div class="grid grid-flow-row px-4">
                    <div class="w-full p-3 flex justify-start gap-3">
                        <!-- Icon -->
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="#3d023a" 
                                viewBox="0 0 24 24" 
                                class="w-8 h-8 text-black">
                                <path fill-rule="evenodd" 
                                    d="M11.54 22.35a.75.75 0 0 0 .92 0C14.6 20.6 19.5 16.1 19.5 11a7.5 7.5 0 1 0-15 0c0 5.1 4.9 9.6 7.04 11.35ZM12 13.25a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5Z" 
                                    clip-rule="evenodd"/>
                            </svg>
                        </div>

                        <!-- Address Text -->
                        <div class="text-gray-800 text-[14px] font-semibold leading-tight">
                            {{ currentAddress || "12-B, Sriniwas Eagle garden, Bangalore, Karnataka 638107" }}
                        </div>
                        <!-- Address Text /.-->             
                    </div>
                </div>
                <!-- Address area /. -->
                <!-- contact and address section /.-->

                <!-- footer designing Corner -->
                 <div class="flex flex-col gap-4 bg-[#3d023a] text-white w-full max-w-[430px] h-1"></div>
                <!-- footer designing Corner /. -->

             </div>
            <!-- company details with contact details /. -->

            <!-- About Us Section -->
             <div id="aboutus" class="flex flex-col w-full">
                <!-- heade rebbon -->
                 <div class="flex flex-col w-full p-5">
                    <!-- header name -->
                    <div class="grid grid-flow-row justify-center">
                        <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                    min-w-[120px] max-w-[250px] text-center
                                    [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                    ">
                                    About Us
                        </div>
                    </div>
                    <!-- header name /. -->

                    <div class="flex flex-col w-full mt-2 text-justify leading-loose text-[15px]">
                        {{ aboutTxt || "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc."}}
                    </div>
                 </div>
                <!-- heade rebbon /. -->
                 <!-- footer designing Corner -->
                 <div class="flex flex-col gap-4  w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#3d023a" fill-opacity="1" d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                    </svg>
                 </div>
                <!-- footer designing Corner /. -->
             </div>
            <!-- About Us Section /. -->

            <!-- Product section -->
            <div id="products" class="flex flex-col w-full mt-8">
                <!-- header name -->
                <div class="grid grid-flow-row justify-center mx-auto">
                    <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                min-w-[120px] max-w-[250px] text-center
                                [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                ">
                                Products
                    </div>
                </div>
                <!-- header name /. -->

                <!-- product areas -->
                <div class="grid grid-cols-2 gap-2 mt-5 px-2">
                    <div 
                        v-for="(item, index) in products" 
                        :key="index"
                        class="flex flex-col w-full gap-2">
                        <!-- product image area -->
                        <div class="flex flex-col w-full border border-gray-300 relative">
                            <!-- image area -->
                            <div class="flex flex-col w-full h-[200px] p-1 cursor-pointer" @click="openImage(item.product_img)">
                                <img :src="item.product_img" class="w-full h-full object-contain">
                            </div>

                            <!-- content area -->
                            <div class="flex flex-col w-full mt-2 bg-[#3d023a]">

                                <!-- name -->
                                <div class="flex flex-col w-full text-center p-1 border-b border-white">
                                    <p class="font-semibold text-[14px] text-white">
                                        {{ item.product_name }}
                                    </p>
                                </div>

                                <!-- original price -->
                                <div class="flex flex-row w-full text-center p-2 items-center">
                                    <p class="font-semibold text-[14px] text-white flex justify-center items-center">
                                        Original Price:
                                        <span class="ml-1">{{ item.orginal_price }}</span>
                                    </p>
                                </div>
                                
                                <!-- discount price -->
                                <div class="flex flex-row w-full text-center p-2 items-center">
                                    <p class="font-semibold text-[14px] text-white flex justify-center items-center">
                                        Dicount:
                                        <span class="ml-1">{{ item.discount_price }}</span>
                                    </p>
                                </div>
                                
                                <!-- Final price -->
                                <div class="flex flex-row w-full text-center p-2 items-center">
                                    <p class="font-semibold text-[14px] text-white flex justify-center items-center">
                                        Final Price:
                                        <span class="ml-1">{{ item.final_price }}</span>
                                    </p>
                                </div>
                            </div>

                            <!-- enquiry button -->
                            <div class="flex flex-col bg-white items-center mt-2 mb-2">
                                <button class="w-[150px] outline outline-1" @click="selectProduct(item.product_name)">
                                    Enquiry Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product areas /. -->

                <!-- footer designing Corner -->
                <div class="flex flex-col gap-4 w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path class="animate-wavey" fill="#3d023a" fill-opacity="1"
                        d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                        </path>
                    </svg>
                </div>
                <!-- footer designing Corner /. -->
            </div>
            <!-- Product section /. -->

            <!-- Service Section -->
            <div id="services" class="flex flex-col w-full">
            <!-- heade rebbon -->
                <div class="flex flex-col w-full p-5 px-0">
                <!-- header name -->
                <div class="grid grid-flow-row justify-center">
                    <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                min-w-[120px] max-w-[250px] text-center
                                [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                ">
                                Our Service
                    </div>
                </div>
                <!-- header name /. -->

                <div class="flex flex-col w-full mt-2">
                    <!-- service area -->
                    <div class="grid grid-cols-2 gap-2">
                        <div 
                            v-for="(item, index) in serviceData" 
                            :key="index"
                            class="flex flex-col w-full items-center shadow-2xl mt-5">
                            <!-- service image -->
                            <div class="flex flex-col w-full h-[250px] p-2 items-center overflow-hidden">
                                <img 
                                    :src="item.service_img" 
                                    :alt="item.service_img"
                                    @click="openImage(item.service_img)"
                                    class="w-full h-full object-cover rounded-md"
                                >
                            </div>

                            <!-- service name -->
                            <div class="flex flex-col w-full text-center p-2"> 
                                <p class="text-[14px] font-semibold">
                                    {{ item.service_name }}
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- service area /. -->
                </div>
                </div>
            <!-- heade rebbon /. -->
                <!-- footer designing Corner -->
                <div class="flex flex-col gap-4  w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#3d023a" fill-opacity="1" d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                    </svg>
                    </div>
                <!-- footer designing Corner /. -->
            </div>
            <!-- Service Section /. -->

            <!-- video -->
            <div id="Videos" class="flex flex-col w-full mb-2 shadow-2xl mt-5">
                <!-- header name -->
                <div class="grid grid-flow-row justify-center mx-auto">
                    <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                min-w-[120px] max-w-[250px] text-center
                                [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                ">
                                Videos
                    </div>
                </div>
                <!-- header name /. -->

                <!-- Video content -->
                <div class="flex flex-col w-full bg-[#f1f1f1]">
                    <!-- Youtube area -->
                    <div class="flex flex-col w-full p-5 bg-[#3d023a] mb-2 mt-2">
                        <div v-if="youtube_link1 || youtube_link2" class="flex flex-col gap-4 bg-[#3d023a] mt-2 mb-4 rounded-lg" >
                            <div class="flex flex-col w-full p-2 bg-gray-50 rounded-2xl">
                                <iframe
                                    v-if="youtube_link1"
                                    :src="youtubeEmbed(youtube_link1)"
                                    class="w-full aspect-video rounded-lg"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                ></iframe>
                            </div>
                            <div class="flex flex-col w-full p-2 bg-gray-50 rounded-2xl">
                                <iframe
                                    v-if="youtube_link2"
                                    :src="youtubeEmbed(youtube_link2)"
                                    class="w-full aspect-video rounded-lg"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                ></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- Youtube area /. -->

                    <!-- insta link area -->
                    <div v-if="instaReals_link1 || instaReals_link2" class="grid grid-cols-1 gap-4 p-5 bg-[#3d023a] mb-2">
                        <div v-if="instaReals_link1" 
                        class="border-1 border-gray-300 bg-gray-50 flex justify-center items-center rounded-2xl shadow-xl overflow-hidden p-2 pt-5"
                        >
                            <blockquote
                            class="instagram-media"
                            :data-instgrm-permalink="normalizeInstaUrl(instaReals_link1)"
                            data-instgrm-version="14"
                            style="min-width: 100%;"
                            ></blockquote>
                        </div>

                        <div
                            v-if="instaReals_link2"
                            class="border-1 border-gray-300 bg-gray-50 rounded-2xl flex justify-center items-center shadow-lg overflow-hidden p-2 pt-5"
                        >
                            <blockquote
                            class="instagram-media"
                            :data-instgrm-permalink="normalizeInstaUrl(instaReals_link2)"
                            data-instgrm-version="14"
                            style="min-width: 100%;"
                            ></blockquote>
                        </div>
                    </div>
                    <!-- insta link area /. -->
                </div>
                <!-- Video content /.-->

                <!-- footer designing Corner -->
                <div class="flex flex-col gap-4  w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#3d023a" fill-opacity="1" d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                    </svg>
                </div>
                <!-- footer designing Corner /. -->
            </div>
            <!-- video /. -->

            <!-- gallery section -->
            <div id="gallery" class="flex flex-col w-full pt-5 bg-gradient-to-bl from-[#ffe4e6]  to-[#ccfbf1]">
                <!-- header name -->
                <div class="grid grid-flow-row justify-center mx-auto">
                    <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                min-w-[120px] max-w-[250px] text-center
                                [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                ">
                                Gallery
                    </div>
                </div>
                <!-- header name /. -->
                <div class="grid grid-cols-2 gap-4 pt-5 px-5">
                    <div 
                        v-for="(item, index) in galleryData" 
                        :key="index"
                        class="flex flex-col w-full h-full shadow-2xl rounded-lg bg-white"
                    >
                        <img 
                            :src="item.gallery" 
                            alt="item.gallery" 
                            class="w-full h-full object-contain cursor-pointer"
                            @click="openImage(item.gallery)"
                        >
                    </div>
                </div>
                <!-- footer designing Corner -->
                <div class="flex flex-col gap-4 w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path class="animate-wavey" fill="#3d023a" fill-opacity="1"
                        d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                        </path>
                    </svg>
                </div>
                <!-- footer designing Corner /. -->
            </div>
            <!-- gallery section /. -->

            <!-- payment section -->
            <div id="payments" class="flex flex-col w-full pt-5">
                <!-- header name -->
                <div class="grid grid-flow-row justify-center mx-auto">
                    <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                min-w-[120px] max-w-[250px] text-center
                                [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                ">
                                Payment
                    </div>
                </div>
                <!-- header name /. -->

                <!-- payment areas -->
                <div v-if="paymentQrs.length" class="flex flex-col w-full bg-white">

                    <!-- qr section -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-4 px-3 py-5">

                        <div
                            v-for="(item, index) in paymentQrs"
                            :key="index"
                            class="flex flex-col w-full h-[250px] border border-[#414143] shadow-2xl rounded-xl p-2"
                        >
                            <img
                                :src="item.img"
                                :alt="item.name"
                                class="w-full h-full object-contain"
                                @click="openImage(item.img)"
                            />
                            <p class="text-center text-sm font-semibold mt-5">
                                {{ item.name }}
                            </p>
                        </div>

                    </div>
                    <!-- qr section /. -->

                </div>

                <!-- default -->
                <div v-else class="text-center text-gray-500 py-10">
                    <div class="flex flex-col w-full bg-white">
                        <!-- qr section -->
                        <div class="grid grid-cols-2 gap-4 items-center justify-center text-center px-3 py-5">
                            <!-- cols1 -->
                            <div class="flex flex-col w-full h-[250px] border-1 border-[#414143] shadow-2xl rounded-xl">
                                <img :src="gPay" alt="gpay number" class="w-full h-full object-contain" @click="openImage(gPay)">
                            </div>
                            <!-- cols1 /. -->
                            <!-- cols1 -->
                            <div class="flex flex-col w-full h-[250px] border-1 border-[#414143] shadow-2xl rounded-xl">
                                <img :src="paytm" alt="Paytm number" class="w-full h-full object-contain" @click="openImage(paytm)">
                            </div>
                            <!-- cols1 /. -->
                        </div>
                        <!-- qr section /. -->
                    </div>
                </div>
                <!-- default -->
                <!-- payment areas -->
                
                <!-- footer designing Corner -->
                <div class="flex flex-col gap-4 w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path class="animate-wavey" fill="#3d023a" fill-opacity="1"
                        d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                        </path>
                    </svg>
                </div>
                <!-- footer designing Corner /. -->
            </div>
            <!-- payment section /. -->

            <!-- Enquiry -->
             <div id="enquiry" class="flex flex-col w-full pt-5  bg-gradient-to-bl from-[#ffe4e6]  to-[#ccfbf1]">
                <!-- header name -->
                <div class="grid grid-flow-row justify-center mx-auto">
                    <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                min-w-[120px] max-w-[250px] text-center
                                [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                ">
                                Enquiry
                    </div>
                </div>
                <!-- header name /. -->

                <!-- enquiry form area -->
                 <div class="flex flex-col p-5">
                    <form @submit.prevent="enquiryOnSubmit" class="space-y-4">
                        <div>
                            <input
                            v-model="enquiryUserName"
                            type="text"
                            placeholder="Enter Name"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="submitCount > 0 && nameError" class="text-red-500 text-sm">{{ nameError }}</span>
                            </div>
                        </div>
                        <div>
                            <input
                            v-model="Enquiryphone"
                            type="text"
                            placeholder="Phone Number"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            maxlength="10"
                            minlength="10"
                            oninput="this.value=this.value.replace(/[^\d]/,'')"
                            />
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="submitCount > 0 && phoneError" class="text-red-500 text-sm">{{ phoneError }}</span>
                            </div>
                        </div>
                        <div>
                            <input
                            v-model="productnameEnquiry"
                            type="text"
                            placeholder="Product Name"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="submitCount > 0 && productNameEnquError" class="text-red-500 text-sm">{{ productNameEnquError }}</span>
                            </div>
                        </div>
                        <div>
                            <textarea 
                            v-model="enquiryMessage" 
                            rows="5" 
                            placeholder="Enter Message"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            ></textarea>
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="submitCount > 0 && messageEnqError" class="text-red-500 text-sm">{{ messageEnqError }}</span>
                            </div>
                        </div>
                        <div class="items-center justify-center text-center">
                            <button type="submit" class="w-[150px] text-gray bg-transparent border-2 border-[#3d023a] text-[#3d023a] py-2 rounded-xl transition hover:bg-[#3d023a] hover:text-white" >
                            Send
                            </button>
                        </div>  
                    </form>
                 </div>
                <!-- enquiry form area /. -->

                <!-- footer designing Corner -->
                <div class="flex flex-col gap-4 w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path class="animate-wavey" fill="#3d023a" fill-opacity="1"
                        d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                        </path>
                    </svg>
                </div>
                <!-- footer designing Corner /. -->

             </div>
            <!-- Enquiry /. -->


            <!-- FeedBack -->
             <div id="feedback" class="flex flex-col w-full pt-5  bg-gradient-to-bl from-[#ffe4e6]  to-[#ccfbf1]">
                <!-- header name -->
                <div class="grid grid-flow-row justify-center mx-auto">
                    <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                min-w-[120px] max-w-[250px] text-center
                                [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                ">
                                Feedback
                    </div>
                </div>
                <!-- header name /. -->

                <!-- Feedback form area -->
                 <div class="flex flex-col p-5">
                    <form @submit.prevent="feedbackOnSubmit" class="space-y-4">
                        <div>
                            <input
                            v-model="fbUserName"
                            type="text"
                            placeholder="Enter Name"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="fbSubmitCount > 0 && fbnameError" class="text-red-500 text-sm">{{ fbnameError }}</span>
                            </div>
                        </div>
                        <div>
                            <input
                            v-model="fbphone"
                            type="text"
                            placeholder="Phone Number"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            maxlength="10"
                            minlength="10"
                            oninput="this.value=this.value.replace(/[^\d]/,'')"
                            />
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="fbSubmitCount > 0 && fbphoneError" class="text-red-500 text-sm">{{ fbphoneError }}</span>
                            </div>
                        </div>
                        <div>
                            <textarea 
                            v-model="fbmessage" 
                            rows="5" 
                            placeholder="Enter Message"
                            class="text-gray-800 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            ></textarea>
                            <!-- Character Counter -->
                            <div class="flex justify-between items-center mt-1">
                                <span v-if="fbSubmitCount > 0 && fbmessageError" class="text-red-500 text-sm"> {{ fbmessageError }}
                                </span>
                                <span class="text-red-500 font-bold text-xs" v-if="fbmessage"> {{ fbmessage.length }}/125 </span>
                            </div>
                        </div>  
                        <div class="items-center justify-center text-center">
                            <button type="submit" class="w-[150px] text-gray bg-transparent border-2 border-[#3d023a] text-[#3d023a] py-2 rounded-xl transition hover:bg-[#3d023a] hover:text-white" >
                            Send
                            </button>
                        </div>  
                    </form>
                 </div>
                <!-- Feedback form area /. -->

                <!-- Feedback review -->
                <div class="flex flex-col w-full bg-[#3d023a] mb-3">
                    <!-- heading -->
                    <div class="flex flex-col w-full p-3">
                        <p class="font-semibold text-[#ffffff] text-[14px] p-1 text-center uppercase">
                            Customer FeedBacks
                        </p>
                    </div>
                    <!-- heading /. -->
                    <!-- feedback message -->
                    <div class="flex flex-col w-full p-5 bg-white">
                        <div
                            v-for="(item, index) in feedbackVerifyData"
                            :key="item.id"
                            class="flex flex-col w-full p-3 shadow-lg mb-4 rounded-lg"
                        >
                            <p class="text-gray-700 text-[15px] font-semibold text-justify">
                                {{ item.feedback_message || "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."}}
                            </p>
                            <p class="text-[#124e2b] text-[15px] font-bold text-end">
                                --- {{ item.name || "LinkAura"}}
                            </p>
                            <div class="flex flex-col w-[100px] h-[1px] mx-auto bg-gray-800 mt-2">
                                <!-- footer border -->
                            </div>
                        </div>
                    </div>
                    <!-- feedback message /. -->
                </div>
                <!-- Feedback review /. -->

                <!-- footer designing Corner -->
                <div class="flex flex-col gap-4 w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path class="animate-wavey" fill="#3d023a" fill-opacity="1"
                        d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                        </path>
                    </svg>
                </div>
                <!-- footer designing Corner /. -->

             </div>
            <!-- FeedBack /. -->

            <!-- share  my details -->
            <div id="shareMyDetails" class="flex flex-col w-full pt-5 bg-white">
                <!-- header name -->
                <div class="grid grid-flow-row justify-center mx-auto">
                    <div class="inline-block border-2 border-[#3d023a] text-[#3d023a] p-2 
                                min-w-[120px] max-w-[250px] text-center
                                [clip-path:polygon(10%_0%,100%_0%,90%_100%,0%_100%)] 
                                ">
                                Share my details
                    </div>
                </div>
                <!-- header name /. -->
                
                <!-- payment areas -->
                <div class="flex flex-col w-full bg-white">
                    <!-- content area  -->
                    <div class="flex flex-col w-full p-5" v-if="is_purchased">
                        <!-- qrcode -->
                        <div class="flex w-full h-full mx-auto bg-yellow-300">
                            <img :src="qrImage" class="w-full h-full object-contain">
                        </div>
                        <!-- qrcode /. -->

                        <!-- download png -->
                        <div class="flex flex-grow w-full font-semibold items-center justify-center">
                            <button 
                            @click="downloadQR"
                            class="flex w-[100px] h-[30px] border border-[#6b3f69] items-center justify-center gap-2 rounded-2xl">
                            <ArrowDownTrayIcon class="size-4 text-[#6b3f69]" :class="{ 'animate-download': isDownloading }" /> 
                                <span>{{ isDownloading ? 'Saving...' : 'Save' }}</span>
                            </button>
                        </div>
                        <!-- download png -->

                        <!-- share links -->
                        <div class="flex w-full py-2 font-semibold" >
                            <p class="uppercase ">
                                Share links here
                            </p>
                        </div>

                        <!-- facebook share -->
                        <div class="flex flex-grow w-full font-semibold items-center justify-center">
                            <a :href="`https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`" target="_blank" class="flex items-center px-4 hover:bg-gray-100 hover:text-gray-800" >
                                <button class="w-60 flex items-center gap-3  bg-transparent border border-[#2A7B9B]  rounded-xs p-2 justify-center" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#2A7B9B" viewBox="0 0 24 24" class="w-6 h-6" >
                                        <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1 
                                        .9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.3l-.4 3h-1.9v7A10 10 0 0 0 22 12"/>
                                    </svg>

                                    <span class="text-[#2A7B9B] text-sm">
                                        Share to Facebook
                                    </span>
                                </button>
                            </a>
                        </div>
                        <!-- facebook share -->
                        
                        <!-- insta share -->
                        <div class="flex flex-grow w-full font-semibold items-center justify-center">
                            <a :href="`https://www.instagram.com/`" target="_blank" class="flex items-center px-4 py-1 hover:text-gray-800 hover:bg-gray-100">
                                <button class="w-60 flex items-center gap-3  bg-transparent border border-[#cf3b9c]  rounded-xs p-2 justify-center" >
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        fill="#cf3b9c" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 
                                        5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 
                                        1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 
                                        3.5A4.5 4.5 0 1 0 16.5 12 4.5 4.5 0 0 0 12 
                                        7.5zm0 7.3A2.8 2.8 0 1 1 14.8 12 2.8 2.8 0 0 1 12 14.8zm4-8.9a1.1 1.1 0 
                                        1 1-1.1-1.1 1.1 1.1 0 0 1 1.1 1.1z"/>
                                    </svg>

                                    <span class="text-[#cf3b9c] text-sm">
                                        Share to Instagram
                                    </span>
                                </button>
                            </a>
                        </div>
                        <!-- insta share -->

                        <!-- whatsapp share -->
                        <div class="flex flex-grow w-full font-semibold items-center justify-center">
                            <a :href="`https://api.whatsapp.com/send?text=${encodedUrl}`" target="_blank" class="flex items-center px-4 hover:bg-gray-100 hover:text-gray-800" >
                                <button class="w-60 flex items-center gap-3  bg-transparent border border-[#57C785]  rounded-xs p-2 justify-center" >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-[#52b84a]">
                                        <path d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.78.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-1.99-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.22.25-.86.85-.86 2.07 0 1.22.89 2.4 1.01 2.56.12.17 1.75 2.67 4.23 3.74.59.26 1.05.41 1.41.52.59.19 1.13.16 1.56.1.48-.07 1.47-.6 1.67-1.18.21-.58.21-1.07.15-1.18s-.22-.16-.47-.28z"/>
                                    </svg>

                                    <span class="text-[#52b84a] text-sm">
                                        Share to WhatsApp
                                    </span>
                                </button>
                            </a>
                        </div>
                        <!-- Whatsapp share -->

                        <!-- copy text -->
                        <div class="flex flex-grow w-full font-semibold items-center justify-center mt-2 gap-1">
                            <input v-model="cpyUrl" type="text" placeholder="Mini Website URL"
                            class="w-[200px] text-gray-700 border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                            <button @click="copyToClipboard" class="bg-[#524b4b] p-2 text-white rounded">
                                Copy
                            </button>
                        </div>
                        <!-- copy text /. -->

                        <!-- share links /. -->
                    </div>
                    <div class="flex flex-col w-full" v-else>
                        <div class="flex flex-col w-full p-5 leading-loose">
                            <p class="text-[14px] font-bold">
                                நீங்கள் பேய்டு பிளான் வாங்கிய பின், இந்த கார்டைப் பிறருடன் பகிரும் வசதி உங்களுக்கு கிடைக்கும்.
                            </p>
                        </div>
                        <div class="flex flex-col w-full items-center mb-3">
                            <button 
                            @click="gotoPlanPopup()"
                            class="w-[150px] text-gray bg-transparent border-1 border-[#6b3f69] text-[#6b3f69] py-2 rounded-xl transition hover:bg-[#6b3f69] hover:text-white" >
                            Buy Paid Plan
                            </button>
                        </div>
                    </div>
                    <!-- content area /. -->
                </div>
                <!-- payment areas /. -->

                

                <!-- footer designing Corner -->
                <div class="flex flex-col gap-4 w-full max-w-[430px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path class="animate-wavey" fill="#3d023a" fill-opacity="1"
                        d="M0,96L60,112C120,128,240,160,360,192C480,224,600,256,720,229.3C840,203,960,117,1080,96C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                        </path>
                    </svg>
                </div>
                <!-- footer designing Corner /. -->
            </div>
            <!-- share  my details /. -->
            <!-- website footer  -->
            <WebsiteFooterBar v-if="isFooter"/>
            <!-- website footer  -->
        </div>
    </main>

    <!-- Image Popup Modal -->
    <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50">
        <div class="animate-fade-in relative bg-white p-2 rounded-lg max-w-[90%] max-h-[90%]">
            <!-- CLOSE ICON -->
            <button @click="closeModal" class="absolute top-2 right-2 text-white  text-2xl font-bold bg-red-400
             p-2 rounded-xl">
                ×
            </button>

            <!-- IMAGE -->
            <img :src="selectedImage" class="w-[500px] h-[500px] object-contain">
        </div>
    </div>

    <!-- mobile plan popup -->
    <div v-if="showPlan" class="max-w-[430px] pb-0 mx-auto grid grid-cols-1 bg-center bg-cover bg-no-repeat pb-0 mx-auto fixed inset-0 bg-white flex flex-col p-5 pb-5 bg-yellow-300 overflow-y-auto overflow-x-hidden scroll-smooth scrollbar-hide">
        <!-- CLOSE ICON -->
            <button @click="gotoPlanPopupClose" class="absolute top-2 right-2 text-white  text-2xl font-bold bg-red-400
             p-2 rounded-xl">
                ×
            </button>
        <!-- basic main -->
        <div class="flex flex-col w-full bg-white border-1 border-gray-100 shadow-xl ">
            <!-- icons area -->
             <div class="flex flex-col w-full justify-center items-center">
                <PaperAirplaneIcon class="size-45 text-[#2A7B9B] -rotate-25" /> <!-- [#8F0177] -->
             </div>
            <!-- icons area /. -->

            <!-- Heading area -->
            <div class="flex flex-col w-full justify-center items-center pt-15">
                <p class="uppercase font-bold text-[24px] text-gray-600">
                    Basic Plan
                </p>
             </div>
            <!-- Heading area /. -->
            
            <!-- Price area -->
            <div class="flex flex-col w-full px-5 pt-5 pb-5 bg-[#2A7B9B]">
                <p class="uppercase font-semibold text-[20px] text-white">
                    Price: &#8377; 500
                </p>
                <p class="uppercase text-[20px] text-white font-semibold">
                    Validity: 3 Months
                </p>
             </div>
            <!-- Price area /. -->

            <!-- features Heading area -->
            <div class="flex flex-col w-full pt-5 px-5">
                <p class="uppercase font-bold text-[20px] text-gray-800">
                    Features Included
                </p>
             </div>
            <!-- features Heading area /. -->

            <!-- Features area -->
            <div class="flex flex-col w-full px-5 pt-2">
                <ul class="text-[15px] font-semibold leading-loose">
                    <li>🛍️ Add up to 20 Products </li>
                    <li>🛠️ Add up to 10 Services</li>
                    <li>🖼️ Upload 10 Gallery Images</li>
                    <li>🔄 Unlimited Updates</li>
                    <li>✍ Customer Enquiry Section</li>
                    <li>⭐ Customer Feedback Section</li>
                    <li>🎨 Custom Theme Colors</li>
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
                    
                </ul>
             </div>
            <!-- Features area /. -->

            <!-- purchase button -->
            <div class="flex flex-col w-full px-5 pt-2 pb-2 justify-center items-center mt-5 mb-10 bg-[#2A7B9B]">
                <button
                class="w-[150px] text-gray bg-transparent border-1 border-[#ffffff] text-[#ffffff] py-2 rounded-xl transition hover:bg-[#2A7B9B] hover:text-white" >
                Buy Now
                </button>
            </div>
            <!-- purchase button /. -->
        </div>
        <!-- basic main /.-->

        <!-- standard main -->
        <div class="flex flex-col w-full bg-white border-1 border-gray-100 shadow-xl mt-10">
            <!-- icons area -->
             <div class="flex flex-col w-full justify-center items-center">
                <PaperAirplaneIcon class="size-45 text-[#066856] -rotate-25" /> <!-- [#8F0177] -->
             </div>
            <!-- icons area /. -->

            <!-- Heading area -->
            <div class="flex flex-col w-full justify-center items-center pt-15">
                <p class="uppercase font-bold text-[24px] text-gray-600">
                    Standard Plan
                </p>
             </div>
            <!-- Heading area /. -->
            
            <!-- Price area -->
            <div class="flex flex-col w-full px-5 pt-5 pb-5 bg-[#066856]">
                <p class="uppercase font-semibold text-[20px] text-white">
                    Price: &#8377; 1000
                </p>
                <p class="uppercase text-[20px] text-white font-semibold">
                    Validity: 6 Months
                </p>
             </div>
            <!-- Price area /. -->

            <!-- features Heading area -->
            <div class="flex flex-col w-full pt-5 px-5">
                <p class="uppercase font-bold text-[20px] text-gray-800">
                    Features Included
                </p>
             </div>
            <!-- features Heading area /. -->

            <!-- Features area -->
            <div class="flex flex-col w-full px-5 pt-2">
                <ul class="text-[15px] font-semibold leading-loose">
                    <li>🛍️ Add up to 20 Products </li>
                    <li>🛠️ Add up to 10 Services</li>
                    <li>🖼️ Upload 10 Gallery Images</li>
                    <li>🔄 Unlimited Updates</li>
                    <li>✍ Customer Enquiry Section</li>
                    <li>⭐ Customer Feedback Section</li>
                    <li>🎨 Custom Theme Colors</li>
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
                    
                </ul>
             </div>
            <!-- Features area /. -->

            <!-- purchase button -->
            <div class="flex flex-col w-full px-5 pt-2 pb-2 justify-center items-center mt-5 mb-10 bg-[#066856]">
                <button
                class="w-[150px] text-gray bg-transparent border-1 border-[#ffffff] text-[#ffffff] py-2 rounded-xl transition hover:bg-[#066856] hover:text-white" >
                Buy Now
                </button>
            </div>
            <!-- purchase button /. -->
        </div>
        <!-- standard main /.-->

        <!-- Premium main -->
        <div class="flex flex-col w-full bg-white border-1 border-gray-100 shadow-xl mt-10">
            <!-- icons area -->
             <div class="flex flex-col w-full justify-center items-center">
                <RocketLaunchIcon class="size-45 text-[#6c075b] rotate-15" /> <!-- [#8F0177] -->
             </div>
            <!-- icons area /. -->

            <!-- Heading area -->
            <div class="flex flex-col w-full justify-center items-center pt-15">
                <p class="uppercase font-bold text-[24px] text-gray-600">
                    Premium Plan
                </p>
             </div>
            <!-- Heading area /. -->
            
            <!-- Price area -->
            <div class="flex flex-col w-full px-5 pt-5 pb-5 bg-[#6c075b]">
                <p class="uppercase font-semibold text-[20px] text-white">
                    Price: &#8377; 1500
                </p>
                <p class="uppercase text-[20px] text-white font-semibold">
                    Validity: 12 Months
                </p>
             </div>
            <!-- Price area /. -->

            <!-- features Heading area -->
            <div class="flex flex-col w-full pt-5 px-5">
                <p class="uppercase font-bold text-[20px] text-gray-800">
                    Features Included
                </p>
             </div>
            <!-- features Heading area /. -->

            <!-- Features area -->
            <div class="flex flex-col w-full px-5 pt-2">
                <ul class="text-[15px] font-semibold leading-loose">
                    <li>🛍️ Add up to 20 Products </li>
                    <li>🛠️ Add up to 10 Services</li>
                    <li>🖼️ Upload 10 Gallery Images</li>
                    <li>🔄 Unlimited Updates</li>
                    <li>✍ Customer Enquiry Section</li>
                    <li>⭐ Customer Feedback Section</li>
                    <li>🎨 Custom Theme Colors</li>
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
                    
                </ul>
             </div>
            <!-- Features area /. -->

            <!-- purchase button -->
            <div class="flex flex-col w-full px-5 pt-2 pb-2 justify-center items-center mt-5 mb-10 bg-[#6c075b]">
                <button
                class="w-[150px] text-gray bg-transparent border-1 border-[#ffffff] text-[#ffffff] py-2 rounded-xl transition hover:bg-[#6c075b] hover:text-white" >
                Buy Now
                </button>
            </div>
            <!-- purchase button /. -->
        </div>
        <!-- Premium main /.-->
    </div>
    <!-- mobile plan popup /. -->

    
</template>

<script>
    import { ref, onMounted, computed, nextTick  } from 'vue'
    import { useForm, useField } from 'vee-validate'
    import * as yup from 'yup';
    import Swal from 'sweetalert2';
    import defaultLogo from '@/assets/images/commonImages/linkAura_logo.png'
    import defaultPro1 from '@/assets/images/commonImages/default_product_images/pro1.webp'
    import defaultPro2 from '@/assets/images/commonImages/default_product_images/pro2.png'
    import defaultPro3 from '@/assets/images/commonImages/default_product_images/pro3.png'
    import defaultPro4 from '@/assets/images/commonImages/default_product_images/pro4.jpg'
    import defaultPro5 from '@/assets/images/commonImages/default_product_images/pro5.png'
    import productImage from '@/assets/images/commonImages/default_product_images/pro5.png'
    import service1 from '@/assets/images/commonImages/default_service_images/service1.jpg'
    import service2 from '@/assets/images/commonImages/default_service_images/service2.webp'
    import gPay from '@/assets/images/commonImages/default_qrCode_images/gpay.jpeg'
    import paytm from '@/assets/images/commonImages/default_qrCode_images/paytm.jpeg'
    import axios from 'axios';
    import { useCardStore } from '@/stores/cardStore'
    import { toast } from 'vue3-toastify'
    import { useRoute,useRouter } from 'vue-router'
    import { PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon, ChevronLeftIcon, ChevronRightIcon, ArrowDownTrayIcon } from '@heroicons/vue/24/solid'
    import WebsiteFooterBar from '../Components/WebsiteFooterBar.vue';

    export default{
        name: "Website_Temp_1",
        components: {PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon, WebsiteFooterBar, ChevronLeftIcon, ChevronRightIcon, ArrowDownTrayIcon},
        props: {
            // themeId: Number,
            // design: Number,
            isFooter: {
                type: Boolean,
                default: true
            }
        },
        
        setup(props){
            // getting data from selected website 
            const route = useRoute();
            const router = useRouter();
            const cardStore = useCardStore()

            const decoded = route.query.ilp88LAsBvm ? atob(decodeURIComponent(route.query.ilp88LAsBvm)) : ''
            console.log("decoded : "+decoded)
            const params = new URLSearchParams(decoded)
            const cd_id   = Number(params.get('cd_id') || 0)
            const templateId  = Number(params.get('template_id') || 0)
            const purchaseID  = Number(params.get('purchased_id') || 0)
            const is_purchased = ref("")            

            // ---------------- Company Details ----------------
            const companyData = ref({})
            const companyName = ref("")
            const ownerName = ref("")
            const designation = ref("")
            const logoImage = ref("")

            const loadCompanyDetails = async () => {
                const res = await axios.post('/collectAllWebsiteDatas', {'table_name':'miniweb_company_details', cd_id });
                const data = res?.data?.getData?.[0];
                if (!data) return;

                companyData.value = data;
                companyName.value = data.company_name || '';
                ownerName.value = data.owner_name || '';
                designation.value = data.designation || '';
                logoImage.value = data.logo_path ? `/company_logos/${data.logo_path}` : '';
                is_purchased.value = data.purchased_id

                // Guard check
                if (cd_id && is_purchased.value <= 0) {
                    // console.log('Access blocked:', cd_id, is_purchased.value)

                    // remove query string
                    router.replace({
                        path: route.path
                    })
                } else if (cd_id) {
                    // console.log('Access allowed:', cd_id, is_purchased.value)
                }
            };
            
            // ---------------- Address Details ----------------
            // contact and address data
            const addData = ref({})
            const phoneNo = ref("")
            const whatsappNo = ref("")
            const emailID = ref("")
            const currentAddress = ref("")

            const loadAddressDetails = async () => {
                const res = await axios.post('/collectAllWebsiteDatas', { 'table_name':'miniweb_contact', cd_id });
                const data = res?.data?.getData?.[0];
                if (!data) return;

                addData.value = data;
                phoneNo.value = data.phone_number || '';
                whatsappNo.value = data.whatsapp_number || '';
                emailID.value = data.email || '';
                currentAddress.value = data.address || '';
            };

            // ---------------- Social Media Links ----------------
            const mediaData = ref({})
            const fb_link = ref("")
            const inst_link = ref("")
            const youtube_link1 = ref("")
            const youtube_link2 = ref("")
            const instaReals_link1 = ref("")
            const instaReals_link2 = ref("")
            const loadSocialMediaLinks = async() => {
                const res = await axios.post("/collectAllWebsiteDatas", { 'table_name':'miniweb_social_links', cd_id:cd_id })
                const data = res?.data?.getData?.[0];
                if(!data) return;

                mediaData.value = data
                fb_link.value = mediaData.value.facebook_url
                inst_link.value = mediaData.value.instagram_url
                youtube_link1.value = mediaData.value.youtube_Url1
                youtube_link2.value = mediaData.value.youtube_Url2
                instaReals_link1.value = mediaData.value.instaReals_Url1
                instaReals_link2.value = mediaData.value.instaReals_Url2
            };

            const youtubeEmbed = (url) => {
                if (!url) return ""
                const videoId = url.split("v=")[1]?.split("&")[0]
                return `https://www.youtube.com/embed/${videoId}`
            }

            const normalizeInstaUrl = (url) => {
            if (!url) return ""
            return url
                .replace("/reels/", "/reel/")
                .split("?")[0]
            }

            // ---------------- About us ----------------
            const aboutUsData = ref({})
            const aboutTxt = ref("")
            const loadAboutUs = async() => {
                const res = await axios.post("/collectAllWebsiteDatas", { 'table_name':'miniweb_aboutus', cd_id:cd_id })
                const data = res?.data?.getData?.[0];
                if(!data) return;

                aboutUsData.value = data
                aboutTxt.value = aboutUsData.value.aboutus_text
            };

            // ---------------- products ----------------
            const products = ref([
                {
                    id: 1,
                    product_name: "Maroon T-shirt For Women",
                    product_img: defaultPro1,
                    orginal_price: 1500,
                    discount_price: 500,
                    final_price: 1000
                },
                {
                    id: 2,
                    product_name: "Gray Hoodie For Men",
                    product_img: defaultPro3,
                    orginal_price: 3500,
                    discount_price: 500,
                    final_price: 3000
                },
                {
                    id: 3,
                    product_name: "Dental Crowns",
                    product_img: defaultPro4,
                    orginal_price: 400,
                    discount_price: 50,
                    final_price: 350
                },
                {
                    id: 4,
                    product_name: "White Cotton Shirt",
                    product_img: defaultPro5,
                    orginal_price: 800,
                    discount_price: 250,
                    final_price: 75
                }
            ]);

            const loadProducts = async () => {
                try {
                    const res = await axios.post("/collectAllWebsiteDatas", {
                        table_name: "miniweb_products",
                        cd_id: cd_id
                    });

                    const data = res?.data?.getData;
                    // IF DB DATA EXISTS → REPLACE DEFAULT
                    if (Array.isArray(data) && data.length > 0) {

                        products.value = data
                            .filter(item => item.product_name && item.final_price > 0)
                            .map(item => ({
                                product_name: item.product_name,
                                product_img: item.product_img
                                    ? `/product_images/${item.product_img}`
                                    : pro6,
                                orginal_price: Number(item.orginal_price),
                                discount_price: Number(item.discount_price),
                                final_price: Number(item.final_price),
                            }));

                    } 

                } catch (error) {
                    console.error("Load products error:", error);
                }
            };

            // ---------------- Service ----------------
            const serviceData = ref([
                {
                    id: 1,
                    service_name: "Online Retailers Clothing",
                    service_img: service1
                },
                {
                    id: 2,
                    service_name: "Women’s Fashion Boutique",
                    service_img: service2
                },
            ]);


            const loadService = async () => {
                try {
                    const res = await axios.post("/collectAllWebsiteDatas", { table_name: "miniweb_services", cd_id: cd_id });

                    const data = res?.data?.getData;
                    // IF DB DATA EXISTS → REPLACE DEFAULT
                    if (Array.isArray(data) && data.length > 0) {

                        serviceData.value = data
                            .filter(item => item.service_name && item.service_img)
                            .map(item => ({
                                service_name: item.service_name,
                                service_img: item.service_img
                                    ? `/service_images/${item.service_img}`
                                    : pro6,
                            }));

                    } 

                } catch (error) {
                    console.error("Load service error:", error);
                }
            };

            // ---------------- Gallery ----------------
            const galleryData = ref([
                {
                    gallery: productImage,
                },
                {
                    gallery: defaultPro2,
                },
                {
                    gallery: defaultPro1,
                },
                {
                    gallery: defaultPro4,
                },
            ]);

            const loadGallery = async () => {
                try {
                    const res = await axios.post("/collectAllWebsiteDatas", { table_name: "miniweb_gallery", cd_id: cd_id });

                    const data = res?.data?.getData;
                    // IF DB DATA EXISTS → REPLACE DEFAULT
                    if (Array.isArray(data) && data.length > 0) {

                        galleryData.value = data
                            .filter(item => item.gallery)
                            .map(item => ({
                                gallery: item.gallery
                                    ? `/gallery_images/${item.gallery}`
                                    : pro6,
                            }));

                    } 

                } catch (error) {
                    console.error("Load Gallery error:", error);
                }
            };

            // ---------------- Payment ----------------
            const paymentQrs = ref([]);

            const loadPayments = async () => {
                try {
                    const res = await axios.post("/collectAllWebsiteDatas", {
                        table_name: "miniweb_payments_details",
                        cd_id: cd_id
                    });

                    const data = res?.data?.getData?.[0];
                    if (!data) return;

                    paymentQrs.value = [
                        {
                            name: "Google Pay",
                            img: data.gpay_qr_code ? `/payment_Details_QrCode/${data.gpay_qr_code}` :  (!data.id ? gPay : null)
                        },
                        {
                            name: "PhonePe",
                            img: data.phonepe_qr_code ? `/payment_Details_QrCode/${data.phonepe_qr_code}` : (!data.id ? gPay : null)
                        },
                        {
                            name: "Paytm",
                            img: data.paytm_qr_code ? `/payment_Details_QrCode/${data.paytm_qr_code}` : (!data.id ? gPay : null)
                        }
                    ].filter(item => item.img);

                } catch (error) {
                    console.error("Load Payments error:", error);
                }
            };

            // ---------------- Feedback data ----------------
            const feedbackVerifyData = ref({})
            const loadFeedbackVerifyData = async () => {
                try {
                    const res = await axios.post("/collectAllWebsiteDatas", {
                        table_name: "miniweb_feedback",
                        cd_id: cd_id
                    });

                    const data = res?.data?.getData;

                    if (Array.isArray(data) && data.length > 0) {
                        // only verified feedbacks
                        feedbackVerifyData.value = data.filter(
                            item => item.verify === 1
                        );
                    }

                } catch (error) {
                    console.error("Feedback load error:", error);
                }
            };

            // ---------------- Qr Code get ----------------
            const qrData = ref({})
            const qrImage = ref(null)
            const loadQrCode = async () => {
                try{
                    const res = await axios.post("/collectAllWebsiteDatas", { 'table_name':'miniweb_qrcode', cd_id:cd_id })
                    const data = res?.data?.getData?.[0];
                    if(!data) return;

                    qrData.value = data
                    qrImage.value = `/qrcodes/${qrData.value.qr_code}`
                    
                }
                catch (error){
                    console.error("Load Qrcode error:", error);
                }
            };

            // The Download Function
            const isDownloading = ref(false);
            const downloadQR = () => {
                if (!qrImage.value) {
                    // alert("QR Code image not loaded yet!");
                    return;
                }

                // Start animation
                isDownloading.value = true;

                const link = document.createElement('a');
                link.href = qrImage.value;
                link.download = `QR_Code_${qrData.value.qr_code || 'download'}.png`;
                
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                // Stop animation after 1 second (to show the effect)
                setTimeout(() => {
                    isDownloading.value = false;
                }, 1000);
            };

            onMounted(async () => {
                if (!cd_id) return;

                try {
                    await Promise.all([
                        loadCompanyDetails(),
                        loadAddressDetails(),
                        loadSocialMediaLinks(),
                        loadAboutUs(),
                        loadProducts(),
                        loadService(),
                        loadGallery(),
                        loadPayments(),
                        loadFeedbackVerifyData(),
                        loadQrCode(),
                    ]);

                    // -------------------------------
                    // Load Instagram embed script once
                    // -------------------------------
                    if (!document.getElementById("instagram-embed")) {
                    const script = document.createElement("script")
                    script.src = "https://www.instagram.com/embed.js"
                    script.async = true
                    script.id = "instagram-embed"
                    document.body.appendChild(script)
                    
                    script.onload = async () => {
                        // Wait for DOM updates
                        await nextTick()
                        if (window.instgrm) {
                        window.instgrm.Embeds.process()
                        }
                    }
                    } else {
                        // Script already exists, just re-process embeds
                        await nextTick()
                        if (window.instgrm) {
                            window.instgrm.Embeds.process()
                        }
                    }
                } catch (e) {
                    console.error(e);
                    toast.warning("Failed to load details");
                }
            });

            

            // functions are
            const selectedImage = ref(null);
            const showModal = ref(false);

            function openImage(img) {
                selectedImage.value = img;
                showModal.value = true;
            }

            function closeModal() {
               showModal.value = false;
            }

            // plan popup show
            const showPlan = ref(false)
            function gotoPlanPopup(){
                showPlan.value = true
            }
            // plan popup close
            function gotoPlanPopupClose(){
                showPlan.value = false
            }

            

            const selectProduct = (name) => {
                productnameEnquiry.value = name;

                nextTick(() => {
                    const form = document.getElementById("enquiry");
                    if (form) {
                        form.scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                    }
                });
            };
           
            // Enquiry Validation Schema
            const schema = yup.object({
                enquiryUserName: yup.string()
                    .required('Please Enter Name'),

                Enquiryphone: yup.string()
                    .matches(/^[0-9]{10}$/, 'Phone must be exactly 10 digits')
                    .matches(/^(?!([0-9])\1{9})[0-9]{10}$/, 'Invalid phone number')
                    .required('Please Enter Phone No'),

                productnameEnquiry: yup.string()
                    .required('Please Enter Product Name'),

                enquiryMessage: yup.string()
                    .required('Please Enter Message'),
            });


            const { handleSubmit, submitCount } = useForm({
                validationSchema: schema,
            });

            // Fields
            const { value: enquiryUserName, errorMessage: nameError } = useField('enquiryUserName');
            const { value: Enquiryphone, errorMessage: phoneError } = useField('Enquiryphone');
            const { value: productnameEnquiry, errorMessage: productNameEnquError } = useField('productnameEnquiry');
            const { value: enquiryMessage, errorMessage: messageEnqError } = useField('enquiryMessage');

            const enquiryOnSubmit = handleSubmit(async (values) => {
                // console.log("SUBMITTED VALUES:", values);
                try {
                    values.miniWebId = Number(cardStore.cardId)
                    const resData = await axios.post('/saveEnquiryData',{...values});
                    if(resData.data.status == true){
                        enquiryUserName.value = ''
                        Enquiryphone.value = ''
                        productnameEnquiry.value = ''
                        enquiryMessage.value = ''
                        nameError.value = ''
                        phoneError.value = ''
                        productNameEnquError.value = ''
                        messageEnqError.value = ''

                        Swal.fire({
                            title: 'Success',
                            text: resData.data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        console.log(resData.data.getDatas)    
                    }
                    else{
                        Swal.fire({
                            title: 'Warningss',
                            text: resData.data.message,
                            icon: 'danger',
                            confirmButtonText: 'OK'
                        });   
                    }
                } catch (error) {
                    Swal.fire({
                        title: 'Error!',
                        icon: 'error',
                        text: error,
                        confirmButtonText: 'OK'
                    })
                }
            });

            // feedback form submit
            const fbSchema = yup.object({
                fbUserName: yup.string().required('Please Enter Name'),
                fbphone: yup.string()
                    .matches(/^[0-9]{10}$/, 'Phone must be exactly 10 digits')
                    .matches(/^(?!([0-9])\1{9})[0-9]{10}$/, 'Invalid phone number')
                    .required('Please Enter Phone No'),
                fbmessage: yup.string().required('Please Enter Feedback')
            })

            // Bind this form to validation schema
            const { handleSubmit: handleFbSubmit, submitCount: fbSubmitCount } = useForm({
                validationSchema: fbSchema
            })

            const { value: fbUserName, errorMessage: fbnameError } = useField('fbUserName')
            const { value: fbphone, errorMessage: fbphoneError } = useField('fbphone')
            const { value: fbmessage, errorMessage: fbmessageError } = useField('fbmessage')

            const feedbackOnSubmit = handleFbSubmit(async (values) => {
                try {
                    const res = await axios.post('/saveFeedBackData', {
                        fbUserName: values.fbUserName,
                        fbphone: values.fbphone,
                        fbmessage: values.fbmessage,
                        miniWebId: Number(cardStore.cardId),
                    })

                    
                    if(res.data.status == true){
                        fbUserName.value = ''
                        fbphone.value = ''
                        fbmessage.value = ''
                        Swal.fire({
                                title: 'Success',
                                text: res.data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                        });
                    }
                    else {
                        Swal.fire({
                                title: 'Warning',
                                text: res.data.message,
                                icon: 'danger',
                                confirmButtonText: 'OK'
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        title: 'Warning',
                        text: res.data.message+' '+error,
                        icon: 'danger',
                        confirmButtonText: 'OK'
                    });
                }
            })
            
            const encodedUrl = ref("")
            const cpyUrl = ref("")
            const currentUrl = window.location.href
            encodedUrl.value = cpyUrl.value = currentUrl

            const copyToClipboard = async () => {
                const textToCopy = cpyUrl.value;

                // 1. Try the modern Clipboard API
                if (navigator.clipboard && window.isSecureContext) {
                    try {
                        await navigator.clipboard.writeText(textToCopy);
                        alert("URL copied!");
                        return;
                    } catch (err) {
                        console.error("Clipboard API failed", err);
                    }
                }

                // 2. Fallback: Create a temporary textarea element
                const textArea = document.createElement("textarea");
                textArea.value = textToCopy;
                
                // Ensure the textarea is not visible but stays in the DOM
                textArea.style.position = "fixed";
                textArea.style.left = "-9999px";
                textArea.style.top = "0";
                document.body.appendChild(textArea);
                
                textArea.focus();
                textArea.select();

                try {
                    const successful = document.execCommand('copy');
                    if (successful) {
                        alert("URL copied (fallback)!");
                    } else {
                        throw new Error('Copy command failed');
                    }
                } catch (err) {
                    console.error("Fallback failed", err);
                    alert("Unable to copy. Please copy manually.");
                } finally {
                    document.body.removeChild(textArea);
                }
            };

            return {
                cd_id,
                gotoPlanPopup,
                showPlan,
                gotoPlanPopupClose,
                encodedUrl,
                companyData, // company data
                companyName,
                ownerName,
                designation,
                logoImage,
                is_purchased,
                // address and contact details
                addData,
                phoneNo,
                whatsappNo,
                emailID,
                currentAddress,
                // media links
                mediaData,
                fb_link,
                inst_link,
                youtube_link1,
                youtube_link2,
                instaReals_link1,
                instaReals_link2,
                youtubeEmbed,
                normalizeInstaUrl,
                // about us
                aboutUsData,
                aboutTxt,
                // feedback verify data
                feedbackVerifyData,
                // payments qr code images
                paymentQrs,
                // Qr data
                qrData,
                qrImage,
                downloadQR,
                isDownloading,
                cpyUrl,
                copyToClipboard,

                // feedback
                feedbackOnSubmit,
                fbSubmitCount,
                fbUserName,
                fbphone,
                fbmessage,

                // feedback error message
                fbSchema,
                fbnameError,
                fbphoneError,
                fbmessageError,

                // enquiry submit
                enquiryOnSubmit,
                // enquiry form fields
                schema,
                submitCount,
                enquiryUserName,
                Enquiryphone,
                productnameEnquiry,
                enquiryMessage,
                // enquiry error fields
                nameError,
                phoneError,
                productNameEnquError,
                messageEnqError,

                serviceData,
                service2,
                service1,
                products,
                selectedImage,
                showModal,
                closeModal,
                openImage,
                defaultLogo,
                defaultPro1,
                defaultPro2,
                defaultPro3,
                defaultPro4,
                defaultPro5,
                galleryData,
                gPay,
                paytm,
                selectProduct,
            }
        }
    }
</script>