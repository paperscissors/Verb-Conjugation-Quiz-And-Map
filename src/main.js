import Vue from 'vue'
import App from './App.vue'

Vue.config.productionTip = false

import _ from 'lodash';
import unorm from 'unorm';

Object.defineProperty(Vue.prototype, '$_', { value: _ });
Object.defineProperty(Vue.prototype, 'unorm', { value: unorm});

new Vue({
  render: h => h(App),
}).$mount('#app')
