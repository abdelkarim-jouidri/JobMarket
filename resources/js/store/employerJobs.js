import axios from "axios"

export default {

    namespaced : true,
    state : {
        jobs : [],
        job : {}
    },

    getters : {
        jobs(state){
            return state.jobs
        }
    },

    mutations : {
        PUSH_JOBS(state,data){
            state.jobs.push(...data)
        },

        SET_JOB(state,data){
            state.job = data
        }
    },

    actions : {
        async fetchJobs({commit}){
            alert('fetch jobs triggered')
            let res = await axios.get('/api/employer/jobs')
            commit('PUSH_JOBS',res.data.data)
        },

        async storeJob({commit},payload){
            let res = await axios.post('/api/employer/jobs',payload)
            console.log(res.status)
        }
    }
}