import {createRouter, createWebHistory } from "vue-router";
import Home from "../dashboard-components/Home.vue";
import About from "../dashboard-components/About.vue"
import Dashboard from "../pages/Dashboard.vue"
import Login from '../pages/Login.vue'
import Homey from '../pages/Homey.vue'
import Register from '../pages/Register.vue'
import AppExample from '../pages/AppExample.vue'
// import X from '../pages/X.vue'

const routes = [
    // {
    //     path: "/dashboard",
    //     name: "home",
    //     component: Home,
    // },
    // {
    //     path: "/dashboard/about",
    //     name: "about",
    //     component: About,
    // },

    {
        path : "/dashboard",
        name : "dashboard",
        component : Dashboard,
        children : [
            {
                path : '/dashboard/about',
                name : "about",
                component : About
            },
            {
                path : '/dashboard/home',
                name : "home",
                component : Home
            }
        ]
    },
    {
        path : '/',
        name : 'homey',
        component : Homey
    },
    {
        path : '/login',
        name : 'login',
        component : Login
    },
    {
        path : '/register',
        name : 'register',
        component : Register
    },
 
    
   
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;