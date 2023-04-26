import axios from "axios"

export default {

    namespaced : true,
    state : {
        applications : [],
        application : {},
        isAlreadyApplied : null,
        applicationsForEmployerJobs : []
    },

    getters : {
        applications(state){
            return state.applications
        },

        application(state){
            return state.application
        },
        isAlreadyApplied(state){
            return state.isAlreadyApplied
        },
        applicationsForEmployerJobs(state){
            return state.applicationsForEmployerJobs
        }
    },

    mutations : {
        SET_APPLICATIONS(state,data){
            state.applications = [...data]
        },

        SET_APPLICATION(state,data){
            state.application = data
        },
        SET_ISALREADY_APPLIED(state,data){
            state.isAlreadyApplied = data
        },

        SET_APPLICATIONS_FOR_EMPLOYER_JOBS(state,data){
            state.applicationsForEmployerJobs = [...data]
        }
    },

    actions : {
        async fetchApplications({commit}){
            let res = await axios.get('/api/applications')
            commit('SET_APPLICATIONS',res.data.applications)
        },

        async storeApplication({commit},payload){
            alert('store application triggered')
            console.log('from the application store',payload)
            let res = await axios.post('/api/applications',payload)
            
        },

        async isAlreadyApplied({commit},jobId){
           let res =  await axios.get(`/api/application/${jobId}`)
           commit('SET_ISALREADY_APPLIED',res.data.data)
        },

        async fetchApplicationsForEmployer({commit}){
            let res = await axios.get('/api/applications-by-employer')
            console.log('from applications ', res.data.data)
            commit('SET_APPLICATIONS_FOR_EMPLOYER_JOBS',res.data.data)
        },


        

        
    }
}