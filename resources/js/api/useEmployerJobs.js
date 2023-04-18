import axios from "axios"
import { ref } from "vue"

export default function useEmployerJobs() {
    const employerJobs = ref([])
 

    const fetchEmployerJobs = async()=>{
        let res = await axios.get('/api/employer/jobs')
        employerJobs.value = res.data.jobs
    }

   


    return {
        employerJobs  , fetchEmployerJobs
    }
}