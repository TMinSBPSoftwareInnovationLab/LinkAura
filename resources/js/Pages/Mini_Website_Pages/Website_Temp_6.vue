<template>
    <main class="p-2 px-0 m-2">
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
            <div class="relative flex flex-col w-full h-screen bg-[#138d95] justify-center items-center overflow-hidden">
                <div class="absolute inset-0 z-0 pointer-events-none">
                    <svg viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                        <g
                            fill="#22bdc9"
                            stroke="#00FFFF"
                            stroke-width="11"
                            transform="scale(1)"
                            transform-origin="400"
                        >
                            <circle r="20" cx="710" cy="70" />
                            <circle fill="#22bdc9" stroke="#00FFFF" r="33" cx="300" cy="255" />
                            <circle stroke-width="44" r="125" cx="175" cy="455" />
                            <circle r="75" cx="500" cy="315" />
                            <circle r="90" cx="600" cy="615" />
                        </g>
                    </svg>
                </div>

                <!-- content -->
                <div class="relative  flex flex-col items-center">
                    <div class="relative flex h-[166px] w-[166px] items-center justify-center overflow-hidden rounded-2xl bg-slate-200">
                        
                        <div class="animate-rotate absolute inset-[-100%] bg-[conic-gradient(from_0deg,#14abab_0deg,#14abab_90deg,transparent_90deg,transparent_180deg,#14abab_180deg,#14abab_270deg,transparent_270deg)]"></div>
                        
                        <div class="relative  flex h-[160px] w-[160px] items-center justify-center bg-white rounded-[14px]">
                            <img
                                :src="logoImage || defaultLogo"
                                class="w-[150px] h-[150px] object-contain"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <!-- front page /.-->

            <!-- company details with contact details -->
            <div id="home" class="relative flex flex-col w-full bg-[#1F2734] mt-1">
                <!-- logo -->
                <div class="flex flex-col w-full items-center">
                    <span v-if="logoImage">
                        <!-- <img :src="logo_path" alt="deafultLogo" class="w-[120px] h-[120px]"></img> -->
                            <div class="flex p-5 items-center justify-center text-center">
                            <img :src="logoImage" alt="defaultLogo" class="w-[150px] h-[150px] object-contain" />
                        </div>
                    </span>
                    <span v-else>
                            <img  :src="defaultLogo" class="w-[150px] h-[150px] object-contain bg-white m-10 p-2 rounded-full" />
                    </span>                        
                </div>
                <!-- logo /. -->

                <!-- bottom row -->
                <div class="flex flex-col w-full">
                    <div class="grid grid-cols-3">
                        <div class="bg-[#138d95] p-3 text-white text-center"></div>
                        <div class="bg-[#22bdc9] p-3 text-white text-center"></div>
                        <div class="bg-[#138d95] p-3 text-white text-center"></div>
                    </div>
                </div>
                <!-- bottom row /. -->

                <!-- content area -->
                <div class="flex flex-col w-full">
                    <div class="max-w-md bg-white px-4 p-8 font-sans">
                        <!-- owner info -->
                        <div class="flex flex-col w-full mb-10">
                            <div class="mt-2 text-center">
                                <h1 class="text-xl font-bold text-black tracking-tight uppercase">{{  ownerName || "Balamurugan S" }}</h1>
                                <p class="text-[16px] font-semibold text-gray-800">{{ designation || "Managing Director" }}</p>
                                <p class="text-[16px] font-semibold text-gray-800">{{ companyName || "Thirumurugan Educational Academy" }}</p>
                            </div>
                        </div>
                        <!-- owner info /. -->
                        <div class="relative ml-16">
                            
                            <div class="absolute left-0 top-0 bottom-0 w-[1px] bg-slate-200"></div>
                            <!-- phone number -->
                            <div class="relative flex items-center pl-8 pb-10">
                                <div class="absolute -left-12 flex items-center justify-center w-8 h-8 text-slate-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-[#22bdc9]" viewBox="0 0 28.314 28.323" xml:space="preserve">
                                    <path d="m27.728 20.384-4.242-4.242a1.982 1.982 0 0 0-1.413-.586h-.002c-.534 0-1.036.209-1.413.586L17.83 18.97l-8.485-8.485 2.828-2.828c.78-.78.78-2.05-.001-2.83L7.929.585A1.986 1.986 0 0 0 6.516 0h-.001C5.98 0 5.478.209 5.101.587L.858 4.83C.729 4.958-.389 6.168.142 8.827c.626 3.129 3.246 7.019 7.787 11.56 6.499 6.499 10.598 7.937 12.953 7.937 1.63 0 2.426-.689 2.604-.867l4.242-4.242c.378-.378.587-.881.586-1.416 0-.534-.208-1.037-.586-1.415zm-5.656 5.658c-.028.028-3.409 2.249-12.729-7.07C-.178 9.452 2.276 6.243 2.272 6.244L6.515 2l4.243 4.244-3.535 3.535a.999.999 0 0 0 0 1.414l9.899 9.899a.999.999 0 0 0 1.414 0l3.535-3.536 4.243 4.244-4.242 4.242z"/>
                                </svg>
                                </div>
                                <!-- <span class="absolute -left-[7px] -top-1 flex h-3.5 w-3.5 items-center justify-center bg-white text-teal-400 font-bold z-10 text-[10px]">+</span> -->
                                
                                <div>
                                    <a :href="`tel:+91${phoneNo}`" class="hover:underline">
                                        <p class="text-sm font-semibold text-slate-600 space-y-1"> +91 {{ phoneNo || "9876543210" }}</p>
                                    </a>
                                </div>
                            </div>
                            <!-- phone number /.-->

                            <!-- whatsapp number -->
                            <div class="relative border-t border-slate-200 py-8">
                                <div class="absolute -left-16 top-[-1px] w-16 border-t border-slate-200"></div>
                                <div class="flex items-start pl-8">
                                    <div class="absolute -left-12 top-7 flex items-center justify-center w-8 h-8 text-teal-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 fill-[#22bdc9]">
                                    <path d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.78.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-1.99-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.22.25-.86.85-.86 2.07 0 1.22.89 2.4 1.01 2.56.12.17 1.75 2.67 4.23 3.74.59.26 1.05.41 1.41.52.59.19 1.13.16 1.56.1.48-.07 1.47-.6 1.67-1.18.21-.58.21-1.07.15-1.18s-.22-.16-.47-.28z"/>
                                </svg>
                                    </div>
                                    <span class="absolute -left-[7px] -top-2 flex h-3.5 w-3.5 items-center justify-center bg-white text-teal-400 font-bold z-10 text-[10px]">+</span>
                                    
                                    <a :href="`https://wa.me/${whatsappNo}`" target="_blank" class="hover:underline">
                                        <p class="text-sm font-semibold text-slate-600 space-y-1"> +91 {{ whatsappNo || "9876543210" }}</p>
                                    </a>
                                </div>
                            </div>
                            <!-- whatsapp number /.-->

                            <!-- email -->
                            <div class="relative border-t border-slate-200 py-8">
                                <div class="absolute -left-16 top-[-1px] w-16 border-t border-slate-200"></div>
                            
                                <div class="flex items-start pl-8">
                                    <div class="absolute -left-12 top-7 flex items-center justify-center w-8 h-8 text-teal-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#22bdc9]">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    </div>
                                    <span class="absolute -left-[7px] -top-2 flex h-3.5 w-3.5 items-center justify-center bg-white text-teal-400 font-bold z-10 text-[10px]">+</span>
                                    
                                    <div class="text-sm font-semibold text-slate-600 space-y-1">
                                        <a :href="`mailto:${emailID}`" class="hover:underline">
                                            <p class="">{{ emailID || "info@linkaura.com" }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- email /.-->
                            
                            
                            <!-- Address -->
                            <div class="relative border-t border-slate-200 py-8">
                                <div class="absolute -left-16 top-[-1px] w-16 border-t border-slate-200"></div>
                            
                                <div class="flex items-start pl-8">
                                    <div class="absolute -left-12 top-7 flex items-center justify-center w-8 h-8 text-teal-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-[#22bdc9]" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                    </div>
                                    <span class="absolute -left-[7px] -top-2 flex h-3.5 w-3.5 items-center justify-center bg-white text-teal-400 font-bold z-10 text-[10px]">+</span>
                                    
                                    <div class="text-sm font-semibold text-slate-600 space-y-1">
                                        <p class=""> 
                                            {{ currentAddress || "12-B, Sriniwas Eagle garden, Bangalore, Karnataka 638107" }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Address /.-->

                        </div>
                    </div>
                </div>
                <!-- content area /.-->
            </div>
            <!-- company details with contact details /.-->

            <!-- about us -->
            <div id="aboutus" class="relative flex flex-col w-full mt-1 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            About Us
                            </span>
                        </div>
                </div>
                <!-- header /. -->

                <!-- about para -->
                <div class="flex flex-col w-full">
                    <div class="flex flex-col w-full mt-5 px-3 pt-0 pb-5">
                    <p class="text-justify text-[14px] leading-loose font-semibold">
                        {{ aboutTxt || "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc."}}
                    </p>
                    </div>
                </div>
                <!-- about para /.-->

                <!-- footer -->
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
                </div>
                <!-- footer /. -->

            </div>
            <!-- about us /.-->

            <!-- products -->
            <div id="products" class="relative flex flex-col w-full mt-5 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            Products
                            </span>
                        </div>
                </div>
                <!-- header /. -->

                <!-- PRODUCT AREA -->
                <span v-if="products.length > 0">
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
                            class="w-[110px] bg-[#00FFFF] p-[8px] text-gray--800 text-[12px]
                            font-semibold rounded-lg uppercase mt-3"
                            @click="selectProduct(item.product_name)"
                        >
                            Enquiry Now
                        </button>

                    </div>
                    <!-- PRODUCT CARD /. -->

                </div>
                </span>
                <span v-else class="bg-white shadow-2xl">
                    <p class="p-5 font-semibold text-[#e52228]">
                        Current products are out of stock. We will update them shortly.
                    </p>
                </span>
                <!-- PRODUCT AREA /. -->

                <!-- footer -->
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
                </div>
                <!-- footer /. -->
            </div>
            <!-- products /.-->

            <!-- service -->
            <div id="services" class="relative flex flex-col w-full mt-5 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            Service
                            </span>
                        </div>
                </div>
                <!-- header /. -->

                <!-- service content -->
                <div class="flex flex-col w-full">
                    <span v-if="serviceData.length > 0">
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
                    </span>
                    <span v-else class="bg-white shadow-2xl">
                        <p class="p-5 font-semibold text-[#e52228]">
                            Currently, our services are being updated. We'll be back shortly!
                        </p>
                    </span>
                </div>
                <!-- service content /. -->

                <!-- footer -->
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
                </div>
                <!-- footer /. -->
            </div>
            <!-- service /.-->


            <!-- videos -->
            <div id="Videos" class="relative flex flex-col w-full mt-5 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            Videos
                            </span>
                        </div>
                </div>
                <!-- header /. -->

                <!-- Video content -->
                <div class="flex flex-col w-full bg-[#f1f1f1]">
                    <!-- Youtube area -->
                    <div class="flex flex-col w-full p-5 bg-[#22bdc9] mb-2 mt-2">
                        <div v-if="youtube_link1 || youtube_link2" class="flex flex-col gap-4 bg-[#22bdc9] mt-2 mb-4 rounded-lg" >
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
                    <div v-if="instaReals_link1 || instaReals_link2" class="grid grid-cols-1 gap-4 p-5 bg-[#22bdc9] mb-2">
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
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
                </div>
                <!-- footer /. -->
            </div>
            <!-- videos /.-->

            <!-- gallery -->
            <div id="gallery" class="relative flex flex-col w-full mt-5 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            Gallery
                            </span>
                        </div>
                </div>
                <!-- header /. -->

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
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
                </div>
                <!-- footer /. -->
            </div>
            <!-- gallery /.-->


            <!-- payments -->
             <div id="payments" class="relative flex flex-col w-full mt-5 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            Payments
                            </span>
                        </div>
                </div>
                <!-- header /. -->

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
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
                </div>
                <!-- footer /. -->
             </div>
            <!-- payments /.-->

            <!-- enquiry -->
            <div id="enquiry" class="relative flex flex-col w-full mt-5 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            Enquiry
                            </span>
                        </div>
                </div>
                <!-- header /. -->

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
                            <button type="submit" class="w-[150px] border-2 bg-[#00FFFF] text-gray-800 py-2 rounded-xl " >
                            Send
                            </button>
                        </div>  
                    </form>
                 </div>
                <!-- enquiry form /.-->

                <!-- footer -->
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
                </div>
                <!-- footer /. -->
            </div>
            <!-- enquiry /.-->

            <!-- feedback -->
            <div id="feedback" class="relative flex flex-col w-full mt-5 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            Feedback
                            </span>
                        </div>
                </div>
                <!-- header /. -->

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
                            <button type="submit" class="w-[150px] bg-[#00FFFF] text-gray-800 py-2 rounded-xl" >
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
                        <p class="font-semibold text-[#ffffff] text-[14px] p-1 text-center uppercase border-4 border-l-[#00FFFF] border-r-[#00FFFF] border-t-0 border-b-0">
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
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
                </div>
                <!-- footer /. -->
            </div>
            <!-- feedback /.-->

            <!-- share my details -->
            <div id="shareMyDetails" class="relative flex flex-col w-full mt-5 shadow-2xl">
                <!-- header -->
                <div class="relative flex flex-col w-full max-w-4xl">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 153" class="w-full h-auto">
                        <path fill="#BFBFBF" d="M0 1c0 .7 133.7 1 399 1s399-.3 399-1-133.7-1-399-1S0 .3 0 1m399.7 4.7c-.8 1.3-6.7 20.9-6.7 22.2 0 .8 51.7 1.1 202.5 1.1H798V5H599.1c-109.5 0-199.2.3-199.4.7m-12.2 39.5c-.3 1-24.3 80.7-27.1 90-.5 1.7-9.9 1.8-180 1.8H1v16h797V44H593c-163.2 0-205.2.3-205.5 1.2m220.4 44.2c1.8 2.2 1 21.6-.9 22.8-1.1.8-4.1-.5-11.3-4.7-5.3-3.1-9.7-6-9.7-6.3.1-1.7 2.1-3.4 10-8 9.4-5.6 10.2-5.8 11.9-3.8m29.9 10.9c.2 9.5 0 11.8-1.2 12.3-2.3.9-20.1-9.8-20.1-12.1 0-1.3 2.7-3.5 9-7.2 5-2.9 9.7-5.1 10.5-5 1.2.2 1.6 2.4 1.8 12m29.7.2c0 9.8-.3 12-1.5 12.3-.8.1-5.6-2.1-10.5-5.1-6.4-3.7-9-5.8-9-7.2s2.6-3.4 9-7.2c5-2.9 9.7-5.2 10.5-5 1.2.2 1.5 2.3 1.5 12.2m31.3-.2c.2 9.6 0 11.8-1.2 12.3-2.3.9-20.8-10.4-20.4-12.4.4-1.9 17.6-12.2 19.8-11.9 1.2.2 1.6 2.4 1.8 12m30 0c.2 9.8 0 11.8-1.3 12.3-2.4.9-20-9.7-20-12.1 0-1.4 2.6-3.4 9-7.2 5-2.9 9.7-5.2 10.5-5 1.2.2 1.6 2.5 1.8 12m29-11.1c1.4 1.4 1.7 20.5.3 22.6-1.1 1.9-2.2 1.5-12.3-4.3-8.8-5-10.2-6.3-9-8.2.7-1 18.2-11.3 19.3-11.3.3 0 1 .5 1.7 1.2"/><path fill="#0080BF" d="M199.3 2.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2M.5 78.5c0 41.2.1 58.3.2 37.8.2-20.4.2-54.2 0-75C.6 20.5.5 37.2.5 78.5"/><path fill="#0080FF" d="M199.3 3.7c109.8.2 289.6.2 399.5 0 109.8-.1 19.9-.2-199.8-.2s-309.6.1-199.7.2"/><path fill="#004080" d="M100.3 4.7c54.8.2 144.6.2 199.5 0 54.8-.1 9.9-.2-99.8-.2s-154.6.1-99.7.2"/><path fill="#80BFBF" d="M399.7 4.7c-.5.7 135.1.7 326.8 0 39.6-.1-17.6-.3-127.2-.5-109.5-.1-199.4.1-199.6.5"/><path d="M1 70.5V136h358.5l10.3-34.3c5.6-18.8 11.8-39.3 13.6-45.5l3.4-11.2h-19.3l-11 34.3-11.1 34.2-162.7.3L20 114V29h371.7l2.2-7.3c1.2-3.9 2.8-9.3 3.6-12l1.4-4.7H1zm595 23.4c-5.4 3.1-8.5 5.5-8.5 6.5 0 2 17.2 12.6 19.2 11.9 1-.4 1.3-3.6 1.3-11.9 0-13.7.3-13.5-12-6.5m30.1-.4c-4 2.4-8 4.9-8.8 5.7-1.8 1.8-1.1 2.5 10 8.9 10.6 6.2 10.9 5.9 10.5-8-.4-12.9-.7-13.1-11.7-6.6m28.7.6c-4.9 2.8-8.8 5.7-8.8 6.4 0 1.5 16.8 11.5 19.3 11.5 2.2 0 2.7-2.2 2.7-11.5 0-13.6-.4-13.8-13.2-6.4m31.7-.2c-5.5 3.2-8 5.3-8 6.6 0 2.2 17 12.6 19.2 11.8 1-.4 1.3-3.3 1.3-11.9 0-11.2 0-11.4-2.2-11.3-1.3 0-5.9 2.2-10.3 4.8m29.3.3c-4.9 2.7-8.8 5.6-8.8 6.3 0 1.7 17.5 11.7 19.8 11.3 1.5-.3 1.7-1.7 1.7-11.3 0-13.5-.2-13.6-12.7-6.3m30.2-.3c-5.3 3-8.5 5.5-8.5 6.5 0 1.9 17.3 12.5 19.3 11.8.9-.3 1.2-3.6 1.2-11.8 0-13.7.3-13.5-12-6.5"/><path fill="#004040" d="M20.5 71.5c0 23.6.1 33.2.2 21.2.2-12 .2-31.4 0-43-.1-11.7-.2-1.9-.2 21.8m351.3-26.8c2.8.2 7.6.2 10.5 0 2.8-.2.5-.3-5.3-.3s-8.1.1-5.2.3"/><path fill="#22bdc9" d="M758.4 100.5c0 5.5.1 7.6.3 4.7s.2-7.4 0-10-.3-.2-.3 5.3"/><path fill="gray" d="M608.4 100.5c0 6 .1 8.4.3 5.2s.2-8.1 0-11-.3-.3-.3 5.8M90.8 136.7c49.7.2 130.7.2 180 0 49.3-.1 8.7-.2-90.3-.2s-139.4.1-89.7.2"/><path fill="#00BFBF" d="M214.7 29.7c106.8.2 281.8.2 389 0 107.1-.1 19.8-.2-194.2-.2s-301.6.1-194.8.2m-113 84c44.7.2 117.9.2 162.5 0 44.7-.1 8.2-.2-81.2-.2s-125.9.1-81.3.2"/><path fill="#0FF" d="M21 71.5V113h323.6l11-34.2 11.1-34.3 215.6-.3L798 44V30H21z"/></svg>

                        <div class="absolute top-[25%] left-[4%] w-[38%] h-[50%] flex items-center justify-center">
                            <span class="text-black font-bold uppercase tracking-widest text-[14px]">
                            Share Me
                            </span>
                        </div>
                </div>
                <!-- header /. -->

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
                        <div class="flex flex-grow w-full font-semibold items-center justify-center" v-if="1==2">
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
                        <div class="flex flex-grow w-full font-semibold items-center justify-center pt-3">
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
                <div class="flex flex-col w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 798 87"><path d="M0 43.5V87h236.8c254.1 0 241.8.2 249-4.9 1.7-1.2 11.2-13.7 21.3-27.9 10.1-14.1 22.7-31.9 28.1-39.5C540.6 7.2 545 .8 545 .5S422.4 0 272.5 0H0z"/><path fill="#ffffff" d="M546.5 1c.3.6.2 1-.3 1-.4 0-1.9 1.4-3.1 3.1-1.3 1.8-1.7 2.9-1 2.5.8-.4.4.1-.8 1-1.3.9-2.3 2-2.3 2.5s55.6.9 129 .9h129V0H671.5c-82.2 0-125.4.4-125 1M488 81.1c-2.5 2.6-4.8 4.5-5.2 4.2-.5-.2-.8.1-.8.6 0 .8 47.3 1.1 157.5 1.1H797V77l-152.3-.2-152.2-.3z"/><path fill="#BFBFBF" fill-opacity=".9" d="M797.3 6c0 3.6.2 5 .4 3.2.2-1.7.2-4.7 0-6.5-.2-1.7-.4-.3-.4 3.3m0 76c0 3 .2 4.3.4 2.8.2-1.6.2-4 0-5.5-.2-1.6-.4-.3-.4 2.7"/><path fill="gray" d="m487.9 80.7-2.4 2.8 2.8-2.4c2.5-2.3 3.2-3.1 2.4-3.1-.2 0-1.4 1.2-2.8 2.7"/><path fill="#40BFBF" d="M604.3 12.7c35.7.2 93.7.2 129 0 35.3-.1 6.2-.2-64.8-.2-70.9 0-99.8.1-64.2.2"/><path fill="#00BFBF" d="M533 19c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-5 7c-1.2 1.6-1.9 3-1.6 3 .2 0 1.4-1.4 2.6-3 1.2-1.7 1.9-3 1.6-3-.2 0-1.4 1.3-2.6 3m-14.1 19.7c-6.2 8.7-12.8 18-14.8 20.8-2 2.7-3.1 4.6-2.4 4.2 1-.6 9.2-11.8 18.8-25.7 2.1-3 5.3-7.6 7.2-10.3 1.9-2.6 3.2-4.7 2.9-4.7s-5.6 7.1-11.7 15.7"/><path fill="#0FF" d="M526.8 29c-6.2 8.8-15 21.3-19.6 27.8-4.6 6.4-9.1 12.6-10.1 13.7s-2.1 2.6-2.5 3.2c-.6 1 29.9 1.3 150.8 1.3H797V13H538.2z"/><path fill="#0FF" fill-opacity=".9" d="M797.4 44c0 17.3.2 24.4.3 15.7.2-8.6.2-22.8 0-31.5-.1-8.6-.3-1.5-.3 15.8"/><path fill="#80BFBF" d="M568.8 75.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/><path fill="#FFBFBF" d="M568.8 76.7c41.9.2 110.5.2 152.5 0 41.9-.1 7.6-.2-76.3-.2s-118.2.1-76.2.2"/></svg>
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
        name: "Website_Temp_6",
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
            // console.log("decoded : "+decoded)
            const params = new URLSearchParams(decoded)
            const cd_id   = Number(params.get('cd_id') || 0)
            const templateId  = Number(params.get('template_id') || 0)
            const purchaseID  = Number(params.get('purchased_id') || 0)
            const is_purchased = ref("")

            // implement .env
            const s3ProductsUrl = import.meta.env.VITE_AWS_URL_PRODUCT_IMAGES;
            const s3ServiceUrl = import.meta.env.VITE_AWS_URL_SERVICE_IMAGES;
            const s3GalleryUrl = import.meta.env.VITE_AWS_URL_GALLERY;
            const s3PaymenyUrl = import.meta.env.VITE_AWS_URL_PAYMENT_DETAILS;
            const s3QrCodeUrl = import.meta.env.VITE_AWS_URL_QRCODE;
            const s3LogoUrl = import.meta.env.VITE_AWS_URL_LOGO;



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
                logoImage.value = data.logo_path ? `${s3LogoUrl}/company_logos/${data.logo_path}` : '';
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

            // products, serive and gallery
            const initWebsiteData = async () => {
                try {
                    // Execute Plan check ONCE
                    const allowedCount = await getAllowedCount(cd_id);

                    // Run both data fetches in parallel for better performance
                    const [prodRes, servRes, gallRes] = await Promise.all([
                        axios.post("/collectAllWebsiteDatas", { table_name: "miniweb_products", cd_id: cd_id }),
                        axios.post("/collectAllWebsiteDatas", { table_name: "miniweb_services", cd_id: cd_id }),
                        axios.post("/collectAllWebsiteDatas", { table_name: "miniweb_gallery", cd_id: cd_id })
                    ]);

                    // get all response data
                    const prodData = prodRes?.data?.getData;
                    const servData = servRes?.data?.getData;
                    const gallData = gallRes?.data?.getData;

                    // Map Products using allowedCount
                    if (Array.isArray(prodData) && prodData.length > 0) {
                        const formatted = prodData
                            .filter(item => item.product_name && item.final_price > 0)
                            .map(item => ({
                                product_name: item.product_name,
                                product_img: item.product_img ? `${s3ProductsUrl}/product_images/${item.product_img}` : "",
                                orginal_price: Number(item.orginal_price),
                                discount_price: Number(item.discount_price),
                                final_price: Number(item.final_price),
                            }));

                        products.value = allowedCount > 0 ? formatted.slice(0, allowedCount) : formatted;
                    } else {
                        products.value = [];
                    }

                    // Map Services using allowedCount
                    if (Array.isArray(servData) && servData.length > 0) {
                        const formatted = servData
                            .filter(item => item.service_name && item.service_img)
                            .map(item => ({
                                service_name: item.service_name,
                                service_img: item.service_img ? `${s3ServiceUrl}/service_images/${item.service_img}` : pro6,
                            }));

                        serviceData.value = allowedCount > 0 ? formatted.slice(0, allowedCount) : formatted;
                    }

                    // --- Step 5: Map Gallery (NEW) ---
                    if (Array.isArray(gallData) && gallData.length > 0) {
                        const formatted = gallData
                            .filter(item => item.gallery)
                            .map(item => ({
                                gallery: item.gallery
                                    ? `${s3GalleryUrl}/gallery_images/${item.gallery}`
                                    : pro6,
                            }));
                        // Apply the same plan-based limit to the gallery
                        galleryData.value = allowedCount > 0 ? formatted.slice(0, allowedCount) : formatted;
                    } else {
                        galleryData.value = [];
                    }

                } catch (error) {
                    console.error("Initialization Error:", error);
                }
            };

            // Helper to get plan limits
            const getAllowedCount = async (cd_id) => {
                // Safety check: if cd_id is missing, don't even call the API
                if (!cd_id) {
                    console.warn("getAllowedCount called without cd_id");
                    return 0;
                }

                try {
                    const planRes = await axios.post("/collectAllWebsiteDatas", {
                        table_name: "miniweb_company_details",
                        cd_id: cd_id
                    });

                    // Use optional chaining to prevent "cannot read property [0] of undefined"
                    const companyData = planRes.data?.getData?.[0];
                    
                    // console.log("Plan Data Received: ", companyData);

                    if (companyData && Number(companyData.purchased_id) > 0) {
                        const planId = Number(companyData.plan_id);
                        if (planId === 94) return 5;
                        if (planId === 95) return 15;
                        if (planId === 96) return 30;
                    }
                    
                    return 0; // Default if no valid plan
                } catch (err) {
                    console.error("Plan API Error:", err);
                    return 0;
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
                            img: data.gpay_qr_code ? `${s3PaymenyUrl}/payment_Details_QrCode/${data.gpay_qr_code}` :  (!data.id ? gPay : null)
                        },
                        {
                            name: "PhonePe",
                            img: data.phonepe_qr_code ? `${s3PaymenyUrl}/payment_Details_QrCode/${data.phonepe_qr_code}` : (!data.id ? gPay : null)
                        },
                        {
                            name: "Paytm",
                            img: data.paytm_qr_code ? `${s3PaymenyUrl}/payment_Details_QrCode/${data.paytm_qr_code}` : (!data.id ? gPay : null)
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
                    qrImage.value = `${s3QrCodeUrl}/qrcodes/${qrData.value.qr_code}`
                    
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
                        // loadProducts(),
                        // loadService(),
                        // loadGallery(),
                        initWebsiteData(),
                        getAllowedCount(),
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
                        // console.log(resData.data.getDatas)    
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
                // .env from
                s3ProductsUrl,
                s3ServiceUrl,
                s3GalleryUrl,
                s3PaymenyUrl,
                s3QrCodeUrl,
                s3LogoUrl
            }
        }
    }
</script>

<style scope>
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .animate-rotate {
        animation: rotate 4s linear infinite;
    }
</style>