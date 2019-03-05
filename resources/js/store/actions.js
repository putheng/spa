export const setValidationErrors = ({commit}, error) => {
	commit('setValidationErrors', error)
}

export const setErrors = ({commit}, error) => {
	commit('setErrors', error)
}

export const clearValidateFor = ({commit}, error) => {
	commit('clearValidateFor', error)
}

export const clearValidationErrors = ({commit}) => {
	commit('clearValidationErrors')
}