<template>
  <div class="min-h-screen bg-gradient-to-br from-indigo-100 via-white to-blue-100 flex items-center justify-center p-6">
    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl p-8">
      <h1 class="text-3xl uppercase font-extrabold text-center mb-1">
        thirumurugan academy
      </h1>
      <p class="text-sm font-extralight text-center text-gray-600">
        No 288, Royal One Medical Center Near, Anangur Corner, Komarapalayam, Namakkal(Dt), Tamilnadu Pincode - 638183
      </p>
      <p class="text-sm font-extralight text-center mb-2 text-gray-600">
        Contact: +91 75488 53487, +91 94883 06487
      </p>
      <hr />
      <h3 class="text-xl font-extrabold text-center text-gray-800 mt-2 mb-2">
        🎓 Course Registration
      </h3>
      <p class="text-center text-gray-500 mb-8">Join and upgrade your skills 🚀</p>

      <form @submit.prevent="onlineCourseOnSubmit" class="space-y-4">
        <!-- row 1 -->
        <div class="grid md:grid-cols-2 gap-6">
          <!-- student name -->
          <div>
            <label class="label">Student Name</label>
            <input v-model="studentName" type="text" placeholder="Enter Your Name" class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" />
            <div class="flex justify-between items-center mt-1">
              <span v-if="submitCount > 0 && studentNameError" class="text-red-500 text-sm">{{ studentNameError }}</span>
            </div>
          </div>
          <!-- student name /. -->
          
          <!-- age -->
          <div>
            <label class="label">Gender</label>
            <div class="flex gap-6 mt-2">
              <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" value="Male" v-model="gender" />
                <span>Male</span>
              </label>

              <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" value="Female" v-model="gender" />
                <span>Female</span>
              </label>
            </div>

            <div class="mt-1">
              <span v-if="submitCount > 0 && genderError" class="text-red-500 text-sm">
                {{ genderError }}
              </span>
            </div>
          </div>
          <!-- age /. -->
        </div>
        <!-- row 1/. -->
        
        <!-- row 2 -->
        <div class="grid md:grid-cols-2 gap-6">
          <!-- DOB -->
          <div>
            <label class="label">Date of Birth</label>
            <input
              v-model="dob"
              type="date"
              class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
            />
            <div class="flex justify-between items-center mt-1">
              <span v-if="submitCount > 0 && dobError" class="text-red-500 text-sm">{{ dobError }}</span>
            </div>
          </div>
          <!-- DOB /. -->
          <!-- phone number -->
          <div>
            <label class="label">Phone Number</label>
            <input
                v-model="phoneNumber"
                type="text"
                placeholder="Enter Phone Number"
                class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                oninput="this.value=this.value.replace(/[^\d]/,'')"
                maxlength="10"
            />
            <div class="flex justify-between items-center mt-1">
              <span v-if="submitCount > 0 && phoneNumberError" class="text-red-500 text-sm">{{ phoneNumberError }}</span>
            </div>
          </div>
          <!-- phone number /. -->
        </div>
        <!-- row 2 /. -->

        <!-- row 3 -->
        <div class="grid md:grid-cols-2 gap-6">
          <!-- email -->
          <div>
            <label class="label">Email ID</label>
            <input
                v-model="email"
                type="email"
                placeholder="Enter Email"
                class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
            />
          </div>
          <!-- email /. -->
          
          <!-- whatsapp number -->
          <div>
            <label class="label">WhatsApp Number</label>
            <input
                v-model="whatsappNumber"
                type="text"
                placeholder="Enter Whatsapp Number"
                class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                oninput="this.value=this.value.replace(/[^\d]/,'')"
                maxlength="10"
            />
            <div class="flex justify-between items-center mt-1">
              <span v-if="submitCount > 0 && whatsappNumberError" class="text-red-500 text-sm">{{ whatsappNumberError }}</span>
            </div>
          </div>
          <!-- whatsapp number /. -->
        </div>
        <!-- row 3 /. -->

        <!-- row 4 -->
        <div class="grid md:grid-cols-2 gap-6">
          <!-- school/college -->
          <div>
            <label class="label">School / College</label>
            <div class="flex gap-6 mt-2">
              <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" value="school" v-model="educationType" />
                <span>School</span>
              </label>

              <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" value="college" v-model="educationType" />
                <span>College</span>
              </label>
            </div>

            <div class="mt-1">
              <span v-if="submitCount > 0 && educationTypeError" class="text-red-500 text-sm">
                {{ educationTypeError }}
              </span>
            </div>
          </div>
          <!-- school/college /. -->
          
          <!-- Institution -->
          <div>
            <label for="School / College Name">School / College Name</label>
            <input
                v-model="institution"
                type="text"
                placeholder="Enter School / College Name"
                class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
            />
            <div class="flex justify-between items-center mt-1">
              <span v-if="submitCount > 0 && Error" class="text-red-500 text-sm">{{ institutionError }}</span>
            </div>
          </div>
          <!-- Institution /.-->
        </div>
        <!-- row 4 /.-->

        <!-- row 5 -->
        <div class="grid md:grid-cols-2 gap-6">
          <!-- Course -->
          <div>
            <label>Select Course</label>

            <select
              v-model="course"
              class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
            >
              <option value="">Choose your course</option>

              <option v-for="(item, index) in filteredCourses" :key="index" :value="item" >
                {{ item }}
              </option>
            </select>

            <div class="mt-1">
              <span v-if="submitCount > 0 && courseError" class="text-red-500 text-sm">
                {{ courseError }}
              </span>
            </div>
          </div>
          <!-- Course /.-->

          <!-- Session -->
          <div>
            <label for="">Session</label>
            <select
              v-model="session"
              class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
            >
              <option value="">Choose Your Session</option>

              <option v-for="(item, index) in sessionList" :key="index" :value="item" >
                {{ item }}
              </option>
            </select>

            <div class="mt-1">
              <span v-if="submitCount > 0 && sessionError" class="text-red-500 text-sm">
                {{ sessionError }}
              </span>
            </div>
          </div>
          <!-- Session /.-->
        </div>
        <!-- row 5 /. -->

        <!-- row 6 -->
        <div class="grid md:grid-cols-2 gap-6">

          <!-- Time -->
          <div>
            <label>Preferred Time</label>
            <div class="flex gap-4">
              <input
                v-model="fromTime"
                type="time"
                class="text-gray-700 w-full border rounded-lg px-4 py-2"
              />

              <input
                v-model="toTime"
                type="time"
                disabled
                class="text-gray-700 w-full border rounded-lg px-4 py-2"
              />
            </div>

            <!-- From Time Error -->
            <span v-if="submitCount > 0 && fromTimeError" class="text-red-500 text-sm">
              {{ fromTimeError }}
            </span>

            <p class="text-sm text-gray-500 mt-1">
              Night batch ends at 8:30 PM
            </p>

            <!-- To Time Error -->
            <span v-if="submitCount > 0 && toTimeError" class="text-red-500 text-sm block">
              {{ toTimeError }}
            </span>

            <!-- Custom Compare Error -->
            <span v-if="submitCount > 0 && timeError" class="text-red-500 text-sm block">
              {{ timeError }}
            </span>
          </div>
          <!-- Time /. -->

          <!-- Address -->
          <div>
            <label>Address</label>

            <textarea
              v-model="address"
              placeholder="Enter Address"
              class="text-gray-700 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
            ></textarea>

            <div class="mt-1">
              <span v-if="submitCount > 0 && addressError" class="text-red-500 text-sm">
                {{ addressError }}
              </span>
            </div>
          </div>
          <!-- Address /. -->

        </div>
        <!-- row 6 /. -->

        <div class="items-center justify-center text-center">
            <button 
              type="submit" 
              :disabled="isSubmitting"
              class="w-[150px] text-gray bg-transparent border-2 border-[#3d023a] text-[#3d023a] py-2 rounded-xl transition hover:bg-[#3d023a] hover:text-white disabled:opacity-50 disabled:cursor-not-allowed"
            >
              <span v-if="isSubmitting">Saving...</span>
              <span v-else>Save</span>
            </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import { useForm, useField, Form, Field, ErrorMessage } from "vee-validate";
  import * as yup from "yup";
  import Swal from 'sweetalert2';
  import { router } from '@inertiajs/vue3'
  import { ref, watch, computed, onMounted } from 'vue';

  export default {
    name: "OnlineClassReg",
    components: { Form, Field, ErrorMessage },
    setup() {
      
      const sessionList = [
        "Morning",
        "Afternoon",
        "Evening",
        "Night"
      ];

      const schema = yup.object({
        studentName: yup.string().required("Student Name is Required"),
        gender: yup.string().required("Gender is Required"),
        phoneNumber: yup.string().required("Phone Number is Required").matches(/^[0-9]{10}$/, "Enter valid 10 digit phone number"),
        dob: yup.string().required("Date of Birth is Required"),
        whatsappNumber: yup.string().required("WhatsApp Number is Required").matches(/^[0-9]{10}$/, "Enter valid 10 digit phone number"),
        email: yup.string().nullable(),
        educationType: yup.string().required("Educatio Type is Required"),
        institution: yup.string().required("Institution Name is Required"),
        course: yup.string().required("Course is Required"),
        session: yup.string().required("Session is Required"),
        fromTime: yup.string().required("From time is required"),
        toTime: yup.string().required("To time is required"),
        address: yup.string().required("Address is required"),
      });

      const { handleSubmit, submitCount, isSubmitting  } = useForm({
          validationSchema: schema,
      });

      const { value: studentName, errorMessage: studentNameError } = useField('studentName');
      const { value: gender, errorMessage: genderError } = useField('gender');
      const { value: phoneNumber, errorMessage: phoneNumberError } = useField('phoneNumber');
      const { value: dob, errorMessage: dobError } = useField('dob');
      const { value: whatsappNumber, errorMessage: whatsappNumberError } = useField('whatsappNumber');
      const { value: educationType, errorMessage: educationTypeError } = useField('educationType');
      const { value: institution, errorMessage: institutionError } = useField('institution');
      const { value: course, errorMessage: courseError } = useField("course", "", { initialValue: ""});
      const { value: session, errorMessage: sessionError } = useField("session", "", { initialValue: ""});
      const { value: fromTime, errorMessage: fromTimeError } = useField("fromTime");
      const { value: toTime, errorMessage: toTimeError } = useField("toTime");
      const { value: address, errorMessage: addressError } = useField("address");
      const { value: email, errorMessage: emailError } = useField('email');

      const timeError = computed(() => {
        if (!fromTime.value) return "";

        const [hours, minutes] = fromTime.value.split(":").map(Number);

        let newHours = hours + 2;

        if (newHours >= 24) {
          newHours = newHours - 24;
        }

        const addedTime =
          String(newHours).padStart(2, "0") +
          ":" +
          String(minutes).padStart(2, "0");

        if (addedTime > "20:30") {
          return "8:30 PMக்கு முன் 2 மணி நேரம் உள்ள நேரத்தை மட்டும் தேர்வு செய்யவும்.";
        }

        return "";
      });

      watch(fromTime, (newVal) => {
        if (!newVal) {
          toTime.value = "";
          return;
        }

        // block directly if > 8:30 PM
        if (newVal > "20:30") {
          toTime.value = "";
          return;
        }

        const [hours, minutes] = newVal.split(":").map(Number);

        let newHours = hours + 2;

        if (newHours >= 24) {
          newHours = newHours - 24;
        }

        const addedTime =
          String(newHours).padStart(2, "0") +
          ":" +
          String(minutes).padStart(2, "0");

        const maxTime = "20:30";

        toTime.value = addedTime > maxTime ? maxTime : addedTime;
      });

      const onlineCourseOnSubmit = handleSubmit(async (values, {resetForm} ) => {
        if (timeError.value) return;

        console.log("values : ",values)
        try {
          const resData = await axios.post('/saveOnlineCourseRegData',{...values});
          if(resData.data.status == true){

            Swal.fire({
                title: 'Success',
                text: resData.data.message,
                icon: 'success',
                confirmButtonText: 'OK'
            });
            resetForm();
          }
          else{
              Swal.fire({
                  title: 'Warningss',
                  text: resData.data.message,
                  icon: 'danger',
                  confirmButtonText: 'OK'
              });   
          }
        }
        catch (error) {
            Swal.fire({
                title: 'Error!',
                icon: 'error',
                text: error,
                confirmButtonText: 'OK'
            })
        }
      });

      const schoolCourses = [
        "6th Tuition",
        "7th Tuition",
        "8th Tuition",
        "9th Tuition",
        "10th Maths",
        "11th Maths",
        "11th Computer Science",
        "11th Computer Science",
        "12th Maths",
        "12th Biology",
        "12th Computer Science",
        "Online Python",
        "Online Tally",
      ];

      const collegeCourses = [
        "Online AI With Python",
        "Online Python",
        "Online PHP/MySQL",
        "Online Web Design",
        "Online Web Development",
        "Online Full Stack Web Development",
        "Online Android App Development",
        "Online Tally",
        "Online Excel",
        "Online PowerBI",
        "Online Tally with Advance Excel",
        "Online Excel With PowerBI",
        "Online Excel, Tally & PowerBI"
      ];

      const filteredCourses = computed(() => {
        if (educationType.value === "school") {
          return schoolCourses;
        } else if (educationType.value === "college") {
          return collegeCourses;
        }
        return [];
      });
        

      return {
        filteredCourses,
        // courseList,
        sessionList,
        schema,
        onlineCourseOnSubmit,
        submitCount,
        isSubmitting,
        studentName,
        studentNameError,
        gender,
        genderError,
        phoneNumber,
        phoneNumberError,
        dob,
        dobError,
        whatsappNumber,
        whatsappNumberError,
        educationType,
        educationTypeError,
        institution,
        institutionError,
        course,
        courseError,
        session,
        sessionError,
        fromTime,
        toTime,
        address,
        addressError,
        timeError,
        fromTimeError,
        toTimeError,
        email,
        emailError,
      };
    },
  };
</script>

<style>

</style>
