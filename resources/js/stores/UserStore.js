import Vue from 'vue'
import  baseUrl from '../helper/Urls'
import { getHeader } from '../helper/Header'

const state = 
{
	user: null,
	token: null,
}

const mutations = {
	SET_USER (state, user) {
		state.user = user
	},
	SET_TOKEN (state, token) {
		state.token = token
	},
}

const actions = {

	login: ({commit}, data) => {

        return Vue.http.post(baseUrl + '/login', data, {headers: getHeader()})
        .then(response => {
            if(response.data.status === 400){
                alert('invalid email or password')
            }
            if(response.data.status === 200){
                Vue.$logger('info', "user", response.data.data)
                commit('SET_USER', response.data.data.user)
                commit('SET_TOKEN', response.data.data.token)
            }
		})
    },
}

export default {
	state, mutations, actions
}