<template>
    <main>
        <div class="grid grid-cols-1 md:grid-cols-4">
            <!-- Left Sidebar -->
            <div class="col-span-1">
                <SideNavBar />
            </div>

            <!-- Right Content -->
            <div class="col-span-3 bg-gray-100 p-4 min-h-screen">
                <Header_tab />
                <!-- top header -->
                <div class="flex flex-row md:flex-row w-full py-5 px-5 bg-white mt-2  justify-between gap-3 md:gap-0 border border-sky-500/30">
                    <!-- Left Side Button -->
                    <router-link to="/Website_temp">
                        <button
                            class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                                py-1.5 px-3 text-sm 
                                md:py-2 md:px-4 md:text-base
                                rounded-xl transition-all duration-500 
                                hover:-translate-y-2 hover:shadow-xl">
                            Website Template
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
                        {{ isSubmitting ? "Saving..." : "Save & About Us" }}
                    </button>
                    <!-- Right Side Button -->
                </div>
                <!-- top header /. -->

                <!-- heading page -->
                <div class="flex flex-col w-full mt-2">
                    <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                        <h1>Contact Details</h1>
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
                            <!-- phone number -->
                            <div class="w-full flex flex-col gap-2">
                                <div class="w-full flex items-center gap-4">
                                    
                                    <div class="flex-grow">
                                        <label class="font-semibold text-gray-700">Phone Number</label>
                                        <input
                                            v-model="phone_number"
                                            type="text"
                                            placeholder="Enter Phone Number"
                                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                            oninput="this.value=this.value.replace(/[^\d]/,'')"
                                            maxlength="10"
                                        />
                                        <div class="mt-1">
                                            <span v-if="submitCount > 0 && phoneNumberError" class="text-red-500 text-sm">{{ phoneNumberError }}</span>
                                        </div>
                                    </div>

                                    <button
                                        type="button"
                                        @click="whatsapp_number = phone_number"
                                        class="bg-transparent hover:bg-[#000b57] text-blue-700 font-semibold hover:text-white 
                                        py-2 px-4 border border-[#000b57] hover:border-transparent rounded"
                                    >
                                        Use as WhatsApp
                                    </button>
                                </div>
                            </div>
                            <!-- phone number /.-->
                            
                            <!-- whatsapp number -->
                            <div>
                                <label class="font-semibold text-gray-700">WhatsApp Number</label>
                                <input
                                    v-model="whatsapp_number"
                                    type="text"
                                    placeholder="Enter WhatsApp Number"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                    oninput="this.value=this.value.replace(/[^\d]/,'')"
                                    maxlength="10"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && whatsappNumberError" class="text-red-500 text-sm">{{ whatsappNumberError }}</span>
                                </div>
                            </div>
                            <!-- whatsapp number -->
                            
                            <!-- email -->
                            <div>
                                <label class="font-semibold text-gray-700">Email</label>
                                <input v-model="email" type="email"
                                        placeholder="Enter Email" class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && emailError" class="text-red-500 text-sm">{{ emailError }}</span>
                                </div>
                            </div>
                            <!-- email /.-->

                            <!-- address -->
                            <div>
                                <label class="font-semibold text-gray-700">Address</label>
                                <textarea v-model="address"
                                    type="text" placeholder="Enter Address"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300 min-h-[80px]"
                                    ></textarea>
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && addressError" class="text-red-500 text-sm">{{ addressError }}</span>
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
                                    {{ isSubmitting ? "Saving..." : "Save & Next About Us" }}
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
        name: "Address",
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

            // get datas
            onMounted( async() => {
                const res = await axios.post('/getWebsiteDetails', {'table': 'miniweb_contact', 'cardId' : Number(cardStore.cardId)})
                if(res.data.status==true){
                    currData.value = res.data.getData[0]
                    phone_number.value = currData.value.phone_number
                    whatsapp_number.value = currData.value.whatsapp_number != 0 ? currData.value.whatsapp_number : ''
                    address.value = currData.value.address
                    email.value = currData.value.email
                    rowid.value = currData.value.id
                }
            });
            
            // save and go to media links
            // validate
            const schema = yup.object({
                phone_number: yup
                    .string()
                    .required("Phone Number is required")
                    .matches(/^[6-9]\d{9}$/, "Enter valid Phone number")
                    .notOneOf(["0000000000"], "Invalid Phone number"),
                whatsapp_number: yup
                    .string()
                    .required("WhatsApp Number is required")
                    .matches(/^[6-9]\d{9}$/, "Enter valid WhatsApp number")
                    .notOneOf(["0000000000"], "Invalid WhatsApp number"),
                email: yup
                    .string()
                    .required('Email is required.')
                    .email('Must be a valid email format (e.g., info@linkaura.com)'),
                address: yup
                        .string()
                        .required('Enter Address'),
            });
            const { handleSubmit, submitCount } = useForm({
                validationSchema: schema,
            });
            // Fields
            const { value: phone_number, errorMessage: phoneNumberError } = useField('phone_number');
            const { value: whatsapp_number, errorMessage: whatsappNumberError } = useField('whatsapp_number');
            const { value: email, errorMessage: emailError } = useField('email');
            const { value: address, errorMessage: addressError } = useField('address');

            // set the phone number from the user registration
            phone_number.value = JSON.parse(localStorage.getItem('user')).mobile_number

            const onSubmit = handleSubmit(async (values) => {
                try {
                    values.card_id = cardID.value
                    values.rowid = rowid.value
                    const resData = await axios.post('/save_website_address', values);
                    if(resData.data.status){
                        phone_number.value = '';
                        whatsapp_number.value = '';
                        email.value = '';
                        address.value = '';
                        rowid.value = '';
                        toast.success(resData.data.message);
                        router.push("/Aboutus");

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
                cardStore,
                phone_number,
                phoneNumberError,
                whatsapp_number,
                whatsappNumberError,
                email,
                emailError,
                address,
                addressError,
                submitCount,
                saveAndNext,
                onSubmit,
                userID,
                cardID,
                rowid,
            }
        }
    }
</script>