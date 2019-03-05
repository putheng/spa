<template>

  <!-- .form -->
  <form @submit.prevent="submitAnswer">
    <!-- .fieldset -->
    <fieldset>
    	<legend>{{ question.titleKh }}</legend>
    	{{ question }}
      <!-- .form-group -->
      <p class="text-danger" v-if="error">{{ error }}</p>
      <div class="form-group" v-for="(item, index) in answerKh.answers" :key="index">
        <label class="d-flex justify-content-between" for="tfDefault">
        <span>Answer </span>
          <a href="#" @click.prevent="removeAnswer(index)" class="mention">remove</a>
        </label>
        
        <input v-model="item.answer" type="text" class="form-control" id="tfDefault" v-bind:class="{'is-invalid': validate['answers.' + index + '.answer']}">
        
        	<div class="invalid-feedback">
                <i class="fa fa-exclamation-circle fa-fw"></i>
                {{ validate['answers.' + index + '.answer'] }} 
            </div>
      </div>
      <!-- /.form-group -->
      <button class="btn btn-link" @click.prevent="addAnswer">Add another answer</button>
    </fieldset>
    <!-- /.fieldset -->

    <app-button type="submit">Next</app-button>
  </form>

</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default{
	props: ['data'],
	data(){
		return {
	        answerKh: {
	          answers: [
	            { answer : '' }
	          ]
	        },
	        question: {},
    	}
	},
	methods: {
		addAnswer(){
	        this.answerKh.answers.push({answer: ''})
	    },
	    removeAnswer(index){
	        this.answerKh.answers.splice(index, 1)
	    },
	    submitAnswer(){
	        this.submitQA({
	            endpoint: `/dashboard/question/${this.question.id}/answer`,
	            payload: this.answerKh,
	            method: 'post'
	        }).then((response) => {
	          	console.log(response.data)
	        })
	    },
	    ...mapActions({
	      	submitQA : 'auth/login'
	    })
	},
	computed:{
		...mapGetters({
			error: 'getError',
			validate: 'getValidationErrors'
		})
	},
	mounted(){
		this.question = this.data
	}
}
</script>