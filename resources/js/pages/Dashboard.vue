<template>
    <NavBar :user="user"></NavBar>
    <div class="flex container mx-auto overflow-x-scroll">
        <SideBar>
            
                <router-link 
                    exact-active-class="bg-gray-700 text-white" 
                    class="w-[80%] rounded-lg text-sm font-medium  hover:rounded-md hover:text-white hover:bg-gray-700 px-4 py-3 text-center text-gray-300" 
                    to="/dashboard" >
                    Go to Home
                </router-link>
                <router-link 
                    exact-active-class="bg-gray-700 text-white" 
                    class="w-[80%] rounded-lg text-sm font-medium  hover:rounded-md hover:text-white hover:bg-gray-700 px-4 py-3 text-center text-gray-300" 
                    to="/dashboard/about" >
                    Go to Jobs
                </router-link>
        
    
        </SideBar>
        <MainContent 
            
            >
            <RouterView 
                v-if="jobs"
                :data="jobs"
                @show-update="showUpdateModal"
                @add="showModal = true"
                @close="()=>showModal=false"
                @delete="handle"
                @confirmDelete=""
                ></RouterView>
            <div v-else role="status">
                <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </MainContent>
    </div>
    <Modal 
        :show="showModal"
        :csrfToken = csrfToken
        @close="showModal = false"
        @add-item="showModal = false"
        >
    </Modal>
    <DeleteModal 
        @delete="handle"
        @confirm-delete="confirmDelete"
        @close-delete-modal="showDeleteModal = false"
        :showDeleteModal="showDeleteModal">

    </DeleteModal>
    <Alert 
        :showAlert="showAlert"
        @close="showAlert = false"/>
    <UpdateModal 
        v-if="showUpdate"
        @close-update-modal="showUpdate = false"
        :job="currentJob"
        @confirm-update="confirmUpdate"
        />
        current job : {{ currentJob }}
</template>

<script setup>
import useJobs from '../api/useJobs'
import NavBar from '../dashboard-components/NavBar.vue'
import SideBar from '../dashboard-components/SideBar.vue'
import MainContent from '../dashboard-components/MainContent.vue'
import Modal from '../dashboard-components/Modal.vue'
import DeleteModal from '../dashboard-components/DeleteModal.vue'
import Alert from '../dashboard-components/Alert.vue'
import UpdateModal from '../dashboard-components/UpdateModal.vue'
import { onMounted, ref, watch } from 'vue'
import axios from 'axios'



let user = ref(null)
let csrfToken = ref(null);
let showModal = ref(false)
const {jobs, fetchJobs} = useJobs()
let showDeleteModal = ref(false)
let showAlert = ref(false)
let currentJobId = ref(null)
let currentJob = ref(null)
let showUpdate = ref(false)

function confirmUpdate(id){
    alert(id)
    axios.put(`/dashboard/myjobs/${id}`,{
        "message" : 'hi'
    })
        .then(response=>{
            console.log('inside put')
            console.log(response.data)
        })
        .catch(err=>console.log(err))
}



function showUpdateModal(id){
    currentJobId.value = id
    axios.get(`/dashboard/myjobs/${currentJobId.value}`)
          .then(response=>{
            currentJob.value = response.data.job
            showUpdate.value = true
            })
          .catch(err=>console.log(err))
}

function displayAddModal(){
    showModal.value=true
}

function handle(id){
    
        
        showDeleteModal.value = true
        currentJobId.value = id
    
}



onMounted(fetchJobs)



let confirmDelete = ()=>{
    axios.delete(`/dashboard/myjobs/${currentJobId.value}`)
        .then(response=>console.log(response.data))
        .catch(err=>console.log(err.response.data))
    showDeleteModal.value = false
    showAlert.value = true
    setTimeout(()=>showAlert.value = false , 3000)
}



</script>

