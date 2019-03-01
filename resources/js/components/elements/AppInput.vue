<template>
	<div class="form-group">
		<div class="form-label-group">
			<input
				:name="inputName"
				:type="inputType"
				:id="id"
				class="form-control"
				@input="$emit('input', $event.target.value)"
			>
			<label :for="id">{{ name }}</label>
		</div>
	</div>
</template>

<script>
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
		}
	},
	data(){
		return {
			id: this.name.replace(/\s+/g, '_').toLowerCase(),
			inputType: this.type == 'email' ? 'text' : this.type,
			inputName: this.name.replace(/\s+/g, '_').toLowerCase()
		}
	}
}
</script>