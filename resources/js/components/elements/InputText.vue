<template>
	<div class="form-group">
		<div class="form-label-group">
			<input type="password" class="form-control" :class="{ 'is-invalid': validation.password }" id="fl7" v-model="form.password">
			<label for="fl7">Password</label>

			<div class="invalid-feedback" v-if="validation.password">
				<i class="fa fa-exclamation-circle fa-fw"></i> {{ validation.password[0] }} 
			</div>
		</div>
	</div>
</template>

<script>
	export default{
		props:{
			validation:{
				required: true,
				type: Object
			}
		}
	}
</script>