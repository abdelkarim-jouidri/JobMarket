<template>
    <div class="min-w-[40%] flex justify-center">
            
        <div class="w-full max-w-xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{ job.title }}</h5>
            <div class="flex items-baseline text-gray-900 dark:text-white">
                
            </div>
            <!-- List -->
            <ul role="list" class="space-y-5 my-7">
                <li class="flex space-x-3">
                    <!-- Icon -->
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{ job.contract_type }}</span>
                </li>
                <li class="flex space-x-3">
                    <!-- Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{ job.location }}</span>
                </li>
            </ul>
            <div class="p-2 border-t border-gray-400">
                <span>
                    {{ job.description.slice(0,200)+' ...' }}
                </span>
            </div>
            <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">View Job</button>
        </div>

    </div>
</template>

<script setup>
defineProps({
    job : Object
})
</script>

