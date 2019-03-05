import axios from 'axios'

export const login = ({commit}, {endpoint, payload, method}) => {
	commit('clearValidationErrors', '', {root:true})
	commit('setLoading', '', {root:true})
	
	return axios({ method: method, url: endpoint, data: payload }).then((response) => {
		commit('clearValidationErrors', '', {root:true})
		return Promise.resolve(response)
	})
}