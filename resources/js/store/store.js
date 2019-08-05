import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
	strict: true,
	state: {
		status: '',
		token: localStorage.getItem('token') || ''
	},
	getters: {
		isLoggedIn: state => !!state.token, //true jika terdapat token (state token nya gk NOT)
  		authStatus: state => state.status
	},
	mutations: {
		authRequestMutation: (state,token) => {
			state.status = 'loading';
		},
		authSuccessMutation: (state,token) => {
			state.status = 'success';
			state.token = token;
		},
		authErrorMutation: state => {
			state.status = 'error';
		},
		authLogoutMutation: state => {
			state.status = '';
			state.token = '';
		}
	},
	actions: {
		login: (context, user) => {
			return new Promise((resolve, reject) => {
				context.commit('authRequestMutation');
				axios({
					url: `${BASE_URL}/login`,
					data: user,
					method: 'POST'
				}).then(res => {
					// console.log(res);

					const token = res.data.meta.api_token;

					localStorage.setItem('token', token);
					axios.defaults.headers.common['Authorization'] = token;

					context.commit('authSuccessMutation', token);
					resolve(res); //promise ended and success
				}).catch(err => {
					context.commit('authErrorMutation');
					localStorage.removeItem('token');
					reject(err.response.data.errors); //promise ended but error
					alert(err.response.data.errors);
				});
			});
		},
		logout: (context, user) => {
			return new Promise((resolve, reject) => {
				context.commit('authLogoutMutation');
				localStorage.removeItem('token');
				delete axios.defaults.headers.common['Authorization'];
				resolve();
			});
		}
	}
});