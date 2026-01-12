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
             <div class="flex flex-col w-full bg-white p-5">
                <ag-grid-vue
                    class="ag-theme-alpine"
                    style="width:100%; height:500px"
                    :rowData="rowData"
                    :columnDefs="colDefs"
                    :pagination="true"
                    :paginationPageSize="10"
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

        const colDefs = ref([
            { headerName: "S.No", valueGetter: "node.rowIndex + 1", width: 80, },
            { field: "company_name", headerName: "Company",  width:250, editable: true },
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
        

        return { 
            rowData, 
            colDefs,
            user_id,
            rejectPopup,
            rejectReason,
            selectedRow,
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