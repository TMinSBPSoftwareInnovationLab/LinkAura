<template>
    <main>
        <div class="grid grid-cols-1 md:grid-cols-4">
            <!-- Left Sidebar -->
            <div class="col-span-1">
                <SideNavBar />
            </div>
            <!-- Left Sidebar /.-->

            <!-- Right Content -->
            <div class="col-span-3 bg-gray-100 p-4 min-h-screen">
                <Header_tab />
                <!-- top header -->
                <div class="flex flex-row md:flex-row w-full py-5 px-5 bg-white mt-2  justify-between gap-3 md:gap-0 border border-sky-500/30">
                    <!-- Left Side Button -->
                    <router-link to="/Service">
                        <button
                            class="outline outline-1 outline-pink-500 text-pink-500 font-semibold
                                py-1.5 px-3 text-sm 
                                md:py-2 md:px-4 md:text-base
                                rounded-xl transition-all duration-500 
                                hover:-translate-y-2 hover:shadow-xl">
                            Service
                        </button>
                    </router-link>

                    <!-- Right Side Button -->
                    <button
                        @click="saveAndNext"
                        :disabled="isSubmitting"
                        class="bg-[#000b57] text-white 
                            py-1.5 px-3 text-sm 
                            md:py-2 md:px-4 md:text-base
                            rounded-xl transition-all duration-500 
                            hover:-translate-y-2 hover:shadow-xl">
                        {{ isSubmitting ? "Saving..." : "Save & Next Payment" }}
                    </button>
                    <!-- Right Side Button /.-->
                    
                </div>
                <!-- top header /. -->

                <!-- heading page -->
                <div class="flex flex-col w-full mt-2">
                    <div class="flex w-full bg-[#000b57] text-white text-center items-center justify-center uppercase font-bold p-2">
                        <h1>Gallery</h1>
                    </div>
                </div>
                <!-- heading page /. -->

                <!-- main content area -->
                <div class="grid grid-cols-1 mt-2 bg-white p-5">
                    <!-- Gallery Area -->
                    <div class="grid grid-cols-1">
                        <div class="flex flex-col">
                            <!-- Gallery view area -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                <div v-for="(gallery, index) in galleries" :key="index" class="border p-4 rounded-lg">
                                    <!-- remove icons -->
                                    <div class="w-full flex justify-end">
                                        <button v-if="gallery.preview && !gallery.isNew"
                                            @click="removeProductImage(index)"
                                            class="bg-red-500 text-white text-xs p-1">
                                            <TrashIcon class="h-[30px] w-10 p-1" />
                                        </button>

                                        <button v-if="gallery.preview && gallery.isNew"
                                            @click="removeTempImage(index)"
                                            class="bg-yellow-500 text-white text-xs p-1">
                                            <TrashIcon class="h-[30px] w-10 p-1" />
                                        </button>
                                    </div>
                                    <!-- remove icons /. -->

                                    <!-- file upload  area -->
                                    <label class="block cursor-pointer">
                                        <input type="file" class="hidden" @change="selectedImage($event, index)" accept="image/png, image/jpg, image/webp, image/gif, image/jpeg">
                                        <div class="w-full h-32 flex items-center justify-center border border-gray-200 rounded-lg overflow-hidden">
                                        <img v-if="gallery.preview" :src="gallery.preview" class="object-cover w-full h-full" />
                                        <span v-else class="text-gray-400 text-center">Upload Gallery</span>
                                        
                                        </div>
                                    </label>
                                    <!-- file upload  area /. -->
                                </div>
                            </div>
                            <!-- gallery view area /.-->
                            <!-- submit area -->
                            <div class="flex mt-3 justify-center">
                                <button @click="saveAndNext" :disabled="isSubmitting"
                                    class="bg-[#000b57] text-white  py-1.5 px-3 text-sm md:py-2 md:px-4 md:text-base rounded-xl transition-all duration-500  hover:-translate-y-2 hover:shadow-xl">
                                    {{ isSubmitting ? "Saving..." : "Save & Next Payment" }}
                                </button>
                            </div>
                            <!-- submit area /. -->
                        </div>
                    </div>
                    <!-- gallery Area /. -->
                </div>
                <!-- main content area -->
            </div>
            <!-- Right Content /.-->
        </div>
    </main>
</template>

<script>
    import { ref, onMounted } from 'vue';
    import SideNavBar from '../SideNavBar.vue';
    import Header_tab from '../Header_tab.vue';
    import { useCardStore } from '@/stores/cardStore';
    import { useRouter } from "vue-router";
    import { toast } from 'vue3-toastify'
    import axios from 'axios';
    import { TrashIcon } from '@heroicons/vue/24/solid'
    import Swal from 'sweetalert2';

    export default{
        name: "Gallery",
        components: { SideNavBar, Header_tab, TrashIcon },
        setup() {
            const router = useRouter()
            const rowid = ref()
            const cardStore = useCardStore()
            const isSubmitting = ref(false);

            
            // get data
            const currData = ref({})
            const galleries = ref();
            onMounted(async () => {
                const res = await axios.post('/getWebsiteDetails', { 
                    table: 'miniweb_gallery', 
                    cardId: Number(cardStore.cardId)
                });

                const data = res.data.getData;

                // If no galleries → load default 30 empty rows
                if (!data || data.length === 0) {
                    galleries.value = Array.from({ length: 30 }, () => ({
                        preview: null,
                        file: null,
                    }));
                    rowid.value = []; // No rowid
                    return;
                }

                // If galleries exist → load DB galleries
                currData.value = data;
                galleries.value = data.map(item => ({
                    file: null,
                    preview: item.gallery ? `/gallery_images/${item.gallery}` : '',
                }));

                rowid.value = data.map(item => item.id);
            });


            // upload gallery area
            const allowedTypes = ["image/png", "image/jpeg", "image/jpg", "image/gif", "image/webp"];
            const selectedImage = (e, i) => {
                const file = e.target.files[0];
                if (!file) return;

                if (!allowedTypes.includes(file.type)) {
                    toast.error("Only JPG, PNG, GIF, WEBP images allowed!");
                    return (e.target.value = "");
                }

                const reader = new FileReader();
                reader.onload = (ev) => galleries.value[i].preview = ev.target.result;

                reader.readAsDataURL(file);
                galleries.value[i].file = file;
                galleries.value[i].isNew = true;
            };

            // remove temp image
            const removeTempImage = (index) => {
                galleries.value[index].file = null;
                galleries.value[index].preview = '';
                galleries.value[index].isNew = false;
            };

            // remove from db and path
            const removeProductImage = async (index) => {
                const gallery = galleries.value[index];
                if (!gallery.preview) return;

                const result = await Swal.fire({
                    title: "Are you sure?",
                    text: "Are you Sure want to Remove This Gallery Image",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                });

                if (!result.isConfirmed) return;

                try {
                    const res = await axios.post("/removeGalleryImage", { id: rowid.value[index], image: gallery.preview.replace("/gallery_images/", ""), });

                    if (res.data.status) {
                    galleries.value[index].file = null;
                    galleries.value[index].preview = null;

                    Swal.fire({
                        title: "Success",
                        text: res.data.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                    } else {
                    Swal.fire({
                        title: "Error",
                        text: res.data.message || "Failed to delete image.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                    }
                } catch (error) {
                    console.error(error);
                    Swal.fire({
                    title: "Error",
                    text: "Something went wrong while deleting the image.",
                    icon: "error",
                    confirmButtonText: "OK",
                    });
                }
            };

            // save galleries
            const saveAndNext = async() => {
                const formData = new FormData();
                formData.append('cardId',Number(cardStore.cardId));
                galleries.value.forEach((p, index) => {
                    formData.append(`galleries[${index}][image]`, p.file);
                });

                // update data
                rowid.value.forEach((id, idx) => {
                    formData.append(`rowid[${idx}]`, id);
                });
                
                try {
                    const res = await axios.post('/saveWebGallery', formData, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                });                
                if(res.data.status == true){
                        document.querySelectorAll('input[type="file"]').forEach(input => {
                            input.value = '';
                        });
                        toast.success(res.data.message)
                        router.push('/PaymentDetails')
                    }
                    else
                    {
                        toast.warning(res.data.message)
                    }
                } catch (error) {
                    toast.error("Something went wrong: " + error);
                }
                
            }

            return {
                currData,
                rowid,
                saveAndNext,
                galleries,
                selectedImage,
                allowedTypes,
                removeTempImage,
                removeProductImage,
                isSubmitting,
            }
        }
    }
</script>