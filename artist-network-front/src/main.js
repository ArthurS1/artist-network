import '@babel/polyfill'
import 'mutationobserver-shim'
import Vue from 'vue'
import './plugins/bootstrap-vue'
import Axios from 'axios'
import VueAxios from 'vue-axios'

// Components
import App from './App.vue'

import router from './router'

// Vue configuration
Vue.config.productionTip = false

// Vue plugins
Vue.use(VueAxios, Axios.create({
    baseURL: 'http://api.artist-network.local:8000/',
    withCredentials: true,
}))

new Vue({
    router,
    render: h => h(App)
}).$mount('#app')
