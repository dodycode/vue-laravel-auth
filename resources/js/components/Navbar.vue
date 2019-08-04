<template>
	<div class="py-6 px-6 shadow-md mb-8 bg-white">
		<div class="flex justify-between items-center">
			<div class="brand">
				<h1 class="text-lg font-light text-gray-800">Laravel Vuex Auth</h1>
			</div>
			<div class="links">
				<ul class="flex">
					<li class="mr-4">
						<router-link class="text-gray-800 hover:text-gray-600 font-light" to="/register">
							Register
						</router-link>
					</li>
					<li>
						<router-link class="text-gray-800 hover:text-gray-600 font-light" to="/login">
							Login
						</router-link>
					</li>
					<li v-if="isLoggedIn" class="ml-4">
						<a @click="logout" style="cursor:pointer;" class="text-gray-800 hover:text-gray-600 font-light">
							Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
  export default {
  	name: 'Navbar',
    computed: {
      isLoggedIn: function(){ 
      	return this.$store.getters.isLoggedIn
      }
    },
    methods: {
      logout: function(){
        this.$store.dispatch('logout')
        .then(() => {
          this.$router.push('/login')
        })
      }
    }
  }
</script>