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
                    <h1>Feedback Verify</h1>
                </div>
            </div>
            <!-- heading page /. -->
             <div class="flex flex-col w-full bg-white p-5">
                <ag-grid-vue
                    class="ag-theme-alpine"
                    style="width:100%; height:500px"
                    :rowData="rowData"
                    :columnDefs="colDefs"
                    :context="gridContext"
                    :pagination="true"
                    :paginationPageSize="10"
                    :getRowStyle="getRowStyle"
                />

             </div>
        </div>
    </div>

    <div
  v-if="rejectPopup"
  class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50"
>
  <div class="bg-white p-5 rounded-lg w-[420px]">
    <h3 class="text-lg font-bold mb-3">Reject Feedback</h3>

    <textarea
      v-model="rejectReason"
      class="w-full border rounded p-2"
      rows="4"
      placeholder="Enter rejection reason"
    ></textarea>

    <div class="flex justify-end gap-3 mt-4">
      <button
        class="px-4 py-2 border rounded"
        @click="rejectPopup = false"
      >
        Cancel
      </button>

      <button
        class="px-4 py-2 bg-red-600 text-white rounded"
        @click="submitReject"
      >
        Submit
      </button>
    </div>
  </div>
</div>
<!-- Reject popup -->
 <div v-if="rejectPopup" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50" >
    <div class="bg-white p-5 rounded-lg w-[420px]">
        <h3 class="text-lg font-bold mb-3">Reject Feedback</h3>

        <textarea v-model="rejectReason" class="w-full border rounded p-2" rows="4" placeholder="Enter rejection reason"></textarea>

        <div class="flex justify-end gap-3 mt-4">
        <button class="px-4 py-2 border rounded" @click="rejectPopup = false" >
            Cancel
        </button>

        <button class="px-4 py-2 bg-red-600 text-white rounded" @click="submitReject">
            Submit
        </button>
        </div>
    </div>
    </div>
<!-- Reject popup /. -->
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
    name: 'FeedbackVerify',

    setup(){
        const user_id = ref('')
        user_id.value = JSON.parse(localStorage.getItem('user')).id;
        const rowData = ref({});
        const rejectPopup = ref(false);
        const rejectReason = ref("");
        const selectedRow = ref(null);

        const colDefs = ref([
            { headerName: "S.No", valueGetter: "node.rowIndex + 1", width: 80, },
            {
                headerName: "Status",
                field: "verify",
                width: 130,
                cellRenderer: (params) => {
                    switch (params.value) {
                        case 1:
                            return `<span class="status-verified">Verified</span>`;
                        case 2:
                            return `<span class="status-rejected">Rejected</span>`;
                        default:
                            return `<span class="status-pending">Pending</span>`;
                    }
                }
            },
            { headerName: "Actions", width: 230,
                cellRenderer: (params) => {
                return `
                    <div style="display:flex;gap:6px">
                        <button class="verify-btn">Verify</button>
                        <button class="reject-btn">Reject</button>
                    </div>
                `;
                },
                onCellClicked: (params) => {
                    const target = params.event.target;

                    if (target.classList.contains("verify-btn")) {
                        params.context.verifyFeedback(params.data);
                    }

                    if (target.classList.contains("reject-btn")) {
                        params.context.openRejectPopup(params.data);
                    }
                },
            }, 
            { field: "company_name", headerName: "Company", width:250,editable: true },
            { field: "name", headerName: "Customer Name", width:150, editable: true },
            { field: "phone", headerName: "Customer Phone Number", width:150, editable: true },
            { field: "feedback_message", headerName: "Feedback", width:150, editable: true },
            { field: "reject_remarks", headerName: "Reject Remarks", width:150, editable: true },
            { field: "fbCreatedAt", headerName: "In Date", width: 180, editable: true },
            
        ]);

        /* ---------------- ROW STYLE ---------------- */
        const getRowStyle = (params) => {
            if (params.data.verify == 0) {
                return { background: "#fff7ed" }; // pending
            }
            if (params.data.verify == 1) {
                return { background: "#ecfdf5" }; // verified
            }
            if (params.data.verify == 2) {
                return { background: "#eb6c71", color:"#ffffff" }; // reject
            }
        };
        const gridContext = {
            verifyFeedback: async (row) => {
                const result = await Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to VERIFY this feedback?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#16a34a', // green
                    cancelButtonColor: '#dc2626',  // red
                    confirmButtonText: 'Yes, Verify',
                    cancelButtonText: 'Cancel'
                });

                if (!result.isConfirmed) return;

                try {
                    await axios.post("/verifyMiniWebFeedback", { id: row.id, verify:1 });

                    toast.success("Feedback verified successfully");
                    loadFeedBack();
                } catch (error) {
                    toast.error("Verification failed");
                    console.error(error);
                }
            },

            openRejectPopup: (row) => {
                selectedRow.value = row;
                rejectReason.value = "";
                rejectPopup.value = true;
            },
        };

        // feebback reject value
        const submitReject = async () => {
            if (!rejectReason.value.trim()) {
                toast.warning("Rejection reason is required");
                return;
            }

            await axios.post("/verifyMiniWebFeedback", {
                id: selectedRow.value.id,
                reason: rejectReason.value,
                verify:2
            });

            toast.success("Feedback rejected");
            rejectPopup.value = false;
            loadFeedBack();
        };

        const loadFeedBack = async() => {
            try{
                const res = await axios.post("/getFeedbackDetails", { user_id: user_id.value }) 
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
            gridContext,
            submitReject,
            getRowStyle,
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