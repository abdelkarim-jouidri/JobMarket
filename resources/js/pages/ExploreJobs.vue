<template>
    <div class="flex flex-col gap-3">
        <NavBar></NavBar>
        
        <RouterView
            :jobs="jobs"
            >
        </RouterView>
    </div>
</template>

<script setup>
import NavBar from '../dashboard-components/NavBar.vue';
import Job from '../components/jobs/Job.vue';
import JobModal from '../components/jobs/JobModal.vue';
// import { reactive, ref } from 'vue';

//     import { useStore } from 'vuex';
//     import { computed, onMounted } from 'vue';

//     let store = useStore()
//     let jobs = computed(()=>store.getters['jobs/jobs'])
//     console.log('from explore jobs ', store.getters['jobs/jobs'])
//     onMounted(()=>{
//         store.dispatch('jobs/getJobs')
//         Echo.channel('public').listen('Hello',(e)=>{
        
//             store.dispatch('jobs/getJobs')
//             // jobs.value = [...store.getters['jobs/jobs']]
//             console.log('after the trigger of echo from explore jobs , jobs : ',jobs)
               
//     })
//     })
    
</script>