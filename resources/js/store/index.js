import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import auth from './modules/auth'

import state from './state'
import * as actions from './actions'
import * as mutations from './mutations'
import * as getters from './getters'

export default new Vuex.Store({
	state,
	actions,
	mutations,
	getters,
	modules:{
		auth
	}
})
