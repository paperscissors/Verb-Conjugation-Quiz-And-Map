import Vue from 'vue'

export const store = {
  state: {
    correct_answers: [],
    reset: false,
  },
  addCorrect(tense) {
    Vue.set(this.state.correct_answers, tense, true)
  },
  // removeCorrect(tense) {
  //
  // },
  resetCorrect() {
    this.reset = true;
    this.state.correct_answers.splice(0, this.state.correct_answers.length)
    this.reset = false;
  }
};
