<template>
    <div>
    	<Navbar />
        <div v-if="status == 'loading'" class="justify-center items-center">
            <p>Loading...</p>
        </div>
        <div v-else>
            <router-view />
        </div>
    </div>
</template>

<script>
	import Navbar from './components/Navbar.vue';

    export default {
        name: 'App',
        components: {
        	Navbar
        },
        data() {
            return {
                status: this.$store.getters.authStatus
            }
        }
    }
</script>

<style>
	* {
		box-sizing: border-box;
	}
</style>
