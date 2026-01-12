<template>
    <main>
        <div class="grid grid-cols-1 md:grid-cols-4">
            <!-- Left Sidebar -->
            <div class="col-span-1">
                <SideNavBar />
            </div>
            <!-- Left Sidebar /.-->

            <!-- Right Content -->
            <div class="col-span-3 bg-gray-100 p-4 min-h-screen">
                <Header_tab />
                <!-- top header -->
                <div class="flex flex-row md:flex-row w-full py-5 px-5 bg-white mt-2  justify-between gap-3 md:gap-0 border border-sky-500/30">
                    <!-- Left Side Button -->
                    <router-link to="/Aboutus">
                        <button
                            class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                                py-1.5 px-3 text-sm 
                                md:py-2 md:px-4 md:text-base
                                rounded-xl transition-all duration-500 
                                hover:-translate-y-2 hover:shadow-xl">
                            About Us
                        </button>
                    </router-link>

                    <!-- Right Side Button -->
                    <button
                        @click="saveAndNext"
                        :disabled="isSubmitting"
                        class="bg-[#000b57] text-white 
                            py-1.5 px-3 text-sm 
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500 
                            hover:-translate-y-2 hover:shadow-xl">
                        {{ isSubmitting ? "Saving..." : "Save & Next Products" }}
                    </button>
                    <!-- Right Side Button -->
                </div>
                <!-- top header /. -->

                <!-- heading page -->
                <div class="flex flex-col w-full mt-2">
                    <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                        <h1>Social Media Links</h1>
                    </div>
                </div>
                <!-- heading page /. -->

                <!-- main content area -->
                <div class="grid grid-cols-1 md:grid-cols-[25%_50%_25%] mt-2">
                    <!-- left -->
                    <div class="hidden md:block bg-white"></div>

                    <!-- center -->
                    <div class="bg-white p-5 w-full">
                        <!-- form area  -->
                        <form @submit.prevent="onSubmit" class="space-y-4 w-full">
                            <!-- Facebook -->
                            <div>
                                <label class="font-semibold text-gray-700">Facebook Link</label>
                                <input
                                    v-model="facebookUrl"
                                    type="text"
                                    placeholder="Enter Facebook Url"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && facebookUrlError" class="text-red-500 text-sm">{{ facebookUrlError }}</span>
                                </div>
                            </div>
                            <!-- Facebook /. -->

                            <!-- instagram -->
                            <div>
                                <label class="font-semibold text-gray-700">Instagram Link</label>
                                <input
                                    v-model="instagramUrl"
                                    type="text"
                                    placeholder="Enter Instagram Url"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && instagramUrlError" class="text-red-500 text-sm">{{ instagramUrlError }}</span>
                                </div>
                            </div>
                            <!-- instagram /. -->
                            
                            <!-- whatsapp -->
                            <div>
                                <label class="font-semibold text-gray-700">WhatsApp Link</label>
                                <input
                                    v-model="whatsappUrl"
                                    type="text"
                                    placeholder="Enter WhatsApp Url"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && whatsappUrlError" class="text-red-500 text-sm">{{ whatsappUrlError }}</span>
                                </div>
                            </div>
                            <!-- whatsapp /. -->
                            
                            
                            <!-- Youtube 1 -->
                            <div>
                                <label class="font-semibold text-gray-700">Youtube Link 1</label>
                                <input
                                    v-model="youtubeUrl1"
                                    type="text"
                                    placeholder="Enter YouTube Url 1"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && youtubeUrl1Error" class="text-red-500 text-sm">{{ youtubeUrl1Error }}</span>
                                </div>
                            </div>
                            <!-- Youtube 1 /. -->
                            
                            
                            <!-- Youtube 2 -->
                            <div>
                                <label class="font-semibold text-gray-700">Youtube Link 2</label>
                                <input
                                    v-model="youtubeUrl2"
                                    type="text"
                                    placeholder="Enter YouTube Url 2"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && youtubeUrl2Error" class="text-red-500 text-sm">{{ youtubeUrl2Error }}</span>
                                </div>
                            </div>
                            <!-- Youtube 2 /. -->
                            
                            
                            <!-- Insta reals 1-->
                            <div>
                                <label class="font-semibold text-gray-700">Instagram Reals 1</label>
                                <input
                                    v-model="instaReals1"
                                    type="text"
                                    placeholder="Enter Instagram Reals Url1"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && instaReals1Error" class="text-red-500 text-sm">{{ instaReals1Error }}</span>
                                </div>
                            </div>
                            <!-- Insta reals 1/. -->
                            
                            <!-- Insta reals 2-->
                            <div>
                                <label class="font-semibold text-gray-700">Instagram Reals 2</label>
                                <input
                                    v-model="instaReals2"
                                    type="text"
                                    placeholder="Enter Instagram Reals Url2"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && instaReals2Error" class="text-red-500 text-sm">{{ instaReals2Error }}</span>
                                </div>
                            </div>
                            <!-- Insta reals 1/. -->

                            <!-- submit button -->
                            <div>
                                <button
                                    type="button"
                                    @click="saveAndNext"
                                    :disabled="isSubmitting"
                                    class="bg-[#000b57] text-white 
                                        py-1.5 px-3 text-sm 
                                        md:py-2 md:px-4 md:text-base
                                        rounded-xl transition-all duration-500 
                                        hover:-translate-y-2 hover:shadow-xl">
                                    {{ isSubmitting ? "Saving..." : "Save & Next Products" }}
                                </button>
                            </div>
                            <!-- submit button /. -->

                        </form>
                        <!-- form area  /.-->
                    </div>

                    <!-- right -->
                    <div class="hidden md:block bg-white"></div>
                </div>
                <!-- main content area /.-->
            </div>
            <!-- Right Content /.-->
        </div>
    </main>
</template>

<script>
    import { ref, watch, computed, onMounted } from 'vue';
    import SideNavBar from '../SideNavBar.vue';
    import Header_tab from '../Header_tab.vue';
    import { useCardStore } from '@/stores/cardStore';
    import { useRouter } from "vue-router";
    import { Form, Field, ErrorMessage, useForm, useField } from "vee-validate";
    import * as yup from "yup";
    import { toast } from 'vue3-toastify'
    import axios from 'axios';

    export default {
        name: "MediaLinks",
        components: { SideNavBar, Header_tab },
        setup(){
            const router = useRouter()
            const isSubmitting = ref(false);
            const cardStore = useCardStore()

            const userID = ref('')
            const cardID = ref('')
            const rowid = ref('')
            const currData = ref({})
            userID.value = JSON.parse(localStorage.getItem('user')).id 
            cardID.value = JSON.parse(localStorage.getItem('cardId'))

            onMounted(async() => {
                // get data
                const res = await axios.post('/getWebsiteDetails', {'table': 'miniweb_social_links', 'cardId' : Number(cardStore.cardId)})
                if(res.data.status==true){
                    currData.value = res.data.getData[0]
                    facebookUrl.value = currData.value.facebook_url
                    instagramUrl.value = currData.value.instagram_url
                    whatsappUrl.value = currData.value.whatsapp_link
                    youtubeUrl1.value = currData.value.youtube_Url1
                    youtubeUrl2.value = currData.value.youtube_Url2
                    instaReals1.value = currData.value.instaReals_Url1
                    instaReals2.value = currData.value.instaReals_Url2
                    rowid.value = currData.value.id
                }
            });

            // validation
            const schema = yup.object({
                facebookUrl: yup.string().nullable(),
                instagramUrl: yup.string().nullable(),
                whatsappUrl: yup.string().nullable(),
                youtubeUrl1: yup.string().nullable(),
                youtubeUrl2: yup.string().nullable(),
                instaReals1: yup.string().nullable(),
                instaReals2: yup.string().nullable(),
            });

            const { handleSubmit, submitCount } = useForm({
                validationSchema: schema,
            });

            // Fields
            const { value: facebookUrl, errorMessage: facebookUrlError } = useField('facebookUrl');
            const { value: instagramUrl, errorMessage: instagramUrlError } = useField('instagramUrl');
            const { value: whatsappUrl, errorMessage: whatsappUrlError } = useField('whatsappUrl');
            const { value: youtubeUrl1, errorMessage: youtubeUrl1Error } = useField('youtubeUrl1');
            const { value: youtubeUrl2, errorMessage: youtubeUrl2Error } = useField('youtubeUrl2');
            const { value: instaReals1, errorMessage: instaReals1Error } = useField('instaReals1');
            const { value: instaReals2, errorMessage: instaReals2Error } = useField('instaReals2');

            const onSubmit = handleSubmit(async (values) => {
                try {
                    values.card_id = cardID.value
                    values.rowid = rowid.value
                    const resData = await axios.post('/save_media_links',values)
                    if(resData.data.status == true){
                        facebookUrl.value = ''
                        instagramUrl .value = ''
                        whatsappUrl .value = ''
                        youtubeUrl1 .value = ''
                        youtubeUrl2 .value = ''
                        instaReals1 .value = ''
                        instaReals2 .value = ''
                        rowid.value = ''
                        toast.success(resData.data.message);
                        router.push("/Products");
                    }
                    else
                    {
                        toast.warning(resData.data.message);
                    }
                }
                catch (error) {
                    toast.error("Something went wrong: " + error);
                }
                finally {
                    isSubmitting.value = false;
                }
            });

            const saveAndNext = () => {
                onSubmit();
                // document.querySelector("form").dispatchEvent(new Event("submit"));
            };

            return{
                whatsappUrl,
                whatsappUrlError,
                instagramUrl,
                instagramUrlError,
                facebookUrl,
                facebookUrlError,
                youtubeUrl1,
                youtubeUrl1Error,
                youtubeUrl2,
                youtubeUrl2Error,
                instaReals1,
                instaReals1Error,
                instaReals2,
                instaReals2Error,
                isSubmitting,
                saveAndNext,
                onSubmit,
                submitCount,
                schema,
                userID,
                cardID,
                rowid,
                currData,
            }
        }
    }
</script>