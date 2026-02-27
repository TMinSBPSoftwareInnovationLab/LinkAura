<template>
    <main class="p-2 pt-0 bg-[#414143]">
        <div  class="max-w-[430px] pb-0 mx-auto grid grid-cols-1  bg-center bg-cover bg-no-repeat ">
            <!-- company details -->
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
            <div id="home" class="flex flex-col">
                <div class="flex flex-col w-full border-1 border-b-[#52b84a] border-r-0 border-l-0 border-t-0">
                    <!-- row -->
                    <!-- header -->
                    <div class="flex w-full">
                        <!-- left (15%) -->
                        <div class="w-[20%] bg-[#414143]">
                            <!-- left content -->
                        </div>

                        <!-- right (85%) -->
                        <div class="w-[80%] h-10 bg-white"> <!-- only space --> </div>
                    </div>
                    <!-- header /.-->
                </div>

                <!-- logo area -->
                <div class="flex flex-col w-full bg-white border-1 border-b-[#52b84a] border-r-0 border-l-0 border-t-0">
                    <!-- logo -->
                    <div class="flex flex-col w-full items-center">
                        <span v-if="logoImage">
                            <!-- <img :src="logo_path" alt="deafultLogo" class="w-[120px] h-[120px]"></img> -->
                             <div class="flex p-5 items-center justify-center text-center">
                                <img :src="logoImage" alt="defaultLogo" class="w-[150px] h-[150px] object-contain" />
                            </div>
                        </span>
                        <span v-else>
                                <img  :src="defaultLogo" class="w-[200px] h-[200px] object-contain " />
                        </span>                        
                    </div>
                    <!-- logo /. -->

                    <!-- company name -->
                    <div class="flex flex-col w-full items-center">
                        <p class="text-center text-[18px] md:text-[20px] font-bold text-[#414143] pt-0 p-5">
                            {{ companyName || "LinkAura" }}
                        </p>
                    </div>
                    <!-- company name -->
                </div>
                <!-- logo area /. -->

                <!-- theme space -->
                <div class="flex w-full">
                    <!-- left (15%) -->
                    <div class="w-[20%] bg-[#414143]">
                        <!-- left content -->
                    </div>

                    <!-- right (85%) -->
                    <div class="w-[80%] h-25 bg-white"> <!-- only space --> </div>
                </div>
                <!-- theme space /.-->

                <!-- owner name with designation -->
                <div class="flex w-full">
                    <!-- left (15%) -->
                    <div class="w-[20%] bg-[#52b84a] flex-col justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" xml:space="preserve"><path fill="#ffffff" d="M135.832 140.848h-70.9c-2.9 0-5.6-1.6-7.4-4.5-1.4-2.3-1.4-5.7 0-8.6l4-8.2c2.8-5.6 9.7-9.1 14.9-9.5 1.7-.1 5.1-.8 8.5-1.6 2.5-.6 3.9-1 4.7-1.3-.2-.7-.6-1.5-1.1-2.2-6-4.7-9.6-12.6-9.6-21.1 0-14 9.6-25.3 21.5-25.3s21.5 11.4 21.5 25.3c0 8.5-3.6 16.4-9.6 21.1-.5.7-.9 1.4-1.1 2.1.8.3 2.2.7 4.6 1.3 3 .7 6.6 1.3 8.4 1.5 5.3.5 12.1 3.8 14.9 9.4l3.9 7.9c1.5 3 1.5 6.8 0 9.1-1.6 2.9-4.4 4.6-7.2 4.6zm-35.4-78.2c-9.7 0-17.5 9.6-17.5 21.3 0 7.4 3.1 14.1 8.2 18.1.1.1.3.2.4.4 1.4 1.8 2.2 3.8 2.2 5.9 0 .6-.2 1.2-.7 1.6-.4.3-1.4 1.2-7.2 2.6-2.7.6-6.8 1.4-9.1 1.6-4.1.4-9.6 3.2-11.6 7.3l-3.9 8.2c-.8 1.7-.9 3.7-.2 4.8.8 1.3 2.3 2.6 4 2.6h70.9c1.7 0 3.2-1.3 4-2.6.6-1 .7-3.4-.2-5.2l-3.9-7.9c-2-4-7.5-6.8-11.6-7.2-2-.2-5.8-.8-9-1.6-5.8-1.4-6.8-2.3-7.2-2.5-.4-.4-.7-1-.7-1.6 0-2.1.8-4.1 2.2-5.9.1-.1.2-.3.4-.4 5.1-3.9 8.2-10.7 8.2-18-.2-11.9-8-21.5-17.7-21.5z"/></svg>
                    </div>

                    <!-- right (85%) -->
                    <div class="w-[80%] flex flex-col bg-white justify-center px-5"> 
                        <p class="font-bold">{{  ownerName || "B.Velan" }}</p>
                        <p class="font-semibold text-gray-400">{{ designation || "Managing Director" }}</p>
                    </div>
                </div>
                <!-- owner name with designation /.-->

                <!-- theme space -->
                <div class="flex w-full">
                    <!-- left (15%) -->
                    <div class="w-[20%] bg-[#414143]">
                        <!-- left content -->
                    </div>

                    <!-- right (85%) -->
                    <div class="w-[80%] h-4 bg-white"> <!-- only space --> </div>
                </div>
                <!-- theme space /.-->

                <!-- contact details -->
                <div class="flex w-full">
                    <!-- left (15%) -->
                    <div class="w-[20%] bg-[#45a13e] flex flex-col justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white" viewBox="0 0 28.314 28.323" style="enable-background:new 0 0 28.314 28.323" xml:space="preserve"><path d="m27.728 20.384-4.242-4.242a1.982 1.982 0 0 0-1.413-.586h-.002c-.534 0-1.036.209-1.413.586L17.83 18.97l-8.485-8.485 2.828-2.828c.78-.78.78-2.05-.001-2.83L7.929.585A1.986 1.986 0 0 0 6.516 0h-.001C5.98 0 5.478.209 5.101.587L.858 4.83C.729 4.958-.389 6.168.142 8.827c.626 3.129 3.246 7.019 7.787 11.56 6.499 6.499 10.598 7.937 12.953 7.937 1.63 0 2.426-.689 2.604-.867l4.242-4.242c.378-.378.587-.881.586-1.416 0-.534-.208-1.037-.586-1.415zm-5.656 5.658c-.028.028-3.409 2.249-12.729-7.07C-.178 9.452 2.276 6.243 2.272 6.244L6.515 2l4.243 4.244-3.535 3.535a.999.999 0 0 0 0 1.414l9.899 9.899a.999.999 0 0 0 1.414 0l3.535-3.536 4.243 4.244-4.242 4.242z"/></svg>
                    </div>

                    <!-- right (85%) -->
                    <div class="w-[80%] flex flex-col bg-white justify-center px-5 py-3"> 
                        <a :href="`tel:+91${phoneNo}`" class="hover:underline">
                            <p class="font-bold text-[14px]"> +91 {{ phoneNo || "9876543210" }}</p>
                        </a>
                        <a :href="`tel:+91${whatsappNo}`" class="hover:underline">
                            <p class="font-bold text-[14px]">+91 {{  whatsappNo || "9876543210" }}</p>
                        </a>
                    </div>
                </div>
                <!-- contact details /.-->
                
                <!-- contact details -->
                <div class="flex w-full">
                    <!-- left (15%) -->
                    <div class="w-[20%] bg-[#378b35] flex flex-col justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-white" viewBox="0 0 64 64" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2"><circle cx="32" cy="32" r="14" style="fill:none;stroke:#ffffff;stroke-width:1.5px"/><path d="M32 56C18.754 56 8 45.246 8 32c0-8.876 4.829-16.633 12-20.785M32 8c13.246 0 24 10.754 24 24 0 8.876-4.829 16.633-12 20.785" style="fill:none;stroke:#ffffff;stroke-width:1.5px"/><path d="m30 59 3-3-3-3M33 11l-3-3 3-3M22.375 36.5l1.414-.808a2.725 2.725 0 0 1 2.48-.115l3.16 1.436a2.24 2.24 0 0 0 2.08-.118v-.001a2.385 2.385 0 0 1 2.799.251l.456.399a2.619 2.619 0 0 1 .016 3.93l-.003.002a2.622 2.622 0 0 0 .063 3.974l.249.207M43 31.5l-.322.193a2.726 2.726 0 0 1-3.635-.774l-1.296-1.852a2.588 2.588 0 0 1-.335-2.303s0 0 0 0a2.63 2.63 0 0 0-.88-2.906l-1.268-.986a2.725 2.725 0 0 1-.765-3.37l.581-1.162M22 32s.576-5.57 5-7" style="fill:none;stroke:#ffffff;stroke-width:1.5px"/></svg>
                    </div>

                    <!-- right (85%) -->
                    <div class="w-[80%] flex flex-col bg-white justify-center px-5 py-3"> 
                        <a href="tel:+917548853487" class="hover:underline">
                            <a :href="`mailto:${emailID}`" class="hover:underline">
                                <p class="font-bold text-[14px]">{{ emailID || "info@linkaura.com" }}</p>
                            </a>
                            <a :href="www.linkaura.com" target="_blank" class="hover:underline" v-if="1==2">
                                <p class="font-bold text-[14px] text-[#378b35]">www.linkaura.com</p>
                            </a>
                        </a>
                    </div>
                </div>
                <!-- contact details /.-->


                <!-- address details -->
                <div class="flex w-full">
                    <!-- left (15%) -->
                    <div class="w-[20%] bg-[#29752b] flex flex-col justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 425 425" xml:space="preserve"><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="-724.271" y1="715.318" x2="1283.735" y2="-376.683"><stop offset="0" style="stop-color:#ffffff"/><stop offset="1" style="stop-color:#ffffff"/></linearGradient><path fill="url(#a)" d="M283.378 121.873c-18.933-18.932-44.104-29.358-70.878-29.358-.002 0 .002 0 0 0-26.773 0-51.947 10.427-70.878 29.358-18.933 18.932-29.359 44.105-29.359 70.878 0 26.773 10.427 51.946 29.359 70.878l3.563 3.562a4.879 4.879 0 0 0 6.902 0 4.882 4.882 0 0 0 0-6.902l-3.564-3.562c-35.274-35.276-35.274-92.675 0-127.95 35.276-35.276 92.675-35.276 127.951 0 35.276 35.275 35.276 92.674 0 127.95L212.5 320.701l-24.586-24.586a4.884 4.884 0 0 0-6.902 0 4.883 4.883 0 0 0 0 6.903l28.037 28.037c.952.953 2.202 1.43 3.451 1.43s2.499-.477 3.451-1.43l67.429-67.427c18.931-18.932 29.357-44.104 29.357-70.878 0-26.772-10.427-51.944-29.359-70.877z"/><linearGradient id="b" gradientUnits="userSpaceOnUse" x1="-702.955" y1="754.514" x2="1305.051" y2="-337.488"><stop offset="0" style="stop-color:#ffffff"/><stop offset="1" style="stop-color:#ffffff"/></linearGradient><path fill="url(#b)" d="M163.119 271.32a4.882 4.882 0 0 0-6.903 6.902l13.769 13.768a4.858 4.858 0 0 0 3.451 1.43 4.882 4.882 0 0 0 3.451-8.332l-13.768-13.768z"/><linearGradient id="c" gradientUnits="userSpaceOnUse" x1="-734.355" y1="696.783" x2="1273.656" y2="-395.221"><stop offset="0" style="stop-color:#ffffff"/><stop offset="1" style="stop-color:#ffffff"/></linearGradient><path fill="url(#c)" d="M234.774 170.477a31.572 31.572 0 0 1 5.299 7.021 4.883 4.883 0 0 0 6.636 1.905 4.882 4.882 0 0 0 1.904-6.635 41.297 41.297 0 0 0-6.936-9.193 41.295 41.295 0 0 0-8.394-6.48 4.882 4.882 0 0 0-4.922 8.431 31.446 31.446 0 0 1 6.413 4.951z"/><linearGradient id="d" gradientUnits="userSpaceOnUse" x1="-729.773" y1="705.182" x2="1278.22" y2="-386.813"><stop offset="0" style="stop-color:#ffffff"/><stop offset="1" style="stop-color:#ffffff"/></linearGradient><path fill="url(#d)" d="M215.178 161.363a4.882 4.882 0 0 0 .824-9.727 41.219 41.219 0 0 0-32.68 11.938c-7.794 7.793-12.086 18.155-12.086 29.178 0 11.022 4.292 21.384 12.086 29.177 8.047 8.046 18.61 12.067 29.178 12.066 10.565-.001 21.135-4.022 29.178-12.066a41.298 41.298 0 0 0 12.007-31.735 4.876 4.876 0 0 0-5.172-4.571 4.88 4.88 0 0 0-4.57 5.173 31.522 31.522 0 0 1-9.168 24.231c-12.281 12.282-32.267 12.282-44.549 0-5.95-5.949-9.228-13.86-9.228-22.274 0-8.415 3.277-16.325 9.228-22.275a31.45 31.45 0 0 1 24.952-9.115z"/></svg>

                    </div>

                    <!-- right (85%) -->
                    <div class="w-[80%] flex flex-col bg-white justify-center px-5 py-3"> 
                        <p class="font-bold text-[14px] text-[#414143]">
                            {{ currentAddress || "12-B, Sriniwas Eagle garden, Bangalore, Karnataka 638107" }}
                        </p>
                    </div>
                </div>
                <!-- address details /.-->

                <!-- social media link -->
                <div class="flex w-full">
                    <!-- left (15%) -->
                    <div class="w-[20%] bg-[#414143] flex flex-col justify-center items-center text-center">
                        <!-- no content -->
                    </div>

                    <!-- right (85%) -->
                    <div class="w-[80%] flex flex-col bg-white justify-center px-5 py-3 justify-center items-center text-center"> 
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
                            class="w-10 h-10 rounded-lg bg-[#3d023a] flex justify-center items-center hover:bg-gradient-to-r from-[#f9ce34] via-[#ee2a7b] to-[#6228d7] transition">
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
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    fill="white" viewBox="0 0 24 24" class="w-6 h-6">
                                    <path d="M20 3.5A10.5 10.5 0 1 0 4.2 17.9L3 22l4.3-1.1A10.5 10.5 
                                    0 1 0 20 3.5zm-8.6 15.1a8.3 8.3 0 0 1-4.2-1.2l-.3-.2-2.5.6.7-2.4-.2-.3A8.2 
                                    8.2 0 1 1 11.4 18.6zm4.4-6.2c-.2-.1-1.3-.6-1.5-.7s-.4-.1-.6.1-.6.7-.7.8-.3.1-.6 
                                    0a6.7 6.7 0 0 1-3.3-3 3.6 3.6 0 0 1-.4-.8c0-.2 0-.4.2-.6l.7-.8c.1-.2.1-.3 
                                    0-.5L9.2 6c-.1-.2-.3-.4-.5-.4h-.5c-.2 0-.5.1-.7.3-.8.7-1.1 1.8-.7 
                                    3a8.8 8.8 0 0 0 4.3 4.7c.6.3 1.2.5 1.6.6a3.8 3.8 0 0 0 1.7.1c.5-.1 1.3-.6 
                                    1.5-1.1s.2-.9.1-1.1-.2-.2-.4-.3z"/>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
                <!-- social media link /. -->

                <!-- theme space -->
                <div class="px-3 pt-2 flex w-full bg-[#174143] border-1 border-white border-b-0 border-l-0 border-r-0 mb-2 shadow-3xl h-4 items-center">
                    <!-- bg-gradient-to-br from-[#435663] via-[#414143] to-[#313647] -->
                    <p class="tracking-widest text-[8px] text-white">{{ companyName || "LinkAura" }}</p>
                </div>
                <!-- theme space /.-->
            </div>
            <!-- company details /. -->

            <!-- About us -->
            <div id="aboutus" class=" flex flex-col w-full border-1 border-b-[#52b84a] bg-white ">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-15  px-5 flex justify-start items-center"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">About Us</p>
                    </div>
                </div>
                <!-- theme bg /.-->

                <!-- about us content -->
                <div class="flex w-full px-3">
                        <p class="text-[15px] md:text-[16px] p-1 text-justify leading-relaxed">
                            {{ aboutTxt || "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc."}}
                        </p>
                </div>
                <!-- about us content /. -->

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold text-[12px]" style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- {{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- About us /. -->

            <!-- product areas -->
            <div id="products" class="mt-0 flex flex-col w-full border-1 border-b-[#52b84a] bg-white ">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-10  px-5 flex justify-start items-center mx-2 mt-1 text-[#414143]"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">Products</p>
                    </div>
                </div>
                <!-- theme bg /.-->

                <!-- product areas -->
                <div class="flex flex-col w-full bg-white p-2">
                    <!-- main grid -->
                    <span v-if="products.length > 0">
                    <div class="grid grid-cols-2 px-2 gap-2 p-2 mb-5">                        
                        <div 
                            v-for="(item, index) in products" 
                            :key="index"
                            class="flex flex-col w-full shadow-xl p-2 border border-[#379596] rounded-xl"
                            :class="index >= 2 ? 'mt-5' : ''"
                        >
                            <!-- product image -->
                            <div class="flex w-full h-[180px]">
                                <img :src="item.product_img" :alt="item.name" class="w-full h-full object-contain" @click="openImage(item.product_img)">
                            </div>

                            <!-- name -->
                            <div class="flex w-full justify-center pt-3">
                                <p class="text-[14px] font-bold text-[#379596] uppercase">{{ item.product_name }}</p>
                            </div>

                            <!-- prices -->
                            <div class="flex flex-col w-full justify-center p-1 mb-2 border-l-4 border-[#52b84a] mt-1 rounded-lg">
                                <p class="text-[12px] text-gray-500">Original Price : {{ item.orginal_price }}</p>
                                <p class="text-[12px] text-gray-500">Discount : {{ item.discount_price }}</p>
                                <p class="text-[12px] font-bold">Final Price : {{ item.final_price }}</p>
                            </div>

                            <!-- enquiry button -->
                            <div class="flex w-full justify-center p-1">
                                <button class="w-full outline outline-1 rounded-lg"  @click="selectProduct(item.product_name)">
                                    Enquiry Now
                                </button>
                            </div>
                        </div>
                    </div>
                    </span>
                    <span v-else>
                        <p class="p-5 font-semibold bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] bg-clip-text text-transparent">
                            Current products are out of stock. We will update them shortly.
                        </p>
                    </span>
                    <!-- main grid -->
                </div>
                <!-- product areas /. -->

                

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold"
                        style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- {{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- product areas /. -->

            <!-- service  -->
            <div id="services" class="mt-0 flex flex-col w-full border-1 border-b-[#52b84a] bg-white ">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-10  px-5 flex justify-start items-center mx-2 mt-1 text-[#414143]"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">Service</p>
                    </div>
                </div>
                <!-- theme bg /.-->

                <!-- service areas -->
                <div class="flex flex-col w-full bg-white">
                    <!-- main grid -->
                    <span v-if="serviceData.length > 0">
                    <div class="grid grid-cols-2 px-2 gap-2 p-2 mb-5">
                        <div 
                            v-for="(item, index) in serviceData" 
                            :key="index"
                            class="flex flex-col w-full shadow-2xl p-2 d-xl rounded-3xl mt-2 border-1 border-gray-300"
                            :class="index >= 2 ? 'mt-5' : ''"
                        >
                            <!-- Service image -->
                            <div class="flex w-full h-[100px] items-center justify-center text-center">
                                <div 
                                    class="p-[1px] bg-[#379596]"
                                    style="clip-path: circle(50% at 50% 50%);"
                                >
                                <div 
                                    class="w-[100px] h-[100px] overflow-hidden bg-white"
                                    style="clip-path: inherit;"
                                >
                                    <img 
                                        :src="item.service_img"
                                        :alt="item.service_name"
                                        class="w-full h-full object-cover rounded-full"
                                        @click="openImage(item.service_img)"
                                    >
                                </div>
                                </div>
                            </div>

                            <!-- name -->
                            <div class="flex w-full items-center text-center justify-center pt-3">
                                <p class="text-[12px] md:text-[10px] font-bold text-[#414143] uppercase">{{ item.service_name }}</p>
                            </div>
                        </div>
                    </div>
                    </span>
                    <span v-else>
                        <p class="p-5 font-semibold bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] bg-clip-text text-transparent">
                            Currently, our services are being updated. We'll be back shortly!
                        </p>
                    </span>
                    <!-- main grid -->
                </div>
                <!-- service areas /. -->

                

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold"
                        style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- {{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- service /. -->

            <!-- videos -->
            <div id="Videos" class="mt-0 flex flex-col w-full border-1 border-b-[#52b84a] bg-white px-2 ">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-10  px-5 flex justify-start items-center mx-2 mt-1 text-[#414143]"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">Videos</p>
                    </div>
                </div>
                <!-- theme bg /.-->

                <!-- Video content -->
                <div class="flex flex-col w-full bg-[#f1f1f1]">
                    <!-- Youtube area -->
                    <div class="flex flex-col w-full p-5 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] mb-2 mt-2">
                        <div v-if="youtube_link1 || youtube_link2" class="flex flex-col gap-4 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] mt-2 mb-4 rounded-lg" >
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
                    <div v-if="instaReals_link1 || instaReals_link2" class="grid grid-cols-1 gap-4 p-5 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] mb-2">
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

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold"
                        style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- LinkAura{{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- videos /. -->

            <!-- gallery  -->
            <div id="gallery" class="mt-0 flex flex-col w-full border-1 border-b-[#52b84a] bg-white px-2 ">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-10  px-5 flex justify-start items-center mx-2 mt-1 text-[#414143]"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">Gallery</p>
                    </div>
                </div>
                <!-- theme bg /.-->

                <!-- gallery areas -->
                <div class="flex flex-col w-full bg-white">
                    <!-- main grid -->
                    <div class="grid grid-cols-2 px-2 gap-2 p-2 mb-5" v-if="1==2">
                        <div 
                            v-for="(item, index) in galleryData" 
                            :key="index"
                            class="flex flex-col w-full shadow-2xl p-2 d-xl rounded-3xl mt-2 border-1 border-gray-300"
                            :class="index >= 2 ? 'mt-5' : ''"
                        >
                            <!-- Service image -->
                            <div class="flex w-full h-[100px] items-center justify-center text-center">
                                <div 
                                    class="p-[1px] bg-[#379596]"
                                    style="clip-path: circle(50% at 50% 50%);"
                                >
                                <div 
                                    class="w-[100px] h-[100px] overflow-hidden bg-white"
                                    style="clip-path: inherit;"
                                >
                                    <img 
                                    :src="item.service_img"
                                    :alt="item.service_name"
                                    @click="openImage(item.service_img)"
                                    class="w-full h-full object-contain rounded-full"
                                    >
                                </div>
                                </div>

                                <!-- <img :src="item.image" :alt="item.name" class="w-full h-full object-cover"> -->
                            </div>

                            <!-- name -->
                            <div class="flex w-full items-center text-center justify-center pt-3">
                                <p class="text-[12px] md:text-[10px] font-bold text-[#414143] uppercase">{{ item.service_name }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- main grid -->

                    <!-- Masonry Gallery -->
                    <div class="columns-3 md:columns-3 gap-3 p-2">
                        <div 
                            v-for="(item, index) in galleryData" 
                            :key="index"
                            class="mb-3 break-inside-avoid"
                        >
                            <img 
                                :src="item.gallery" 
                                alt="Gallery" 
                                class="w-full rounded-xl shadow-md"
                                @click="openImage(item.gallery)"
                            >
                        </div>
                    </div>
                </div>
                <!-- gallery areas /. -->
                

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold"
                        style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- LinkAura{{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- gallery /. -->

            <!-- payment  -->
            <div id="payments" class="mt-0 flex flex-col w-full border-1 border-b-[#52b84a] bg-white ">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-10  px-5 flex justify-start items-center mx-2 mt-1 text-[#414143]"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">Payment</p>
                    </div>
                </div>
                <!-- theme bg /.-->

                <!-- payment areas -->
                <div v-if="paymentQrs.length" class="flex flex-col w-full bg-white">

                    <!-- qr section -->
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 px-3 py-5">

                        <div
                            v-for="(item, index) in paymentQrs"
                            :key="index"
                            class="flex flex-col w-full h-[250px] border border-[#414143] shadow-2xl rounded-xl p-2 mb-10"
                        >
                            <img
                                :src="item.img"
                                :alt="item.name"
                                class="w-full h-full object-contain"
                                @click="openImage(item.img)"
                            />
                            <p class="text-center text-sm font-semibold mt-2 p-5">
                                {{ item.name }}
                            </p>
                        </div>

                    </div>
                    <!-- qr section /. -->

                </div>

                <!-- default -->
                <div v-else class="text-center text-gray-500 py-0">
                    <div class="flex flex-col w-full bg-white">
                        <!-- qr section -->
                        <div class="grid grid-cols-1 gap-4 items-center justify-center text-center px-3 py-5">
                            <!-- cols1 -->
                            <div class="flex flex-col w-full h-[250px] border-1 border-[#414143] shadow-2xl rounded-xl">
                                <img :src="gPay" alt="gpay number" class="w-full h-full object-contain" @click="openImage(gPay)">
                            </div>
                            <!-- cols1 /. -->
                            <!-- cols1 -->
                            <div class="flex flex-col w-full h-[250px] border-1 border-[#414143] shadow-2xl rounded-xl">
                                <img :src="paytm" alt="paytm number" class="w-full h-full object-contain" @click="openImage(paytm)">
                            </div>
                            <!-- cols1 /. -->
                        </div>
                        <!-- qr section /. -->
                    </div>
                </div>
                <!-- default -->
                <!-- payment areas -->

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold"
                        style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- {{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- payment /. -->

            <!-- Enquiry  -->
            <div id="enquiry" class="mt-0 flex flex-col w-full border-1 border-b-[#52b84a] bg-gradient-to-bl from-[#ffe4e6]  to-[#ccfbf1]">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-10  px-5 flex justify-start items-center mx-2 mt-1 text-[#414143]"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">Enquiry</p>
                    </div>
                </div>
                <!-- theme bg /.-->

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

                

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold"
                        style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- {{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- Enquiry /. -->

            <!-- Feedback  -->
            <div id="feedback" class="mt-0 flex flex-col w-full border-1 border-b-[#52b84a] bg-gradient-to-bl from-[#ffe4e6]  to-[#ccfbf1]">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-10  px-5 flex justify-start items-center mx-2 mt-1 text-[#414143]"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">Feedback</p>
                    </div>
                </div>
                <!-- theme bg /.-->

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
                <div class="flex flex-col w-full bg-[#2A7B9B] mb-3">
                    <!-- heading -->
                    <div class="flex flex-col w-full p-3">
                        <p class="font-bold text-[#ffffff] text-[16px] p-2 text-center uppercase">
                            Customer FeedBacks
                        </p>
                    </div>
                    <!-- heading /. -->
                    <!-- feedback message -->
                    <div class="flex flex-col w-full p-5 bg-gray-100">
                        <div
                            v-for="(item, index) in feedbackVerifyData"
                            :key="item.id"
                            class="flex flex-col w-full p-3 bg-gray-100 shadow-lg mb-4 rounded-lg"
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

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold"
                        style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- {{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- Feedback /. -->

            <!-- Share my details  -->
            <div id="shareMyDetails" class="mt-0 flex flex-col w-full border-1 border-b-[#52b84a] bg-white ">
                <!-- theme top bg -->
                <div class="flex justify-center items-center w-full">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a]"
                        style="clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);">
                    </div>
                </div>
                <!-- theme top bg /.-->

                <!-- theme bg -->
                <div class="flex w-full">
                    <div class="w-full h-10  px-5 flex justify-start items-center mx-2 mt-1 text-[#414143]"> 
                        <p class="font-bold text-[18px] uppercase stroke-red-50">Share my details</p>
                    </div>
                </div>
                <!-- theme bg /.-->

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
                        <div class="flex flex-grow w-full font-semibold items-center justify-center mt-2">
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
                            class="w-[150px] text-gray bg-transparent border-1 border-[#2A7B9B] text-[#3d023a] py-2 rounded-xl transition hover:bg-[#2A7B9B] hover:text-white" >
                            Buy Paid Plan
                            </button>
                        </div>
                    </div>
                    <!-- content area /. -->
                </div>
                <!-- payment areas /. -->

                

                <!-- theme footer bg -->
                <div class="flex justify-center items-center w-full mt-2">
                    <div class="w-48 h-9 bg-gradient-to-br from-[#2A7B9B] via-[#57C785] to-[#52b84a] flex justify-center items-center text-white font-bold"
                        style="clip-path: polygon(10% 0%, 90% 0%, 100% 100%, 0% 100%);">
                        <!-- {{ companyName || "LinkAura" }} -->
                    </div>
                </div>
 
                <!-- theme footer bg /. -->
            </div>
            <!-- Share my details /. -->

        </div>
        <!-- website footer  -->
        <WebsiteFooterBar v-if="isFooter" />
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
    <!-- Image Popup Modal /.-->

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
    import { ref, onMounted,computed, nextTick  } from 'vue'
    import { useForm, useField } from 'vee-validate'
    import * as yup from 'yup';
    import Swal from 'sweetalert2';
    import { useRoute,useRouter } from 'vue-router'
    import defaultLogo from '@/assets/images/commonImages/linkAura_logo.png'
    import pro6 from '@/assets/images/commonImages/default_product_images/pro6.jpg'
    // import pro7 from '@/assets/images/commonImages/default_product_images/pro7.webp'
    // import pro8 from '@/assets/images/commonImages/default_product_images/pro8.webp'
    // import pro9 from '@/assets/images/commonImages/default_product_images/pro9.png'
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
    import { toast } from 'vue3-toastify'
    import axios from 'axios';
    import { useCardStore } from '@/stores/cardStore';
    import { PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon, ArrowDownTrayIcon } from '@heroicons/vue/24/solid'
    import WebsiteFooterBar from '../Components/WebsiteFooterBar.vue';
    
    export default {
        name: "Website_Temp_2",
        components: {PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon, WebsiteFooterBar, ArrowDownTrayIcon},
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
                        getAllowedCount(),
                        initWebsiteData(),
                        loadPayments(),
                        loadQrCode(),
                        loadFeedbackVerifyData(),
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
            // getting data from selected website /.

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
            // encodedUrl.value = cpyUrl.value = currentUrl
            encodedUrl.value = cpyUrl.value = encodeURIComponent(currentUrl)

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
                currentUrl,
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
                // payments qr code images
                paymentQrs,
                // Qr data
                qrData,
                qrImage,
                downloadQR,
                isDownloading,
                cpyUrl,
                copyToClipboard,
                // about us
                aboutUsData,
                aboutTxt,
                // feedback verify data
                feedbackVerifyData,
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
                selectProduct,
                // enquiry error fields
                nameError,
                phoneError,
                productNameEnquError,
                messageEnqError,
                gPay,
                paytm,
                selectedImage,
                showModal,
                openImage,
                closeModal,
                products,
                serviceData,
                galleryData,
                defaultLogo,
                pro6,
                // pro7,
                // pro8,
                // pro9,
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

<style>
    @keyframes download-arrow {
        0% { transform: translateY(-5px); opacity: 0; }
        50% { transform: translateY(0); opacity: 1; }
        100% { transform: translateY(5px); opacity: 0; }
    }

    .animate-download {
    animation: download-arrow 0.8s infinite linear;
    }
</style>