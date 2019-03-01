export const setValidationErrors = (state, {type, errors}) => {
	state.validation[type] = errors
	state.loading = false
}

export const setLoading = (state) => {
	state.loading = true
}

export const clearLoading = (state) => {
	state.loading = false
}