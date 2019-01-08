window.Vue = require('vue');
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import AppRoot from './pages/AppRoot'

Vue.use(ElementUI)

const app = new Vue({
    el: '#app',
    template: '<AppRoot />',
    components: {
        AppRoot
    }
});
