/**
 * import state
 */

import Vue from 'vue'
import VueRouter from 'vue-router'

/**
 * import Components
 */
import AppRoot from '@/pages/Main/AppRoot'
import Login from '@/pages/Login/Login'
import Register from '@/pages/Register/Register'



Vue.use(VueRouter)

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
        {
            path: '/register',
            name: 'Register',
            component: Register
        },
    ],
})

const app = new Vue({
    el: '#app',
    router,
    components: {
        AppRoot,
        Login,
        Register
    }
})
