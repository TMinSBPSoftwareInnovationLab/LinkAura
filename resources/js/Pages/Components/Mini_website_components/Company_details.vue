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
                <router-link to="/Website_temp">
                    <button v-if="rowid"
                        class="bg-[#000b57] text-white
                            py-1.5 px-3 text-sm
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500
                            hover:-translate-y-2 hover:shadow-xl">
                        Website Template
                    </button>
                </router-link>
            </div>

            <!-- heading page -->
            <div class="flex flex-col w-full mt-2">
                <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                    <h1>Company Details</h1>
                </div>
            </div>
            <!-- heading page /. -->

            <div class="flex flex-col w-full bg-white p-5 pt-0 pb-0">
                <!-- main content -->
                <div class="grid grid-flow-row py-3">
                    <h1 class="text-xl font-semibold uppercase text-[#5A0E24]">Company Details</h1>
                </div>

                <!-- form -->
                 <div class="grid grid-flow-row py-3">
                    <!-- <Form @submit="submitForm" :validation-schema="schema" v-slot="{ resetForm }" class="space-y-4"> -->
                    <Form @submit="submitForm" v-slot="{ resetForm }" class="space-y-4">
                        <!-- company name -->
                        <div>
                            <label class="font-semibold text-gray-700">Company Name *</label>
                            <input
                            v-model="company_name"
                            type="text"
                            placeholder="Enter Company Name"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="submitCount > 0 && companynameError" class="text-red-500 text-sm">{{ companynameError }}</span>
                            </div>
                        </div>
                        <!-- company name /.-->

                        <!-- owner  name -->
                        <div>
                            <label class="font-semibold text-gray-700">Owner Name *</label>
                            <input
                            v-model="owner_name"
                            type="text"
                            placeholder="Enter Owner Name"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="submitCount > 0 && ownernameError" class="text-red-500 text-sm">{{ ownernameError }}</span>
                            </div>
                        </div>
                        <!-- owner  name /. -->

                        <!-- Designation -->
                        <div>
                            <label class="font-semibold text-gray-700">Designation *</label>
                            <input
                            v-model="designation"
                            type="text"
                            placeholder="Enter Owner Name"
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                            <div class="flex justify-between items-center mt-1">
                            <span v-if="submitCount > 0 && designationError" class="text-red-500 text-sm">{{ designationError }}</span>
                            </div>
                        </div>
                        <!-- Designation /.-->

                         <!-- Logo Upload -->
                        <div>
                            <label class="font-semibold text-gray-700">Upload Logo</label>
                            <input
                                type="file"
                                @change="uploadLogo"
                                accept="image/png, image/jpeg, image/jpg, image/gif, image/webp"
                                class="w-full border h-[50px] border-gray-400 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                        </div>
                        <div class="flex flex-col p-3 justify-left" v-if="previewImage">
                            <span class="text-2xl font-bold text-green-700">Logo</span>
                            <img :src="previewImage" alt="Preview" class="rounded-lg mt-2 w-full max-h-60 object-contain" />
                        </div>
                        <!-- Logo Upload /.-->


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
    import { Form, Field, ErrorMessage, useForm, useField } from "vee-validate";
    import * as yup from "yup";
    import Swal from 'sweetalert2';
    import axios from 'axios';
    import { useCardStore } from '@/stores/cardStore';
    import { useRouter } from "vue-router";

    export default {
        components: { SideNavBar, Header_tab, Form, Field, ErrorMessage},
        name: "Company_Details",
        setup(){
            const router = useRouter();
            const mini_web_id = ref('')
            const user_id = ref('')
            const cardStore = useCardStore() // store card id
            cardStore.$reset()

            const isSubmitting = ref(false);
            const s3LogoUrl = import.meta.env.VITE_AWS_URL_LOGO;

            const schema = yup.object({
                company_name: yup.string().required("Company name is required"),
                owner_name: yup.string().required("Owner name is required"),
                designation: yup.string().required("Designation is required"),
            });

            // 04-012-2025
            const { handleSubmit, submitCount } = useForm({
                validationSchema: schema,
            });

            // Fields
            const { value: company_name, errorMessage: companynameError } = useField('company_name');
            const { value: owner_name, errorMessage: ownernameError } = useField('owner_name');
            const { value: designation, errorMessage: designationError } = useField('designation');

            const submitForm = handleSubmit(async (values, {resetForm}) => {
                isSubmitting.value = true;
                const user_id = JSON.parse(localStorage.getItem('user')).id;
                const formData = new FormData();
                formData.append("company_name", values.company_name);
                formData.append("owner_name", values.owner_name);
                formData.append("designation", values.designation);
                formData.append("user_id", user_id);
                formData.append("rowid", rowid.value);

                if (logoFile.value) {
                    formData.append("logo", logoFile.value);
                }

                try {
                    const response = await axios.post("/save_company_details", formData, {
                        headers: { "Content-Type": "multipart/form-data" },
                    });
                    // Reset all form fields

                    if(response.data.status == true){
                        cardStore.setCardId(response.data.cardId)
                        console.log(response.data);
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: response.data.message,
                        });
                    }
                    else{
                        Swal.fire({
                            icon: "warning",
                            title: "Warning",
                            text: response.data.message,
                        });
                    }

                    resetForm();
                    // Clear file input & preview
                    logoFile.value = null;
                    previewImage.value = null;
                    router.push('/Website_temp')
                } catch (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: error.response?.data?.message || "Something went wrong",
                    });
                }finally {
                    isSubmitting.value = false;
                }
            })

            const previewImage = ref(null);
            const uploadLogo = (event) => {
                const file = event.target.files[0];
                if (file && file.type.startsWith("image/")) {
                    logoFile.value = file;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewImage.value = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    logoFile.value = null;
                    previewImage.value = null;
                    event.target.value = "";
                    toast.error("Only image formats (JPG, PNG, GIF, etc.) are allowed.")
                }
            };
            // 04-012-2025 /.


            // Logo handlers
            const logoFile = ref(null);
            const logoPreview = ref(null);
            const logoError = ref("");
            const fileInput = ref(null);
            const selectedFile = ref(null);


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
            // const company_name = ref('')
            // const owner_name = ref('')
            // const designation = ref('')

            const getCurrentData = async() => {
                if (!cardStore.cardId) {
                    console.log("No cardId found, starting fresh.");
                    return;
                }
                const res = await axios.post('/getWebsiteDetails', {'table': 'miniweb_company_details', 'cardId' : Number(cardStore.cardId)})
                console.log("res.data")
                if(res.data.status==true){
                    currData.value = res.data.getData[0]
                    company_name.value = currData.value.company_name
                    owner_name.value = currData.value.owner_name
                    designation.value = currData.value.designation
                    rowid.value = currData.value.id
                    previewImage.value = currData.value.logo_path ? `${s3LogoUrl}/company_logos/${currData.value.logo_path }`: ''

                    //  console.log("rowid : ".previewImage.value.logo_path)
                }
            };
            onMounted(() => {
                getCurrentData();
            });



            return {
                uploadLogo,
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
                submitCount,
                company_name,
                owner_name,
                designation,
                companynameError,
                ownernameError,
                designationError,
                previewImage,
                s3LogoUrl,
            }
        }
    }
</script>