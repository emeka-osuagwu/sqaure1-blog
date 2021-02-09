import Vue from "vue";
import VueSweetalert2 from 'vue-sweetalert2';

import store from './store';
import router from './route'
import Logger from './helper/Logger';
import 'sweetalert2/dist/sweetalert2.min.css';

import VueResource from 'vue-resource';
import Init from './components/Init.vue'

Vue.use(VueResource)
Vue.use(store)
Vue.use(VueSweetalert2);
Vue.use(Logger, {loggin: true})

require('./bootstrap');
window.Vue = require('vue');

Vue.component('nav-bar-component', require('./components/NavBarComponent.vue').default);
Vue.component('post-list-component', require('./components/ListPostComponent.vue').default);

router.beforeEach(
	(to, from, next) => {
		if (!to.matched.length) {
			next('/404');
        }
        else if (to.matched.some(record => record.meta.forPublic)) {
		    next()
		}
		else if (to.matched.some(record => record.meta.forVisitors)) {
			if (store.state.isUserLoggedIn) {
				next({
					path: '/'
				})
			}
			else {
				next()
			}
		}
		else if (to.matched.some(record => record.meta.forAuth)) {
			if (!store.state.isUserLoggedIn) {
				next({
					path: '/login'
				})
			}
			else {
				next()
			}
		}
		else {
			next()
		}
	}
)

const app = new Vue({
    el: '#app',
    router,
    store,
    components: { Init },
    template: '<Init/>',
});