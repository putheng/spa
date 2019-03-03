<template>
	<form class="auth-form" :action="action" :method="method" @submit.prevent="submit">
		{{ validation }}
		<ul>
			<li v-for="(item, index) in children" :key="index">{{ item.type }}</li>
		</ul>
		{{ form }}
		<slot/>
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
			validation: 'getValidationErrors'
		})
	},
	data(){
		return {
			form: {
				email: "putheng",
				password: 'password'
			},
			children: []
		}
	},
	methods: {
		submit(){
			
			this.form = Object.keys(this.children).map((key) => {
				return {
					[this.children[key].inputName] : this.children[key].inputValue
				}
			})

			console.log(this.form)

			this.sendRequest({
				endpoint: this.action,
				payload: this.form,
				method: this.method
			})
		},
		...mapActions({
			sendRequest: 'auth/login'
		})
	},
	created(){
		this.children = this.$children
	}
}
</script>