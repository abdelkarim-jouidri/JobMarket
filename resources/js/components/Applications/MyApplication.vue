<template>
    <div class="flex border-t pt-4 gap-4 border-gray-300 w-full ml-4  items-start">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" class="h-8 css-1xqhio eac13zx0" style="fill: #4b5563;"><path fill-rule="evenodd" d="M3.5 3a.5.5 0 00-.5.5v17a.5.5 0 00.5.5H6v-6h5v6h9.5a.5.5 0 00.5-.5v-10a.5.5 0 00-.5-.5H14V3.5a.5.5 0 00-.5-.5h-10zM5 9h7v1H5V9zm7-3H5v1h7V6z" clip-rule="evenodd"></path></svg>
        </div>
         <div class="flex flex-col gap-3">
            <span class="font-semibold text-3xl ">
                <RouterLink :to="{ name: 'detailed-job', params: { id: application.job.id } }">

                    {{application.job.title}}
                </RouterLink>
            </span>
            <span class="font-semibold text-xl ">
                {{application.job.location}}
            </span>
            <span class="font-semibold ">
                {{application.job.status}}
            </span>
            <span class="text-red font-serif  text-gray-700"> applied on {{ formatDate(application.created_at) }}</span> 
         </div> 
    </div>

</template>

<script setup>
import { onMounted } from 'vue';
import { useStore } from 'vuex';

let store = useStore();
const props = defineProps({
    application : Object
})
let formatDate = (date)=> {
      const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric', 
     
      };
      return new Date(date).toLocaleString('en-US', options);
    }


</script>