<template>
	<form class="auth-form" :action="action" :method="method" @submit.prevent="submit">
		<div class="form-group">
			<div class="form-label-group">
				<input type="text" class="form-control" :class="{ 'is-invalid': validation.email }" id="fl8" v-model="form.email">
				<label for="fl8">Email</label>

				<div class="invalid-feedback" v-if="validation.email">
					<i class="fa fa-exclamation-circle fa-fw"></i> {{ validation.email[0] }} 
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="form-label-group">
				<input type="password" class="form-control" :class="{ 'is-invalid': validation.password }" id="fl7" v-model="form.password">
				<label for="fl7">Password</label>

				<div class="invalid-feedback" v-if="validation.password">
					<i class="fa fa-exclamation-circle fa-fw"></i> {{ validation.password[0] }} 
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="custom-control custom-control-inline custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="newsletter">
				<label class="custom-control-label" for="newsletter">
					Remember me
				</label>
			</div>
		</div>
		<!-- .form-group -->
		<app-button type="submit"> Sign UP</app-button>
		<!-- .form-group -->

		<!-- recovery links -->
		<p class="text-center text-muted mb-0">
			By creating an account you agree to the
			<a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
		</p>
		<slot/>
	</form>
</template>

<script>
import axios from 'axios'
import { mapActions, mapGetters } from 'vuex'

export default{
	name: 'signin',
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
			this.login({
				endpoint: this.action,
				payload: this.form,
				method: this.method
			}).then((response) => {
				if (response.data.success){
					return window.location.href = "/dashboard"
				}
			})
		},
		...mapActions({
			login: 'auth/login'
		})
	},
	computed: {
		...mapGetters({
			validation: 'getValidationErrors',
			error: 'getError'
		})
	}
}
</script>