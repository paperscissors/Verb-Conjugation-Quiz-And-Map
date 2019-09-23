<template>
  <div class="quiz-item">
    <label>{{ pronoun }} </label> <input type="text" v-model="answer" class="quiz-text" :class="answerStatus" :disabled="finished" ref="input"/> <div class="finished" v-if="finished">
      <img class="checked" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAQAAAAAYLlVAAAAAmJLR0QA/4ePzL8AAAFCSURBVGje7ZlBcoIwFEDfihvItFdxdF97MLHXKrrCVV10L6bXSBeVYkcSgvyEqf6fTYYA7xE+fyCAhobGZWS88YWN2AwbMrfAJiq8aYVbwGCZR53jBRbjHrbY6LfZy1CBy8FXarG0q1kNF6hFM/84XEDydgSfVwVUQAXkBHL2lNMJ5BywVFMJzPjA8snTNALX+KQCXfiEAt34ZAIufCIBNz6JgA+fQMCPFxDYUpH3lJ2DZ4/RAnsPoB8vINBM8fPgyRfLgW6FMLxQEl4rhOLFnoK/CuF4wcewVRiCF60DTc73Z360QvRz7eFXH6ES5lTewqQvpSqgAvcrsPv92ArtCQu0W0J7owTaRaryZoHdmEWqFcfzwe/nLeUNvQb/oiul/0TAYFlExS+xnNzDRZIfFmu3QEaBiQo/sfb9stHQeMT4BtYT6PPmgF2eAAAAAElFTkSuQmCC">
    </div>
  </div>
</template>

<script>

import { store } from "../store.js";

export default {
  name: 'Answer',
  props: ['pronoun', 'conjugation', 'tense_key'],
  data() {
    return {
      answer: null,
      status: null,
      finished: false,
      reset: store.state.reset
    }
  },
  watch: {
    reset: function(val) {
      if (val == true) this.answer = null;
    },
    answer: function(val) {

      if (val == "") {
        this.status = null
      } else {
        var value = val.normalize() //.normalize('NFD');
        var conjugation = this.conjugation.normalize() //this.conjugation.normalize('NFD');

        // val = toUnicode(value.replace('ț', 'ţ'))
        // .replace('\\u163a\\u21B', '\\u163a\\u163').normalize()
        // conjugation = toUnicode(conjugation.replace('ț', 'ţ'))
        // .replace('\\u163a\\u21B', '\\u163a\\u163').normalize(
        var collator = new Intl.Collator("ro", { sensitivity: "base" });

        if (collator.compare(value.substring(0, value.length), conjugation.substring(0,value.length)) == 0) {
          this.status = "correct";
        } else {
          this.status = "incorrect";
        }

        if (collator.compare(value, conjugation) == 0) {
          this.status = "correct";
          // this.$emit('answered', true);
          store.addCorrect(this.tense_key);
          
          if (this.tense_key < 6) {
            try {
              this.$refs.input.parentElement.nextElementSibling.getElementsByTagName('input')[0].focus();
            } catch (e) {
                //nada
            }

          }

          this.finished = true;
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
  grid-template-columns: 1fr 4fr 0.6fr;
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

.checked {
  width: auto;
  height: 35px;
  opacity: 0.6;
}

.quiz-text {
  padding: 10px;

}
</style>
