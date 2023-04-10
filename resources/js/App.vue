<template>
    <NavBar></NavBar>
    <div class="flex container mx-auto overflow-x-scroll">
        <SideBar>
            
                <router-link 
                    exact-active-class="bg-gray-700 text-white" 
                    class="w-[80%] rounded-lg text-sm font-medium  hover:rounded-md hover:text-white hover:bg-gray-700 px-4 py-3 text-center text-gray-300" 
                    to="/" >
                    Go to Home
                </router-link>
                <router-link 
                    exact-active-class="bg-gray-700 text-white" 
                    class="w-[80%] rounded-lg text-sm font-medium  hover:rounded-md hover:text-white hover:bg-gray-700 px-4 py-3 text-center text-gray-300" 
                    to="/about" >
                    Go to About
                </router-link>
            
            <!-- <li class="text-sm font-medium  hover:rounded-md hover:text-white hover:bg-gray-700 px-4 py-3 text-center text-gray-300">
                <router-link to="/about" exact-active-class="bg-gray-200 text-black">Go to About</router-link>
            </li> -->
            <!-- <router-link to="/" exact-active-class="bg-gray-200 text-black">Go to Home</router-link>
            <router-link to="/about" exact-active-class="bg-gray-200 text-black">Go to About</router-link> -->

    
        </SideBar>
        <MainContent>
            <RouterView></RouterView>
        </MainContent>
    </div>
</template>

<script setup>
import NavBar from './components/NavBar.vue'
import SideBar from './components/SideBar.vue'
import MainContent from './components/MainContent.vue'
</script>