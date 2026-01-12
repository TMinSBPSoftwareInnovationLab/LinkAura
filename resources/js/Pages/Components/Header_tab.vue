<template>
    <div class="grid">
        <div class="p-1 md:p-3 bg-white border border-l-4 border-l-[#000b57] border-t-0 border-r-0 border-b-0">
            <p class="font-bold">Hi, {{ greeting }}</p>
            <p class="font-mono text-[12px] md:text-[14px] lg:text-[16px]">{{ slogan }}</p>
        </div>
    </div>
</template>

<script>
    import {ref, onMounted} from "vue"
    export default {
        name: 'HeaderTab',
        setup(){
            const greeting = ref("");
            const slogan = ref("");

            // all functions
            function setGreeting() {
                const hour = new Date().getHours();

                if (hour >= 5 && hour < 12) {
                    greeting.value = "Good Morning 🌅";
                    slogan.value = "Start your day with confidence — success follows action!";
                } 
                else if (hour >= 12 && hour < 17) {
                    greeting.value = "Good Afternoon ☀️";
                    slogan.value = "Keep going — every effort you make counts!";
                } 
                else if (hour >= 17 && hour < 21) {
                    greeting.value = "Good Evening 🌇";
                    slogan.value = "You did great today — keep building your dreams!";
                } 
                else {
                    greeting.value = "Good Night 🌙";
                    slogan.value = "Rest well — tomorrow is another chance to shine!";
                }
            }

            // on mount functions
            onMounted(() => {
                setGreeting();
            });

            return {
                greeting,
                setGreeting,
                slogan,
            }
        }
    }
</script>