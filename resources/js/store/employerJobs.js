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
        SET_JOBS(state,data){
            state.jobs = [...data]
        },

        SET_JOB(state,data){
            state.job = data
        }
    },

    actions : {
        async fetchJobs({commit}){
            let res = await axios.get('/api/employer/jobs')
            commit('SET_JOBS',res.data.data)
        },

        async storeJob({commit},payload){
            let res = await axios.post('/api/employer/jobs',payload)
            console.log(res.status)
        },

        async fetchJob({commit},id){
            let res = await axios.get(`/api/jobs/${id}`)
            console.log(res.data.job)
        },

        async deleteJob({commit},id){
            let res = await axios.delete(`api/jobs/${id}`)
            console.log(res)
        }
    }
}