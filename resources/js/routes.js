import {store} from './store/store';
import Register from './pages/Register.vue';
import Login from './pages/Login.vue';
import NotFound from './pages/NotFound.vue';
import Dashboard from './pages/Dashboard.vue';

//jika sama sekali blum login 
const ifNotAuth = function(to, from, next){
	//jika memang blum login
	if(!store.getters.isLoggedIn){
		next() //dilempar ke route yg mau diakses
		return; 
	}

	next('/');
}

const ifAuth = function(to, from, next){
	if(store.getters.isLoggedIn){
		next() 
		return; 
	}

	next('/login');
}

export default [
	{
		path: '/',
		component: Dashboard,
		beforeEnter: ifAuth
	},
	{
		path: '/register',
		component: Register,
		beforeEnter: ifNotAuth
	},
	{
		path: '/login',
		component: Login,
		beforeEnter: ifNotAuth
	},
	{
		path: '*',
		component: NotFound
	}
]