import axios from "axios"
import { ref } from "vue"

export default function useJobs() {
    const jobs = ref([])

    const fetchJobs = async()=>{
        let res = await axios.get('http://127.0.0.1:8000/api/jobs')
        jobs.value = res.data.data
    }

    return {
        jobs , fetchJobs
    }
}