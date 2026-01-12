<template>
    <HeadSection />
    <WebMainPage />
</template>


<script>
    import { ref, onMounted } from "vue";
    import HeadSection from './Components/Header.vue'
    import WebMainPage from "./Components/WebMainPage.vue";
    export default {
        components: {
            HeadSection, WebMainPage
        },
        name : 'Index',
        // return {

        // }
    }
</script>