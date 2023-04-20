import {createRouter, createWebHistory } from "vue-router";
import Home from "../dashboard-components/Home.vue";
import About from "../dashboard-components/About.vue"
import Dashboard from "../pages/Dashboard.vue"
import Login from '../pages/Login.vue'
import Homey from '../pages/Homey.vue'
import Register from '../pages/Register.vue'
import ExploreJobs from '../pages/ExploreJobs.vue'
import store from "../store";

const routes = [
    {
        path : '/explorejobs',
        name : 'explore-jobs',
        component : ExploreJobs
    }
    ,
    {
        path : "/dashboard",
        name : "dashboard",
        component : Dashboard,
        beforeEnter : (to, from, next)=>{
            if(!store.getters.authenticated){
                return next({name:'login'})
            }
            return next()
        }
        ,
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