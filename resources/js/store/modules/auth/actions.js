import axios from 'axios'

export const login = ({commit}, payload) => {
	commit('setLoading', '', {root:true})

	return axios.post('http://renetslack.io/api/register', payload).then((response) => {
		
		commit('clearValidationErrors', '', {root:true})
		return Promise.resolve(response)
	})
}