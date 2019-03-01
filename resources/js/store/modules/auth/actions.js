import axios from 'axios'

export const login = ({commit}, payload) => {
	commit('setLoading')
	return axios.post('http://renetslack.io/register', payload).then((response) => {
		commit('clearLoading')
	}).catch((error) => {
		commit('setValidationErrors', {
			type: 'login',
			errors: error.response.data
		})
	})
}