<template>
  <header class="sticky top-0 z-50 bg-white shadow-md">
    <nav class="px-6 py-3 flex items-center justify-between">
      <!-- Left: Logo -->
      <div class="flex items-center space-x-2">
        <!-- <img src="/logo.png" alt="Logo" class="h-8 w-8" /> -->
        <span class="text-xl font-bold text-gray-800">
          <a href="#home">
            <img :src="defaultLogo" alt="defaultLogo" class="w-32 h-15 object-contain " />
          </a>
        </span>
      </div>

      <!-- Center: Desktop Nav -->
      <ul class="hidden md:flex space-x-6 font-medium">
        <li v-for="(item, i) in menuItems" :key="i">
          <a
            :href="item.link"
            class="relative px-4 py-2 text-gray-700 rounded-md transition-all duration-300 
                   before:absolute before:bottom-0 before:left-0 before:w-0 before:h-[3px] 
                   before:bg-gradient-to-r before:from-blue-500 before:to-purple-500 
                   before:transition-all before:duration-300 hover:before:w-full hover:text-blue-600"
          >
            {{ item.label  }}
          </a>
        </li>
      </ul>

      <!-- Right: Login + Mobile Menu Button -->
      <div class="flex items-center space-x-4">
        <router-link to="/login" target="_blank">
            <button class="bg-[#3d023a] text-white px-4 py-1 rounded-md hover:bg-[#3d023a] transition">
                Login
            </button>
        </router-link>

        <!-- Mobile Menu Button -->
        <button
          class="md:hidden text-gray-700 text-2xl focus:outline-none"
          @click="toggleMenu"
        >
          ☰
        </button>
      </div>
    </nav>

    <!-- Mobile Menu Drawer -->
    <transition name="slide" v-if="1==2">
      <div
        v-if="isMenuOpen"
        class="fixed top-0 left-0 w-64 h-full bg-[#3d023a] shadow-lg z-40 p-6 flex flex-col space-y-4"
      >
        <button
          class="text-center text-2xl bg-[#3d023a] outline-1 outline-[#DC143C] text-[#DC143C] w-8 h-8 mb-4 self-end rounded"
          @click="toggleMenu"
        >
          ✕
        </button>

        <ul class="flex flex-col space-y-4 font-medium">
          <li v-for="(item, i) in menuItems" :key="i">
            <a
              href="#"
              class="block px-4 py-2 rounded-md text-gray-100 hover:bg-gradient-to-r 
                     hover:bg-gradient-to-b from-[#910389] to-[#3d023a] hover:text-white transition-all duration-300"
              @click="toggleMenu"
            >
              {{ item }}
            </a>
          </li>
        </ul>
      </div>
    </transition>

    <transition name="slide">
      <div
        v-if="isMenuOpen"
        class="fixed top-0 left-0 w-64 h-full bg-[#3d023a] shadow-lg z-40 p-6 flex flex-col space-y-4"
      >
        <!-- Header with logo on left and close button on right -->
        <div class="flex items-center justify-between mb-4">
          <!-- Logo on left side with white background -->
          <div class="flex items-center bg-white p-2 rounded-lg shadow-3xl">
            <!-- Logo image -->
            <img :src="defaultLogo" alt="defaultLogo" class="w-15 h-15 object-contain" />
          </div>

          <!-- Close button on right side -->
          <button
            class="text-center text-2xl bg-[#3d023a] outline-1 outline-[#977895] text-[#fff] w-8 h-8 rounded flex items-center justify-center"
            @click="toggleMenu"
          >
            ✕
          </button>
        </div>

        <u class="h-[1px] bg-[#edd6eb]"></u>
        
        <ul class="flex flex-col space-y-4 font-medium">
          <li v-for="(item, i) in menuItems" :key="i">
            <a
              :href="item.link"
              class="block px-4 py-2 rounded-md text-gray-100
                    hover:bg-gradient-to-b from-[#910389] to-[#3d023a]
                    hover:text-white transition-all duration-300
                    border border-[#977895]"
              @click="toggleMenu"
            >
              {{ item.label }}
            </a>
          </li>
        </ul>
      </div>
    </transition>
  </header>
</template>



<script>
    import defaultLogo from '@/assets/images/commonImages/linkAura_logo.png'
    import { ref, computed, onMounted } from 'vue'
    export default {
        name: 'HeaderSection',

        setup(){
            const menuItems = ref([
              { label: "Home", link: "#home" },
              { label: "Features", link: "#feature" },
              { label: "How It Works", link: "#howItWork" },
              { label: "Templates", link: "#webTemp" },
              { label: "Pricing", link: "#pricing" },
            ]);

            const isMenuOpen = ref(false)
            const toggleMenu = () => (isMenuOpen.value = !isMenuOpen.value)

            return {
                menuItems,
                isMenuOpen,
                toggleMenu,
                defaultLogo
            }
        }
    }
</script>

<style scoped>
/* Slide-in animation for mobile drawer */
.slide-enter-active {
  transition: transform 0.3s ease;
}
.slide-leave-active {
  transition: transform 0.3s ease;
}
.slide-enter-from,
.slide-leave-to {
  transform: translateX(-100%);
}
</style>