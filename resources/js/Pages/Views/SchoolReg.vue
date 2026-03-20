<template>
    <main>
        <div class="max-w-[430px] pb-0 mx-auto grid grid-cols-1  bg-center bg-cover bg-no-repeat ">
            <!-- header section -->
            <div class="flex flex-col w-full mt-2 border-2 p-2 border-[#6b3f69]">
                <img :src="tmLogo" alt="Tirumurugan Educational Academy">
            </div>
            <!-- header section /. -->
            
            <!-- Address section -->
            <div class="flex flex-col w-full border-1 p-2 border-t-0 border-l-0 border-r-0 border-b-[#6b3f69]">
                <p class="text-center text-[12px]">
                    No: 288, RoyalOne medical center near, Anangur Corner, Komarapalayam(TK), Namakkal (DT), Pincode - 638183 
                </p>
            </div>
            <!-- Address section /. -->

            <!-- form section -->
            <div class="flex flex-col w-full p-2">
                <p class="text-2xl text-center font-semibold uppercase">Scholarship Form</p>
            </div>
            <div class="flex flex-col w-full p-5">
                <form @submit.prevent="onSubmit" class="space-y-4 w-full">
                    <!-- name -->
                    <div>
                        <label class="font-semibold text-gray-700">Student Name</label>
                        <input v-model="sname" type="text"
                                placeholder="Enter Student Name" class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && snameError" class="text-red-500 text-sm">{{ snameError }}</span>
                        </div>
                    </div>
                    <!-- name /.-->
                    
                    <!-- DOB -->
                    <div>
                        <label class="font-semibold text-gray-700">Date of Birth</label>
                        <input v-model="dob" type="date"
                                placeholder="Enter DOB (DD-MM-YYYY)" class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && dobError" class="text-red-500 text-sm">{{ dobError }}</span>
                        </div>
                    </div>
                    <!-- DOB /.-->

                    <!-- age -->
                    <div>
                        <label class="font-semibold text-gray-700">Age</label>
                        <input 
                            v-model="age" 
                            type="text"
                            maxlength="2" 
                            placeholder="Enter Age" 
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" 
                            @input="age = age.replace(/[^0-9]/g, '')"
                        />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && ageError" class="text-red-500 text-sm">{{ ageError }}</span>
                        </div>
                    </div>
                    <!-- age /.-->                    
                    
                    <!-- aadhar no -->
                    <div>
                        <label class="font-semibold text-gray-700">ID Proof(AADHAR NO)</label>
                        <input 
                            v-model="aadharno" 
                            type="text"
                            maxlength="12" 
                            placeholder="Enter AADHAR NUMBER" 
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" 
                            @input="aadharno = aadharno.replace(/[^0-9]/g, '')"
                        />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && aadharnoError" class="text-red-500 text-sm">{{ aadharnoError }}</span>
                        </div>
                    </div>
                    <!-- aadhar no /.-->                    
                    
                    <!-- school name -->
                    <div>
                        <label class="font-semibold text-gray-700">School Name</label>
                        <input 
                            v-model="schoolName" 
                            type="text"
                            placeholder="Enter School Name" 
                            class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" 
                        />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && schoolNameError" class="text-red-500 text-sm">{{ schoolNameError }}</span>
                        </div>
                    </div>
                    <!-- school name /.-->
                    
                    <!-- class -->
                    <div>
                        <label class="font-semibold text-gray-700">Last Studied: (12th Standard)</label>
                        <input v-model="lastStudied" type="text"
                                placeholder="Last Studied: (12th Standard)" class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && lastStudiedError" class="text-red-500 text-sm">{{ lastStudiedError }}</span>
                        </div>
                    </div>
                    <!-- class /.-->

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
                                py-2 px-4 border border-[#000b57] hover:border-transparent rounded mt-3"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" 
                                class="h-6 w-6 fill-current text-green-500 hover:text-green-600 cursor-pointer" >
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.1 0-65.6-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.4 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-5.5-2.8-23.2-8.5-44.2-27.1-16.4-14.6-27.4-32.7-30.6-38.2-3.2-5.6-.3-8.6 2.5-11.3 2.5-2.5 5.5-6.5 8.3-9.7 2.8-3.3 3.7-5.5 5.5-9.2 1.9-3.7.9-6.9-.5-9.7-1.4-2.8-12.4-29.9-17-41.1-4.5-10.9-9.1-9.4-12.4-9.6-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 13.2 5.8 23.5 9.2 31.6 11.8 13.3 4.2 25.4 3.6 35 2.2 10.7-1.5 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                                </svg>
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

                    <!-- Preferred Course -->
                    <div>
                        <label class="font-semibold text-gray-700">Preferred Course</label>
                        <input v-model="course" type="text"
                                placeholder="Preferred Course(BE,B.Tech,B.Sc,BA)" class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && courseError" class="text-red-500 text-sm">{{ courseError }}</span>
                        </div>
                    </div>
                    <!-- Preferred Course /.-->
                   
                    <!-- Preferred College -->
                    <div>
                        <label class="font-semibold text-gray-700">Preferred College</label>
                        <input v-model="pCollege" type="text"
                                placeholder="Enter Preferred College Name (Optional)" 
                                class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && pCollegeError" class="text-red-500 text-sm">{{ pCollegeError }}</span>
                        </div>
                    </div>
                    <!-- Preferred Location /.-->
                    
                    <!-- Preferred Location -->
                    <div>
                        <label class="font-semibold text-gray-700">Preferred Location</label>
                        <input v-model="pLocation" type="text"
                                placeholder="Preferred Location(Erode, Namakkal,Salem)" class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && pLocationError" class="text-red-500 text-sm">{{ pLocationError }}</span>
                        </div>
                    </div>
                    <!-- Preferred Location /.-->
                    
                    <!-- ref -->
                    <div>
                        <label class="font-semibold text-gray-700">Reference</label>
                        <input v-model="refName" type="text"
                                placeholder="Reference Name" class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
                        <div class="mt-1">
                            <span v-if="submitCount > 0 && refNameError" class="text-red-500 text-sm">{{ refNameError }}</span>
                        </div>
                    </div>
                    <!-- ref /.-->

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
                            {{ isSubmitting ? "Saving..." : "Save" }}
                        </button>
                    </div>
                    <!-- submit button /. -->


                </form>
            </div>
            <!-- form section /. -->
        </div>
    </main>
</template>

<script>
    import { ref, onMounted, computed, nextTick  } from 'vue'
    import { useForm, useField } from 'vee-validate'
    import * as yup from 'yup'
    import Swal from 'sweetalert2'
    import { toast } from 'vue3-toastify'

    import defaultLogo from '@/assets/images/commonImages/tm_logo.webp'
    export default {
        name: "SchoolRegistration",
        components: {defaultLogo},
        setup() {
            const tmLogo = defaultLogo
            const isSubmitting = ref(false);

            // form validation
            const schema = yup.object({
                sname: yup.string().required('Enter Student Name'),
                lastStudied: yup.string().required('Enter Last Studied'),
                dob: yup.string()
                    .required("Enter Date of Birth")
                    .matches(
                        /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/,
                        "Invalid date format"
                    ),
                age: yup.string()
                    .required("Please enter valid age")
                    .matches(/^[0-9]{2}$/, "Age must be exactly 2 digits (e.g., 15)"),
                schoolName: yup.string()
                    .required("Please Enter School Name"),
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
                address: yup
                        .string()
                        .required('Enter Address'),
                course: yup
                        .string()
                        .required('Enter Course'),
                pLocation: yup
                        .string()
                        .nullable(),
                refName: yup
                        .string()
                        .required('Enter Reference Name'),
                aadharno: yup
                        .string()
                        .required('Aadhar number is required')
                        .matches(/^[2-9]{1}[0-9]{11}$/, 'Enter a valid 12-digit Aadhar number')
                        .length(12, 'Aadhar number must be exactly 12 digits'),
                pCollege: yup.string().nullable(),
            });

            const { handleSubmit, submitCount } = useForm({
                validationSchema: schema,
            });

            const { value: sname, errorMessage: snameError } = useField('sname');
            const { value: dob, errorMessage: dobError } = useField('dob');
            const { value: lastStudied, errorMessage: lastStudiedError } = useField('lastStudied');
            const { value: age, errorMessage: ageError } = useField('age');
            const { value: schoolName, errorMessage: schoolNameError } = useField('schoolName');
            const { value: phone_number, errorMessage: phoneNumberError } = useField('phone_number');
            const { value: whatsapp_number, errorMessage: whatsappNumberError } = useField('whatsapp_number');
            const { value: address, errorMessage: addressError } = useField('address');
            const { value: course, errorMessage: courseError } = useField('course');
            const { value: pLocation, errorMessage: pLocationError } = useField('pLocation');
            const { value: refName, errorMessage: refNameError } = useField('refName');
            const { value: aadharno, errorMessage: aadharnoError } = useField('aadharno');
            const { value: pCollege, errorMessage: pCollegeError } = useField('pCollege');

            const onSubmit = handleSubmit(async (values) => {
                isSubmitting.value = true;
                
                try {
                    const resData = await axios.post('/save_school_datas', values);
                    
                    if (resData.data.status === 'success') {
                        toast.success(resData.data.message);
                        
                        sname.value = '';
                        dob.value = '';
                        lastStudied.value = '';
                        age.value = '';
                        schoolName.value = '';
                        phone_number.value = '';
                        whatsapp_number.value = '';
                        address.value = '';
                        course.value = '';
                        pLocation.value = '';
                        refName.value = '';
                        refName.value = '';
                        pCollege.value = '';                        
                        aadharno.value = '';
                    }
                } catch (error) {
                    if (error.response && error.response.status === 422) {
                        const allErrors = error.response.data.errors; 
                        Object.values(allErrors).forEach((errorMessages) => {
                            errorMessages.forEach((singleMsg) => {
                                toast.error(singleMsg); 
                            });
                        });
                    } else {
                        // General error (Server down, etc.)
                        toast.error("Network Error: " + error.message);
                    }
                } finally {
                    isSubmitting.value = false;
                }
            });

            const saveAndNext = () => {
                onSubmit();
            };

            return {
                tmLogo,
                // validation
                schema,
                sname,
                snameError,
                lastStudied,
                lastStudiedError,
                dob,
                dobError,
                age,
                ageError,
                schoolName,
                schoolNameError,
                phone_number,
                phoneNumberError,
                whatsapp_number,
                whatsappNumberError,
                address,
                addressError,
                course,
                courseError,
                pLocation,
                pLocationError,
                refName,
                refNameError,
                aadharno,
                aadharnoError,
                pCollege,
                pCollegeError,
                onSubmit,
                isSubmitting,
                saveAndNext,
                submitCount,
            }
        }
    }
</script>