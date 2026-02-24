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
                    <router-link to="/MediaLinks">
                        <button
                            class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                                py-1.5 px-3 text-sm
                                md:py-2 md:px-4 md:text-base
                                rounded-xl transition-all duration-500
                                hover:-translate-y-2 hover:shadow-xl">
                            Media Links
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
                        {{ isSubmitting ? "Saving..." : "Save & Next Service" }}
                    </button>
                    <!-- Right Side Button /.-->

                </div>
                <!-- top header /. -->

                <!-- heading page -->
                <div class="flex flex-col w-full mt-2">
                    <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                        <h1>Products</h1>
                    </div>
                </div>
                <!-- heading page /. -->

                <!-- main content area -->
                <div class="grid grid-cols-1 mt-2 bg-white p-5">
                    <!-- Products Area -->
                    <div class="grid grid-cols-1">
                        <div class="flex flex-col">
                            <!-- product view area -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                <div v-for="(product, index) in products" :key="index" class="border p-4 rounded-lg">
                                    <!-- remove icons -->
                                    <div class="w-full flex justify-end">
                                        <button v-if="product.preview && !product.isNew"
                                            @click="removeProductImage(index)"
                                            class="bg-red-500 text-white text-xs p-1">
                                            <TrashIcon class="h-[30px] w-10 p-1" />
                                        </button>

                                        <button v-if="product.preview && product.isNew"
                                            @click="removeTempImage(index)"
                                            class="bg-yellow-500 text-white text-xs p-1">
                                            <TrashIcon class="h-[30px] w-10 p-1" />
                                        </button>
                                    </div>
                                    <!-- remove icons /. -->

                                    <!-- file upload  area -->
                                    <label class="block cursor-pointer">
                                        <input type="file" class="hidden" @change="selectedImage($event, index)" accept="image/png, image/jpg, image/webp, image/gif, image/jpeg">
                                        <div class="w-full h-32 flex items-center justify-center border border-gray-200 rounded-lg overflow-hidden">
                                        <img v-if="product.preview" :src="product.preview" class="object-cover w-full h-full" />
                                        <span v-else class="text-gray-400 text-center">Upload Products</span>

                                        </div>
                                    </label>
                                    <!-- file upload  area /. -->

                                    <!-- Product Name -->
                                    <input type="text" v-model="product.name" placeholder="Enter Product Name" class="w-full px-3 py-2 mt-2 border border-[#333c79]" />
                                    <!-- Product Name /.-->

                                    <!-- Original Proce -->
                                    <input type="number" v-model="product.original_price" placeholder="Original Price" class="w-full px-3 py-2 mt-2 border border-[#333c79]"  @change="changeOriginalPrice(index)" />
                                    <!-- Original Proce -->

                                    <!-- Discount Proce -->
                                    <input type="number" v-model="product.discount_price" placeholder="Discount Price" class="w-full px-3 py-2 mt-2 border border-[#333c79]"  @change="changeDiscountPrice(index)"  />
                                    <!-- Discount Proce /.-->

                                    <!-- Final Proce -->
                                    <input type="number" v-model="product.final_price" placeholder="Final Price" class="w-full px-3 py-2 mt-2 border border-[#333c79]"   />
                                    <!-- Final Proce /.-->

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
    import { ref, onMounted } from 'vue';
    import SideNavBar from '../SideNavBar.vue';
    import Header_tab from '../Header_tab.vue';
    import { useCardStore } from '@/stores/cardStore';
    import { useRouter } from "vue-router";
    import { toast } from 'vue3-toastify'
    import axios from 'axios';
    import { TrashIcon } from '@heroicons/vue/24/solid'
    import Swal from 'sweetalert2';

    export default{
        name: "Products",
        components: { SideNavBar, Header_tab, TrashIcon },
        setup() {
            const router = useRouter()
            const rowid = ref()
            const cardStore = useCardStore()
            const isSubmitting = ref(false);
            const s3ProductUrl = import.meta.env.VITE_AWS_URL_PRODUCT_IMAGES;

            const changeOriginalPrice = (i) => {
                const product = products.value[i];
                product.original_price = validateNumber(product.original_price, "Original Price");
            };

            const changeDiscountPrice = (i) => {
                const p = products.value[i];

                const origip = validateNumber(p.original_price, "Original Price");
                const dicp = validateNumber(p.discount_price, "Discount Price");

                if (!origip || !dicp) {
                    p.discount_price = "";
                    p.final_price = "";
                    return;
                }

                if (dicp >= origip) {
                    p.discount_price = "";
                    p.final_price = "";
                    return toast.error("Discount must be less than Original Price");
                }

                p.discount_price = dicp;
                p.final_price = origip - dicp;
            };


             const validateNumber = (value, fieldName) => {
                const num = parseFloat(value);
                if (!num) {
                    toast.error(`Invalid ${fieldName}`);
                    return null;
                }
                return num;
            };

            // get data
            const currData = ref({})
            const products = ref();
            // onMounted(async () => {
            //     const res = await axios.post('/getWebsiteDetails', {
            //         table: 'miniweb_products',
            //         cardId: Number(cardStore.cardId)
            //     });

            //     const data = res.data.getData;

            //      If no products → load default 30 empty rows
            //     if (!data || data.length === 0) {
            //         products.value = Array.from({ length: 30 }, () => ({
            //             preview: null,
            //             file: null,
            //             name: '',
            //             original_price: "",
            //             discount_price: "",
            //             final_price: "",
            //         }));
            //         rowid.value = []; // No rowid
            //         return;
            //     }

            //      If products exist → load DB products
            //     currData.value = data;
            //     products.value = data.map(item => ({
            //         name: item.product_name || '',
            //         original_price: item.orginal_price || '',
            //         discount_price: item.discount_price || '',
            //         final_price: item.final_price || '',
            //         file: null,
            //         preview: item.product_img ? `${s3ProductUrl}/product_images/${item.product_img}` : '',
            //     }));

            //     rowid.value = data.map(item => item.id);
            // });

            onMounted(async () => {
                const planRes = await axios.post("/collectAllWebsiteDatas", {
                    table_name: "miniweb_company_details",
                    cd_id: Number(cardStore.cardId) // Assuming cd_id matches cardId
                });

                const companyData = planRes.data[0];
                let allowedCount = 0;

                if (companyData && companyData.purchased_id > 0) {
                    const planId = Number(companyData.plan_id);
                    if (planId === 94) allowedCount = 5;
                    else if (planId === 95) allowedCount = 15;
                    else if (planId === 96) allowedCount = 30;
                }

                const res = await axios.post('/getWebsiteDetails', {
                    table: 'miniweb_products',
                    cardId: Number(cardStore.cardId)
                });

                const data = res.data.getData || [];

                products.value = Array.from({ length: 30 }, (_, index) => {
                    // If we have DB data for this index, use it
                    if (data[index]) {
                        const item = data[index];
                        return {
                            name: item.product_name || '',
                            original_price: item.orginal_price || '',
                            discount_price: item.discount_price || '',
                            final_price: item.final_price || '',
                            file: null,
                            preview: item.product_img ? `${s3ProductUrl}/product_images/${item.product_img}` : '',
                            // Add a flag to identify if this row is disabled based on the plan
                            isLocked: index >= allowedCount
                        };
                    }

                    // Otherwise, return an empty row template
                    return {
                        preview: null,
                        file: null,
                        name: '',
                        original_price: "",
                        discount_price: "",
                        final_price: "",
                        isLocked: index >= allowedCount
                    };
                });

                rowid.value = data.map(item => item.id);
            });

            // upload products area
            const allowedTypes = ["image/png", "image/jpeg", "image/jpg", "image/gif", "image/webp"];
            const selectedImage = (e, i) => {
                const file = e.target.files[0];
                if (!file) return;

                if (!allowedTypes.includes(file.type)) {
                    toast.error("Only JPG, PNG, GIF, WEBP images allowed!");
                    return (e.target.value = "");
                }

                const reader = new FileReader();
                reader.onload = (ev) => products.value[i].preview = ev.target.result;

                reader.readAsDataURL(file);
                products.value[i].file = file;
                products.value[i].isNew = true;
            };

            // remove temp image
            const removeTempImage = (index) => {
                products.value[index].file = null;
                products.value[index].preview = '';
                products.value[index].isNew = false;
            };

            // remove from db and path
            const removeProductImage = async (index) => {
                const product = products.value[index];
                if (!product.preview) return;

                const result = await Swal.fire({
                    title: "Are you sure?",
                    text: "Are you Sure want to Remove This Product Image",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                });

                if (!result.isConfirmed) return;

                try {
                    const fileNameOnly = product.preview.split('/').pop();
                    const res = await axios.post("/removeProductImage", { id: rowid.value[index], image: fileNameOnly, });

                    if (res.data.status) {
                    products.value[index].file = null;
                    products.value[index].preview = null;

                    Swal.fire({
                        title: "Success",
                        text: res.data.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                    } else {
                    Swal.fire({
                        title: "Error",
                        text: res.data.message || "Failed to delete image.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                    }
                } catch (error) {
                    console.error(error);
                    Swal.fire({
                    title: "Error",
                    text: "Something went wrong while deleting the image.",
                    icon: "error",
                    confirmButtonText: "OK",
                    });
                }
            };

            // save products
            const saveAndNext = async() => {
                const formData = new FormData();
                formData.append('cardId',Number(cardStore.cardId));
                products.value.forEach((p, index) => {
                    formData.append(`products[${index}][image]`, p.file);
                    formData.append(`products[${index}][name]`, p.name);
                    formData.append(`products[${index}][original_price]`, p.original_price);
                    formData.append(`products[${index}][discount_price]`, p.discount_price);
                    formData.append(`products[${index}][final_price]`, p.final_price);
                });

                // update data
                rowid.value.forEach((id, idx) => {
                    formData.append(`rowid[${idx}]`, id);
                });
                isSubmitting.value = true;
                try {
                    const res = await axios.post('/saveWebProducts', formData, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                });
                if(res.data.status == true){
                        document.querySelectorAll('input[type="file"]').forEach(input => {
                            input.value = '';
                        });
                        products.value = [];
                        toast.success(res.data.message)
                        router.push('/Service')
                    }
                    else
                    {
                        toast.warning(res.data.message)
                    }
                } catch (error) {
                    toast.error("Something went wrong: " + error);
                }
                finally {
                    isSubmitting.value = false;
                }

            }

            return {
                currData,
                rowid,
                saveAndNext,
                products,
                changeOriginalPrice,
                changeDiscountPrice,
                validateNumber,
                selectedImage,
                allowedTypes,
                removeTempImage,
                removeProductImage,
                isSubmitting,
                s3ProductUrl
            }
        }
    }
</script>