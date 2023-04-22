<template>
    <div class="flex flex-col gap-3">
        <NavBar></NavBar>
        <div class="grid place-items-center">
            <h1 class="font-bold mb-5">This is the explore jobs page</h1>
            <div class="grid flex-col gap-2">
                <button @click="getJobs">click me</button>
                <Job></Job>
                <Job></Job>
                <Job></Job>
            </div>
            <!-- <JobModal></JobModal> -->
        </div>
    </div>
</template>

<script setup>
import NavBar from '../dashboard-components/NavBar.vue';
import Job from '../components/jobs/Job.vue';
import JobModal from '../components/jobs/JobModal.vue';

    import { useStore } from 'vuex';
    import { computed, onMounted } from 'vue';

    let store = useStore()
    let jobs = computed(()=>store.getters['jobs/jobs']).value
    onMounted(()=>{
        store.dispatch('jobs/getJobs')
    })
    
</script>