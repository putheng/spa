<template>
	<div class="form-group">
		<button 
			class="btn btn-lg btn-primary btn-block" 
			:type="type"><slot/>
		</button>
	</div>
</template>

<script>
export default{
	props: {
		type: {
			required: true,
			type: String
		}
	}
}
</script>