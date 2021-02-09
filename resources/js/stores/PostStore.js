import Vue from 'vue'
import  baseUrl from '../helper/Urls'
import { getHeader } from '../helper/Header'

const state = 
{
	posts: [],
	articles: [],
	paginations: []
}

const mutations = {
	SET_POSTS (state, posts) {
		state.posts = posts
	}
}

const actions = {

	getPosts: ({commit}) => {

		return Vue.http.get(baseUrl + '/post', {headers: getHeader()})
		.then
		(
			response => {
				Vue.$logger('info', "articles", response.data.data)
				commit('SET_POSTS', response.data.data) 
			}
		)
    },
    
	fetchPaginationData: ({commit}, url) => {
		return Vue.http.get(url, {headers: getHeader()})
		.then
		(
			response => {
				Vue.$logger('info', "articles", response.data.data.articles.data)
				Vue.$logger('info', "paginations", response.data.data.articles)
				Vue.$logger('info', "tags", response.data.data.tags)
				commit('SET_ARTICLES', response.data.data.articles.data) 
				commit('SET_TAGS', response.data.data.tags) 
			}
		)
	},
}

export default {
	state, mutations, actions
}