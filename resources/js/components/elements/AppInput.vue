<template>
	<div class="form-group">
		<label :for="id" class="col-form-label">{{ name }}</label>
		<input
			:name="inputName"
			:type="inputType"
			v-bind="$attrs"
			:id="id"
			class="form-control"
			@input="$emit('input', $event.target.value)"
			v-model="inputValue"
			@keyup="clearValidation"
			:value="value"
			v-bind:class="{'is-invalid': validation[inputName]}"
		>
		<div class="invalid-feedback">
            <i class="fa fa-exclamation-circle fa-fw"></i>
            {{ validation[inputName] +'' }}
        </div>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'
import store from '../../store'

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
		clearValidation(){
			store.dispatch('clearValidateFor', this.inputName)
		},
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