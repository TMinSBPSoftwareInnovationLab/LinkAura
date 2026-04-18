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
                    <Link href="/MediaLinks">
                        <button
                            class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                                py-1.5 px-3 text-sm
                                md:py-2 md:px-4 md:text-base
                                rounded-xl transition-all duration-500
                                hover:-translate-y-2 hover:shadow-xl">
                            Media Links
                        </button>
                    </Link>

                    <!-- Right Side Button -->
                    <button
                        @click="saveAndNext"
                        :disabled="isSubmitting"
                        class="bg-[#000b57] text-white
                            py-1.5 px-3 text-sm
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500
                            hover:-translate-y-2 hover:shadow-xl">
                        {{ isSubmitting ? "Saving..." : "Save & Next Service" }}
                    </button>
                    <!-- Right Side Button /.-->

                </div>
                <!-- top header /. -->

                <!-- heading page -->
                <div class="flex flex-col w-full mt-2">
                    <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                        <h1>Products 4</h1>
                    </div>
                </div>
                <!-- heading page /. -->

                <div class="flex flex-row items-center gap-6 w-full mt-2 bg-white p-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" value="all" v-model="filterType">
                        <span>All</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" value="filled" v-model="filterType">
                        <span>Filled</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" value="empty" v-model="filterType">
                        <span>Not Filled</span>
                    </label>
                </div>

                <div class="flex flex-col w-full mt-2">
                    <p class="text-sm text-gray-500 mb-2">
                        Showing {{ filteredProducts.length }} products
                    </p>
                </div>
                <!-- main content area -->
                <div class="grid grid-cols-1 mt-2 bg-white p-5">
                    <!-- Products Area -->
                    <div class="grid grid-cols-1">
                        <div class="flex flex-col">
                            <!-- product view area -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                <div v-for="(product, index) in filteredProducts" :key="index" class="border p-4 rounded-lg" :class="product.isLocked ? 'opacity-40 pointer-events-none' : ''">
                                    <!-- remove icons -->
                                    <div class="w-full flex justify-end">
                                        <button v-if="product.preview && !product.isNew"
                                            @click="removeProductImage(product._index)"
                                            class="bg-red-500 text-white text-xs p-1">
                                            <TrashIcon class="h-[30px] w-10 p-1" />
                                        </button>

                                        <button v-if="product.preview && product.isNew"
                                            @click="removeTempImage(product._index)"
                                            class="bg-yellow-500 text-white text-xs p-1">
                                            <TrashIcon class="h-[30px] w-10 p-1" />
                                        </button>
                                    </div>
                                    <!-- remove icons /. -->

                                    <!-- file upload  area -->
                                    <label class="block cursor-pointer">
                                        <input type="file" class="hidden" @change="selectedImage($event, product._index)" accept="image/png, image/jpg, image/webp, image/gif, image/jpeg">
                                        <div class="w-full h-32 flex items-center justify-center border border-gray-200 rounded-lg overflow-hidden">
                                        <img v-if="product.preview" :src="product.preview" class="object-cover w-full h-full" />
                                        <span v-else class="text-gray-400 text-center">Upload Products</span>

                                        </div>
                                    </label>
                                    <!-- file upload  area /. -->

                                    <!-- Product Name -->
                                    <input type="text" 
                                    v-model="product.name" 
                                    @input="product.isDirty = true"
                                    placeholder="Enter Product Name" class="w-full px-3 py-2 mt-2 border border-[#333c79]" />
                                    <!-- Product Name /.-->

                                    <!-- Original Proce -->
                                    <input type="number" 
                                    v-model="product.original_price" 
                                    @input="product.isDirty = true"
                                    placeholder="Original Price" class="w-full px-3 py-2 mt-2 border border-[#333c79]"  @change="changeOriginalPrice(product._index)" />
                                    <!-- Original Proce -->

                                    <!-- Discount Proce -->
                                    <input type="number" 
                                    v-model="product.discount_price" 
                                    @input="product.isDirty = true"
                                    placeholder="Discount Price" class="w-full px-3 py-2 mt-2 border border-[#333c79]"  @change="changeDiscountPrice(product._index)"  />
                                    <!-- Discount Proce /.-->

                                    <!-- Final Proce -->
                                    <input type="number" v-model="product.final_price" placeholder="Final Price" class="w-full px-3 py-2 mt-2 border border-[#333c79]"   />
                                    <!-- Final Proce /.-->

                                    <!-- trending / new / empty -->
                                    <div class="mt-3 flex flex-col gap-2 p-2 bg-gray-50 rounded-md border border-gray-100">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Product Tag</p>
                                        
                                        <div class="flex flex-col sm:flex-col sm:items-left gap-3 sm:gap-4">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="radio" 
                                                    :name="'status-' + index" 
                                                    value="1" 
                                                    v-model="product.status"
                                                    class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                                <span class="ml-2 text-sm text-gray-700">Trending</span>
                                            </label>

                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="radio" 
                                                    :name="'status-' + index" 
                                                    value="2" 
                                                    v-model="product.status"
                                                    class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                                <span class="ml-2 text-sm text-gray-700">New Arrival</span>
                                            </label>
                                        </div>
                                        
                                        <button @click="product.status = ''" 
                                                class="text-[10px] font-bold text-left text-red-400 hover:underline">
                                            Clear Selection
                                        </button>
                                    </div>
                                    <!-- trending / new / empty /. -->

                                </div>
                            </div>
                            <!-- product view area /.-->
                            <!-- submit area -->
                            <div class="flex mt-3 justify-center">
                                <button @click="saveAndNext" :disabled="isSubmitting"
                                    class="bg-[#000b57] text-white  py-1.5 px-3 text-sm md:py-2 md:px-4 md:text-base rounded-xl transition-all duration-500  hover:-translate-y-2 hover:shadow-xl">
                                    {{ isSubmitting ? "Saving..." : "Save & Next Service" }}
                                </button>
                            </div>
                            <!-- submit area /. -->
                        </div>
                    </div>
                    <!-- Products Area /. -->
                </div>
                <!-- main content area -->
            </div>
            <!-- Right Content /.-->
        </div>
    </main>
</template>

<script>
import { ref, onMounted, computed } from 'vue';
import SideNavBar from '../SideNavBar.vue';
import Header_tab from '../Header_tab.vue';
import { useCardStore } from '@/stores/cardStore';
import { router, usePage } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify'
import axios from 'axios';
import { TrashIcon } from '@heroicons/vue/24/solid'
import Swal from 'sweetalert2';

export default {
    name: "Products",
    components: { SideNavBar, Header_tab, TrashIcon },

    setup() {

        const rowid = ref([]);
        const products = ref([]); // FIXED
        const cardStore = useCardStore();
        const isSubmitting = ref(false);
        const filterType = ref("all");

        const s3ProductUrl = import.meta.env.VITE_AWS_URL_PRODUCT_IMAGES;

        // CHECK FILLED
        const isProductFilled = (p) => {
            return p.name || p.original_price || p.discount_price || p.final_price || p.preview;
        };

        // FILTER (NO SPREAD BUG)
        const filteredProducts = computed(() => {
            if (!products.value) return [];

            return products.value
                .map((p, index) => {
                    p._index = index;
                    return p;
                })
                .filter((p) => {

                    if (p.isLocked) return false;

                    // KEEP EDITED ITEMS VISIBLE ALWAYS
                    if (p.isDirty) return true;

                    if (filterType.value === "filled") return isProductFilled(p);
                    if (filterType.value === "empty") return !isProductFilled(p);

                    return true;
                });
        });

        // PRICE
        const validateNumber = (value, fieldName) => {
            const num = parseFloat(value);
            if (!num) {
                toast.error(`Invalid ${fieldName}`);
                return null;
            }
            return num;
        };

        const changeOriginalPrice = (i) => {
            const p = products.value[i];
            p.original_price = validateNumber(p.original_price, "Original Price");
        };

        const changeDiscountPrice = (i) => {
            const p = products.value[i];

            const o = validateNumber(p.original_price, "Original Price");
            const d = validateNumber(p.discount_price, "Discount Price");

            if (!o || !d || d >= o) {
                p.discount_price = "";
                p.final_price = "";
                return;
            }

            p.final_price = o - d;
        };

        // LOAD DATA
        onMounted(async () => {

            let allowedCount = 1000; // FIXED

            const planRes = await axios.post("/collectAllWebsiteDatas", {
                table_name: "miniweb_company_details",
                cd_id: Number(cardStore.cardId)
            });

            const companyData = planRes.data.getData[0];
            if (companyData && companyData.purchased_id > 0) {
                const planId = Number(companyData.plan_id);

                if (planId === 94) allowedCount = 25;
                else if (planId === 95) allowedCount = 75;
                else if (planId === 96) allowedCount = 1000;
            }

            const res = await axios.post('/getWebsiteDetails', {
                table: 'miniweb_products',
                cardId: Number(cardStore.cardId)
            });

            const data = res.data.getData || [];

            products.value = Array.from({ length: 1000 }, (_, index) => {

                if (data[index]) {
                    const item = data[index];

                    return {
                        id: item.id,
                        name: item.product_name || '',
                        original_price: item.orginal_price || '',
                        discount_price: item.discount_price || '',
                        final_price: item.final_price || '',
                        file: null,
                        preview: item.product_img
                            ? `${s3ProductUrl}/product_images/${item.product_img}`
                            : '',
                        status: item.status || '',
                        isLocked: index >= allowedCount
                    };
                }

                return {
                    id: null,
                    name: '',
                    original_price: '',
                    discount_price: '',
                    final_price: '',
                    file: null,
                    preview: null,
                    status: '',
                    isLocked: index >= allowedCount
                };
            });

            rowid.value = data.map(item => item.id);
        });

        // IMAGE
        const allowedTypes = ["image/png", "image/jpeg", "image/jpg", "image/gif", "image/webp"];

        const selectedImage = (e, i) => {
            const file = e.target.files[0];
            if (!file) return;

            if (!allowedTypes.includes(file.type)) {
                toast.error("Only JPG, PNG, GIF, WEBP images allowed!");
                return;
            }

            const reader = new FileReader();
            reader.onload = (ev) => products.value[i].preview = ev.target.result;

            reader.readAsDataURL(file);
            products.value[i].file = file;
            products.value[i].isNew = true;
            products.value[i].isDirty = true;
        };

        const removeTempImage = (i) => {
            products.value[i].file = null;
            products.value[i].preview = null;
        };

        const removeProductImage = async (i) => {
            const p = products.value[i];
            if (!p.preview) return;

            const result = await Swal.fire({
                title: "Are you sure?",
                icon: "warning",
                showCancelButton: true
            });

            if (!result.isConfirmed) return;

            const fileName = p.preview.split('/').pop();

            await axios.post("/removeProductImage", {
                id: rowid.value[i],
                image: fileName
            });

            p.preview = null;
        };

        // SAVE
        const saveAndNext = async () => {

            const formData = new FormData();
            formData.append('cardId', Number(cardStore.cardId));

            products.value.forEach((p, i) => {

                if (p.isLocked) return;
                if (!isProductFilled(p)) return;

                formData.append(`products[${i}][id]`, p.id ?? '');
                formData.append(`products[${i}][name]`, p.name);
                formData.append(`products[${i}][original_price]`, p.original_price);
                formData.append(`products[${i}][discount_price]`, p.discount_price);
                formData.append(`products[${i}][final_price]`, p.final_price);
                formData.append(`products[${i}][status]`, p.status);

                if (p.file) {
                    formData.append(`products[${i}][image]`, p.file);
                }
            });

            isSubmitting.value = true;

            try {
                const res = await axios.post('/saveWebProducts', formData);

                if (res.data.status) {
                    toast.success(res.data.message);
                    router.visit('/Service');
                } else {
                    toast.warning(res.data.message);
                }
            } catch (e) {
                toast.error("Error");
            } finally {
                isSubmitting.value = false;
            }
        };

        return {
            // currData,
            rowid,
            validateNumber,
            products,
            allowedTypes,
            filteredProducts,
            filterType,
            isSubmitting,
            s3ProductUrl,
            isProductFilled,
            selectedImage,
            removeTempImage,
            removeProductImage,
            changeOriginalPrice,
            changeDiscountPrice,
            saveAndNext,
            isDirty: false
        };
    }
};
</script>