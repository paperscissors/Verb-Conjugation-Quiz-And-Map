<template>
  <div class="quiz-item">
    <label>{{ pronoun }} </label> <input type="text" v-model="answer" class="quiz-text" :class="answerStatus" />
  </div>
</template>

<script>
export default {
  name: 'Answer',
  props: ['pronoun', 'conjugation'],
  data() {
    return {
      answer: null,
      status: null
    }
  },
  watch: {
    answer: function(val) {
      if (val == "") {
        this.status = null
      } else {

        var value = this.unorm.nfkd(val);
        var conjugation = this.unorm.nfkd(this.conjugation);

        if (conjugation.startsWith(value)) {
          this.status = "correct";
        } else {
          this.status = "incorrect";
        }
      }

    }
  },
  computed: {
    answerStatus() {
      return (this.status === null) ? '' : this.status;
    }
  }
}
</script>

<style scoped>
.quiz-item {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  display: grid;
  grid-template-columns: 1fr 4fr;
  align-items: center;
  margin-bottom: 5px;
  font-size: 22px;
}

.quiz-item input {
  font-size: 20px;
  outline: none;
}

.quiz-item .correct {
  border: 2px solid green;
  box-shadow: inset 0px 0px 0px 2px green;
}

.quiz-item .incorrect {
  border: 2px solid red;
  box-shadow: inset 0px 0px 0px 2px red;
}

.quiz-text {
  padding: 10px;

}
</style>
