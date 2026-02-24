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
                    <router-link to="/Gallery">
                        <button
                            class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                                py-1.5 px-3 text-sm
                                md:py-2 md:px-4 md:text-base
                                rounded-xl transition-all duration-500
                                hover:-translate-y-2 hover:shadow-xl">
                            Gallery
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
                        {{ isSubmitting ? "Saving..." : "Save & Preview" }}
                    </button>
                    <!-- Right Side Button -->
                </div>
                <!-- top header /. -->

                <!-- heading page -->
                <div class="flex flex-col w-full mt-2">
                    <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                        <h1>Payment Details</h1>
                    </div>
                </div>
                <!-- heading page /. -->


                <!-- main content area -->
                <div class="grid grid-cols-1 md:grid-cols-[25%_50%_25%] mt-2">
                    <!-- left -->
                    <div class="hidden md:block bg-white"></div>

                    <!-- center -->
                    <div class="bg-white p-5 w-full border border-1 border-gray-300 rounded-2xl shadow-2xl pt-5">
                        <!-- form area  -->
                        <form @submit.prevent="onSubmit" class="space-y-4 w-full">
                            <!-- GPay -->
                            <div>
                                <label class="font-semibold text-gray-700">GPay Number</label>
                                <input
                                    v-model="gPay"
                                    type="text"
                                    placeholder="Enter GPay Number"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                    oninput="this.value=this.value.replace(/[^\d]/,'')"
                                    maxlength="10"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && gPayError" class="text-red-500 text-sm">{{ gPayError }}</span>
                                </div>
                            </div>

                            <label class="font-semibold text-gray-700">Upload GPay QR Code</label>
                            <div class="w-full">
                                <input
                                    type="file"
                                    @change="onImageSelected($event, 'gPay')"
                                    accept="image/png, image/jpg, image/webp, image/gif, image/jpeg"
                                    class="w-full border border-gray-400 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                            </div>
                            <div v-if="preview.gPay" class="mt-2">
                                <img :src="preview.gPay" alt="gPay Preview" class="w-50 h-50 object-contain rounded shadow-2xl border border-1 border-gray-300 p-2 rounded-3xl" />
                            </div>
                            <!-- GPay /.-->


                            <!-- PhonePe -->
                            <div>
                                <label class="font-semibold text-gray-700">PhonePe Number</label>
                                <input
                                    v-model="phonePe"
                                    type="text"
                                    placeholder="Enter PhonePe Number"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                    oninput="this.value=this.value.replace(/[^\d]/,'')"
                                    maxlength="10"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && phonePeError" class="text-red-500 text-sm">{{ phonePeError }}</span>
                                </div>
                            </div>

                            <label class="font-semibold text-gray-700">Upload PhonePe QR Code</label>
                            <div class="w-full">
                                <input
                                    type="file"
                                    @change="onImageSelected($event, 'phonePe')"
                                    accept="image/png, image/jpg, image/webp, image/gif, image/jpeg"
                                    class="w-full border border-gray-400 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                            </div>
                            <div v-if="preview.phonePe" class="mt-2">
                                <img :src="preview.phonePe" alt="PhonePe Preview" class="w-50 h-50 object-contain rounded shadow-2xl border border-1 border-gray-300 p-2 rounded-3xl" />
                            </div>
                            <!-- PhonePe /.-->


                            <!-- PayTm -->
                            <div>
                                <label class="font-semibold text-gray-700">Paytm Number</label>
                                <input
                                    v-model="payTm"
                                    type="text"
                                    placeholder="Enter PhonePe Number"
                                    class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                    oninput="this.value=this.value.replace(/[^\d]/,'')"
                                    maxlength="10"
                                />
                                <div class="mt-1">
                                    <span v-if="submitCount > 0 && phonePeError" class="text-red-500 text-sm">{{ phonePeError }}</span>
                                </div>
                            </div>

                            <label class="font-semibold text-gray-700">Upload Paytm QR Code</label>
                            <div class="w-full">
                                <input
                                    type="file"
                                    @change="onImageSelected($event, 'paytm')"
                                    accept="image/png, image/jpg, image/webp, image/gif, image/jpeg"
                                    class="w-full border border-gray-400 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                            </div>
                            <div v-if="preview.paytm" class="mt-2">
                                <img :src="preview.paytm" alt="paytm Preview" class="w-50 h-50 object-contain rounded shadow-2xl border border-1 border-gray-300 p-2 rounded-3xl" />
                            </div>
                            <!-- PayTm /.-->

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
                                    {{ isSubmitting ? "Saving..." : "Save & Preview" }}
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
    import QRCode from "qrcode"
    const s3PaymentUrl = import.meta.env.VITE_AWS_URL_PAYMENT_DETAILS;

    export default {
        name: "PaymentDetails",
        components: { SideNavBar, Header_tab },
        setup() {
            const qrCodeUrl = ref("")
            const router = useRouter()
            const isSubmitting = ref(false);
            const cardStore = useCardStore()

            const userID = ref('')
            const cardID = ref('')
            const rowid = ref('')
            const currData = ref({})
            userID.value = JSON.parse(localStorage.getItem('user')).id
            cardID.value = JSON.parse(localStorage.getItem('cardId'))

            const gPay = ref()
            const phonePe = ref()
            const payTm = ref()

            const form = ref({
                gPay: null,
                phonePe: null,
                payTm: null
            });

            const preview = ref({
                gPay: '',
                phonePe: '',
                payTm: ''
            });

            function onImageSelected(event, field) {
                const file = event.target.files[0]
                if (!file) return;
                if (!file.type.startsWith("image/")) {
                    event.target.value = "";
                    form[field] = null;
                    preview.value[field] = null;
                    toast.error("Only image files are allowed (jpg, jpeg, webp, png, gif)");
                    return;
                }

                form[field] = file
                preview.value[field] = URL.createObjectURL(file)
            }

            // get payment details
            onMounted( async() => {
                const resData = await axios.post('/getWebsiteDetails', { table: 'miniweb_payments_details', cardId: Number(cardStore.cardId) })

                if (!resData.data.status) {
                    toast.warning("No data Found")
                    return
                }

                const data = resData.data.getData[0] || {}
                currData.value = data

                const numOrEmpty = v => v && v != 0 ? v : ''
                const qrPath = v => v ? `${s3PaymentUrl}/payment_Details_QrCode/${v}` : ''

                gPay.value     = numOrEmpty(data.gpay_number)
                phonePe.value  = numOrEmpty(data.phonepe_number)
                payTm.value    = numOrEmpty(data.paytm_number)

                preview.value = {
                    gPay: qrPath(data.gpay_qr_code),
                    phonePe: qrPath(data.phonepe_qr_code),
                    paytm: qrPath(data.paytm_qr_code),
                }

                rowid.value = data.id || null

            })

            // save payment details
            const onSubmit = async() => {
                isSubmitting.value = true;
                try {
                    const formData = new FormData();
                    formData.append('gPay', gPay.value);
                    formData.append('phonePe', phonePe.value);
                    formData.append('payTm', payTm.value);
                    formData.append('gPayFile', form.gPay || '');
                    formData.append('phonePeFile', form.phonePe || '');
                    formData.append('payTmFile', form.paytm || '');
                    // formData.append('rowid',rowid.value)
                    formData.append('rowid', rowid.value ?? '');
                    formData.append('cardId',Number(cardStore.cardId))

                    const resData = await axios.post('/save_miniweb_paymentDetails', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    });

                    gPay.value = '';
                    phonePe.value = '';
                    payTm.value = '';
                    rowid.value = '';
                    form.value = {};
                    preview.value = {};
                    toast.success(resData.data.message)

                    // get website id
                    const websiteRes = await axios.post('/getSelectedWebsite',{'website_id' : Number(cardStore.cardId)})
                    if(websiteRes.data.status){
                        const {
                            cd_ID, // company details id
                            website_id,
                            websiteTemp_id,
                            company_name,
                            purchased_id
                        } = websiteRes.data.data

                        const websiteRoute = `/Website_Temp_${website_id}` // website url
                        const params = `cd_id=${cd_ID}&template_id=${websiteTemp_id}`
                        const encoded = btoa(params)

                        // encode business name safely for URL
                        const safecompanyName = company_name.replace(/\s+/g, '_')
                        // console.log(safecompanyName)
                        const encrypt_website_id = btoa(website_id)
                        // console.log(encrypt_website_id)
                        const websitefinalUrl = `/${safecompanyName}/Website_Temp_${encrypt_website_id}`
                        const baseURL = window.location.origin;
                        const qrBase = await QRCode.toDataURL(`${baseURL}${websitefinalUrl}?ilp88LAsBvm=${encoded}`, { width: 300 })
                        qrCodeUrl.value = qrBase
                        // console.log(qrBase)

                        try {
                            const qr_res = await axios.post('/qrCodeGenerate', {
                                cd_ID: cd_ID, website_id: website_id, websiteTemp_id: websiteTemp_id, qrBase: qrBase
                            })
                            // console.log("qr_res : "+ qr_res.data)
                            window.open(`${websitefinalUrl}?ilp88LAsBvm=${encoded}`, '_blank')
                            router.push('/dashboard')
                        } catch (error) {
                            toast.warning("Qrcode error: "+ error)
                        }

                    }

                } catch (error) {
                    // console.log(error)
                    toast.warning("try catch "+ error)
                    // toast.warning(error)
                }finally {
                    isSubmitting.value = false;
                }
            }

            const saveAndNext = () => {
                onSubmit();
                // document.querySelector("form").dispatchEvent(new Event("submit"));
            };
            return {
                onSubmit,
                saveAndNext,
                gPay,
                phonePe,
                payTm,
                rowid,
                currData,
                form,
                preview,
                onImageSelected,
                s3PaymentUrl,
                isSubmitting,
            }
        }
    }
</script>