
// ----------------------------------------------------------------------------------------
import { createApp } from 'vue'
import router from "./router/index.js";
import axios from 'axios';
axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://127.0.0.1:8000'
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"
axios.defaults.headers.common["accept"] = "application/json"

import App from './App.vue'

createApp(App).use(router).mount('#app')

