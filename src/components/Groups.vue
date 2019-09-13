<template>

  <div>

  <div class="groups">
    <template v-for="(group, key) in groups" >
      <div class="group-container"  :class="{ active: active == key+1 }" v-show="active == false || active == key+1" :key="key+1">

          <div :key="key+1" class="group" >
            <h2>{{ group.name }}</h2>
            <h4>{{ group.condition }}</h4>
            <p>
              <template v-for="(ending, ending_key) in group.endings">
              <span :key="ending_key">{{ ending }}<br /></span>
            </template>
            </p>
            <div class="nav no-float" v-if="verb == false && active">
              <button class="control" v-if="active !== false" @click="active = false; verb = false; quiz = false">Back to main</button>
            </div>
            <button v-if="!active" @click="activateGroup(key+1)">View verbs</button> <button v-if="!quiz" class="quiz-me" @click="quizMe(key+1)">Practice!</button>
          </div>

        <div class="verb-list" v-show="active == key+1">

          <div class="all-verbs" v-if="!verb && !quiz">
            <button v-for="(verb, verb_key) in groupVerbs(group.verbs)" :key="verb_key" @click="showConjugations(verb, key+1)">{{ verb.name }}</button>
          </div>

          <div class="conjugations" v-if="verb !== false">
            <div class="nav">
              <button class="control" v-if="active !== false" @click="verb = false">Back to {{ group.name }}</button>
            </div>
            <h1>{{ verb.name }}</h1>
              <p class="conjugation" :key="conj_key" v-for="(conjugation, conj_key) in verb.conjugations">{{ pronouns[conj_key] + " " + conjugation }}</p>
          </div>

          <div v-if="quiz">
            <h3 class="quiz-header" style="margin-top: 0px; margin-bottom: 23px;">Conjugation Practice <span style="font-size: 28px; margin-top: -7px;">a {{ active_quiz.name }}</span> <span style="margin-left:15px; font-weight: 400; text-align: right;">{{ quiz_step}}/10</span></h3>


            <div class="quiz-items">
              <template v-for="(tense, tense_key) in active_quiz.conjugations">
                <Answer :pronoun="pronouns[tense_key]" :conjugation="tense" v-bind:key="'answer_'+tense_key" />
              </template>
            </div>

            <button @click="goToNext" v-if="quiz_step < 10">Next</button>
            <button v-if="quiz_step == 10" @click="verb = false; quiz = false; active_quiz = null; quiz_step = 1">Back to {{ group.name }}</button>
            <button @click="finishQuiz" v-if="quiz_step == 10">Practice again!</button>

          </div>
        </div>
      </div>
    </template>
  </div>
  </div>
</template>

<script>
import Answer from './Answer.vue'

function randomNoRepeats(array) {
  var copy = array.slice(0);
  return function() {
    if (copy.length < 1) { copy = array.slice(0); }
    var index = Math.floor(Math.random() * copy.length);
    var item = copy[index];
    copy.splice(index, 1);
    return item;
  };
}

export default {
  name: 'Groups',
  components: {
    Answer
  },
  props: ['groups'],
  data: function () {
    return {
      active: false,
      quiz: false,
      quiz_step: 1,
      quizzed_verbs: null,
      verb: false,
      active_quiz: null,
      active_quiz_answers: [
        '', '', '', '', '', ''
      ],
      pronouns: [
        'eu', 'tu', 'el/ea', 'noi', 'voi', 'ei/ele'
      ]
    }
  },
  methods: {
   activateGroup: function(key) {
      this.active = key
    },
    showConjugations: function(verb) {
      this.verb = verb
    },
    groupVerbs: function(verbs) {
      return this.$_.orderBy(verbs, 'name');
    },
    quizMe: function(group) {
      this.active = group;
      this.quiz = true;

      var active_group = this.groups[this.active-1];
      this.quizzed_verb = randomNoRepeats(active_group.verbs);

      this.active_quiz = this.quizzed_verb();
    },
    goToNext: function() {
      this.quiz_step++
      // var active_group = this.groups[this.active-1];
      // var verbs = active_group.verbs;
      // var selected = Math.floor(Math.random()*verbs.length);

      this.active_quiz = this.quizzed_verb();
    },
    finishQuiz: function() {}
  },
  computed: {

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.quiz-header {
  display: grid;
  grid-template-columns: 1.2fr 4fr 1fr;
  align-items: top;
}
.nav {
  float: right;
}

.quiz-items {
  width: 50%;
  margin-bottom: 18px;
}


.nav.no-float {
  float: none;
}
.nav button {
  display: inline-block
}
h1, h2 {
  margin-top: 0px;
}
.nav > button {
  margin-right: 5px;
  border: 0px;
  padding: 10px;
  background-color: #000 !important;
  color: #fff !important;
  transition: all .4s;
  transition-timing-function: ease-out;
}

.nav > button:hover {
  cursor: pointer;
  opacity: 0.6;

}
  div.groups {
    display: grid;
    grid-column-gap: 15px;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    height: 85vh;
  }

  .group-container.active {
    width: 97vw;
    display: grid;
    grid-column-gap: 15px;
    grid-template-columns: 2fr 8fr;
  }

  .verb-list {
    padding: 25px;

    background-color: #f3f3f3;
    transition: all .4s;
    transition-timing-function: ease-out;
    text-align: left;
  }

  .verb-list button, .group button {
    background: #fff;
    padding: 10px;
    font-size: 18px;
    margin-right: 10px;
    margin-bottom: 10px;
    border: 0px;
    border-radius: 0px;
    transition: all .4s;
    transition-timing-function: ease-out;
  }

  .verb-list button:hover {
    cursor: pointer;
    background-color: #c3c3c3;
    opacity: 0.6;

  }
  .conjugation {
    font-size: 28px;
    margin: 0px;
    margin-bottom: 5px;

  }

  div.group {
    text-align: left;
    padding: 25px;
    color: #000;
    background-color: #c3c3c3;
    transition: all .4s;
    transition-timing-function: ease-out;
  }

  div.group:hover {
    -webkit-box-shadow:inset 0px 0px 0px 10px #a3a3a3;
   -moz-box-shadow:inset 0px 0px 0px 10px #a3a3a3;
   box-shadow:inset 0px 0px 0px 10px #a3a3a3;
    cursor: pointer;
    opacity: 0.8;
    }

    div.group:active {
      opacity: 1;
      background-color: #a3a3a3;
      -webkit-box-shadow:inset 0px 0px 0px 10px #999;
     -moz-box-shadow:inset 0px 0px 0px 10px #999;
     box-shadow:inset 0px 0px 0px 10px #999;
    }

    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }

</style>
