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
                <div class="flex flex-col w-full items-center p-1 md:p-0 md:hidden"> 
                    <img :src="linkauraLogo" alt="" class="w-[200px] h-[120px]">
                </div>
                <div class="w-[40%] h-[1px] mx-auto bg-gray-500 md:mb-0 mb-5 md:hidden"></div>
                <h1 class="text-2xl font-bold text-[#690B22]">Registration</h1>

                <!-- FORM -->
                 <div class="mt-5">
                    <Form @submit="submitRegistration" :validation-schema="schema" class="flex flex-col gap-4">

                        <!-- NAME -->
                        <div>
                        <label class="block text-sm font-medium mb-1">Name</label>
                        <Field name="name" v-slot="{ field }">
                            <input
                            v-bind="field"
                            type="text"
                            placeholder="Enter Your Name"
                            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                        </Field>
                        <ErrorMessage name="name" class="text-red-500 text-sm mt-1" />
                        </div>

                        <!-- EMAIL -->
                        <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <Field name="email" v-slot="{ field }">
                            <input
                            v-bind="field"
                            type="email"
                            placeholder="Enter Your Email"
                            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                        </Field>
                        <ErrorMessage name="email" class="text-red-500 text-sm mt-1" />
                        </div>

                        <!-- COMPANY NAME -->
                        <div>
                        <label class="block text-sm font-medium mb-1">Company Name</label>
                        <Field name="company" v-slot="{ field }">
                            <input
                            v-bind="field"
                            type="text"
                            placeholder="Enter Company Name"
                            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                            />
                        </Field>
                        <ErrorMessage name="company" class="text-red-500 text-sm mt-1" />
                        </div>

                        <!-- MOBILE NUMBER -->
                        <div>
                        <label class="block text-sm font-medium mb-1">Mobile Number</label>

                        <Field name="mobilenumber" v-slot="{ field }">
                            <input
                            v-bind="field"
                            type="text"
                            maxlength="10"
                            placeholder="Enter Mobile Number"
                            @blur="checkExistMobile($event.target.value)"
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

                        <!-- SUBMIT -->
                        <button
                        type="submit"
                        class="bg-[#690B22] text-white py-2 rounded-lg font-medium hover:bg-[#8b0e2e] transition"
                        >
                        Register
                        </button>

                        <p class="text-[14px] font-bold">
                        Already member?
                        <router-link to="/login" class="text-rose-600 hover:underline">SIGN IN</router-link>
                        </p>
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
    import Swal from 'sweetalert2';
    import axios from 'axios';
    import { useRouter } from "vue-router";

    export default {
        name: 'Registration',
        components: { Form, Field, ErrorMessage },
        setup(){
            const router = useRouter();
            const footer_year = new Date().getFullYear();
            const showPass = ref(false);
            const showConfirmPass = ref(false);
            const togglePassword = () => {
              showPassword.value = !showPassword.value;
            };

            // checking exist mobilenumber
            const checkExistMobile = async (value) => {
                // console.log("Checking mobile:", value);
                const mobileNO = value
                const res = await axios.post('/checkExistMobile', {mobileNO:mobileNO})
                if(res.data.status){
                    Swal.fire({
                        title: res.data.exists ? 'Error!' : 'Success!',
                        icon: res.data.exists ? 'error' : 'success',
                        text: res.data.message,
                        confirmButtonText: 'OK'
                    });

                }
                else{
                    Swal.fire({
                            title: 'Error!',
                            icon: 'error',
                            text: 'Something Went wrong',
                            confirmButtonText: 'OK'
                        })
                }
            };

           
            const schema = yup.object({
                name: yup.string().required("Name is required"),
                email: yup.string().email("Invalid email").required("Email is required"),
                company: yup.string().required("Company name is required"),

                mobilenumber: yup
                    .string()
                    .required("Mobile number is required")
                    .matches(/^[6-9]\d{9}$/, "Enter valid mobile number")
                    .notOneOf(["0000000000"], "Invalid mobile number"),

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


            // Submit Function
            const submitRegistration = async(values, { resetForm }) => {
                // console.log("Registration Submitted:", values);
                const payload = {
                    ...values,
                    // user_id: user_id.value
                };

                try {
                    const resData = await axios.post('/userRegister',payload)
                    // console.log('resData : ,resData')
                    if(resData.data.status == true){
                        Swal.fire({
                            title: 'Success!',
                            icon: 'success',
                            text: resData.data.message,
                            confirmButtonText: 'OK'
                        }) 
                        resetForm();
                        router.push('/login')
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
                catch(error){
                    Swal.fire({
                        title: 'Error!',
                        icon: 'error',
                        text: 'Error: ' + (error.response?.data?.message || 'Please try again'),
                        confirmButtonText: 'OK'
                    })
                }
            };


            return {
                checkExistMobile,
                schema,
                submitRegistration,
                showPass,
                showConfirmPass,
                leftBgImage,
                linkauraLogo,
                loginBg,
                footer_year,
            }
        }
    }
</script>