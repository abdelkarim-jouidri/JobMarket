<template>
    <form v-if="show"  @submit.prevent="add" id="form">
        
        <div class="fixed inset-0 bg-gray-600/75 w-screen grid place-items-center">
            <div class="bg-white p-6 w-[50vw] max-h-[450px]  max-w-[600px] rounded-xl">
                <header>
                    Add item
                </header>
                <main>
                    {{ job }}
                    <!-- <h1>csrf : {{ csrfToken }}</h1> -->
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
    </form>
</template>

<script setup>
import axios from 'axios';
import { reactive , ref, watch } from 'vue';
import useJobs from '../api/useJobs';
const {createJob} = useJobs()

let job = reactive({
    title :'yes',
    job_type :'',
    contract_type : '',
    status : '',
    description : ''
})

   

    let emit = defineEmits([
        'close',
        'add'
    ])

    defineProps({
        show : Boolean,
        csrfToken : String
    })

    let close = ()=>{
        emit('close')
    }

    let add = async ()=>{
        await createJob(job)
            .then(res=>console.log(res))
            .catch(err=>console.log(err))
            emit('close')
        
    }

    function closeModal(){
        emit('close')
    }
</script>