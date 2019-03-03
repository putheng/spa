<template>
  <div>
      <template v-if="step == 1">
        <form @submit.prevent="submit">
          <!-- .fieldset -->
            <div class="form-group">
                <label class="d-flex justify-content-between" for="lbl4">
                  <span>Question title (KH)</span>
                  <span class="text-muted">{{ titleKhLength  }} of 250 characters used</span>
                </label>
                <textarea v-model="form.titleKh" class="form-control" :class="{ 'is-invalid': validation.titleKh }" id="lbl4" rows="3" 
                placeholder="Label with description"></textarea>
                <div class="invalid-feedback" v-if="validation.titleKh">
                  <i class="fa fa-exclamation-circle fa-fw"></i> {{ validation.titleKh[0] }} 
                </div>
            </div>
            <!-- /.fieldset -->

            <!-- .fieldset -->
            <div class="form-group">
                <label class="d-flex justify-content-between" for="lbl5">
                  <span>Question title (EN)</span>
                  <span class="text-muted">{{ titleEnLength  }} of 250 characters used</span>
                </label>
                <textarea v-model="form.titleEn" class="form-control" :class="{ 'is-invalid': validation.titleEn }" id="lbl5" rows="3" 
                placeholder="Label with description"></textarea>
                <div class="invalid-feedback" v-if="validation.titleEn">
                  <i class="fa fa-exclamation-circle fa-fw"></i> {{ validation.titleEn[0] }} 
                </div>
            </div>
            <!-- /.fieldset -->
            <app-button type="submit">Submit</app-button>
          </form>
      </template>
      <template v-if="step == 2">

          <!-- .form -->
          <form @submit.prevent="submitAnswer">
            <!-- .fieldset -->
            <fieldset>
              <legend v-if="question.titleKh">{{ question.titleKh }}</legend>
              <!-- .form-group -->
              <p class="text-danger" v-if="error">{{ error }}</p>
              <input type="text" :value="question.id" v-model="answerKh.question">
              <div class="form-group" v-for="(item, index) in answerKh.answers" :key="index">
                <label class="d-flex justify-content-between" for="tfDefault">
                <span>Answer </span>
                  <a href="#" @click.prevent="removeKh(index)" class="mention">remove</a>
                </label>
                
                <input v-model="item.answer" type="text" class="form-control" id="tfDefault">
              </div>
              <!-- /.form-group -->
              <button class="btn btn-link" @click.prevent="addKh">Add another answer</button>
            </fieldset>
            <!-- /.fieldset -->

            <app-button type="submit">Next</app-button>
          </form>

      </template>
  </div>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'

  export default{
    props: ['action', 'answer'],
    data(){
      return {
        form: {
          titleKh: '',
          titleEn: ''
        },
        question: [],
        answerKh: {
          question: null,
          answers: [
            { answer : '' }
          ]
        },
        step: 1,
        validations: []
      }
    },
    methods: {
      addKh(){
        this.answerKh.answers.push({answer: ''})
      },
      removeKh(index){
        this.answerKh.answers.splice(index, 1)
      },
      submitAnswer(){
          this.submitQA({
            endpoint: this.answer,
            payload: this.answerKh,
            method: 'post'
          })
      },
      submit(){
        this.submitQA({
          endpoint: this.action,
          payload: this.form,
          method: 'post'
        }).then((response) => {
          this.step = 2
          this.question = response.data.data
        })
      },
      ...mapActions({
        submitQA: 'auth/login'
      })
    },
    computed: {
      titleKhLength(){
        return this.form.titleKh.length
      },
      titleEnLength(){
        return this.form.titleEn.length
      },
      ...mapGetters({
        validation: 'getValidationErrors',
        error: 'getError'
      })
    }
  }
</script>