<template>
    <Head>
        <title inertia>{{ metaTitle }}</title>
        <meta name="description" :content="metaDescription" />
        <meta property="og:title" :content="metaTitle" />
        <meta property="og:description" :content="metaDescription" />
        <!-- <meta property="og:image" :content="metaImage" /> -->
    </Head>
    <HeadSection />
    <WebMainPage />
</template>


<script>
    import { router, Head } from '@inertiajs/vue3'
    import { ref, onMounted } from "vue";
    import HeadSection from './Components/Header.vue'
    import WebMainPage from "./Components/WebMainPage.vue";
    export default {
        name : 'Index',
        components: {
            HeadSection, WebMainPage
        },
        props: {
            metaTitle: String,
            metaDescription: String,
            metaImage: String
        },
        /* mounted() {
            console.log("metaTitle :", this.metaTitle);
        }*/
        // return {

        // }
    }
</script>