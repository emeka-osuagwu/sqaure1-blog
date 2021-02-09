<template>
    <div class="login-bod">
        <main class="form-signin" style="max-width: 830px;">
            <form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Publication Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in appStore.userPost" :key="post.id">
                            <th scope="row">1</th>
                            <td>{{post.title}}</td>
                            <td>{{post.publication_date}}</td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </main>
    </div>
</template>

<script>
    import {mapState } from "vuex"
    
	export default {

        data() {
            return {
                title: "",
                description: "",
            };
        },

        created(){
            this.$store.dispatch('getUserPosts')
        },

	    computed: {
	        ...mapState({
	            appStore: state => state
	        })
        },
        
        methods: {
            
		},

	}
</script>