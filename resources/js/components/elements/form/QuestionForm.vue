<template>
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

<script>
  import { mapActions, mapGetters } from 'vuex'

  export default{
    props: ['action'],
    data(){
      return {
        form: {
          titleKh: '',
          titleEn: ''
        },
        validations: []
      }
    },
    methods: {
      submit(){
        this.submitQA({
          endpoint: this.action,
          payload: this.form,
          method: 'post'
        }).then((response) => {
          return window.location.href = `/dashboard/question/${response.data.data.id}/answer`
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
        validation: 'getValidationErrors'
      })
    }
  }
</script>