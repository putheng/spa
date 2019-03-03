<template>
	<div class="form-group">
		<div class="form-label-group">
			<input
				:name="inputName"
				:type="inputType"
				v-bind="$attrs"
				:id="id"
				class="form-control"
				@input="$emit('input', $event.target.value)"
				v-model="inputValue"
				:value="value"
				:class="{ 'is-invalid': validation.errors }"
			>
			<label :for="id">{{ name }}</label>
		</div>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default{
	props: {
		name: {
			required: true,
			type: String
		},
		type: {
			required: false,
			type: String,
			default: 'text'
		},
		value: {
			required: false,
			type: String
		}
	},
	data(){
		return {
			id: this.formtedInputName(),
			inputType: this.formtedInputType() ,
			inputName: this.formtedInputName(),
			inputValue: this.value
		}
	},
	methods: {
		formtedInputType(){
			return this.type == 'email' ? 'text' : this.type
		},
		formtedInputName(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		}
	},
	computed: {
		...mapGetters({
			validation: 'getValidationErrors'
		})
	}
}
</script>