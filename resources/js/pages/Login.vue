<template>
    <div class="flex justify-center items-center px-6 lg:px-0">
        <div class="w-full max-w-xs">
	        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="login">
	            <h1 class="text-center text-3xl text-gray-700 font-light mb-6 tracking-wider">Login</h1>
	            <div class="mb-4">
	                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
	                   	Email
	                </label>
	                <input v-model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" autocomplete="username email" required>
	            </div>
	            <div class="mb-6">
	                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
	                    Password
	                </label>
	                <input v-model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" autocomplete="new-password" required>
	            </div>
	            <div class="flex items-center justify-between">
	                <button class="shadow bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
	                    Sign In
	                </button>
	            </div>
	        </form>
	        <p class="text-center text-gray-500 text-xs">
	            &copy;2019 Dodycode. For practice purposes.
	        </p>
	    </div>
    </div>
</template>

<script>
    export default {
        name: 'Login',
        data() {
        	return {
        		email: "",
        		password: ""
        	}
        },
        methods: {
        	login: function(){
        		let email = this.email;
        		let password = this.password;

        		this.$store.dispatch('login', {email, password})
        		.then(() => this.$router.push('/'))
        		.catch(err => console.error(err));
        	}
        }
    }
</script>