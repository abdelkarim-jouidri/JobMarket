<template>
    <div class="primary  flex-1 flex justify-center items-center  mr-6 ">
        <button class="bg-blue-300 px-6 py-2 hover:bg-blue-500 rounded-lg" @click="$emit('add')">Add</button>
        <slot></slot>
 
    </div>
</template>

<script>
import { emit } from 'process';


</script>