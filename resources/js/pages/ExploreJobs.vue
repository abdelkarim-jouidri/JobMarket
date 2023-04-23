<template>
    <div class="flex flex-col gap-3">
        <NavBar></NavBar>
        <div class="grid place-items-center p-6">
            <h1 class="font-bold mb-5">This is the explore jobs page</h1>
            <div class="grid flex-col gap-2 mb-8 w-full">
                <button @click="getJobs">click me</button>
                <Job 
                    v-for="job in jobs"
                    :job="job"
                    :key="job.id"></Job>
            </div>
            <button class="px-4 py-2 bg-gray-800 rounded-md text-white">Load More Jobs</button>
        </div>
    </div>
</template>

<script setup>
import NavBar from '../dashboard-components/NavBar.vue';
import Job from '../components/jobs/Job.vue';
import JobModal from '../components/jobs/JobModal.vue';
import { reactive, ref } from 'vue';

    import { useStore } from 'vuex';
    import { computed, onMounted } from 'vue';

    let store = useStore()
    let jobs = computed(()=>store.getters['jobs/jobs'])
    console.log('from explore jobs ', store.getters['jobs/jobs'])
    onMounted(()=>{
        store.dispatch('jobs/getJobs')
        Echo.channel('public').listen('Hello',(e)=>{
        
            store.dispatch('jobs/getJobs')
            // jobs.value = [...store.getters['jobs/jobs']]
            console.log('after the trigger of echo from explore jobs , jobs : ',jobs)
               
    })
    })
    
</script>