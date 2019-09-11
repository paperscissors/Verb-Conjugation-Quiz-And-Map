<template>
  <div id="app">
    <h1>Present-tense Romanian Verb Groups</h1>
    <Groups :groups="groups"/>
  </div>
</template>

<script>
import Groups from './components/Groups.vue'
// import { data } from './data.json'

// window.console.log(data)


var all_groups = [
  {
      name:'Type 1',
      condition:'Ends with -a',
      endings:[
          '-',
          '+i',
          '+ă',
          '+ăm',
          '+ați',
          '+ă'
        ],
      verbs:[
        {
          name: 'învăţa',
          conjugations: [
          'învaț',
          'înveți',
          'învață',
          'învațăm',
          'învațați',
          'îvață'
        ]},
        {
          name: 'cânta',
          conjugations: [
          'cânt',
          'cânți',
          'cântă',
          'cântăm',
          'cântaţi',
          'cântă'
        ]},
        {
          name: 'asculta',
          conjugations: [
          'ascult',
          'asculți',
          'ascultă',
          'ascultăm',
          'ascultați',
          'ascultă'
        ]},
        {
          name: 'câștiga',
          conjugations: [
          'câștig',
          'căștigi',
          'câștigă',
          'câștigăm',
          'câștigați',
          'câștigă'
        ]},
        {
          name: 'încerca',
          conjugations: [
          'încerc',
          'încerci',
          'încercă',
          'încercăm',
          'încercăți',
          'încercă'
        ]},
        {
          name: 'schimba',
          conjugations: [
          'schimb',
          'schimbi',
          'schimbă',
          'schimbăm',
          'schimbăți',
          'schimbă'
        ]},
        {
          name: 'suna',
          conjugations: [
          'sun',
          'suni',
          'sună',
          'sunăm',
          'sunați',
          'sună'
        ]},
        {
          name: 'prefera',
          conjugations: [
          'prefer',
          'preferi',
          'preferă',
          'preferăm',
          'preferați',
          'preferă'
        ]},
        {
          name: 'pleca',
          conjugations: [
          'plec',
          'pleci',
          'pleacă*',
          'plecăm',
          'plecați',
          'pleacă*'
        ]},
        {
          name: 'merita',
          conjugations: [
          'merit',
          'meriți',
          'merită',
          'merităm',
          'meritați',
          'merită'
        ]},
        {
          name: 'repara',
          conjugations: [
          'repar',
          'repari',
          'repară',
          'reparăm',
          'reparați',
          'repară'
        ]},
        {
          name: 'striga',
          conjugations: [
          'strig',
          'strigi',
          'strigă',
          'strigăm',
          'strigați',
          'strigă'
        ]},
        {
        "name": "alerga",
        "conjugations": [
            "alerg",
            "alergi",
            "aleargă",
            "alergăm",
            "alergaţi",
            "aleargă"
        ]
    },
    {
        "name": "mânca",
        "conjugations": [
            "mănânc",
            "mănânci",
            "mănâncă",
            "mâncăm",
            "mâncaţi",
            "mănâncă"
        ]
    },
    {
        "name": "recomanda",
        "conjugations": [
            "recomand",
            "recomanzi",
            "recomandă",
            "recomandăm",
            "recomandaţi",
            "recomandă"
        ]
    },
    {
        "name": "anunţa",
        "conjugations": [
            "anunţ",
            "anunţi",
            "anunţă",
            "anunţăm",
            "anunţaţi",
            "anunţă"
        ]
    },
    {
        "name": "compara",
        "conjugations": [
            "compar",
            "compari",
            "compară",
            "comparăm",
            "comparaţi",
            "compară"
        ]
    },
    {
        "name": "cumpăra",
        "conjugations": [
            "cumpăr",
            "cumperi",
            "cumpără",
            "cumpărăm",
            "cumpăraţi",
            "cumpără"
        ]
    },
    {
        "name": "dezbrăca",
        "conjugations": [
            "dezbrac",
            "dezbraci",
            "dezbracă",
            "dezbrăcăm",
            "dezbrăcaţi",
            "dezbracă"
        ]
    },
    {
        "name": "adăuga",
        "conjugations": [
            "adaug",
            "adaugi",
            "adaugă",
            "adăugăm",
            "adăugaţi",
            "adaugă"
        ]
    },
    {
        "name": "ajuta",
        "conjugations": [
            "ajut",
            "ajuţi",
            "ajută",
            "ajutăm",
            "ajutaţi",
            "ajută"
        ]
    },
    {
        "name": "alerga",
        "conjugations": [
            "alerg",
            "alergi",
            "aleargă",
            "alergăm",
            "alergaţi",
            "aleargă"
        ]
    },
    {
        "name": "asculta",
        "conjugations": [
            "ascult",
            "asculţi",
            "ascultă",
            "ascultăm",
            "ascultaţi",
            "ascultă"
        ]
    },
    {
        "name": "aştepta",
        "conjugations": [
            "aştept",
            "aştepţi",
            "aşteaptă",
            "aşteptăm",
            "aşteptaţi",
            "aşteaptă"
        ]
    },
    {
        "name": "căuta",
        "conjugations": [
            "caut",
            "cauţi",
            "caută",
            "căutăm",
            "căutaţi",
            "caută"
        ]
    },
    {
        "name": "chema",
        "conjugations": [
            "chem",
            "chemi",
            "cheamă",
            "chemăm",
            "chemaţi",
            "cheamă"
        ]
    },
    {
        "name": "clarifica",
        "conjugations": [
            "clarific",
            "clarifici",
            "clarifică",
            "clarificăm",
            "clarificaţi",
            "clarifică"
        ]
    },
    {
        "name": "combina",
        "conjugations": [
            "combin",
            "combini",
            "combină",
            "combinăm",
            "combinaţi",
            "combină"
        ]
    },
    {
        "name": "continua",
        "conjugations": [
            "continuu",
            "continui",
            "continuă",
            "continuăm",
            "continuaţi",
            "continuă"
        ]
    },
    {
        "name": "dărâma",
        "conjugations": [
            "dărâm",
            "dărâmi",
            "dărâmă",
            "dărâmăm",
            "dărâmaţi",
            "dărâmă"
        ]
    },
    {
        "name": "discuta",
        "conjugations": [
            "discut",
            "discuţi",
            "discută",
            "discutăm",
            "discutaţi",
            "discută"
        ]
    },
    {
        "name": "exista",
        "conjugations": [
            "exist",
            "exişti",
            "există",
            "existăm",
            "existaţi",
            "există"
        ]
    },
    {
        "name": "explica",
        "conjugations": [
            "explic",
            "explici",
            "explică",
            "explicăm",
            "explicaţi",
            "explică"
        ]
    },
    {
        "name": "flutura",
        "conjugations": [
            "flutur",
            "fluturi",
            "flutură",
            "fluturăm",
            "fluturaţi",
            "flutură"
        ]
    },
    {
        "name": "ierta",
        "conjugations": [
            "iert",
            "ierţi",
            "iartă",
            "iertăm",
            "iertaţi",
            "iartă"
        ]
    },
    {
        "name": "invita",
        "conjugations": [
            "invit",
            "inviţi",
            "invită",
            "invităm",
            "invitaţi",
            "invită"
        ]
    },
    {
        "name": "îmbrăca",
        "conjugations": [
            "îmbrac",
            "îmbraci",
            "îmbracă",
            "îmbrăcăm",
            "îmbrăcaţi",
            "îmbracă"
        ]
    },
    {
        "name": "încărca",
        "conjugations": [
            "încarc",
            "încarci",
            "încarcă",
            "încărcăm",
            "încărcaţi",
            "încarcă"
        ]
    },
    {
        "name": "îngheţa",
        "conjugations": [
            "îngheţ",
            "îngheţi",
            "îngheţă",
            "îngheţăm",
            "îngheţaţi",
            "îngheţă"
        ]
    },
    {
        "name": "înota",
        "conjugations": [
            "înot",
            "înoţi",
            "înoată",
            "înotăm",
            "înotaţi",
            "înoată"
        ]
    },
    {
        "name": "juca",
        "conjugations": [
            "joc",
            "joci",
            "joacă",
            "jucăm",
            "jucaţi",
            "joacă"
        ]
    },
    {
        "name": "mânca",
        "conjugations": [
            "mănânc",
            "mănânci",
            "mănâncă",
            "mâncăm",
            "mâncaţi",
            "mănâncă"
        ]
    },
    {
        "name": "plimba",
        "conjugations": [
            "plimb",
            "plimbi",
            "plimbă",
            "plimbăm",
            "plimbaţi",
            "plimbă"
        ]
    }
      ]
  },
  {
      name:'Type 2: (-ez)',
      condition:'Ends with -a',
      endings:[
        '+ez',
        '+ezi',
        '+ează',
        '+ăm',
        '+ați',
        '+ează'
      ]
  },
];

export default {
  name: 'app',
  components: {
    Groups
  },
  data: function() {
    return {
      groups: all_groups
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  padding: 15px;
}

h1, h2 {
  margin-top: 0px;
}
</style>
