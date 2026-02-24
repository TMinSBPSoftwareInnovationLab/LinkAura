<template>
      <div class="grid grid-cols-1 md:grid-cols-2 min-h-screen">

        <!-- LEFT -->
        <div class="flex flex-col items-center justify-center w-full bg-cover bg-center bg-opacity-50 inset-7 hidden md:block" > <!-- :style="{ backgroundImage: `url(${loginImages})` }" -->
            <div class="flex flex-col w-full items-center shadow-xl p-5"> 
                <img :src="linkauraLogo" alt="" class="w-[300px] h-[220px]">
            </div>
            <div class="flex flex-col w-full pl-5 pr-5 pt-15 md:pt-20 text-end">
                <p class="font-bold text-3xl text-[#6B3F69]">
                    Build Your
                </p>
                <p class="font-bold text-3xl text-[#6B3F69]">
                    Digital Identity
                </p>
                <p class="text-[14px] text-gray-800 text-center pt-5 pb-5 md:pb-0">
                    Create your <span class="font-bold text-[#3D365C]">mini website, digital visiting card, & lecturer profile </span>effortlessly. <br>Showcase your identity, share your details, and build your personal brand in minutes.
                </p>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="flex items-center justify-center" :style="{ backgroundImage: `url(${loginBg})` }">
            <div class="flex flex-col w-[90%] md:w-[60%] p-10 bg-white/95 shadow-2xl rounded-2xl mt-5 md:mt-0">
                <div class="flex flex-col w-full items-center p-5 md:hidden"> 
                    <img :src="linkauraLogo" alt="" class="w-[200px] h-[120px]">
                </div>
                <h1 class="text-2xl font-bold text-[#690B22]">Forgot Password</h1>

                <!-- FORM -->
                 <div class="mt-5">
                    <Form @submit="submitForgotPass" :validation-schema="schema" class="flex flex-col gap-4">

                        <!-- PHONE NUMBER -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Phone Number</label>
                            <Field
                                name="mobilenumber"
                                type="text"
                                v-slot="{ field }"
                            >
                                <input
                                    v-bind="field"
                                    placeholder="Enter Your Phone Number"
                                    maxlength="10"
                                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                />
                            </Field>

                            <ErrorMessage name="mobilenumber" class="text-red-500 text-sm mt-1" />
                        </div>


                        <!-- PASSWORD -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Password</label>

                            <Field name="password" v-slot="{ field }">
                                <div class="relative">
                                <input
                                    v-bind="field"
                                    :type="showPass ? 'text' : 'password'"
                                    placeholder="Enter Password"
                                    class="w-full border rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring focus:border-blue-300"
                                    onpaste="return false" onCopy="return false" onCut="return false"
                                />

                                <!-- Toggle Eye -->
                                <span
                                    class="absolute right-3 top-2.5 text-gray-500 cursor-pointer"
                                    @click="showPass = !showPass"
                                >
                                    {{ showPass ? '👁️' : '👁️‍🗨️' }}
                                </span>
                                </div>
                            </Field>

                            <ErrorMessage name="password" class="text-red-500 text-sm mt-1" />
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Confirm Password</label>

                            <Field name="confirmPassword" v-slot="{ field }">
                                <div class="relative">
                                <input
                                    v-bind="field"
                                    :type="showConfirmPass ? 'text' : 'password'"
                                    placeholder="Confirm Password"
                                    class="w-full border rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring focus:border-blue-300"
                                    onpaste="return false" onCopy="return false" onCut="return false"
                                />

                                <span
                                    class="absolute right-3 top-2.5 text-gray-500 cursor-pointer"
                                    @click="showConfirmPass = !showConfirmPass"
                                >
                                    {{ showConfirmPass ? '👁️' : '👁️‍🗨️' }}
                                </span>
                            </div>
                        </Field>

                        <ErrorMessage name="confirmPassword" class="text-red-500 text-sm mt-1" />
                        </div>


                        <!-- SUBMIT BUTTON -->
                        <button type="submit" :disabled="isLoading" class="bg-[#690B22] text-white py-2 rounded-lg font-medium  hover:bg-[#8b0e2e] transition disabled:opacity-60 disabled:cursor-not-allowed flex items-center justify-center" >
                        <span v-if="!isLoading">Reset Password</span>

                        <span v-else class="flex items-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8v8z"/>
                            </svg>
                            Please Wait Resetting...
                        </span>
                        </button>
                        
                    </Form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
     <div class="flex flex-row w-full h-[20px] bg-[#732255] text-white text-[12px] text-center items-center justify-center p-5">
        <p>© {{ footer_year }} LinkAura. Powered and built by LinkAura.</p>
     </div>
    <!-- footer /. -->
</template>

<script>
    import { ref, computed, onMounted } from 'vue'
    import linkauraLogo from '@/assets/images/commonImages/linkAura_logo.png';
    import loginBg from '@/assets/images/loginImages/login_bg.jpg';
    import { Form, Field, ErrorMessage } from "vee-validate";
    import * as yup from "yup";
    import leftBgImage from '@/assets/images/loginImages/leftBg1.jpg';
    import axios from 'axios';
    import Swal from 'sweetalert2';
    // import { router } from '@inertiajs/vue3'
    import { useRouter } from 'vue-router';
    // const router = useRouter();
    export default {
        name: 'ForgotPass',
        components: { Form, Field, ErrorMessage },
        setup(){
            const router = useRouter();
            const footer_year = new Date().getFullYear();
            const showPassword = ref(false);
            const isLoading = ref(false);
            const showPass = ref(false);
            const showConfirmPass = ref(false);

            const togglePassword = () => {
              showPassword.value = !showPassword.value;
            };

            // Validation Schema
            const schema = yup.object({
                mobilenumber: yup
                    .string()
                    .required("Phone number is required")
                    .min(10, "Phone must be 10 digits")
                    .max(10, "Phone must be 10 digits")
                    .matches(/^[0-9]{10}$/, "Phone number must be 10 digits")
                    .test(
                    "not-repeated",
                    "Invalid phone number",
                    (value) => !/^(\d)\1{9}$/.test(value) // Blocks 0000000000, 1111111111, etc.
                    ),

                    password: yup.string().required("Password is required"),
                
                password: yup
                    .string()
                    .required("Password is required")
                    .matches(/[A-Z]/, "Must contain at least one uppercase letter")
                    .matches(/[a-z]/, "Must contain at least one lowercase letter")
                    .matches(/[0-9]/, "Must contain at least one number")
                    .matches(/[@$!%*?&#^()_\-+=<>.,{}[\]~]/, "Must contain at least one special character")
                    .min(8, "Password must be at least 8 characters"),

                confirmPassword: yup
                    .string()
                    .oneOf([yup.ref("password")], "Passwords do not match")
                    .required("Confirm Password is required"),
            });

            const submitForgotPass = async (values, { resetForm }) => {
                isLoading.value = true;
                // console.log("values : ",values)
                try{
                    const payload = {
                    ...values,
                    };
                    const resData = await axios.post('/forgotPassword',payload)
                    if(resData.data.status == true){
                        Swal.fire({
                            title: 'Success!',
                            icon: 'success',
                            text: resData.data.message,
                            confirmButtonText: 'OK'
                        }) 
                        resetForm();
                        router.push('/Login');
                    }
                    else
                    {
                        Swal.fire({
                            title: 'Error!',
                            icon: 'error',
                            text: 'Error: ' + (error.resData?.data?.message || 'Please try again'),
                            confirmButtonText: 'OK'
                        })    
                    }
                    
                }
                catch(error)
                {

                }
                finally{
                    isLoading.value = false;
                }
            };


            return {
                leftBgImage,
                togglePassword,
                linkauraLogo,
                loginBg,
                footer_year,
                showPassword,
                showPass,
                showConfirmPass,
                submitForgotPass,
                schema,
                isLoading,
            }
        }
    }
</script>