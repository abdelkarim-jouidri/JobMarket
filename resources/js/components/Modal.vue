<template>
    <form v-if="show" action="/dashboard/myjobs" method="post" >
        @csrf
        <div class="fixed inset-0 bg-gray-600/75 w-screen grid place-items-center">
            <div class="bg-white p-6 w-[50vw] max-w-[600px] rounded-xl">
                <header>
                    Add item
                </header>
                <main>
                    <div class="mb-6">
                        <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="title" >
                    </div>
                    <div class="mb-6">
                        <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="description" >
                    </div>
                    <div class="mb-6">
                        <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="something" >
                    </div>
                </main>
                <footer class="border-t-1 border-blue-400 p-2 flex justify-between">
                    <div  class="cursor-pointer px-4 py-2 rounded-[2em] bg-gray-300" @click="$emit('close')">close</div>
                    <button type="submit" class="px-4 py-2 rounded-[2em] bg-blue-300">Add</button>
                </footer>
            </div>
        </div>
    </form>
</template>

<script setup>
    defineProps({
        show : Boolean
    })
</script>