<template>
    <div class="max-w-[430px] mx-auto mt-3  bg-gradient-to-r from-[#000b58] via-[#001a8c] to-[#000b58] 
            rounded-xl shadow-lg p-4 text-center">

        <p class="text-gray-200 text-xs font-medium leading-relaxed">
            © {{ new Date().getFullYear() }} 
            <span class="font-semibold text-white">LinkAura</span>,  
            a Digital Mini-Website & Smart Card Platform.  
            All Rights Reserved.
        </p>

        <div class="my-3 border-t border-white/30"></div>

        <a href="https://linkaura.co.in/" 
        target="_blank"
        class="inline-block text-sm font-semibold text-white 
                hover:text-yellow-300 transition duration-300">
            Visit LinkAura Website →
        </a>

    </div>
</template>

<script>
    export default {
        name: "linkAuraFoot"
    }
</script>