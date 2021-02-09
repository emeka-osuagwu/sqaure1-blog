<template>
    <div class="login-body">
        <main class="form-signin">
            <form>
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                
                <label for="inputEmail" class="visually-hidden">Full Name</label>
                <input v-model="name" type="text" id="inputEmail" class="form-control" placeholder="Full Name" required autofocus>
                
                
                <label for="inputEmail" class="visually-hidden">Email address</label>
                <input v-model="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                
                <label for="inputPassword" class="visually-hidden">Password</label>
                <input v-model="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                
                <button @click="create" class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            </form>
        </main>
    </div>
</template>

<script>
    import {mapState } from "vuex"
    
	export default {

        data() {
            return {
                name: "",
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
            
			create() {
				var data = {
					"name": this.name,
					"email": this.email,
					"password": this.password,
                }
                this.$store.dispatch('register', data)
			}
		},

	}
</script>