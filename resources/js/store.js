
import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

import route from './route'
import  baseUrl from './helper/Urls'
import { getHeader } from './helper/Header'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
		posts: [],
		userPost: [],
		token: null,
        loading: false,
        userData: null,
		isUserLoggedIn: false,
    },
    mutations: {
        setToken (state, token){
            state.token = token
			state.isUserLoggedIn = token
        },
        setUserData (state, userData){
            state.userData = userData
        },
        setLoading (state, loading){
            state.loading = loading
        },
        setPosts (state, posts){
            state.posts = posts
        },
        setUserPosts (state, userPost){
            state.userPost = userPost
        },
        updatePosts (state, post){
            state.posts.unshift(post)
        }
    },
    actions: {
        setToken({commit},token){
            commit('setToken', token)
        },
        setToken({commit},token){
            commit('setToken', token)
        },
        setUserData({commit},userData){
            commit('setUserData', userData)
		},

		login({commit}, data){
		
			commit('setLoading', true)
			
			return Vue.http.post(baseUrl + '/login', data, {headers: getHeader()})
			.then(response => {
				commit('setLoading', false)
				if(response.data.status === 400){
					Vue.swal('invalid email or password');
				}
				if(response.data.status === 200){
					Vue.$logger('info', "user", response.data.data)
					commit('setUserData', response.data.data.user)
					commit('setToken', response.data.data.token)
					route.push({ path: '/'})
				}
			})
		},

		register({commit}, data){
		
			commit('setLoading', true)
			
			return Vue.http.post(baseUrl + '/register', data, {headers: getHeader()})
			.then(response => {
				commit('setLoading', false)
				if(response.data.status === 400){
					Vue.swal('email already exist');
				}
				if(response.data.status === 200){
					Vue.swal('Account created');
					route.push({ path: '/login'})
				}
			})
		},
		
		createPost({commit}, data){
			
			commit('setLoading', true)
			
			return Vue.http.post(baseUrl + '/post', data, {headers: getHeader(Vue.store)})
			.then(response => {
				commit('setLoading', false)

				if(response.data.status === 400){
					alert('invalid email or password')
				}

				if(response.data.status === 200){
					Vue.$logger('info', "user", response.data.data)
					Vue.swal('Post Created');
					commit('updatePosts', response.data.data)
				}
			})
		},
		
		getPosts({commit}){

			return Vue.http.get(baseUrl + '/post', {headers: getHeader()})
			.then
			(
				response => {
					Vue.$logger('info', "articles", response.data.data)
					commit('setPosts', response.data.data) 
				}
			)
		},
		
		getUserPosts({commit}){

			return Vue.http.get(baseUrl + '/user/post', {headers: getHeader()})
			.then
			(
				response => {
					commit('setUserPosts', response.data.data) 
				}
			)
		},

		logout({commit}){
			commit('setToken', false)
			route.push({ path: '/'})
		},

    },
    plugins: [createPersistedState()]

})