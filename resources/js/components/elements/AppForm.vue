<template>
	<form class="auth-form" :action="action" :method="method" @submit.prevent="submit">
		<!-- .form-group -->
		{{ validation }}
		<!-- .form-group -->
		<app-input name="Email" type="email" v-model="form.email"></app-input>

		<!-- .form-group -->
		<app-input name="Pasword" type="password" v-model="form.password"></app-input>

		<!-- .form-group -->
		<app-button type="submit">
			<span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			Sign Up
		</app-button>
		<!-- /.form-group -->
		<slot/>
		<!-- /recovery links -->
	</form>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default{
	name: 'auth.signin',
	props: {
		action: {
			required: true,
			type: String
		},
		method: {
			required: false,
			type: String,
			default: 'post'
		}
	},
	computed: {
		...mapGetters({
			validation: 'auth/getValidationErrors',
			loading: 'auth/getLoading'
		})
	},
	data(){
		return {
			form: {
				email: null,
				password: null
			}
		}
	},
	methods: {
		submit(){
			this.login(this.form)
		},
		...mapActions({
			login: 'auth/login'
		})
	}
}
</script>