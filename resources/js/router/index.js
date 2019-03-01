import Vue from 'vue'
import Router from 'vue-router'
import { beforeEach } from './beforeEach'

import Home from '../components/pages/Home'

Vue.use(Router)

const router = new Router({
	mode: 'history',
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home
		}
	]
})

router.beforeEach(beforeEach)

export default router