<template>
<div class="login-body">
<main class="form-signin">
  <form>
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <label for="inputEmail" class="visually-hidden">Email address</label>
    <input v-model="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input v-model="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    
    <button @click="login" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    
  </form>
</main>
</div>
</template>

<script>
    import {mapState } from "vuex"
    
	export default {

        data() {
            return {
                email: "",
                password: "",
            };
        },
	    computed: {
	        ...mapState({
	            appStore: state => state
            })
            
        },
        methods: {
            
			login(){
				var data = {
					"email": this.email,
					"password": this.password,
                }
                
                this.$store.dispatch('login', data)
			}
		},

	}
</script>