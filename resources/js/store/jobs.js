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
        }
    },

    actions : {
        async getJobs({commit}){
            try{
                console.log('inside getjobs')
            let res = await axios.get('/api/myjobs')
            console.log(res.data)

            }catch(err){
                console.log(err)
            }
        }
    }
}