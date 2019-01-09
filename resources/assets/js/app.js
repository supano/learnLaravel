/**
 * import state
 */

import Vue from 'vue'
import VueRouter from 'vue-router'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

/**
 * import Components
 */
import AppRoot from './pages/AppRoot'
import Login from './pages/Login'



Vue.use(VueRouter)
Vue.use(ElementUI)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Main',
            component: AppRoot
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
    ],
})

const app = new Vue({
    el: '#app',
    router,
    components: {
        AppRoot,
        Login
    }
})
