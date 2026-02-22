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
                <h1 class="text-2xl font-bold text-[#690B22]">Login</h1>

                <!-- FORM -->
                 <div class="mt-5">
                    <Form @submit="submitLogin" :validation-schema="schema" class="flex flex-col gap-4">

                        <!-- PHONE NUMBER -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Phone Number</label>
                            <Field
                                name="phone"
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

                            <ErrorMessage name="phone" class="text-red-500 text-sm mt-1" />
                        </div>


                        <!-- PASSWORD -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Password</label>

                            <Field name="password" v-slot="{ field }">
                                <div class="relative">
                                    <input
                                        v-bind="field"
                                        :type="showPassword ? 'text' : 'password'"
                                        placeholder="Enter Password"
                                        class="w-full border rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring focus:border-blue-300"
                                        oninput="this.value=this.value.replace(/[^\d]/,'')"
                                    />

                                    <!-- Eye toggle -->
                                    <span
                                        class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-500 hover:text-gray-700"
                                        @click="togglePassword"
                                    >
                                        <svg v-if="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>

                                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.958 9.958 0 012.343-4.362m3.677-2.574A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.042 5.411M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3l18 18"/>
                                        </svg>
                                    </span>
                                </div>
                            </Field>
                            <p class="text-[14px] font-bold p-1"><router-link to="/forgotPass" class="text-rose-600 hover:underline">Forgot Password?</router-link> </p>

                            <ErrorMessage name="password" class="text-red-500 text-sm mt-1" />
                        </div>


                        <!-- SUBMIT BUTTON -->
                        <button type="submit" :disabled="isLoading" class="bg-[#690B22] text-white py-2 rounded-lg font-medium  hover:bg-[#8b0e2e] transition disabled:opacity-60 disabled:cursor-not-allowed flex items-center justify-center" >
                        <span v-if="!isLoading">Login</span>

                        <span v-else class="flex items-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8v8z"/>
                            </svg>
                            Logging in...
                        </span>
                        </button>
                        <p class="text-[14px] font-bold">Not a member? <router-link to="/registration" class="text-rose-600 hover:underline">Signup now</router-link> </p>
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
        name: 'Login',
        components: { Form, Field, ErrorMessage },
        setup(){
            const router = useRouter();
            const footer_year = new Date().getFullYear();
            const showPassword = ref(false);
            const isLoading = ref(false);

            const togglePassword = () => {
              showPassword.value = !showPassword.value;
            };

            // Validation Schema
            const schema = yup.object({
            phone: yup
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
            });

            const submitLogin = async (values) => {
                isLoading.value = true;
                try {
                    const res = await axios.post('/login', {
                        mobile: values.phone,
                        password: values.password
                    }, { withCredentials: true });

                    if (!res.data.status) {
                        return Swal.fire({
                            title: "Error!",
                            text: res.data.message || "Invalid credentials",
                            icon: "error",
                        });
                    }

                    // Store token
                    const token = res.data.token;
                    // console.log("Token:", token);
                    // Attach token for all future API calls
                    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

                    // Now request profile
                    try{
                        const profileData = await axios.get('/api/profile', {
                            headers: {
                                Authorization: `Bearer ${token}`
                            }
                        });

                        // console.log("profileData : ",profileData.data)
                        if(profileData.data){
                            localStorage.setItem('user', JSON.stringify(profileData.data))
                            localStorage.setItem('user_token', res.data.token)
                            Swal.fire({
                                title: 'Success!',
                                text: 'Login successful!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            })
                            router.push('/dashboard');
                        }
                        else
                        {
                            Swal.fire({
                                title: "Error!",
                                text: profileData.data.message || "Login Invalid credentials",
                                icon: "error",
                            });
                        }
                    }
                    catch(error){
                        Swal.fire({
                            title: "Error!",
                            text: error.response?.data?.message || "Invalid Credentials",
                            icon: "error",
                        });
                        return;
                    }
                        
                } catch (error) {
                    // console.log(error)
                    Swal.fire({
                        title: "Error!",
                        text: error.response?.data?.message || "Invalid Credentials",
                        icon: "error",
                    });
                }
                finally {
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
                submitLogin,
                schema,
                isLoading,
            }
        }
    }
</script>