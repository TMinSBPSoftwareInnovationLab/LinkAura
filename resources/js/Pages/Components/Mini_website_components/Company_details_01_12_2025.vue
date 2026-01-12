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
            <div class="flex flex-row md:flex-row w-full py-5 px-5 bg-white mt-2  justify-between gap-3 md:gap-0 border border-sky-500/30">
                <!-- Left Side Button -->
                <router-link to="/dashboard">
                    <button
                        class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                            py-1.5 px-3 text-sm 
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500 
                            hover:-translate-y-2 hover:shadow-xl">
                        Dashboard
                    </button>
                </router-link>

                <!-- Right Side Button -->
                <router-link to="/Company_details">
                    <button v-if="1==2"
                        class="bg-[#000b57] text-white 
                            py-1.5 px-3 text-sm 
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500 
                            hover:-translate-y-2 hover:shadow-xl">
                        Save Company Details
                    </button>
                </router-link>
            </div>


            <div class="flex flex-col w-full bg-white p-5 pt-0 pb-0">
                <!-- main content -->
                <div class="grid grid-flow-row py-3">
                    <h1 class="text-xl font-semibold uppercase text-[#5A0E24]">Company Details</h1>
                </div>

                <!-- form -->
                 <div class="grid grid-flow-row py-3">
                    <Form @submit="submitForm" :validation-schema="schema" v-slot="{ resetForm }" class="space-y-4">
                        <!-- Company Name -->
                        <div>
                            <label class="font-semibold text-gray-700">Company Name *</label>
                            <Field 
                                name="company_name" 
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200"
                                placeholder="Enter company name"
                            />
                            <ErrorMessage name="company_name" class="text-red-600 text-sm" />
                        </div>

                        <!-- Owner Name -->
                        <div>
                            <label class="font-semibold text-gray-700">Owner Name *</label>
                            <Field 
                                name="owner_name" 
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200"
                                placeholder="Enter owner name"
                            />
                            <ErrorMessage name="owner_name" class="text-red-600 text-sm" />
                        </div>

                        <!-- Designation -->
                        <div>
                            <label class="font-semibold text-gray-700">Designation *</label>
                            <Field 
                                name="designation" 
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200"
                                placeholder="Ex: Founder, CEO"
                            />
                            <ErrorMessage name="designation" class="text-red-600 text-sm" />
                        </div>

                        <!-- Logo Upload -->
                        <div>
                            <label class="font-semibold text-gray-700">Company Logo (optional, max 150KB)</label>
                            <input 
                                type="file" 
                                accept="image/*"
                                @change="handleLogoUpload"
                                class="w-full mt-1 p-2 border rounded-md bg-white"
                            />

                            <!-- Preview -->
                            <div v-if="logoPreview" class="mt-3 relative w-36">
                                <img :src="logoPreview" class="w-36 h-36 rounded-lg border" />

                                <!-- Remove Button -->
                                <button 
                                    @click="removeLogo"
                                    type="button"
                                    class="absolute top-1 right-1 bg-red-600 text-white rounded-full px-2 py-1 text-xs"
                                >
                                    ✕
                                </button>
                            </div>

                            <!-- Error -->
                            <p v-if="logoError" class="text-red-600 text-sm mt-1">{{ logoError }}</p>
                        </div>
                        <div class="text-center">
                            <button type="submit"  :disabled="isSubmitting" class="bg-[#4E5927] text-white px-4 py-2 rounded-lg transition hover:bg-green-800 disabled:opacity-50 disabled:cursor-not-allowed" >
                                {{ isSubmitting ? "Saving..." : "Save & Next" }}
                            </button>
                        </div>
                    </Form>
                </div>
                <!-- form /. -->
                <!-- main content /. -->
            </div>
        </div>
    </div>
</template>

<script>
    import SideNavBar from '../SideNavBar.vue';
    import Header_tab from '../Header_tab.vue';
    import { ref, watch, computed, onMounted } from 'vue';
    import { Form, Field, ErrorMessage } from "vee-validate";
    import * as yup from "yup";
    import Swal from 'sweetalert2';
    import axios from 'axios';
    import { useCardStore } from '@/stores/cardStore';

    export default {
        components: { SideNavBar, Header_tab, Form, Field, ErrorMessage},
        name: "Company_Details",
        setup(){
            const mini_web_id = ref('')
            const user_id = ref('')
            const cardStore = useCardStore() // store card id
            const isSubmitting = ref(false);

            const schema = yup.object({
                company_name: yup.string().required("Company name is required"),
                owner_name: yup.string().required("Owner name is required"),
                designation: yup.string().required("Designation is required"),
            });

            // Logo handlers
            const logoFile = ref(null);
            const logoPreview = ref(null);
            const logoError = ref("");
            const fileInput = ref(null);


            const handleLogoUpload = (event) => {
                const file = event.target.files[0];
                logoError.value = "";

                if (!file) return;

                if (file.size > 150 * 1024) {
                    logoError.value = "File size must be below 150KB";
                    return;
                }

                logoFile.value = file;
                logoPreview.value = URL.createObjectURL(file);
            };

            const removeLogo = () => {
                logoFile.value = null;
                logoPreview.value = null;
                logoError.value = "";

                // Reset the actual file input value
                if (fileInput.value) {
                    fileInput.value.value = "";
                }
            };

            // get data
            const currData = ref('[]');
            const rowid = ref('')
            const company_name = ref('')
            const owner_name = ref('')
            const designation = ref('')

            const getCurrentData = async() => {
                const res = await axios.post('/getWebsiteDetails', {'table': 'miniweb_company_details', 'cardId' : Number(cardStore.cardId)})
                console.log("res.data")
                if(res.data.status==true){
                    currData.value = res.data.getData[0]
                    company_name.value = currData.value.company_name
                    owner_name.value = currData.value.owner_name
                    designation.value = currData.value.designation
                    rowid.value = currData.value.id
                    // previewImage.value = currData.value.logo_path ? `/company_logos/${currData.value.logo_path }`: ''
                    //  item.gallery  ? `/gallery_images/${item.gallery}`: ''
                    //  console.log("rowid : ".rowid.value)
                }
            };
            onMounted(() => {
                getCurrentData();
            });


            // Company Details Save
            const submitForm = async (values, { resetForm }) => {
                isSubmitting.value = true;
                const user_id = JSON.parse(localStorage.getItem('user')).id;
                const formData = new FormData();
                formData.append("company_name", values.company_name);
                formData.append("owner_name", values.owner_name);
                formData.append("designation", values.designation);
                formData.append("user_id", user_id);

                if (logoFile.value) {
                    formData.append("logo", logoFile.value);
                }

                try {
                    const response = await axios.post("/save_company_details", formData, {
                        headers: { "Content-Type": "multipart/form-data" },
                    });
                    // Reset all form fields
                    

                    cardStore.setCardId(response.data.cardId)
                    console.log(response.data);
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: response.data.message,
                    });
                    
                    resetForm();

                    // Clear file input & preview
                    logoFile.value = null;
                    logoPreview.value = null;
                    

                } catch (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: error.response?.data?.message || "Something went wrong",
                    });
                }finally {
                    isSubmitting.value = false;
                }
            };

            return {
                currData, // get data
                rowid,
                getCurrentData,
                isSubmitting,
                user_id,
                mini_web_id,
                schema,
                submitForm,
                removeLogo,
                fileInput,
                handleLogoUpload,
                logoFile,
                logoPreview,
                logoError,
            }
        }
    }
</script>