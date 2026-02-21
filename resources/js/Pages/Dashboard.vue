<template>
    <div class="grid grid-cols-1 md:grid-cols-4">
        
        <!-- Left Sidebar -->
        <div class="col-span-1">
            <SideNavBar />
        </div>

        <!-- Right Content -->
        <div class="col-span-3 bg-gray-100 p-4 min-h-screen">
            <Header_tab />

            <!-- main content area -->
             <div class="flex w-full py-5 px-5 bg-white mt-2 justify-end">
                <!-- <router-link to="/Company_details"> -->
                    <button @click="gotoCompany_details"
                        class="bg-[#000b57] text-white py-2 px-4 rounded-xl 
                                transition-all duration-500 
                                hover:-translate-y-2 hover:shadow-xl">
                            Create Mini Website
                    </button>
                <!-- </router-link> -->

             </div>
             <div class="flex flex-col w-full bg-white p-5">
                <ag-grid-vue
                    class="ag-theme-quartz"
                    style="width: 100%; height: 500px"
                    :rowData="rowData"
                    :columnDefs="colDefs"
                    :rowHeight="60"
                >
                </ag-grid-vue>
             </div>
        </div>
    </div>

    <!-- Share Popup Modal -->
    <div v-if="shareModal" class="flex flex-col fixed max-w-[430px] h-[250px] justify-center items-center mx-auto inset-2.5 bg-[#681c6a] bg-opacity-50 z-50 p-5">
        
        <!-- CLOSE ICON -->
        <button @click="shareModal = false" class="absolute top-2 right-2 text-white  text-2xl font-bold bg-red-400
            p-2 rounded-xl">
            ×
        </button>
        <div class="flex flex-col w-full p-5 bg-white">
                <!-- share links -->
                <div class="flex w-full py-2 font-semibold" >
                    <p class="uppercase ">
                        Share links here
                    </p>
                </div>

                <!-- facebook share -->
                <div class="flex flex-grow w-full font-semibold items-center justify-center bg-white">
                    <a :href="`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(encodedUrl)}`"  target="_blank" class="flex items-center px-4 hover:bg-gray-100 hover:text-gray-800" >
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
                
                <!-- whatsapp share -->
                <div class="flex flex-grow w-full font-semibold items-center justify-center mt-5">
                    <a :href="`https://api.whatsapp.com/send?text=${encodeURIComponent(encodedUrl)}`"  target="_blank" class="flex items-center px-4 hover:bg-gray-100 hover:text-gray-800" >
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

                <!-- share links /. -->
        </div>
    </div>
    <!-- Share Popup Modal /.-->

    <!-- payment popup -->
    <div v-if="paymentModel" class="flex flex-col fixed justify-center items-center mx-auto inset-2.5 bg-[#681c6a] bg-opacity-50 z-50 p-5">
        <div v-if="paymentModel" class="grid grid-cols-1 md:grid-cols-3 md:gap-3 pb-0 mx-auto grid grid-cols-1 bg-center bg-cover bg-no-repeat pb-0 mx-auto fixed inset-0 bg-white flex flex-col p-5 pb-5 bg-yellow-300 overflow-y-auto overflow-x-hidden scroll-smooth scrollbar-hide">
            <!-- CLOSE ICON -->
                <button @click="paymentModel = false" class="absolute top-2 right-2 text-white  text-2xl font-bold bg-red-400
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
                    <p class="uppercase font-semibold text-[20px] text-[#2A7B9B] bg-white p-4 rounded-2xl">
                        Price: ₹999
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
                        <li>🛍️ Add up to 5 Products </li>
                        <li>🛠️ Add up to 5 Services</li>
                        <li>🖼️ Upload 5 Gallery Images</li>
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
                        <li>🔓 Access: Dashboard active for 30 days post-expiry</li>
                        <li>📩 Enquiries: Leads collected & saved; renew to unlock</li>
                    </ul>
                </div>
                <!-- Features area /. -->

                <!-- purchase button -->
                <div class="flex flex-col w-full px-5 pt-2 pb-2 justify-center items-center mt-5 mb-10 bg-[#2A7B9B]">
                    <button @click="purchasePlan(94, 1, 'Basic Plan')"
                    class="w-[150px] text-gray bg-transparent border-1 border-[#ffffff] text-[#ffffff] py-2 rounded-xl transition hover:bg-[#2A7B9B] hover:text-white" >
                    Buy Now
                    </button>
                </div>
                <!-- purchase button /. -->
            </div>
            <!-- basic main /.-->

            <!-- standard main -->
            <div class="flex flex-col w-full bg-white border-1 border-gray-100 shadow-xl mt-10 md:mt-0">
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
                    <p class="uppercase font-semibold text-[20px] text-[#066856] bg-white p-4 rounded-2xl">
                        Price: ₹1499
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
                        <li>🛍️ Add up to 15 Products </li>
                        <li>🛠️ Add up to 15 Services</li>
                        <li>🖼️ Upload 15 Gallery Images</li>
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
                        <li>🔓 Access: Dashboard active for 60 days post-expiry</li>
                        <li>📩 Enquiries: Leads collected & saved; renew to unlock</li>
                    </ul>
                </div>
                <!-- Features area /. -->

                <!-- purchase button -->
                <div class="flex flex-col w-full px-5 pt-2 pb-2 justify-center items-center mt-5 mb-10 bg-[#066856]">
                    <button @click="purchasePlan(95, 1, 'Standard Plan')"
                    class="w-[150px] text-gray bg-transparent border-1 border-[#ffffff] text-[#ffffff] py-2 rounded-xl transition hover:bg-[#066856] hover:text-white" >
                    Buy Now
                    </button>
                </div>
                <!-- purchase button /. -->
            </div>
            <!-- standard main /.-->

            <!-- Premium main -->
            <div class="flex flex-col w-full bg-white border-1 border-gray-100 shadow-xl mt-10 md:mt-0">
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
                    <p class="uppercase font-semibold text-[20px] text-[#6c075b] bg-white p-4 rounded-2xl">
                        Price: ₹2999
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
                        <li>🛍️ Add up to 30 Products </li>
                        <li>🛠️ Add up to 30 Services</li>
                        <li>🖼️ Upload 30 Gallery Images</li>
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
                        <li>🔓 Access: Dashboard active for 90 days post-expiry</li>
                        <li>📩 Enquiries: Leads collected & saved; renew to unlock</li>
                    </ul>
                </div>
                <!-- Features area /. -->

                <!-- purchase button -->
                <div class="flex flex-col w-full px-5 pt-2 pb-2 justify-center items-center mt-5 mb-10 bg-[#6c075b]">
                    <button @click="purchasePlan(96, 1, 'Premium Plan')"
                    class="w-[150px] text-gray bg-transparent border-1 border-[#ffffff] text-[#ffffff] py-2 rounded-xl transition hover:bg-[#6c075b] hover:text-white" >
                    Buy Now
                    </button>
                </div>
                <!-- purchase button /. -->
            </div>
            <!-- Premium main /.-->
        </div>
    </div>
    <!-- payment popup /. -->

</template>

<script>
import SideNavBar from './Components/SideNavBar.vue';
import Header_tab from './Components/Header_tab.vue';
import { ref, onMounted } from "vue";
import { toast } from 'vue3-toastify'
import Swal from 'sweetalert2';
import { useRouter } from "vue-router";
import { useCardStore } from '@/stores/cardStore';
import axios from "axios";
import { AgGridVue } from "ag-grid-vue3";
import { ModuleRegistry, AllCommunityModule } from "ag-grid-community";
ModuleRegistry.registerModules([AllCommunityModule]); 

import { PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon } from '@heroicons/vue/24/solid'

export default {
    components: { SideNavBar, Header_tab, AgGridVue, PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon },
    name: 'Dashboard',

    setup(){
        const router = useRouter();
        const cardStore = useCardStore() // store card id
        const user_id = ref('')
        user_id.value = JSON.parse(localStorage.getItem('user')).id;
        const rowData = ref([]);
        const shareModal = ref(false);
        const rejectReason = ref("");
        const selectedRow = ref(null);
        const encodedUrl = ref("")
        const paymentModel = ref(false) // payment popup
        const websiteRowID = ref() // website rowid

        const colDefs = ref([
            {
                headerName: "S.No",
                valueGetter: "node.rowIndex + 1",
                width: 80
            },
            {
                field: 'company_name',
                headerName: 'Company Name',
                width: 250
            },
            {
                headerName: 'Actions',
                minWidth: 320,
                cellRenderer: (params) => {
                    const {website_id, websiteTemp_id, purchased_id } = params.data;

                    const container = document.createElement('div');
                    container.style.display = 'flex';
                    container.style.gap = '6px';

                    /* =========================
                    RULE 1: ONLY EDIT
                    ========================== */
                    if (website_id == 0 && websiteTemp_id == 0) {
                        const editBtn = document.createElement('button');
                        editBtn.innerText = 'Edit';
                        editBtn.className = 'btn-edit';
                        editBtn.onclick = () => {
                            const rowId = params.data.id;
                            console.log("id", rowId)
                            // localStorage.removeItem('cardId')
                            cardStore.setCardId(rowId);
                            router.push('/Company_details')
                        };

                        container.append(editBtn);
                        return container;
                    }

                    /* =========================
                    EDIT (COMMON)
                    ========================== */
                    const editBtn = document.createElement('button');
                    editBtn.innerText = 'Edit';
                    editBtn.className = 'btn-edit';
                    editBtn.onclick = () => {
                        const rowId = params.data.id;
                        console.log("id", rowId)
                        // localStorage.removeItem('cardId')
                        cardStore.setCardId(rowId);
                        router.push('/Company_details')
                    };
                    container.append(editBtn);

                    /* =========================
                    VIEW (COMMON)
                    ========================== */
                    const viewBtn = document.createElement('button');
                    viewBtn.innerText = 'View';
                    viewBtn.className = 'btn-view';
                    viewBtn.onclick = () => viewWebsite(params.data);
                    container.append(viewBtn);

                    /* =========================
                    RULE 2 & 3 CONDITIONS
                    ========================== */
                    if (purchased_id > 0) {
                        // RULE 3 → SHARE
                        const shareBtn = document.createElement('button');
                        shareBtn.innerText = 'Share';
                        shareBtn.className = 'btn-share';
                        shareBtn.onclick = () => openShare(params.data);
                        container.append(shareBtn);
                    } else {
                        // RULE 2 → PURCHASE
                        const buyBtn = document.createElement('button');
                        buyBtn.innerText = 'Purchase';
                        buyBtn.className = 'btn-buy';
                        buyBtn.onclick = () => openPurchase(params.data);
                        container.append(buyBtn);
                    }

                    return container;
                }
            },
            {
                field: 'website_age_days',
                headerName: 'Website Age  Days',
                width: 180
            },
            {
                field: 'createdDate',
                headerName: 'InDate',
                width: 180
            },
        ]);

        // VIEW
        const viewWebsite = (data) => {
            let url = '';
            console.log("view : ",data)
            const encrypt_website_id = btoa(data.website_id)
            const websitefinalUrl = `/${data.company_name}/Website_Temp_${encrypt_website_id}`

            const params = `cd_id=${data.id}&template_id=${data.websiteTemp_id}`
            const encoded = btoa(params)

            window.open(`${websitefinalUrl}?ilp88LAsBvm=${encoded}`, '_blank')

            // if (data.purchased_id) {
            //     url = `http://192.168.1.117:8000/Thirumurugan_LinkAura/Website_Temp_Mg==?ilp88LAsBvm=Y2RfaWQ9${data.website_id}&dGVtcGxhdGVfaWQ9${data.websiteTemp_id}`;
            // } else {
            //     url = `http://192.168.1.117:8000/Thirumurugan_LinkAura/Website_Temp_Mg==`;
            // }

            window.open(url, '_blank');
        };

        // SHARE
        const openShare = (data) => {
            selectedRow.value = data;
            shareModal.value = true
            
            const baseURL = window.location.origin; 
            const encrypt_website_id = btoa(data.website_id)
            const websitefinalUrl = `${data.company_name}/Website_Temp_${encrypt_website_id}`

            const params = `cd_id=${data.id}&template_id=${data.websiteTemp_id}`
            const encoded = btoa(params)

            encodedUrl.value = `${baseURL}/${websitefinalUrl}?ilp88LAsBvm=${encoded}`
            console.log("encodedUrl :", encodedUrl.value)
            // window.open(, '_blank')

        };

        // PURCHASE
        const openPurchase = (data) => {
            selectedRow.value = data;
            paymentModel.value = true;
            websiteRowID.value = data.id
            console.log("selectedRow.value : ",selectedRow.value)
        };

        async function loadRazorpayScript() { // Load Razorpay script dynamically
            return new Promise((resolve, reject) => {
                if (document.querySelector('script[src="https://checkout.razorpay.com/v1/checkout.js"]')) {
                return resolve(true);
                }
                const script = document.createElement('script');
                script.src = 'https://checkout.razorpay.com/v1/checkout.js';
                script.onload = () => resolve(true);
                script.onerror = () => reject(false);
                document.body.appendChild(script);
            });
        }

        const purchasePlan = async (planId, amount, planName) => {

            const confirmed = await Swal.fire({
                title: "Confirm",
                text: `Are you sure want to purchase ${planName}?`,
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "OK",
                cancelButtonText: "Cancel",
            });

            if (!confirmed.isConfirmed) return;

            try {
                // Create order
                const resData = await axios.post('/createRazorpayOrder', {
                    id: websiteRowID.value,
                    plan_id: planId,
                    txnAmt: amount,
                    planName: planName
                });

                if (!resData.data.status) {
                    return Swal.fire('Warning', resData.data.message, 'warning');
                }

                const { order, key } = resData.data;

                await loadRazorpayScript();

                const options = {
                    key,
                    amount: order.amount,
                    currency: 'INR',
                    description: `Plan Name: ${planName}`,
                    order_id: order.id,

                    /* SUCCESS */
                    handler: async function (response) {
                        try {
                            const payload = {
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_signature: response.razorpay_signature,
                                id: websiteRowID.value,
                                plan_id: planId,
                                txn_amt: amount,
                                plan_name: planName
                            };

                            const { data } = await axios.post('/verifyPayment', payload);

                            Swal.fire(
                                data.status ? 'Success' : 'Error',
                                data.message,
                                data.status ? 'success' : 'error'
                            );

                        } catch {
                            Swal.fire('Error', 'Verification failed', 'error');
                        }
                    },

                    /* POPUP CLOSED (X / ESC only) */
                    modal: {
                        escape: true,
                        backdropclose: true,
                        ondismiss: function () {
                            axios.post('/paymentFailureTracking', {
                                website_id: websiteRowID.value,
                                plan_id: planId,
                                plan_name: planName,
                                txn_amt: amount,
                                reason: 'Transaction cancelled by user'
                            });

                            Swal.fire(
                                'Cancelled',
                                'Transaction cancelled by user',
                                'warning'
                            );
                        }
                    },

                    prefill: {
                        email: "",
                        contact: ""
                    },

                    theme: { color: '#3d023a' }
                };

                const rzp = new window.Razorpay(options);

                /* REAL PAYMENT FAILURE */
                rzp.on('payment.failed', function (response) {
                    axios.post('/paymentFailureTracking', {
                        website_id: websiteRowID.value,
                        plan_id: planId,
                        plan_name: planName,
                        txn_amt: amount,
                        reason: response.error.description || 'Payment failed'
                    });

                    Swal.fire(
                        'Payment Failed',
                        response.error.description || 'Something went wrong',
                        'error'
                    );
                });

                rzp.open();

            } catch (error) {
                Swal.fire('Error', 'Something went wrong', 'error');
            }
        };
        


        const loadWebsiteData = async() => {
            try{
                const res = await axios.post("/getMiniWebsiteDetails", { user_id: user_id.value }) 
                rowData.value = res.data.getData;

                if (res.data.status && Array.isArray(res.data.getData)) {
                    rowData.value = res.data.status ? res.data.getData : [];
                } 
                else {
                    rowData.value = [];
                }
            }
            catch (error){
                console.error("Wisite Data load error:", error);
                rowData.value = [];
            }
            
        };

        onMounted(async () => {
            try{
                await Promise.all([
                    loadWebsiteData(),
                ])
            }
            catch(error){
                console.log("Feedback Data Status", error)
            }
        })

        const gotoCompany_details = async() => {
            localStorage.removeItem('cardId');
            router.push('/Company_details')
        }


        return { 
            gotoCompany_details,
            rowData, 
            colDefs,
            shareModal, // share model popup
            rejectReason,
            selectedRow,
            loadWebsiteData,
            viewWebsite,
            openShare,
            openPurchase,
            encodedUrl,
            paymentModel, // payment popup model
            websiteRowID,
            purchasePlan,
        };
    }
};
</script>

<style>
    .btn-edit { background: #673ab7; color: #fff; padding: 5px; border-radius: 4px; }
    .btn-view { background:#4caf50; color:#fff; padding:5px; border-radius: 4px;}
    .btn-share { background:#2196f3; color:#fff; padding:5px; border-radius: 4px;}
    .btn-buy { background:#ff9800; color:#fff; padding:5px; border-radius: 4px;}
    .ag-theme-quartz .ag-cell { display: flex; align-items: center;   /* vertical center */ }
</style>