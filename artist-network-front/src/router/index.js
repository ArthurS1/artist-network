import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import store from '../store/store'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    beforeEnter: (to, from, next) => {
        if (to.name == 'Home' && store.state.logged)
            next();
        else next('/login')
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    beforeEnter: (to, from, next) => {
        if (to.name == 'Login' && !store.state.logged)
            next();
        else next('/')
    }
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
    beforeEnter: (to, from, next) => {
        if (to.name == 'Register' && !store.state.logged)
            next();
        else next('/')
    }
  }
]

const router = new VueRouter({
  routes
})

export default router
