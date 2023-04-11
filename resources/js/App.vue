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
                    Go to Jobs
                </router-link>
        
    
        </SideBar>
        <MainContent 
            
            >
            <RouterView 
                :data="data"
                @add="showModal=true"
                @close="()=>showModal=false"
                @delete="handle"
                @confirmDelete=""
                ></RouterView>
        </MainContent>
    </div>
    <Modal 
        :show="showModal"
        :csrfToken = csrfToken
        @close="close"
        @add="handle"
        >
    </Modal>
    <DeleteModal 
        @delete="handle"
        :showDeleteModal="showDeleteModal">

    </DeleteModal>
</template>

<script setup>

import NavBar from './components/NavBar.vue'
import SideBar from './components/SideBar.vue'
import MainContent from './components/MainContent.vue'
import Modal from './components/Modal.vue'
import DeleteModal from './components/DeleteModal.vue'
import { onMounted, ref, watch } from 'vue'
import axios from 'axios'

let csrfToken = ref(null);
let showModal = ref(false)
let data = ref(null)
let showDeleteModal = ref(false)

function handle(id){
    
        axios.delete(`/dashboard/myjobs/${id}`)
        .then(response=>console.log(response.data))
        .catch(err=>console.log(err.response.data))
       
        
    
}

onMounted(()=>{
    csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    setInterval(()=>{
        axios.get('/about')
          .then(response=> {
            data.value = response.data
            // console.log(data.value)
          })
          .catch(err=>console.log(err))
    },500)
})






let close = ()=>{
    showModal.value = false
}
</script>

