import Vue from 'vue'
import Router from 'vue-router'

import App from './components/App.vue'
import LoginComponent from './components/LoginComponent.vue'
import RegisterComponent from './components/RegisterComponent.vue'
import CreatePostComponent from './components/CreatePostComponent.vue'
import ProfileComponent from './components/ProfileComponent.vue'

Vue.use(Router)

export default new Router({
	routes: [
		{
			path: '*',
			name: 'wildcard',
			component: App
		},
		{
			path: '/',
			name: 'app',
			component: App,
			meta: {
				forPublic: true
			},
		},
		{
			path: '/login',
			name: 'login',
			meta: {
				forVisitors: true
			},
			component: LoginComponent
		}, 
		{
			path: '/register',
			name: 'register',
			meta: {
				forVisitors: true
			},
			component: RegisterComponent
		},
		{
			path: '/post/:id/view',
			name: 'view_post',
			meta: {
				forPublic: true
			},
			component: App
		},
		{
			path: '/post/create',
			name: 'create_post',
			meta: {
				forAuth: true
			},
			component: CreatePostComponent
		},
		{
			path: '/profile',
			name: 'create_post',
			meta: {
				forAuth: true
			},
			component: ProfileComponent
		},
	]
})