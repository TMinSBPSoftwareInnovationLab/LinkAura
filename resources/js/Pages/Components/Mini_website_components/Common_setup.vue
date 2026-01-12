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
                            Previous Page
                        </button>
                    </router-link>

                    <!-- Right Side Button -->
                    <!-- Right Side Button -->
                    <button
                        @click="saveAndNext"
                        :disabled="isSubmitting"
                        class="bg-[#000b57] text-white 
                            py-1.5 px-3 text-sm 
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500 
                            hover:-translate-y-2 hover:shadow-xl">
                        {{ isSubmitting ? "Saving..." : "Save & Next Page" }}
                    </button>
                </div>
                <!-- top header /. -->

                <!-- heading page -->
                <div class="flex flex-col w-full mt-2">
                    <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                        <h1>Title Here</h1>
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
                            
                            <!-- address -->
                            <div>
                                <textarea v-model="aboutusPara"
                                    type="text" placeholder="Enter Address"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300 min-h-[80px]"
                                    ></textarea>
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && aboutusParaError" class="text-red-500 text-sm">{{ aboutusParaError }}</span>
                                </div>
                            </div>
                            <!-- address /. -->

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
                                    {{ isSubmitting ? "Saving..." : "Save & Next Page" }}
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
    import { useCardStore } from '@/stores/cardStore';
    import { useRouter } from "vue-router";
    import { Form, Field, ErrorMessage, useForm, useField } from "vee-validate";
    import * as yup from "yup";
    import { toast } from 'vue3-toastify'
    import axios from 'axios';

    export default {
        name: "MediaLinks",
        components: { SideNavBar, },
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
            });

            return{
                isSubmitting,
                saveAndNext,
                onSubmit,
                userID,
                cardID,
                rowid,
                currData,
            }
        }
    }
</script>