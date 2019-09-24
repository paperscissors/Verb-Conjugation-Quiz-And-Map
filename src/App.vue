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
          name: 'învăţa'},
        {
          name: 'cânta'},
        {
          name: 'asculta'},
        {
          name: 'câștiga'},
        {
          name: 'încerca'},
        {
          name: 'schimba'},
        {
          name: 'suna'},
        {
          name: 'prefera'},
        {
          name: 'pleca'},
        {
          name: 'merita'},
        {
          name: 'repara'},
        {
          name: 'striga'},
        {
        "name": "alerga"
    },
    {
        "name": "mânca"
    },
    {
        "name": "recomanda"
    },
    {
        "name": "anunţa"
    },
    {
        "name": "compara"
    },
    {
        "name": "cumpăra"
    },
    {
        "name": "dezbrăca"
    },
    {
        "name": "adăuga"
    },
    {
        "name": "ajuta"

    },
    {
        "name": "alerga"
    },

    {
        "name": "căuta"
    },
    {
        "name": "chema"
    },
    {
        "name": "clarifica"
    },
    {
        "name": "combina"
    },
    {
        "name": "continua"
    },
    {
        "name": "dărâma"
    },
    {
        "name": "discuta"
    },
    {
        "name": "exista"
    },
    {
        "name": "explica"
    },
    {
        "name": "flutura"
    },
    {
        "name": "ierta"
    },
    {
        "name": "invita"
    },
    {
        "name": "îmbrăca"
    },
    {
        "name": "încărca"
    },
    {
        "name": "îngheţa"
    },
    {
        "name": "înota"
    },
    {
        "name": "juca"
    },
    {
        "name": "mânca"
    },
    {
        "name": "plimba"
    }
      ]
  },
  {
      name:'Type 1a (ez)',
      condition:'Ends with -a',
      endings:[
        '+ez',
        '+ezi',
        '+ează',
        '+ăm',
        '+ați',
        '+ează'
      ],
      verbs: [
        {
            "name": "crea"
        },
        {
            "name": "supraveghea"
        },
        {
            "name": "priveghea"
        },
        {
            "name": "veghea"
        },
        {
          "name": "deranja"
        },
        {
          "name": "aranja"
        },
        {
          "name": "aborda"
        },
        {
          "name": "corecta"
        },
        {
          "name": "colecta"
        },
        {
          "name": "completa"
        },
        {
          "name": "conecta"
        },
        {
          "name": "contacta"
        },
        {
          "name": "controla"
        },
        {
          "name": "copia"
        },
        {
          "name": "devia"
        },
        {
          "name": "dansa"
        },
        {
          "name": "desena"
        },
        {
          "name": "livra"
        },
        {
          "name": "visa"
        },
        {
          "name": "eșua"
        },
        {
          "name": "ghida"
        },
        {
          "name": "informa"
        },
        {
          "name": "păstra"
        },
        {
          "name": "ateriza"
        },
        {
          "name": "proteja"
        },

      ]

  },
  {
      name:'Type 2',
      condition:'Ends with -ea',
      endings:[
        '-',
        '+i',
        '+e',
        '+em',
        '+eți',
        '-'
      ],
      verbs: [
          {
          "name": "apărea"
      },
      {
          "name": "avea"
      },
      {
          "name": "bea"
      },
      {
          "name": "cădea"
      },

      {
          "name": "decădea"
      },

      {
          "name": "dispărea"
      },
      {
          "name": "împerechea"
      },
      {
            "name": "întrevedea"
      },
      {
          "name": "părea"
      },
      {
          "name": "plăcea"
      },
      {
          "name": "prevedea"
      },
      {
          "name": "putea"
      },
      {
          "name": "scădea"
      },
      {
          "name": "străvedea"
      },

      {
          "name": "ședea"
      },
      {
          "name": "tăcea"
      },
      {
          "name": "vedea"
      },
      {
          "name": "zăcea"
      }
        ]
  },
  {
      name:'Type 3',
      condition:'Ends with -e',
      endings:[
        '-',
        '+i',
        '+e',
        '+em',
        '+eți',
        '-'
      ],
      verbs: [

    {
        "name": "aduce"
    },
    {
        "name": "ajunge"
    },
    {
        "name": "alege"
    },
    {
        "name": "aprinde"
    },
    {
        "name": "apune"
    },

    {
        "name": "ascunde"
    },
    {
        "name": "atinge"
    },
    {
        "name": "atrage"
    },
    {
        "name": "bate"
    },
    {
        "name": "cere"
    },
    {
        "name": "cerne"
    },

    {
        "name": "coase"
    },
    {
        "name": "comite"
    },
    {
        "name": "compune"
    },
    {
        "name": "concepe"
    },
    {
        "name": "conduce"
    },
    {
        "name": "constrânge"
    },
    {
        "name": "contrazice"
    },

    {
        "name": "convinge"
    },

    {
        "name": "crede"
    },
    {
        "name": "crește"
    },
    {
        "name": "cuprinde"
    },
    {
        "name": "decide"
    },
    {
        "name": "deprinde"
    },
    {
        "name": "depune"
    },
    {
        "name": "deschide"
    },
    {
        "name": "descinge"
    },
    {
        "name": "descompune"
    },

    {
        "name": "descrie"
    },
    {
        "name": "desface"
    },
    {
        "name": "desprinde"
    },

    {
        "name": "dispune"
    },
    {
        "name": "distinge"
    },
    {
        "name": "distruge"
    },

    {
        "name": "duce"
    },
    {
        "name": "evinge"
    },
    {
        "name": "expune"
    },
    {
        "name": "extinde"
    },

    {
        "name": "face"
    },
    {
        "name": "frige"
    },
    {
        "name": "geme"
    },
    {
        "name": "impune"
    },
    {
        "name": "induce"
    },
    {
        "name": "interzice"
    },
    {
        "name": "introduce"
    },
    {
        "name": "împunge"
    },
    {
        "name": "începe"
    },
    {
        "name": "închide"
    },
    {
        "name": "încrede"
    },

    {
        "name": "întoarce"
    },

    {
        "name": "întrerupe"
    },

    {
        "name": "linge"
    },
    {
        "name": "merge"
    },

    {
        "name": "naște"
    },
    {
        "name": "petrece"
    },
    {
        "name": "pierde"
    },
    {
        "name": "plânge"
    },
    {
        "name": "prescrie"
    },
    {
        "name": "presupune"
    },

    {
        "name": "prinde"
    },
    {
        "name": "produce"
    },
    {
        "name": "promite"
    },
    {
        "name": "propune"
    },
    {
        "name": "pune"
    },

    {
        "name": "rade"
    },
    {
        "name": "rămâne"
    },
    {
        "name": "răpune"
    },
    {
        "name": "răscoace"
    },
    {
        "name": "răsfrânge"
    },
    {
        "name": "răspunde"
    },
    {
        "name": "răszice"
    },
    {
        "name": "reduce"
    },
    {
        "name": "reintroduce"
    },
    {
        "name": "rescrie"
    },
    {
        "name": "retrage"
    },
    {
        "name": "rupe"
    },
    {
        "name": "satisface"
    },

    {
        "name": "scrie"
    },

    {
        "name": "sparge"
    },
    {
        "name": "spune"
    },
    {
        "name": "stinge"
    },

    {
        "name": "strânge"
    },
    {
        "name": "subscrie"
    },

    {
        "name": "surprinde"
    },
    {
        "name": "șterge"
    },
    {
        "name": "teme"
    },
    {
        "name": "tinde"
    },
    {
        "name": "toarce"
    },
    {
        "name": "traduce"
    },
    {
        "name": "trage"
    },
    {
        "name": "transcrie"
    },
    {
        "name": "trece"
    },
    {
        "name": "trimite"
    },
    {
        "name": "ucide"
    },
    {
        "name": "umple"
    },
    {
        "name": "vinde"
    },
    {
        "name": "zbate"
    },
    {
        "name": "zice"
    }
      ]
  },
  {
    name:'Type 4',
    condition:'Ends with -i',
    endings:[
      '-',
      '+i',
      '+e',
      '+im',
      '+iți',
      '-'
    ],
    verbs: [
      {
          "name": "acoperi"
      },
      {
          "name": "adormi"
      },

          {
              "name": "auzi"
          },
      {
          "name": "conveni"
      },
      {
          "name": "dormi"
      },
      {
          "name": "deveni"
      },
      {
          "name": "descoperi"
      },
      {
          "name": "fi"
      },
      {
          "name": "fugi"
      },
      {
          "name": "ieși"
      },
      {
          "name": "interveni"
      },



          {
              "name": "înăbuși"
          },
          {
              "name": "muri"
          },
          {
              "name": "oferi"
          },
          {
              "name": "preveni"
          },

            {
                "name": "reveni"
            },
            {
                "name": "solvi"
            },
            {
                "name": "sorbi"
            },
            {
                "name": "suferi"
            },
            {
                "name": "ști"
            },
            {
                "name": "veni"
            },
    ]
  },
  {
      name:'Type 4a (esc)',
      condition:'Ends with -i',
      endings:[
        '+esc',
        '+ești',
        '+ește',
        '+im',
        '+iți',
        '+esc'
      ],
      verbs: [
        {
        "name": "absolvi"
    },

    {
        "name": "acri"
    },
    {
        "name": "adânci"
    },

    {
        "name": "adumbri"
    },
    {
        "name": "albi"
    },
    {
        "name": "amăgi"
    },

    {
        "name": "aminti"
    },


    {
        "name": "bărbieri"
    },
    {
        "name": "boci"
    },
    {
        "name": "buluci"
    },

    {
        "name": "călători"
    },
    {
        "name": "căsători"
    },


    {
        "name": "cheltui"
    },

    {
        "name": "citi"
    },
    {
        "name": "ciuguli"
    },
    {
        "name": "clădi"
    },
    {
        "name": "clăti"
    },
    {
        "name": "cloci"
    },
    {
        "name": "clocoti"
    },
    {
        "name": "cocoloși"
    },
    {
        "name": "construi"
    },
    {
        "name": "conteni"
    },
    {
        "name": "contopi"
    },


    {
        "name": "copleși"
    },
    {
        "name": "coti"
    },
    {
        "name": "cotropi"
    },
    {
        "name": "cuceri"
    },
    {
        "name": "cumpăni"
    },



    {
        "name": "dezamăgi"
    },
    {
        "name": "dezlipi"
    },

    {
        "name": "dezrobi"
    },

    {
        "name": "domestici"
    },
    {
        "name": "domni"
    },
    {
        "name": "dori"
    },

    {
        "name": "dospi"
    },
    {
        "name": "dovedi"
    },
    {
        "name": "dușmăni"
    },

    {
        "name": "făli"
    },
    {
        "name": "ferici"
    },

    {
        "name": "folosi"
    },


    {
        "name": "găsi"
    },
    {
        "name": "găti"
    },

    {
        "name": "gândi"
    },
    {
        "name": "ghici"
    },
    {
        "name": "glumi"
    },
    {
        "name": "goli"
    },
    {
        "name": "grăbi"
    },

    {
        "name": "ieftini"
    },


    {
        "name": "intui"
    },


    {
        "name": "iubi"
    },

    {
        "name": "îmbătrâni"
    },


    {
        "name": "împleti"
    },
    {
        "name": "împlini"
    },


    {
        "name": "încălzi"
    },

    {
        "name": "încercui"
    },
    {
        "name": "îndrăgosti"
    },
    {
        "name": "îndrăzni"
    },
    {
        "name": "îndulci"
    },

    {
        "name": "înflori"
    },

    {
        "name": "îngriji"
    },
    {
        "name": "înlocui"
    },

    {
        "name": "limpezi"
    },
    {
        "name": "linguși"
    },
    {
        "name": "liniști"
    },

    {
        "name": "locui"
    },

    {
        "name": "lovi"
    },
    {
        "name": "luci"
    },
    {
        "name": "lungi"
    },

    {
        "name": "mări"
    },

    {
        "name": "mândri"
    },

    {
        "name": "mijloci"
    },
    {
        "name": "munci"
    },
    {
        "name": "murdări"
    },

    {
        "name": "nebuni"
    },

    {
        "name": "nimici"
    },

    {
        "name": "obosi"
    },
    {
        "name": "ochi"
    },



    {
        "name": "opri"
    },


    {
        "name": "păzi"
    },
    {
        "name": "pedepsi"
    },
    {
        "name": "petici"
    },

    {
        "name": "plăti"
    },

    {
        "name": "plivi"
    },
    {
        "name": "pluti"
    },

    {
        "name": "porni"
    },

    {
        "name": "potrivi"
    },
    {
        "name": "primi"
    },



    {
        "name": "răsări"
    },


    {
        "name": "răzgândi"
    },

    {
        "name": "reînnoi"
    },


    {
        "name": "scumpi"
    },
    {
        "name": "servi"
    },

    {
        "name": "sfârși"
    },


    {
        "name": "slăbi"
    },



    {
        "name": "sori"
    },

    {
        "name": "stabili"
    },



    {
        "name": "trezi"
    },
    {
        "name": "turti"
    },

    {
        "name": "vorbi"
    }
      ]
  },
  {
      name:'Type 5',
      condition:'Ends with -î',
      endings:[
        '-',
        '+i',
        '+e',
        '+em',
        '+eți',
        '-'
      ],
      verbs: []
    },
    {
        name:'Type 5a (ăsc)',
        condition:'Ends with -î',
        endings:[
          '+ăsc',
          '+ăști',
          '+ăște',
          '+âm',
          '+âți',
          '+ăsc'
        ],
        verbs: []
      }
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
