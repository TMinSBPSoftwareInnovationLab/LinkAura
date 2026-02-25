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
             <div class="flex w-full py-5 px-5 bg-white mt-2 justify-end" v-if="1==2">
                <router-link to="/Company_details">
                    <button
                        class="bg-[#000b57] text-white py-2 px-4 rounded-xl 
                                transition-all duration-500 
                                hover:-translate-y-2 hover:shadow-xl">
                            Create Mini Website
                    </button>
                </router-link>

             </div>
             <!-- heading page -->
            <div class="flex flex-col w-full mt-2">
                <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                    <h1>Enquiry</h1>
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
            <!-- export excel / date range / common search /. -->
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
        </div>
    </div>
</template>

<script>
import SideNavBar from './Components/SideNavBar.vue';
import Header_tab from './Components/Header_tab.vue';
import { ref, onMounted } from "vue";
import { AgGridVue } from "ag-grid-vue3";
import { ModuleRegistry, AllCommunityModule } from "ag-grid-community";
import axios from 'axios';
import { toast } from 'vue3-toastify'
import Swal from 'sweetalert2';
import ExcelJS from 'exceljs';
import { saveAs } from 'file-saver';

ModuleRegistry.registerModules([AllCommunityModule]); 

export default {
    components: { SideNavBar, Header_tab, AgGridVue },
    name: 'MiniWebEnquiry',

    setup(){
        const user_id = ref('')
        user_id.value = JSON.parse(localStorage.getItem('user')).id;
        const rowData = ref({});
        const rejectPopup = ref(false);
        const rejectReason = ref("");
        const selectedRow = ref(null);

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

        const colDefs = ref([
            { headerName: "S.No", valueGetter: "node.rowIndex + 1", width: 80, },
            // { field: "company_name", headerName: "Company",  width:250, editable: true },
            { field: "product_name", headerName: "Product Name",  width:250, editable: true },
            { field: "customername", headerName: "Customer Name",  width:200, editable: true },
            { field: "phone_number", headerName: "Phone Number", width: 150, editable: true },
            { field: "enquiry_message", headerName: "Message", width: 180, editable: true },
            { field: "meCreatedAt", headerName: "In Date", width: 180, editable: true },
        ]);

        


        const loadFeedBack = async() => {
            try{
                const res = await axios.post("/getMiniWebEnquiry", { user_id: user_id.value }) 
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
            
        };

        onMounted(async () => {
            try{
                await Promise.all([
                    loadFeedBack(),
                ])
            }
            catch(error){
                console.log("Feedback Data Status", error)
            }
        })

        const exportToExcel = async () => {
            // 1. Create workbook and worksheet
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet('Enquiry Data');

            // 2. Define the columns for Excel 
            // We map your colDefs to ExcelJS columns (skipping "Actions" column)
            worksheet.columns = [
                { header: 'S.No', key: 'sno', width: 10 },
                { header: 'Product Name', key: 'product_name', width: 25 },
                { header: 'Customer Name', key: 'customername', width: 20 },
                { header: 'Phone Number', key: 'phone_number', width: 20 },
                { header: 'Enquiry Message', key: 'enquiry_message', width: 30 },
                { header: 'In Date Remarks', key: 'meCreatedAt', width: 20 }
            ];

            // 3. Prepare the data
            // We transform the numeric status into text for the Excel file
            const formattedData = rowData.value.map((row, index) => {
                return {
                    sno: index + 1,
                    product_name: row.product_name,
                    customername: row.customername,
                    phone_number: row.phone_number,
                    enquiry_message: row.enquiry_message,
                    reject_remarks: row.reject_remarks,
                    meCreatedAt: row.meCreatedAt
                };
            });

            // 4. Add data to worksheet
            worksheet.addRows(formattedData);

            // 5. Styling the header row (Optional but recommended)
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
            saveAs(blob, `Enquiry_Message_${new Date().toISOString().slice(0, 10)}.xlsx`);
        };
        

        return { 
            rowData, 
            colDefs,
            user_id,
            rejectPopup,
            rejectReason,
            selectedRow,
            exportToExcel,
            onGridReady,
            searchText,
            onFilterTextBoxChanged,
        };
    }
};
</script>

<style>
.verify-btn {
    background: #16a34a;
    color: white;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
}

.reject-btn {
    background: #dc2626;
    color: white;
    padding: 4px 20px;
    border-radius: 6px;
    font-size: 12px;
}
.status-pending {
  background: #fed7aa;
  color: #9a3412;
  padding: 4px 10px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
}

.status-verified {
  background: #bbf7d0;
  color: #166534;
  padding: 4px 10px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
}

.status-rejected {
  background: #dc2626;
  color: #fff;
  padding: 4px 10px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
}
</style>