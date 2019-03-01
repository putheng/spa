import store from '../store'

export const beforeEach = () => {
	store.dispatch('clearValidationErrors')
}