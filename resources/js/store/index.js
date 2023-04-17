import axios from "axios";
import { createStore } from "vuex";

export default createStore({
    state(){
        return {
            authenticated : false,
            user : null
        }
    },

    getters:{
        authenticated(state){
            return state.authenticated
        },

        user(state){
            return state.user
        }
    },

    mutations : {
        SET_AUTHENTICATED(state , authenticated ){
            state.authenticated = authenticated
        },
        SET_USER(state,user){
            state.user = user
        }
    },

    actions : {
        async authenticate({commit}){
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
            await axios.post('/api/login',credentials)

            dispatch('authenticate')
        },

        async logout(){
            try{
                await axios.post('/api/logout')
                this.commit('SET_AUTHENTICATED',false)
                this.commit('SET_USER',null)
            }catch(err){
                console.log(err.response)
            }
        }
    }
})