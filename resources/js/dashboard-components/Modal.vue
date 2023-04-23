<template v-if="show">
    <!-- <form v-if="show"  @submit.prevent="add" id="form">
        
        <div class="fixed inset-0 bg-gray-600/75 w-screen grid place-items-center">
            <div class="bg-white p-6 w-[50vw] max-h-[450px]  max-w-[600px] rounded-xl">
                <header>
                    Add item
                </header>
                <main>
                    {{ job }}
                    <input type="hidden" name="_token"  :value="csrfToken" >
                    <div class="mb-6">
                        <input v-model="job.title" name="title" type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="title" >
                    </div>
                    <div class="mb-6">
                        <input v-model="job.job_type" name="job_type" type="text" id="job-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="job-type" >
                    </div>
                    <div class="mb-6">
                        <input v-model="job.status" name="status" type="text" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="status" >
                    </div>
                    <div class="mb-6">
                        <input v-model="job.contract_type" name="contract_type" type="text" id="contract-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contract_type" >
                    </div>
                    <div class="mb-6">
                        <input v-model="job.description" name="description" type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="description" >
                    </div>
                </main>
                <footer class="border-t-1 border-blue-400 p-2 flex justify-between">
                    <div  class="cursor-pointer px-4 py-2 rounded-[2em] bg-gray-300" @click="close">close</div>
                    <button type="submit" class="px-4 py-2 rounded-[2em] bg-blue-300"  >Add</button>
                </footer>
            </div>
        </div>
    </form> -->
<div class="fixed inset-0 bg-gray-400/50 grid  place-items-center ">
        <section class="bg-white dark:bg-gray-900 w-[50%] h-[80%] overflow-y-scroll">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 ">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new Job</h2>
                <form @submit.prevent="addJob(job)">
                    {{ job }}
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Title</label>
                            <input type="text" v-model="job.title" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                        </div>
                        <div class="w-full">
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Location</label>
                            <input type="text" v-model="job.location" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Job location" required="">
                        </div>
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Status</label>
                            <select v-model="job.status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected value="">Select status</option>
                                <option value="Accepting Applications">Accepting Applications</option>
                                <option value="Closed">Closed</option>                                
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="contactType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contract Type</label>
                            <select v-model="job.contract_type" id="contactType" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected value="">Select A Contract Type</option>
                                <option value="CDI">CDI</option>
                                <option value="CDD">CDD</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea v-model="job.description" id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                        </div>
                    </div>
                    <div class="flex mt-3  justify-between">
                        <button 
                            type="submit" class="text-white bg-gray-700 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                        Add Job
                        </button>
                        <button @click="close" type="button" class="text-black bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                        cancel
                        </button>
                    </div>
                </form>
            </div>
        </section>
</div>

</template>

<script setup>
import axios from 'axios';
import Echo from 'laravel-echo';
import { onMounted, reactive , ref, watch } from 'vue';
import { useStore } from 'vuex';

let userToken = ref(null)


let store = useStore()

let user = store.getters['auth/user']

let job = reactive({
    title :'',
    location :'',
    contract_type : '',
    status : '',
    description : ''
})

onMounted(()=>{
    window.Echo.channel('employerJob').listen('.JobWasCreated',(e)=>{
        store.dispatch('employerJobs/fetchJobs')
        console.log(e)
    })
})

   

    let emit = defineEmits([
        'close',
        'add'
    ])

    defineProps({
        show : Boolean,
    })

    let close = ()=>{
        emit('close')
    }

    let addJob = async(job)=>{
        await store.dispatch('employerJobs/storeJob',job)
    }



</script>