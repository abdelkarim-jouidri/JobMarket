<template>
    <div  class="fixed inset-0 bg-gray-400/75 grid place-items-center">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Update Job
                            </h3>
                            <button 
                                @click="sendCloseUpdateModalEvent"    
                                type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="#">
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <input type="text" v-model="job.title" title="title" id="title"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                </div>
                                <div>
                                    <label for="job_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Type</label>
                                    <input type="text" :value="job.job_type" name="job_type" id="job-type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                </div>
                                <div>
                                    <label for="contract_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contract Type</label>
                                    <input type="text"  :value="job.contract_type" name="contract_type" id="contract-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                </div>
                                <div>
                                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="AA">Accepting applications</option>
                                        <option value="CL">Closed</option>
                                        
                                    </select>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <textarea id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >{{ job.description }}</textarea>                    
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 justify-center">
                                <button 
                                    @click.prevent="sendConfirmUpdateEvent"
                                    class="bg-orange-300 px-4 py-2 rounded-2xl hover:bg-orange-400 border-gray-500 border-2">
                                        Update
                                </button>
                            </div>
                            {{ job }}
                        </form>
                    </div>
                </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { reactive } from 'vue';

    defineProps({
        job : Object,
        show : Boolean
    })

    // let newJob = reactive({...job})

const emit = defineEmits(['confirmUpdate', 'closeUpdateModal'])

let sendCloseUpdateModalEvent = () => emit('closeUpdateModal')
let sendConfirmUpdateEvent = () => {
    console.log(job.value)
    // axios.put(`/dashboard/myjobs/${job ? job : ''}`, job?job:null)
    //         .then(response=>console.log(response.data))
    //         .catch(err=>console.log(err))
    // emit('confirmUpdate',job.id)
}


// setTimeout(()=>console.log(job.title),1000)
</script>