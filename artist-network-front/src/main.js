import Vue from 'vue'
import Axios from 'axios'
import VueAxios from 'vue-axios'

// Components
import App from './App.vue'

// Vue configuration
Vue.config.productionTip = false

// Vue plugins
Vue.use(VueAxios, Axios.create({
    baseURL: 'http://artist-network.local:8000/',
    withCredentials: true,
}))

new Vue({
    render: h => h(App),
}).$mount('#app')
