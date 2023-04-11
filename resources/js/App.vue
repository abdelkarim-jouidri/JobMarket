<template>
    <NavBar></NavBar>
    <div class="flex container mx-auto overflow-x-scroll">
        <SideBar>
            
                <router-link 
                    exact-active-class="bg-gray-700 text-white" 
                    class="w-[80%] rounded-lg text-sm font-medium  hover:rounded-md hover:text-white hover:bg-gray-700 px-4 py-3 text-center text-gray-300" 
                    to="/" >
                    Go to Home
                </router-link>
                <router-link 
                    exact-active-class="bg-gray-700 text-white" 
                    class="w-[80%] rounded-lg text-sm font-medium  hover:rounded-md hover:text-white hover:bg-gray-700 px-4 py-3 text-center text-gray-300" 
                    to="/about" >
                    Go to About
                </router-link>
        
    
        </SideBar>
        <MainContent 
            @add="showModal=true"
            @close="()=>alert('hi')">
            <RouterView></RouterView>
        </MainContent>
    </div>
    <Modal 
        :show="showModal"
        :csrfToken = csrfToken></Modal>
</template>

<script setup>

import NavBar from './components/NavBar.vue'
import SideBar from './components/SideBar.vue'
import MainContent from './components/MainContent.vue'
import Modal from './components/Modal.vue'
import { onMounted, ref } from 'vue'

let csrfToken = ref(null);

onMounted(()=>{
    csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
})

setTimeout(()=>{
console.log(csrfToken.value)

},3000)

let showModal = ref(false)

let close = ()=>{
    alert('hi')
}
</script>

