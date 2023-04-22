import axios from "axios";
import { createStore } from "vuex";

export default {
    namespaced : true,
    state(){
        return {
            authenticated : false,
            user : null,
            isEmployer : null,
            isCandidate : null

        }
    },

    getters:{
        authenticated(state){
            return state.authenticated
        },

        user(state){
            return state.user
        },
        isEmployer(state){
            return state.isEmployer
        },
        
        isCandidate(state){
            return state.isCandidate
        }
    },

    mutations : {
        SET_AUTHENTICATED(state , authenticated ){
            state.authenticated = authenticated
        },
        SET_USER(state,user){
            state.user = user
        },
        SET_EMPLOYER(state,user){
            state.isEmployer = user.isEmployer
        },
        SET_EMPLOYER(state,user){
            state.isCandidate = user.isCandidate
        }
    },

    actions : {
        async authenticate({commit}){
            console.log('inside authenticate function', this.state.user)
            return await axios.get('/api/user')
                        .then(response=>{
                            console.log(response.data)
                            commit('SET_AUTHENTICATED', true)
                            commit('SET_USER',response.data)
                        })
                        .catch(()=>{
                            commit('SET_AUTHENTICATED', false)
                            commit('SET_USER',null)

                        })
        },

        async login({dispatch},credentials){
            console.log(this)

           let res =  await axios.post('/api/login',credentials)
           
            console.log('after post to /api/login', res)
            
            return dispatch('authenticate')
            
        },

        async logout({commit}){
            // try{
            //     console.log(this)
            // }catch(err){
                //     console.log(err.response)
                // }
                
                await axios.post('/api/logout')
                commit('SET_AUTHENTICATED',false)
                commit('SET_USER',null)
        }
    }
}