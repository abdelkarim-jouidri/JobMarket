import axios from "axios";

export default function useAuth (){
    const login = async ()=>{
        await axios.get('/api/login', credentials)
                    .then(()=>{

                    })
                    .catch()
    }

    return {
        login
    }
}