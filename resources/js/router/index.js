import {createRouter, createWebHistory } from "vue-router";
import Home from "../dashboard-components/Home.vue";
import MyJobs from "../dashboard-components/MyJobs.vue"
import Dashboard from "../pages/Dashboard.vue"
import Login from '../pages/Login.vue'
import LandingPage from '../pages/LandingPage.vue'
import Register from '../pages/Register.vue'
import ExploreJobs from '../pages/ExploreJobs.vue'
import ExploreProfiles from '../pages/ExploreProfiles.vue'
import Profile from '../dashboard-components/Profile.vue'
import Applications from '../dashboard-components/Applications.vue'
import AllJobs from '../components/jobs/AllJobs.vue'
import DetailedJob from '../components/jobs/DetailedJob.vue'
import Example from '../components/jobs/Example.vue'
import store from "../store";

const routes = [
    {
        path : '/exploreprofiles',
        name : 'explore-profiles',
        component : ExploreProfiles
    }
    ,
    {
        path : '/explorejobs',
        name : 'explore-jobs',
        component : ExploreJobs,
        redirect : '/explorejobs/all',
        children : [
            {
                path : '/explorejobs/:id',
                name : 'detailed-job',
                component : DetailedJob,
                props : true
        
            },
            {
                path : '/explorejobs/example',
                name : 'example',
                component : Example
        
            }
            ,
            {
                path : '/explorejobs/all',
                name : 'explore-job',
                component : AllJobs
        
            }
        ]
        
    },
    
    {
        path : "/dashboard",
        name : "dashboard",
        component : Dashboard,
        meta : {exact:false}
        ,
        beforeEnter : (to, from, next)=>{
            if(!store.getters.authenticated){
                return next({name:'login'})
            }
            return next()
        }
        ,
        children : [
            {
                path : '/dashboard/myjobs',
                name : "myjobs",
                component : MyJobs
            },
            {
                path : '/dashboard/home',
                name : "home",
                component : Home
            },
            {
                path : '/dashboard/myprofile',
                name : "myprofile",
                component : Profile
            },
            {
                path : '/dashboard/myapplications',
                name : "myapplications",
                component : Applications
            }
        ]
    },
    
    {
        path : '/',
        name : 'LandingPage',
        component : LandingPage
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