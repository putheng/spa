export const setValidationErrors = ({commit}, error) => {
	commit('setValidationErrors', error)
}

export const clearValidationErrors = ({commit}) => {
	commit('clearValidationErrors')
}