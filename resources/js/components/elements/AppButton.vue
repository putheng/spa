<template>
	<div class="form-group">
		<button 
			class="btn btn-lg btn-primary btn-block" 
			:type="type">
			<span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			<slot/>
		</button>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default{
	props: {
		type: {
			required: true,
			type: String
		}
	},
	computed: {
		...mapGetters({
			loading: 'getLoading'
		})
	}
}
</script>