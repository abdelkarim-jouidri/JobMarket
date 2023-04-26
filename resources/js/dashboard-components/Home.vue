

<template>
    <div 
    id="main-content" class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 table-responsive">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 table-responsive">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg table-responsive">
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                <thead class="bg-gray-50">
                    <tr >
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Candidate's Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Job title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Applied on
                    </th>
                   
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        PDF
                    </th>
                    
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="application in applications">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900"> {{application.user.name}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ application.job.title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900"></div>
                        </td>
                        
                        
                    </tr>


                </tbody>
                </table>
            </div>
        </div>
    </div>

    <div 
    
    id="loader">
        <div
        class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
        role="status">
            <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
    </div>
    {{ applications }}
</template>

<script setup>
import { computed } from '@vue/reactivity';
import { onMounted } from 'vue';
import { useStore } from 'vuex';

let store = useStore()
let applications = computed(()=>store.getters['applications/applicationsForEmployerJobs']);

onMounted(async ()=>{
    let res = await store.dispatch('applications/fetchApplicationsForEmployer')
})


</script>