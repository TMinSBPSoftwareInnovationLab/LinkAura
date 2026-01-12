<template>
  <div class="pb-20"> <!-- extra bottom padding so content doesn't hide behind footer -->
    <!-- Fixed Footer Navigation -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-300 shadow-md">
      <div class="flex overflow-x-auto md:justify-center">
        <button
          v-for="item in menuLists"
          :key="item.id"
          @click="scrollToSection(item.id)"
          class="flex flex-col items-center justify-center flex-shrink-0 w-20 py-2 hover:bg-gray-100"
        >
          <component :is="item.icon" class="w-6 h-6 text-teal-900" />
          <span class="text-xs text-gray-700">{{ item.label }}</span>
        </button>
      </div>
    </nav>
  </div>
</template>

<script setup>
    import { 
        HomeIcon,
        BriefcaseIcon, 
        ArchiveBoxIcon, 
        BanknotesIcon, 
        PhotoIcon, 
        StarIcon, 
        ChatBubbleBottomCenterIcon, 
        ArrowUturnRightIcon,
        Cog6ToothIcon,
        CubeIcon,
        TagIcon,
        ShoppingBagIcon,
        ShareIcon,
        EnvelopeIcon,
        DocumentTextIcon,
        PlayCircleIcon
    } from '@heroicons/vue/24/solid'

    const menuLists = [
        { id: 'home', label: 'HOME', icon: HomeIcon },
        { id: 'aboutus', label: 'ABOUT US', icon: BriefcaseIcon },
        { id: 'products', label: 'PRODUCTS', icon: ShoppingBagIcon },
        { id: 'services', label: 'SERVICE', icon: Cog6ToothIcon },
        { id: 'Videos', label: 'VIDEOS', icon: PlayCircleIcon },
        { id: 'gallery', label: 'GALLERY', icon: PhotoIcon },
        { id: 'payments', label: 'PAYMENTS', icon: BanknotesIcon },
        { id: 'enquiry', label: 'ENQUIRY', icon: DocumentTextIcon },
        { id: 'feedback', label: 'FEEDBACK', icon: EnvelopeIcon },        
        { id: 'shareMyDetails', label: 'SHARE', icon: ShareIcon }
    ]

    const scrollToSection = (id) => {
    const element = document.getElementById(id)
    if (element) {
        const topOffset = 2
        const y = element.getBoundingClientRect().top + window.scrollY - topOffset
        window.scrollTo({ top: y, behavior: 'smooth' })
    }
    }
</script>

<style>
    .no-scrollbar::-webkit-scrollbar { display: block; }
    .no-scrollbar { -ms-overflow-style: block; scrollbar-width: block; }
</style>
