<template>
    <div class="grid grid-cols-1 md:grid-cols-4">
        <!-- left temp column -->
        <!-- Left Sidebar -->
        <div class="col-span-1">
            <SideNavBar />
        </div>
        <!-- left temp column /. -->

        <!-- right preview column -->
        <div class="col-span-3 bg-gray-100 p-4 min-h-screen">
            <Header_tab />
            <!-- main content area -->
            <div class="flex flex-row md:flex-row w-full py-5 px-5 bg-white mt-2  justify-between gap-3 md:gap-0 border border-sky-500/30">
                <!-- Left Side Button -->
                <router-link to="/Company_details">
                    <button
                        class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                            py-1.5 px-3 text-sm 
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500 
                            hover:-translate-y-2 hover:shadow-xl">
                        Company Details
                    </button>
                </router-link>

                <!-- Right Side Button -->
                <router-link to="/Address">
                    <button
                        class="bg-[#000b57] text-white 
                            py-1.5 px-3 text-sm 
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500 
                            hover:-translate-y-2 hover:shadow-xl" @click="saveAndNext">
                        Save & Next Address
                    </button>
                </router-link>
            </div>

            <!-- heading page -->
            <div class="flex flex-col w-full mt-2">
                <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                    <h1>Website template</h1>
                </div>
            </div>
            <!-- heading page /. -->

            <!-- THEME PAGE -->
            <div class="grid grid-cols-1 lg:grid-cols-5 mt-2 gap-4">

                <!-- LEFT SIDE : WEBSITE TEMPLATES -->
                <div
                    class="lg:col-span-3 bg-white
                        grid grid-cols-2 sm:grid-cols-3
                        auto-rows-[220px]
                        gap-y-6 gap-x-6
                        pt-5 px-2
                        border-r-0 lg:border-r-4 border-gray-100"
                >
                    <div
                        v-for="wsite in websiteDesigns"
                        :key="wsite.id"
                        @click="handleTemplateClick(wsite)"
                        class="relative cursor-pointer rounded-xl
                            transition-all duration-300 ease-out
                            flex items-center justify-center
                            bg-white"
                        :class="selectedId === wsite.id
                            ? 'scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)] ring-2 ring-blue-400'
                            : 'scale-100 shadow-md hover:shadow-xl hover:scale-102'"
                    >
                        <!-- IMAGE HOLDER (FIXED SIZE) -->
                        <div class="w-full h-full p-3 flex items-center justify-center">
                            <img
                                :src="website_templates_images(wsite.website_image, wsite.id)"
                                :alt="wsite.website_image"
                                class="max-w-full max-h-full object-contain rounded-lg"
                            />
                        </div>
                    </div>
                </div>
                <!-- LEFT /. -->


                <!-- RIGHT SIDE : MOBILE PREVIEW (DESKTOP ONLY) -->
                <div
                    class="hidden lg:flex lg:col-span-2 justify-center bg-white pt-5"
                    ref="rightPanel"
                >
                    <!-- PHONE FRAME -->
                    <div
                        class="relative mx-auto
                            border-[#ebe6e7] bg-base
                            border-[12px]
                            rounded-[2.5rem]
                            h-[520px]
                            w-[300px]
                            xl:w-[340px]"
                    >

                        <!-- SIDE BUTTONS -->
                        <div class="h-[32px] w-[3px] bg-base absolute -start-[14px] top-[72px] rounded-s-lg"></div>
                        <div class="h-[46px] w-[3px] bg-base absolute -start-[14px] top-[124px] rounded-s-lg"></div>
                        <div class="h-[46px] w-[3px] bg-base absolute -start-[14px] top-[178px] rounded-s-lg"></div>
                        <div class="h-[64px] w-[3px] bg-base absolute -end-[14px] top-[142px] rounded-e-lg"></div>

                        <!-- PHONE SCREEN -->
                        <div
                            class="rounded-[2rem]
                                w-full h-full
                                bg-neutral-primary
                                overflow-y-auto overflow-x-hidden
                                scroll-smooth scrollbar-hide"
                        >
                            <Website_Temp_1
                                v-if="selectedWebsiteId == 1"
                                :key="'website1-' + selectedWebsiteId"
                                :website-id="selectedWebsiteId"
                                :webTemp="selectedWebsiteId_with_webTemp_id"
                                :isFooter="false"
                            />

                            <Website_Temp_2
                                v-if="selectedWebsiteId == 2"
                                :key="'website2-' + selectedWebsiteId"
                                :website-id="selectedWebsiteId"
                                :webTemp="selectedWebsiteId_with_webTemp_id"
                                :isFooter="false"
                            />

                            <Website_Temp_3
                                v-if="selectedWebsiteId == 3"
                                :key="'website3-' + selectedWebsiteId"
                                :website-id="selectedWebsiteId"
                                :webTemp="selectedWebsiteId_with_webTemp_id"
                                :isFooter="false"
                            />

                            <Website_Temp_4
                                v-if="selectedWebsiteId == 4"
                                :key="'website4-' + selectedWebsiteId"
                                :website-id="selectedWebsiteId"
                                :webTemp="selectedWebsiteId_with_webTemp_id"
                                :isFooter="false"
                            />
                            
                            <Website_Temp_5
                                v-if="selectedWebsiteId == 5"
                                :key="'website5-' + selectedWebsiteId"
                                :website-id="selectedWebsiteId"
                                :webTemp="selectedWebsiteId_with_webTemp_id"
                                :isFooter="false"
                            />
                            
                            <Website_Temp_6
                                v-if="selectedWebsiteId == 6"
                                :key="'website6-' + selectedWebsiteId"
                                :website-id="selectedWebsiteId"
                                :webTemp="selectedWebsiteId_with_webTemp_id"
                                :isFooter="false"
                            />
                        </div>
                    </div>
                </div>
                <!-- RIGHT /. -->

            </div>
            <!-- THEME PAGE /. -->

            <!-- main content area /.-->
        </div>
        <!-- right preview column /. -->
    </div>


    <!-- MOBILE POPUP -->
    <div v-if="showMobilePopup" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50"> <!-- md:hidden -->
        <div class="bg-white rounded-xl p-4 w-11/12 max-w-sm shadow-xl relative 
                    overflow-y-auto overflow-x-hidden scroll-smooth scrollbar-hide 
                    max-h-[90vh]">

            <!-- Close Btn -->
            <button @click="showMobilePopup = false"
                    class="absolute top-2 right-2 text-white bg-red-500 p-4">
                ✕
            </button>

            <div class="w-full">
                <Website_Temp_1 
                    v-if="selectedWebsiteId == 1"
                    :key="'website1-' + selectedWebsiteId"
                    :website-id="selectedWebsiteId"
                    :webTemp="selectedWebsiteId_with_webTemp_id"
                    :isFooter="false"
                />

                <Website_Temp_2 
                    v-if="selectedWebsiteId == 2"
                    :key="'website2-' + selectedWebsiteId"
                    :website-id="selectedWebsiteId"
                    :webTemp="selectedWebsiteId_with_webTemp_id"
                    :isFooter="false"
                />
                
                <Website_Temp_3
                    v-if="selectedWebsiteId == 3"
                    :key="'website3-' + selectedWebsiteId"
                    :website-id="selectedWebsiteId"
                    :webTemp="selectedWebsiteId_with_webTemp_id"
                    :isFooter="false"
                />
                
                <Website_Temp_4
                    v-if="selectedWebsiteId == 4"
                    :key="'website4-' + selectedWebsiteId"
                    :website-id="selectedWebsiteId"
                    :webTemp="selectedWebsiteId_with_webTemp_id"
                    :isFooter="false"
                />
               
                <Website_Temp_5
                    v-if="selectedWebsiteId == 5"
                    :key="'website5-' + selectedWebsiteId"
                    :website-id="selectedWebsiteId"
                    :webTemp="selectedWebsiteId_with_webTemp_id"
                    :isFooter="false"
                />
                
                <Website_Temp_6
                    v-if="selectedWebsiteId == 6"
                    :key="'website6-' + selectedWebsiteId"
                    :website-id="selectedWebsiteId"
                    :webTemp="selectedWebsiteId_with_webTemp_id"
                    :isFooter="false"
                />
            </div>

            <!-- Save & Next Button -->
            <button @click="saveAndNext"
                class="mb-10 mt-4 w-full bg-blue-600 text-white py-2 rounded-lg font-semibold shadow-lg active:scale-95">
                Save & Next (Address)
            </button>

        </div>
    </div>


</template>

<script>
    import Header_tab from '../Header_tab.vue';
    import SideNavBar from '../SideNavBar.vue';
    import Website_Temp_1 from '@/Pages/Mini_Website_Pages/Website_Temp_1.vue';
    import Website_Temp_2 from '@/Pages/Mini_Website_Pages/Website_Temp_2.vue';
    import Website_Temp_3 from '@/Pages/Mini_Website_Pages/Website_Temp_3.vue';
    import Website_Temp_4 from '@/Pages/Mini_Website_Pages/Website_Temp_4.vue';
    import Website_Temp_5 from '@/Pages/Mini_Website_Pages/Website_Temp_5.vue';
    import Website_Temp_6 from '@/Pages/Mini_Website_Pages/Website_Temp_6.vue';
    import { ref, watch, computed, onMounted, nextTick } from 'vue';
    import { useCardStore } from '@/stores/cardStore'
    import { toast } from 'vue3-toastify'
    import { useRouter } from "vue-router";

    export default {
        name: "Website_temp",
        components: {SideNavBar, Website_Temp_1, Website_Temp_2, Website_Temp_3,Website_Temp_4,Website_Temp_5,Website_Temp_6, Header_tab},
        setup() {
            const router = useRouter();
            // collect the website templates
            const websiteDesigns = ref([
                {id: 1, name:"website 1", website_temp: 1, website_image: "website1_thumb1.png"},
                {id: 2, name:"website 2", website_temp: 6, website_image: "website2_thumb1.png"},
                {id: 3, name:"website 3", website_temp: 11, website_image: "website3_thumb1.png"},
                {id: 4, name:"website 4", website_temp: 16, website_image: "website4_thumb1.png"},
                {id: 5, name:"website 5", website_temp: 21, website_image: "website5_thumb1.jpeg"},
                {id: 6, name:"website 6", website_temp: 26, website_image: "website6_thumb1.png"},
            ]);

            const website_templates_images = (websiteImage, websiteId) => {
                if(websiteId == 1){
                    return new URL(`/public/images/website/website1/thumbnail/${websiteImage}`, import.meta.url).href;
                }
                if(websiteId == 2){
                    return new URL(`/public/images/website/website2/thumbnail/${websiteImage}`, import.meta.url).href;
                }
                if(websiteId == 3){
                    return new URL(`/public/images/website/website3/thumbnail/${websiteImage}`, import.meta.url).href;
                }
                if(websiteId == 4){
                    return new URL(`/public/images/website/website4/thumbnail/${websiteImage}`, import.meta.url).href;
                }
                if(websiteId == 5){
                    return new URL(`/public/images/website/website5/thumbnail/${websiteImage}`, import.meta.url).href;
                }
                if(websiteId == 6){
                    return new URL(`/public/images/website/website6/thumbnail/${websiteImage}`, import.meta.url).href;
                }
            }
            // desktop views
            const rightPanel = ref(null)
            const selectedWebsiteId = ref(null)
            const selectedWebsiteId_with_webTemp_id = ref(null);
            const selectWesiteDesign = (id, tempId) => {
                selectedWebsiteId.value = id;
                selectedWebsiteId_with_webTemp_id.value = tempId 
                console.log("selectedThemeId")
                console.log(selectedWebsiteId.value)
                
                
                console.log("selectedThemeId_with_design_id")
                console.log(selectedWebsiteId_with_webTemp_id.value)

                nextTick(() => {
                     rightPanel.value?.scrollIntoView({ behavior: "smooth", block: "start" })
                })
            };


            // mobile view
            const showMobilePopup = ref(false)
            const selectedImage = ref(null)
            const selectedId = ref(null)

            const handleTemplateClick = (wsite) => {
                selectedId.value = wsite.id
                selectedImage.value = website_templates_images(wsite.website_image, wsite.id)

                
                // Mobile → open popup
                if (window.innerWidth < 1024) {
                    showMobilePopup.value = true
                    selectWesiteDesign(wsite.id, wsite.website_temp)
                } else {
                    // Desktop → directly update preview
                    selectWesiteDesign(wsite.id, wsite.website_temp)
                }
            }

            const card_id = ref('') 
            card_id.value = JSON.parse(localStorage.getItem('cardId'))
            const cardStore = useCardStore()

            const highlight_website_id = ref("")
            const highlight_temp_id = ref("")
            const currData = ref({})

            // get data
            onMounted( async() => {
               const res = await axios.post('/getWebsiteDetails', {'table': 'miniweb_company_details', 'cardId' : Number(cardStore.cardId)}) 
               if(res.data.status==true){
                    currData.value = res.data.getData[0]
                    highlight_website_id.value = currData.value.website_id 
                    highlight_temp_id.value = currData.value.websiteTemp_id
                    
                    selectedWebsiteId.value = currData.value.website_id
                    selectedWebsiteId_with_webTemp_id.value = currData.value.websiteTemp_id
                     // Find matching template
                    const match = websiteDesigns.value.find(item =>
                        item.id === highlight_website_id.value &&
                        item.website_temp === highlight_temp_id.value
                    );

                    // Highlight the matching one
                    if (match) {
                        selectedId.value = match.id;
                    }
               }
            });


            const websiteSaveResponse = ref({});

            const saveAndNext = async() => {
                const cardId = Number(cardStore.cardId);
                const website_ID = selectedWebsiteId.value;
                const websiteTemp_id = selectedWebsiteId_with_webTemp_id.value

                try {
                    const response = await axios.post('/saveWebsiteTemp', {
                        cardId: cardId, // website id
                        website_ID: website_ID,
                        websiteTemp_id: websiteTemp_id
                    });
                    websiteSaveResponse.value = response.data.getData
                    console.log(websiteSaveResponse)
                    if(response.data.status == true || response.data.status == false){
                        toast.success(response.data.message)
                        router.push('/Address')
                        showMobilePopup.value = false
                    }
                    else{
                        toast.warning(response.data.message)
                    }
                    
                }
                catch(error)
                {
                    toast.error("Something went wrong! " + error) 
                }
                
                
            }

            return {
                websiteDesigns,
                website_templates_images,
                showMobilePopup,
                selectedImage,
                selectedId,
                handleTemplateClick,
                saveAndNext,
                selectedWebsiteId,
                selectedWebsiteId_with_webTemp_id,
                selectWesiteDesign,
                card_id,
                websiteSaveResponse,
                currData,
                highlight_temp_id,
                highlight_website_id,
            }
        }
    }
</script>

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { scrollbar-width: none; }
</style>