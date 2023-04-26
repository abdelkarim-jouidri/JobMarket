import axios from "axios"

export default {

    namespaced : true,
    state : {
        applications : [],
        application : {},
        isAlreadyApplied : null
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
        }
    },

    actions : {
        async fetchApplication({commit}){
            let res = await axios.get('/api/applications')
            commit('SET_APPLICATIONS',res.data.data)
        },

        async storeApplication({commit},payload){
            alert('store application triggered')
            console.log('from the application store',payload)
            let res = await axios.post('/api/applications',payload)
            
        },

        async isAlreadyApplied({commit},jobId){
           let res =  await axios.get(`/api/application/${jobId}`)
           commit('SET_ISALREADY_APPLIED',res.data.data)
        }


        

        
    }
}