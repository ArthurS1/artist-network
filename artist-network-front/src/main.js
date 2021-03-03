import Vue from 'vue'
import App from './App.vue'

import store from './store/store'
import router from './router'


// Vue configuration
Vue.config.productionTip = false

// Vue plugins
Vue.use(VueAxios, Axios.create({
    baseURL: 'http://api.artist-network.local:8000/',
    withCredentials: true,
}))

Vue.axios.get('sanctum/csrf-cookie').then(() => {
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount('#app');
}).catch((error) => {
    console.log(error);
});
