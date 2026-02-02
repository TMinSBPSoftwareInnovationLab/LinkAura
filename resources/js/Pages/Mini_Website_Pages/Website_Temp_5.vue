<template>
    <main class="p-2 px-0 m-2 bg-gray-300">
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

            <!-- front page -->
            <div class="relative flex flex-col w-full h-screen bg-[#15004e] justify-center items-center overflow-hidden">
                <!-- SVG background -->
                <div class="absolute inset-0 z-0 pointer-events-none">
                <svg
                    viewBox="0 0 800 800"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-full h-full"
                >
                    <defs>
                        <filter id="glow">
                            <feGaussianBlur stdDeviation="6" result="blur" />
                            <feMerge>
                            <feMergeNode in="blur" />
                            <feMergeNode in="SourceGraphic" />
                            </feMerge>
                        </filter>

                        <!-- original square -->
                        <rect
                            id="some-square"
                            x="350"
                            y="350"
                            rx="20"
                            fill="hsl(256, 80%, 65%)"
                            stroke="hsl(256, 80%, 45%)"
                            stroke-width="11"
                            width="200"
                            height="200"
                            filter="url(#glow)"
                        />
                    </defs>

                    <!-- ORIGINAL POSITIONS (unchanged) -->
                    <use x="-100" y="-100" href="#some-square" class="box box-1" />
                    <use x="100" y="100" href="#some-square" class="box box-2" />
                    <use x="-200" y="-200" href="#some-square" class="box box-3" />
                    <use x="200" y="200" href="#some-square" class="box box-4" />
                </svg>
                </div>

                <!-- content -->
                <div class="relative z-10 flex flex-col items-center">
                    <div class="p-3 bg-white rounded-2xl shadow-2xl">
                        <img
                        :src="logoImage || defaultLogo"
                        class="w-[150px] h-[150px] object-contain"
                        />
                    </div>
                </div>
            </div>
            <!-- front page /. -->

            <!-- company details with contact details -->
            <div id="home" class="relative flex flex-col w-full bg-white mt-1">
                <div class="relative w-full h-[180px] bg-[#15004e] rounded-b-[150px] overflow-hidden"></div>

                <div class="flex flex-col items-center -mt-24 px-4">
                    
                    <div class="relative flex items-center justify-center w-full h-[220px] md:h-[250px]">
                        <div class="absolute w-[200px] h-[200px] md:w-[245px] md:h-[245px] rounded-full border-[25px] md:border-[35px] border-t-[#E91E63] border-r-transparent border-b-transparent border-l-transparent rotate-[25deg]"></div>

                        <div class="absolute w-[200px] h-[200px] md:w-[245px] md:h-[245px] rounded-full border-[25px] md:border-[35px] border-b-[#FF5722] border-r-transparent border-t-transparent border-l-transparent rotate-[70deg]"></div>

                        <div class="absolute w-[165px] h-[165px] md:w-[205px] md:h-[205px] rounded-full border-[10px] md:border-[14px] border-[#DCE8ED] bg-transparent"></div>

                        <div class="relative z-10 w-[145px] h-[145px] md:w-[180px] md:h-[180px] bg-[#F7F7F2] rounded-full flex items-center justify-center shadow-xl">
                            <div v-if="logoImage" class="p-3 md:p-4">
                                <img :src="logoImage" alt="logo" class="w-[110px] h-[110px] md:w-[150px] md:h-[150px] object-contain rounded-full" />
                            </div>
                            <div v-else class="p-3 md:p-4">
                                <img :src="defaultLogo" alt="default" class="w-[110px] h-[110px] md:w-[150px] md:h-[150px] object-contain rounded-full" />
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 text-center">
                        <h1 class="text-xl font-bold text-black tracking-tight uppercase">{{  ownerName || "Balamurugan S" }}</h1>
                        <p class="text-[16px] font-semibold text-gray-800">{{ designation || "Managing Director" }}</p>
                        <p class="text-[16px] font-semibold text-gray-800">{{ companyName || "Thirumurugan Educational Academy" }}</p>
                    </div>

                </div>

                <!-- content area -->
                <div class="flex flex-col w-full px-10 mt-10">
                    <!-- phone number -->
                    <div class="flex items-center gap-4">
                        <div class="relative flex items-center justify-center w-12 h-12 shrink-0">    
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 30 30" class="w-10 h-10">
                                    <path fill="#BF0040" d="M1 2.5c0 .8.5 2.6 1.2 4 .9 2.1.9 3.1 0 4.6-1.5 2.4-1.5 6.2 0 7.7.9.9.8 2.1-.2 5.2-.7 2.2-1 4.3-.6 4.7.3.4 2.3.1 4.2-.6 3-1.1 4.1-1.1 6 0 1.9 1 3.1 1 6.2 0 2.9-1 4.4-1 6-.2 4.9 2.6 6.4.7 3.7-4.5-1.3-2.5-1.3-3.1.1-5.3 1.4-2 1.4-2.9.3-6.3-1-3.1-1-4.4-.1-5.9 2.7-4.2.6-6.2-4-3.8-1.6.8-3.1.8-6-.2-3.1-1-4.4-1-5.9-.1-2.3 1.5-5.6 1.6-6.4.2C4.5.5 1 .8 1 2.5"/>
                                </svg>
                            </div>

                            <div class="relative z-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 28.314 28.323" xml:space="preserve">
                                    <path d="m27.728 20.384-4.242-4.242a1.982 1.982 0 0 0-1.413-.586h-.002c-.534 0-1.036.209-1.413.586L17.83 18.97l-8.485-8.485 2.828-2.828c.78-.78.78-2.05-.001-2.83L7.929.585A1.986 1.986 0 0 0 6.516 0h-.001C5.98 0 5.478.209 5.101.587L.858 4.83C.729 4.958-.389 6.168.142 8.827c.626 3.129 3.246 7.019 7.787 11.56 6.499 6.499 10.598 7.937 12.953 7.937 1.63 0 2.426-.689 2.604-.867l4.242-4.242c.378-.378.587-.881.586-1.416 0-.534-.208-1.037-.586-1.415zm-5.656 5.658c-.028.028-3.409 2.249-12.729-7.07C-.178 9.452 2.276 6.243 2.272 6.244L6.515 2l4.243 4.244-3.535 3.535a.999.999 0 0 0 0 1.414l9.899 9.899a.999.999 0 0 0 1.414 0l3.535-3.536 4.243 4.244-4.242 4.242z"/>
                                </svg>
                            </div>

                        </div>

                        <div class="flex flex-col">
                            <span class="text-[12px] font-bold uppercase tracking-wider text-black/50">Call Us</span>
                            <a :href="`tel:+91${phoneNo}`" class="hover:underline">
                                <p class="font-bold text-[16px] text-gray-800"> +91 {{ phoneNo || "9876543210" }}</p>
                            </a>
                        </div>
                    </div>
                    <!-- phone number /. -->

                    <!-- whatsapp number -->
                    <div class="flex items-center gap-4 mt-5">
                        <div class="relative flex items-center justify-center w-12 h-12 shrink-0">    
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 30 30" class="w-10 h-10">
                                    <path fill="#BF0040" d="M1 2.5c0 .8.5 2.6 1.2 4 .9 2.1.9 3.1 0 4.6-1.5 2.4-1.5 6.2 0 7.7.9.9.8 2.1-.2 5.2-.7 2.2-1 4.3-.6 4.7.3.4 2.3.1 4.2-.6 3-1.1 4.1-1.1 6 0 1.9 1 3.1 1 6.2 0 2.9-1 4.4-1 6-.2 4.9 2.6 6.4.7 3.7-4.5-1.3-2.5-1.3-3.1.1-5.3 1.4-2 1.4-2.9.3-6.3-1-3.1-1-4.4-.1-5.9 2.7-4.2.6-6.2-4-3.8-1.6.8-3.1.8-6-.2-3.1-1-4.4-1-5.9-.1-2.3 1.5-5.6 1.6-6.4.2C4.5.5 1 .8 1 2.5"/>
                                </svg>
                            </div>

                            <div class="relative z-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                                    <path d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.78.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-1.99-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.22.25-.86.85-.86 2.07 0 1.22.89 2.4 1.01 2.56.12.17 1.75 2.67 4.23 3.74.59.26 1.05.41 1.41.52.59.19 1.13.16 1.56.1.48-.07 1.47-.6 1.67-1.18.21-.58.21-1.07.15-1.18s-.22-.16-.47-.28z"/>
                                </svg>
                            </div>

                        </div>

                        <div class="flex flex-col">
                            <span class="text-[12px] font-bold uppercase tracking-wider text-black/50">WhatsApp</span>
                            <a :href="`https://wa.me/${whatsappNo}`" target="_blank" class="hover:underline">
                                <p class="font-bold text-[16px] text-gray-800"> +91 {{ whatsappNo || "9876543210" }}</p>
                            </a>
                        </div>
                    </div>
                    <!-- whatsapp number /. -->

                    <!-- email -->
                    <div class="flex items-center gap-4 mt-5">
                        <div class="relative flex items-center justify-center w-12 h-12 shrink-0">    
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 30 30" class="w-10 h-10">
                                    <path fill="#BF0040" d="M1 2.5c0 .8.5 2.6 1.2 4 .9 2.1.9 3.1 0 4.6-1.5 2.4-1.5 6.2 0 7.7.9.9.8 2.1-.2 5.2-.7 2.2-1 4.3-.6 4.7.3.4 2.3.1 4.2-.6 3-1.1 4.1-1.1 6 0 1.9 1 3.1 1 6.2 0 2.9-1 4.4-1 6-.2 4.9 2.6 6.4.7 3.7-4.5-1.3-2.5-1.3-3.1.1-5.3 1.4-2 1.4-2.9.3-6.3-1-3.1-1-4.4-.1-5.9 2.7-4.2.6-6.2-4-3.8-1.6.8-3.1.8-6-.2-3.1-1-4.4-1-5.9-.1-2.3 1.5-5.6 1.6-6.4.2C4.5.5 1 .8 1 2.5"/>
                                </svg>
                            </div>

                            <div class="relative z-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>

                        </div>

                        <div class="flex flex-col">
                            <span class="text-[12px] font-bold uppercase tracking-wider text-black/50">Email</span>
                            <a :href="`mailto:${emailID}`" class="hover:underline">
                                <p class="font-bold text-[16px] text-gray-800">{{ emailID || "info@linkaura.com" }}</p>
                            </a>
                        </div>
                    </div>
                    <!-- email /. -->

                    <!-- Address -->
                    <div class="flex items-center gap-4 mt-5">
                        <div class="relative flex items-center justify-center w-12 h-12 shrink-0">    
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 30 30" class="w-10 h-10">
                                    <path fill="#BF0040" d="M1 2.5c0 .8.5 2.6 1.2 4 .9 2.1.9 3.1 0 4.6-1.5 2.4-1.5 6.2 0 7.7.9.9.8 2.1-.2 5.2-.7 2.2-1 4.3-.6 4.7.3.4 2.3.1 4.2-.6 3-1.1 4.1-1.1 6 0 1.9 1 3.1 1 6.2 0 2.9-1 4.4-1 6-.2 4.9 2.6 6.4.7 3.7-4.5-1.3-2.5-1.3-3.1.1-5.3 1.4-2 1.4-2.9.3-6.3-1-3.1-1-4.4-.1-5.9 2.7-4.2.6-6.2-4-3.8-1.6.8-3.1.8-6-.2-3.1-1-4.4-1-5.9-.1-2.3 1.5-5.6 1.6-6.4.2C4.5.5 1 .8 1 2.5"/>
                                </svg>
                            </div>

                            <div class="relative z-10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>

                        </div>

                        <div class="flex flex-col">
                            <span class="text-[12px] font-bold uppercase tracking-wider text-black/50">Address</span>
                            <p class="font-bold text-[15px] text-gray-800"> 
                                {{ currentAddress || "12-B, Sriniwas Eagle garden, Bangalore, Karnataka 638107" }}
                            </p>
                        </div>
                    </div>
                    <!-- Address /. -->
                </div>
                <!-- content area /. -->

                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->
            </div>
            <!-- company details with contact details /.-->

            <!-- about us -->
            <div id="aboutus" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- about header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            About us
                        </text>
                    </svg>
                </div>
                <!-- about header /. -->

                <!-- about para -->
                <div class="flex flex-col w-full">
                    <div class="flex flex-col w-full mt-5 p-5 pt-0 pb-5 pl-4">
                    <p class="custom-fade-in text-justify text-[14px] leading-loose font-semibold">
                        {{ aboutTxt || "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc."}}
                    </p>
                    </div>
                </div>
                <!-- about para /.-->

                <!-- footer -->
                <div class="grid grid-cols-3 w-full">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->

            </div>
            <!-- about us /. -->

            <!-- products -->
            <div id="products" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- product header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            Products
                        </text>
                    </svg>
                </div>
                <!-- products header /. -->

                <!-- PRODUCT AREA -->
                <div class="grid grid-cols-2 gap-4 items-stretch px-1">

                    <!-- PRODUCT CARD -->
                    <div v-for="(item, index) in products" :key="index" class="flex flex-col w-full h-full bg-white p-3">
                        <!-- product image -->
                        <div class="w-full h-[200px] md:h-[250px] rounded-[15px] bg-white border border-gray-300 cursor-pointer" @click="openImage(item.product_img)" >
                            <img :src="item.product_img" class="w-full h-full object-contain" >
                        </div>

                        <!-- product name -->
                        <p class="font-bold text-[14px] text-gray-800 mt-2">
                            {{ item.product_name }}
                        </p>

                        <!-- price area -->
                        <div class="flex items-center gap-2 mt-1">
                            <p
                                class="relative text-[18px] font-semibold text-gray-500
                                after:content-[''] after:absolute after:left-0 after:top-1/2
                                after:w-full after:h-[2px] after:bg-gray-200 after:-rotate-12"
                            >
                                ₹{{ item.orginal_price }}
                            </p>

                            <p class="text-[17px] font-bold text-gray-900">
                                ₹{{ item.final_price }}
                            </p>
                        </div>

                        <!-- discount -->
                        <p class="font-bold text-[12px] text-red-800 mt-1">
                            DISCOUNT ₹{{ item.discount_price }}
                        </p>

                        <!-- FLEX SPACER -->
                        <div class="flex-1"></div>

                        <!-- enquiry button -->
                        <button
                            class="w-[110px] bg-[#DF1968] p-[8px] text-white text-[12px]
                            font-semibold rounded-lg uppercase mt-3"
                            @click="selectProduct(item.product_name)"
                        >
                            Enquiry Now
                        </button>

                    </div>
                    <!-- PRODUCT CARD /. -->

                </div>
                <!-- PRODUCT AREA /. -->


                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->

            </div>
            <!-- products /. -->


            <!-- service -->
            <div id="services" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- service header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            Service
                        </text>
                    </svg>
                </div>
                <!-- service header /. -->

                <!-- service content -->
                <div class="flex flex-col w-full">
                    <div class="grid grid-cols-2 gap-2">
                        <div 
                            v-for="(item, index) in serviceData" 
                            :key="index"
                            class="flex flex-col w-full items-center  mt-5">
                            <!-- service image -->
                            <div class="flex flex-col w-[150px] h-[150px] p-2 items-center overflow-hidden">
                                <img 
                                    :src="item.service_img" 
                                    :alt="item.service_img"
                                    @click="openImage(item.service_img)"
                                    class="w-full h-full object-cover rounded-full"
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
                </div>
                <!-- service content /. -->


                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->
            </div>
            <!-- service /. -->

            <!-- videos -->
            <div id="Videos" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- videos header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            videos
                        </text>
                    </svg>
                </div>
                <!-- videos header /. -->

                <!-- Video content -->
                <div class="flex flex-col w-full bg-[#f1f1f1]">
                    <!-- Youtube area -->
                    <div class="flex flex-col w-full p-5 bg-[#DF1968] mb-2 mt-2">
                        <div v-if="youtube_link1 || youtube_link2" class="flex flex-col gap-4 bg-[#DF1968] mt-2 mb-4 rounded-lg" >
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
                    <div v-if="instaReals_link1 || instaReals_link2" class="grid grid-cols-1 gap-4 p-5 bg-[#DF1968] mb-2">
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


                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->
            </div>
            <!-- videos /.-->

            <!-- gallery -->
            <div id="gallery" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- gallery header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            gallery
                        </text>
                    </svg>
                </div>
                <!-- gallery header /. -->

                <!-- gallery content -->
                <div class="flex flex-col w-full">
                    <div class="grid grid-cols-2 gap-4 px-3">
                        <div 
                            v-for="(item, index) in galleryData" 
                            :key="index"
                            class="flex flex-col bg-white rounded-lg w-full items-center mt-2 p-2">
                            <!-- service image -->
                            <div class="flex flex-col w-full h-[225px] p-0 items-center overflow-hidden shadow-sm">
                                <!-- border-1 border-[#84a7d5] -->
                                <img 
                                    :src="item.gallery" 
                                    alt="item.gallery"
                                    @click="openImage(item.gallery)"
                                    class="w-full h-full object-contain rounded-xl"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <!-- gallery content /. -->


                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->
            </div>
            <!-- gallery /.-->

            <!-- payments -->
            <div id="payments" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- payments header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            Payments
                        </text>
                    </svg>
                </div>
                <!-- payments header /. -->

                <!-- payment qr -->
                <div v-if="paymentQrs.length" class="flex flex-col w-full bg-white">

                    <!-- qr section -->
                    <div class="grid grid-cols-1 gap-4 px-3 py-5">

                        <div
                            v-for="(item, index) in paymentQrs"
                            :key="index"
                            class="flex flex-col w-full h-full border border-gray-300 shadow-md rounded-xl p-2"
                        >
                            <img
                                :src="item.img"
                                :alt="item.name"
                                class="w-full h-full object-contain"
                                @click="openImage(item.img)"
                            />
                            <p class="text-center text-sm font-semibold mt-2">
                                {{ item.name }}
                            </p>
                        </div>

                    </div>
                    <!-- qr section /. -->

                </div>
                <!-- default -->
                <div v-else class="text-center text-gray-500 py-5">
                    <div class="flex flex-col w-full bg-white">
                        <!-- qr section -->
                        <div class="grid grid-cols-1 gap-4 items-center justify-center text-center px-3 py-5">
                            <!-- cols1 -->
                            <div class="flex flex-col w-full h-full border-1 border-[#414143] shadow-2xl rounded-xl">
                                <img :src="gPay" alt="gpay number" class="w-full h-full object-contain" @click="openImage(gPay)">
                            </div>
                            <!-- cols1 /. -->
                            <!-- cols1 -->
                            <div class="flex flex-col w-full h-full border-1 border-[#414143] shadow-2xl rounded-xl">
                                <img :src="paytm" alt="Paytm number" class="w-full h-full object-contain" @click="openImage(paytm)">
                            </div>
                            <!-- cols1 /. -->
                        </div>
                        <!-- qr section /. -->
                    </div>
                </div>
                <!-- default -->
                <!-- payment qr /. -->

                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->
            </div>
            <!-- payments /.-->

            <!-- enquiry -->
            <div id="enquiry" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- enquiry header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            Enquiry
                        </text>
                    </svg>
                </div>
                <!-- enquiry header /. -->


                <!-- enquiry form -->
                <div class="flex flex-col p-5">
                    <form @submit.prevent="enquiryOnSubmit" class="space-y-4">
                        <div>
                            <input
                            v-model="enquiryUserName"
                            type="text"
                            placeholder="Enter Name"
                            class="text-gray-400 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
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
                            class="text-gray-400 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
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
                            class="text-gray-400 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
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
                            class="text-gray-400 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            ></textarea>
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="submitCount > 0 && messageEnqError" class="text-red-500 text-sm">{{ messageEnqError }}</span>
                            </div>
                        </div>
                        <div class="items-center justify-center text-center">
                            <button type="submit" class="w-[150px] text-gray border-2 bg-[#DF1968] text-white py-2 rounded-xl " >
                            Send
                            </button>
                        </div>  
                    </form>
                 </div>
                <!-- enquiry form /.-->


                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->
            </div>
            <!-- enquiry /.-->

            <!-- feedback -->
            <div id="feedback" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- feedback header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            Feedback
                        </text>
                    </svg>
                </div>
                <!-- feedback header /. -->


                <!-- Feedback form area -->
                 <div class="flex flex-col p-5">
                    <form @submit.prevent="feedbackOnSubmit" class="space-y-4">
                        <div>
                            <input
                            v-model="fbUserName"
                            type="text"
                            placeholder="Enter Name"
                            class="text-gray-400 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
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
                            class="text-gray-400 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
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
                            class="text-gray-400 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            ></textarea>
                            <!-- Character Counter -->
                            <div class="flex justify-between items-center mt-1">
                                <span v-if="fbSubmitCount > 0 && fbmessageError" class="text-red-500 text-sm"> {{ fbmessageError }}
                                </span>
                                <span class="text-red-500 font-bold text-xs" v-if="fbmessage"> {{ fbmessage.length }}/125 </span>
                            </div>
                        </div>  
                        <div class="items-center justify-center text-center">
                            <button type="submit" class="w-[150px] text-gray bg-[#DF1968] text-white py-2 rounded-xl" >
                            Send
                            </button>
                        </div>  
                    </form>
                 </div>
                <!-- Feedback form area /. -->

                <!-- Feedback review -->
                <div class="flex flex-col w-full bg-[#07254b] mb-3">
                    <!-- heading -->
                    <div class="flex flex-col w-full p-3">
                        <p class="font-semibold text-[#ffffff] text-[14px] p-1 text-center uppercase border-4 border-l-[#DF1968] border-r-[#DF1968] border-t-0 border-b-0">
                            Customer FeedBacks
                        </p>
                    </div>
                    <!-- heading /. -->
                    <!-- feedback message -->
                    <div class="flex flex-col w-full p-5 bg-white">
                        <div
                            v-for="(item, index) in feedbackVerifyData"
                            :key="item.id"
                            class="flex flex-col w-full p-3 shadow-sm mb-4 rounded-lg"
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


                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->
            </div>
            <!-- feedback /.-->

            <!-- share my details -->
            <div id="shareMyDetails" class="flex flex-col w-full mt-2 bg-white pt-2">
                <!-- share header -->
                <div class="flex flex-col w-full">
                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 320 56">
                        <path fill="#DF1968" d="M20 11.2c0 13.3 1 17.4 4.9 21.2 2.9 2.8 4.1 3 69.3 13l66.3 10.1 65.8-10.2c64.5-9.9 66-10.2 68.8-12.9 3.9-3.8 4.9-7.9 4.9-21.2V0H20z"/>
                        <path fill="#DF1968" d="M17.7 4.9C15.5 8.6 15.6 9 18 9c1.6 0 2-.7 2-3.5 0-1.9-.1-3.5-.3-3.5-.1 0-1 1.3-2 2.9m282.3.3c0 3.1.4 3.8 2 3.8 2.5 0 2.5-.2 0-4.2l-2-3.3z"/>
                        <path d="M0 15v6h20V9H0zm300 0v6h20V9h-20z"/>
                        <path fill="#BF0040" fill-opacity=".1" d="M23.5 33c1 1.1 2 2 2.3 2s-.3-.9-1.3-2-2-2-2.3-2 .3.9 1.3 2m272.4-.3c-1.3 1.6-1.2 1.7.4.4.9-.7 1.7-1.5 1.7-1.7 0-.8-.8-.3-2.1 1.3"/>

                        <text 
                            x="50%" 
                            y="25" 
                            fill="white" 
                            font-family="Arial, sans-serif" 
                            font-size="14" 
                            font-weight="bold" 
                            text-anchor="middle" 
                            dominant-baseline="middle">
                            Share Me
                        </text>
                    </svg>
                </div>
                <!-- share header /. -->

                <!-- share my detail content -->
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
                            class="flex w-[100px] h-[30px] border border-[#524b4b] items-center justify-center gap-2 rounded-2xl">
                            <ArrowDownTrayIcon class="size-4" :class="{ 'animate-download': isDownloading }" /> 
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
                <!-- share my detail content /. -->

                <!-- footer -->
                <div class="grid grid-cols-3 w-full mt-10">
                    <!-- column1 -->
                     <div class="flex flex-col h-[40px] w-full">
                        <div class="h-1/2 bg-white"></div>
                        <div class="h-1/2 bg-[#DF1968] border-7 border-t-0 border-l-0 border-r-0 border-b-gray-800 " style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);"></div>
                    </div>
                    <!-- column1 /.-->

                    <!-- column2 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[11%]"> 
                        <div class="h-[40px] bg-[#DF1968] w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 80% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column2 /. -->

                    <!-- column3 -->
                    <div class="filter drop-shadow-[5px_0_0_#1F2937] -ml-[21%]"> 
                        <div class="h-[40px] bg-white w-full border-7 border-t-gray-800 border-l-0 border-r-0" 
                            style="clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);">
                        </div>
                    </div>
                    <!-- column3 /. -->
                </div>
                <!-- footer /. -->
            </div>
            <!-- share my details /.-->
            

        </div>

        <!-- website footer  -->
        <WebsiteFooterBar v-if="isFooter"/>
        <!-- website footer  -->
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
    import rebbon1 from '@/assets/images/mini_website/website5/rebbons/rebbon1.png'

    import { PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon, ChevronLeftIcon, ChevronRightIcon, ArrowDownTrayIcon } from '@heroicons/vue/24/solid'
    import WebsiteFooterBar from '../Components/WebsiteFooterBar.vue';

    export default{
        name: "Website_Temp_5",
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
                    // console.log("if url full :", is_purchased.value)
                    // console.log('Access blocked 4:', cd_id, is_purchased.value)

                    // remove query string
                    router.replace({
                        path: route.path
                    })
                } else {
                    // console.log("else url ")
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
                },
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
                        downloadQR(),
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
                // showPlan.value = true
                router.push('/dashboard')
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
                rebbon1,
                defaultLogo,
                showPlan,
                gotoPlanPopup,
                gotoPlanPopupClose,
                // setup files
                galleryData,
                defaultPro1,
                defaultPro2,
                defaultPro3,
                defaultPro4,
                defaultPro5,
                defaultLogo,
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
                // products
                products,
                selectedImage,
                openImage,
                showModal,
                closeModal,
                gotoPlanPopup,
                gotoPlanPopupClose,
                showPlan,
                selectProduct,
                // service
                serviceData,
                service2,
                service1,
                // payments qr code images
                paymentQrs,
                paytm,
                gPay,
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
                // feedback verify data
                feedbackVerifyData,
                // Qr data
                qrData,
                qrImage,
                downloadQR,
                isDownloading,
                encodedUrl,
                cpyUrl,
                copyToClipboard,
            }
        }
    }
</script>

<style scoped>
    @keyframes subtleFloat {
    0% {
        transform: translate(0, 0) rotate(0deg) scale(1);
        opacity: 0.9;
    }
    25% {
        transform: translate(12px, -10px) rotate(3deg) scale(1.03);
    }
    50% {
        transform: translate(-10px, 12px) rotate(-3deg) scale(0.97);
    }
    75% {
        transform: translate(8px, 6px) rotate(4deg) scale(1.04);
    }
    100% {
        transform: translate(0, 0) rotate(0deg) scale(1);
        opacity: 0.9;
    }
    }

    .box {
        animation: subtleFloat 12s ease-in-out infinite;
        transform-origin: center;
        will-change: transform;
    }

    /* stagger only – NO position change */
    .box-1 {
        animation-delay: 0s;
    }
    .box-2 {
        animation-delay: 2.5s;
    }
    .box-3 {
        animation-delay: 5s;
    }
    .box-4 {
        animation-delay: 7.5s;
    }
</style>