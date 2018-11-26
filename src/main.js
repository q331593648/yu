import Vue from 'vue'
import App from './App'
import router from './router'
import ElementUI from 'element-ui'
import '@/assets/element-variables.scss'
import './mock';
import axios from 'axios'
import '@/assets/index.scss' // global css
Vue.prototype.$http = axios

Vue.use(ElementUI)
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
