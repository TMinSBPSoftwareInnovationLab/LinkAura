<template>
    <main>
        <div class="grid grid-cols-1 md:grid-cols-4">
            <!-- Left Sidebar -->
            <div class="col-span-1">
                <SideNavBar />
            </div>
            <!-- Left Sidebar -->

            <!-- Right Content -->
            <div class="col-span-3 bg-gray-100 p-4 min-h-screen">
                <Header_tab />
                <!-- top header -->
                <div class="flex flex-row md:flex-row w-full py-5 px-5 bg-white mt-2  justify-between gap-3 md:gap-0 border border-sky-500/30">
                    <!-- Left Side Button -->
                    <router-link to="/Address">
                        <button
                            class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                                py-1.5 px-3 text-sm 
                                md:py-2 md:px-4 md:text-base
                                rounded-xl transition-all duration-500 
                                hover:-translate-y-2 hover:shadow-xl">
                            Address
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
                        {{ isSubmitting ? "Saving..." : "Save & Next Media Links" }}
                    </button>
                    <!-- Right Side Button /.-->
                </div>
                <!-- top header /. -->

                <!-- heading page -->
                <div class="flex flex-col w-full mt-2">
                    <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                        <h1>About Us</h1>
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
                            
                            <!-- Aboutus -->
                            <div>
                                <label class="font-semibold text-gray-700">About Us</label>
                                <textarea v-model="aboutusPara"
                                    type="text" placeholder="Enter Address"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300 min-h-[80px]"
                                    ></textarea>
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && aboutusParaError" class="text-red-500 text-sm">{{ aboutusParaError }}</span>
                                </div>
                            </div>
                            <!-- About us /. -->

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
                                    {{ isSubmitting ? "Saving..." : "Save & Next Media links" }}
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
            <!-- Right Content -->

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
        name: "AboutUs",
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

            onMounted(async()=>{
                // get data
                const res = await axios.post('/getWebsiteDetails', {'table': 'miniweb_aboutus', 'cardId' : Number(cardStore.cardId)})
                if(res.data.status==true){
                    currData.value = res.data.getData[0]
                    aboutusPara.value = currData.value.aboutus_text
                    rowid.value = currData.value.id
                }
            })

            // validation 
            const schema = yup.object({
                aboutusPara: yup.string().required("About Us is Required")
            });
            const { handleSubmit, submitCount } = useForm({
                validationSchema: schema,
            });
            // Fields
            const { value: aboutusPara, errorMessage: aboutusParaError } = useField('aboutusPara');

            const onSubmit = handleSubmit(async (values) => {
                try {
                    values.card_id = cardID.value
                    values.rowid = rowid.value
                    const resData = await axios.post('/save_aboutus',values)
                    if(resData.data.status == true){
                        aboutusPara.value = ''
                        rowid.value = ''
                        toast.success(resData.data.message);
                        router.push("/MediaLinks");
                    }
                    else
                    {
                        toast.warning(resData.data.message);
                    }
                } catch (error) {
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

            return {
                submitCount,
                schema,
                userID,
                rowid,
                currData,
                isSubmitting,
                saveAndNext,
                onSubmit,
                aboutusPara,
                aboutusParaError,
            }
        }
    }
</script>