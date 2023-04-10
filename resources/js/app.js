// import './bootstrap';

// const Home = { 

//     template: `

// <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
//     <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
//         <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
//             <table class="min-w-full divide-y divide-gray-200">
//             <thead class="bg-gray-50">
//                 <tr>
//                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
//                     Job's title
//                 </th>
//                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
//                     Contract type
//                 </th>
//                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
//                     Job type
//                 </th>
//                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
//                     Description
//                 </th>
//                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
//                     Status
//                 </th>
//                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
//                     Actions
//                 </th>
                
//                 </tr>
//             </thead>
//             <tbody class="bg-white divide-y divide-gray-200">
//                 <tr>
//                 <td class="px-6 py-4 whitespace-nowrap">
//                     <div class="text-sm font-medium text-gray-900">Project A</div>
//                 </td>
//                 <td class="px-6 py-4 whitespace-nowrap">
//                     <div class="text-sm font-medium text-gray-900">PRJ-A</div>
//                 </td>
//                 <td class="px-6 py-4 whitespace-nowrap">
//                     <div class="text-sm font-medium text-gray-900">John Doe</div>
//                 </td>
//                 <td class="px-6 py-4 whitespace-nowrap">
//                     <div class="text-sm font-medium text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
//                 </td>
//                 <td class="px-6 py-4 whitespace-nowrap">
//                     <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
//                     Active
//                     </span>
//                 </td>
//                 <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-4">
//                     <a href="#" class="text-indigo-600 hover:text-indigo-900">
//                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" style="height : 22px;">
//                             <path strokeLinecap="round" strokeLinejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
//                         </svg>

//                     </a>
                
//                     <a href="#" class="text-red-600 hover:text-red-900">
//                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" style="height : 22px;">
//                             <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
//                         </svg>

//                     </a>
//                 </td>
//                 </tr>


//             </tbody>
//             </table>
//         </div>
//     </div>
// </div>

//     `
    
// }
// const About = { template: '<div class="text-red-300 font-bold">About</div>' }


// const routes = [
//   { path: '/', component: Home },
//   { path: '/about', component: About },
// ]


// const router = createRouter({
//   history: VueRouter.createWebHashHistory(),
//   routes, 
// })

// const Modal = {
//     template : `
//         <div  v-if="showModal" class="bg-gray-300/75 inset-0 fixed grid place-items-center">
//             <div class="bg-white p-6 max-w-[600px]  w-[60vw]">
//                 <header>
//                     this is the header section
//                 </header>
//                 <p>
//                     {{msg}}
//                 </p>
//                 <main>
//                     this is the main section
//                 <main>

//                 <footer>
//                     this is the footer section
//                 <footer>
//             </div>
//         </div>
//     `,

//     props : {
//         showModal : Boolean,
//         msg : String
//     },

//     data(){
//         return {
//             msg : 'yes'
//         }
//     },

//     methods : {
//         showAlert(){
//             alert('hi')
//         }
//     }
// }

// const app = Vue.createApp({
//     data(){
//         return  {
//             showModal : false,
//             msg : 'message'
//         }
//     },

//     components : {
//         Modal
//     },

//     methods : {
//         // showAlert(){
//         //     alert(this.msg)
//         // },
//         toggleModal(){
//             this.showModal = true
//             this.msg += 'another message'
//             alert(this.msg)
//             console.log('showModal : ', this.showModal)
//         }
//     }
// })

// app.use(router)

// app.mount('body')

// ----------------------------------------------------------------------------------------
import { createApp } from 'vue'
import router from "./router/index.js";

// import {VueRouter} from 'vue-router'
import Home from './components/Home.vue'
import About from './components/About.vue'
import App from './App.vue'

createApp(App).use(router).mount('#app')

alert('hi')
