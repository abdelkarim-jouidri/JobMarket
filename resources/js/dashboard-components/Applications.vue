<template>
    <div class="w-full gap-8 h-full flex flex-col items-center mt-8">
        <MyApplication
            v-for="application in applications"
            :key="application.id"
            :application="application"
            >
            
        </MyApplication>
    </div>
    
</template>

<script setup>
import { onMounted } from 'vue';
import MyApplication from '../components/Applications/MyApplication.vue';
import { useStore } from 'vuex';
import { computed } from '@vue/reactivity';
let store = useStore();
let applications = computed(()=>store.getters['applications/applications'])
onMounted(()=>{
    store.dispatch('applications/fetchApplications')
})
</script>