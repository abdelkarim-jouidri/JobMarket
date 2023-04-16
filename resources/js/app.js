
// ----------------------------------------------------------------------------------------
import { createApp } from 'vue'
import store from './store';
import router from "./router/index.js";
import axios from 'axios';
axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://127.0.0.1:8000'
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"
axios.defaults.headers.common["accept"] = "application/json"

import App from './App.vue'

store.dispatch('authenticate').then(()=>{
    createApp(App).use(router).use(store).mount('#app')

})
