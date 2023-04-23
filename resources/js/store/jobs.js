import axios from "axios"

export default {
    namespaced : true,
    state : {
        employerJobs : [],
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
            state.jobs=[...data]
        },
        PUSH_EMPLOYER_JOBS(state,data){
            state.employerJobs.push(...data)
        }
    },

    actions : {
        async getJobs({commit}){
            try{
                console.log('inside getjobs')
            let res = await axios.get('/api/myjobs')
            commit('SET_JOBS',res.data.data)
            }catch(err){
                console.log(err)
            }
        },
        async getEmployerJobs({commit}){
            try{
                console.log('inside getjobs')
            let res = await axios.get('/api/employer/jobs')
            // commit('PUSH_EMPLOYER_JOBS',res.data.data)
            }catch(err){
                console.log(err)
            }
        }
    }
}