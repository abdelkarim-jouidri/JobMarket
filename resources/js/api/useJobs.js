import axios from "axios"
import { ref } from "vue"

export default function useJobs() {
    const jobs = ref([])
    const job = ref({})

    // console.log(job)

    const fetchJobs = async()=>{
        let res = await axios.get('/api/jobs')
        jobs.value = res.data.data
    }

    const createJob = async(job)=>{
        alert('reached create JOB')
        // console.log(job)
        return await axios.post('/api/jobs',job)
    }

    const fetchJob = async(id)=>{
        
        let res = await axios.get(`/api/jobs/${id}`)
                        .catch(err=>console.log(err))
        job.value = res.data.job
        return res.data.job
    }

    const updateJob = async(job)=>{
        // console.log(job)
        let res = await axios.put(`/api/jobs/${job.id}`,job).catch(err=>console.log(err))
        // console.log(res.response)
    }
    

    // console.log('from useJobs job : ',job)


    return {
        jobs , job , fetchJobs, fetchJob, createJob, updateJob
    }
}