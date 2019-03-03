import axios from 'axios'
import store from './store'

axios.interceptors.response.use((response) => {
	return response
}, (error) => {
	if(error.response.status === 422){
		store.dispatch('setValidationErrors', error.response.data.errors)
		store.dispatch('setErrors', error.response.data.message)
	}

	if(error.response.status === 500){
		store.dispatch('setErrors', "Status Code: 500, look like something went wrong. please try again later or report to your system administrator.")
	}

	return Promise.reject(error)
})