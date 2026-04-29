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
            <!-- heading page -->
            <div class="flex flex-col w-full mt-2">
                <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                    <h1>Course Registration</h1>
                </div>
            </div>
            <!-- heading page /. -->
            <!-- export excel / date range / common search -->
            <div class="flex flex-row w-full bg-white items-center justify-between p-5 border-b">
                <div class="flex-1 flex justify-start">
                    <button 
                        @click="exportToExcel" 
                        class="btn-export flex items-center gap-2 bg-[#7ecdc6] font-semibold p-2 px-4 rounded-2xl hover:bg-[#6bbdb5] transition-colors"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-700">
                            <path d="M6.25 6.375a.875.875 0 100 1.75.875.875 0 000-1.75zM6.25 9.875a.875.875 0 100 1.75.875.875 0 000-1.75zM5.375 14.25a.875.875 0 111.75 0 .875.875 0 01-1.75 0z" />
                            <path fill-rule="evenodd" d="M2.625 3.375C2.625 2.063 3.688 1 5 1h6.5l8.5 8.5V20.625c0 1.313-1.063 2.375-2.375 2.375H5a2.375 2.375 0 01-2.375-2.375V3.375zM12 3l7 7H12V3zm-3 8.25a.75.75 0 000 1.5h6.75a.75.75 0 000-1.5H9zm0 3a.75.75 0 000 1.5h6.75a.75.75 0 000-1.5H9zm0 3a.75.75 0 000 1.5h6.75a.75.75 0 000-1.5H9z" clip-rule="evenodd" />
                        </svg>
                        <span>Export to Excel</span>
                    </button>
                </div>

                <div class="flex-1 flex justify-center">
                    <div class="flex items-center gap-2">
                        <!-- <span class="text-gray-400 italic text-sm">Date Range Picker Placeholder</span> -->
                    </div>
                </div>

                <div class="flex-1 flex justify-end">
                    <div class="flex items-center gap-2">
                        <label class="text-sm font-medium text-gray-700">Search:</label>
                        <input 
                            type="text" 
                            v-model="searchText" 
                            @input="onFilterTextBoxChanged"
                            placeholder="Search..." 
                            class="border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7ecdc6] w-64"
                        />
                    </div>
                </div>

            </div>
            
            <div class="flex flex-col w-full bg-white p-5">
                <ag-grid-vue
                    class="ag-theme-alpine"
                    style="width:100%; height:500px"
                    :rowData="rowData"
                    :columnDefs="colDefs"
                    :context="gridContext"
                    :pagination="true"
                    :paginationPageSize="10"
                    @grid-ready="onGridReady" 
                />
            </div>
            <!-- main content area /.-->
        </div>
    </div>
</template>
<script>
    import defaultLogo from '@/assets/images/commonImages/linkAura_logo.png'
    import SideNavBar from './Components/SideNavBar.vue';
    import Header_tab from './Components/Header_tab.vue';
    import { ref, onMounted } from "vue";
    import { computed } from "vue";
    import { toast } from 'vue3-toastify'
    import Swal from 'sweetalert2';
    // import { useRouter } from "vue-router";
    import { useCardStore } from '@/stores/cardStore';
    import axios from "axios";
    import { AgGridVue } from "ag-grid-vue3";
    import { ModuleRegistry, AllCommunityModule } from "ag-grid-community";
    ModuleRegistry.registerModules([AllCommunityModule]);

    import ExcelJS from 'exceljs';
    import { saveAs } from 'file-saver';
    import { router, usePage } from '@inertiajs/vue3'
    
    import { PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon } from '@heroicons/vue/24/solid'
    export default {
        components: { SideNavBar, Header_tab, AgGridVue, PaperAirplaneIcon, CurrencyRupeeIcon, RocketLaunchIcon },
        name: 'CourseRegistration',
        setup(){
            const page = usePage();
            const userId = computed(() => page.props.auth.user?.id);
            const rowData = ref([]);

            const gridApi = ref(null);
            const searchText = ref("");

            // Capture the API when the grid is ready
            const onGridReady = (params) => {
                gridApi.value = params.api;
            };

            // Apply the quick filter
            const onFilterTextBoxChanged = () => {
                gridApi.value.setGridOption('quickFilterText', searchText.value);
            };
            
            const loadBS = async() => {
                try{
                    const res = await axios.post("/getCourseRegistration") 
                    rowData.value = res.data.getData;

                    if (res.data.status && Array.isArray(res.data.getData)) {
                        rowData.value = res.data.getData;
                        } 
                    else {
                        rowData.value = [];
                    }
                }
                catch (error){
                    console.error("Feedback load error:", error);
                    rowData.value = [];
                }
            }
            onMounted(async () => {
                try{
                    await Promise.all([
                        loadBS(),
                    ])
                }
                catch(error){
                    console.log("Course registration Data Status", error)
                }
            })
            const colDefs = ref([
                { headerName: "S.No", valueGetter: "node.rowIndex + 1", width: 80, },
                { field: "student_name", headerName: "Student Name", width: 180, editable: true },
                { field: "gender", headerName: "Gender", width: 120, editable: true },
                { field: "email", headerName: "Email", width: 150, editable: true },
                { field: "phone_number", headerName: "Phone Number", width: 130, editable: true },
                { field: "whatsapp_number", headerName: "WhatsApp Number", width: 130, editable: true },
                { field: "education_type", headerName: "Edu Type", width: 100, editable: true },
                { field: "institution", headerName: "Institu", width: 150, editable: true },
                { field: "course", headerName: "Course", width: 150, editable: true },
                { field: "session", headerName: "Session", width: 100, editable: true },
                { field: "from_time", headerName: "From Time", width: 100, editable: true },
                { field: "to_time", headerName: "To Time", width: 100, editable: true },
                { field: "to_time", headerName: "To Time", width: 100, editable: true },
                { field: "created_at", headerName: "CDate", width: 170, editable: true },
            ]);

            const exportToExcel = async () => {
                const workbook = new ExcelJS.Workbook();
                const worksheet = workbook.addWorksheet('Course Registration Data');

                worksheet.columns = [
                    { header: 'S.No', key: 'sno', width: 10 },
                    { header: 'Student Name', key: 'student_name', width: 25 },
                    { header: 'Gender', key: 'gender', width: 20 },
                    { header: 'Email', key: 'email', width: 20 },                    
                    { header: 'Phone Number', key: 'phone_number', width: 20 },
                    { header: 'WhatsApp Number', key: 'whatsapp_number', width: 20 },
                    { header: 'Edu Type', key: 'education_type', width: 20 },
                    { header: 'Institution', key: 'institution', width: 20 },
                    { header: 'Course', key: 'course', width: 20 },
                    { header: 'Session', key: 'session', width: 20 },
                    { header: 'From Time', key: 'from_time', width: 20 },
                    { header: 'To Time', key: 'to_time', width: 20 },
                    { header: 'Created Date', key: 'CDate', width: 20 },
                ];

                const formattedData = rowData.value.map((row, index) => {
                    return {
                        sno: index + 1,
                        student_name: row.student_name,
                        gender: row.gender,
                        email: row.email,
                        phone_number: row.phone_number,                        
                        whatsapp_number: row.whatsapp_number,
                        education_type: row.education_type,
                        institution: row.institution,
                        course: row.course,
                        session: row.session,
                        from_time: row.from_time,
                        to_time: row.to_time,
                        CDate: row.CDate,
                    };
                });

                worksheet.addRows(formattedData);
                worksheet.getRow(1).eachCell((cell) => {
                    cell.font = { bold: true, color: { argb: 'FFFFFF' } };
                    cell.fill = {
                        type: 'pattern',
                        pattern: 'solid',
                        fgColor: { argb: '4F46E5' } // Indigo color
                    };
                    cell.alignment = { vertical: 'middle', horizontal: 'center' };
                });

                // 6. Generate Buffer and Save File
                const buffer = await workbook.xlsx.writeBuffer();
                const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                saveAs(blob, `Course_Registration_${new Date().toISOString().slice(0, 10)}.xlsx`);

            };

            
            return {
                userId,
                rowData,
                colDefs,
                gridApi,
                searchText,
                onFilterTextBoxChanged,
                onGridReady,
                exportToExcel,
            }
        }
    }
</script>