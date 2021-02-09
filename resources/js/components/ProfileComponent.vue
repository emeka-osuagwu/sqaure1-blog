<template>
    <div class="login-bod">
        <main class="form-signin" style="max-width: 830px;">
            <label for="basic-url" class="form-label">Fliter by Month | Year</label>
            <div class="input-group mb-3">
                <input type="date" v-model="search" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
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
                        <tr v-for="post in filteredEvents" :key="post.id">
                            <th scope="row">#</th>
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
    import moment from "moment"
    import {mapState } from "vuex"
    
	export default {

        data() {
            return {
                search: Date(),
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
            }),
            
            filteredEvents: function() {
            return this.appStore.userPost
            .filter(post => {
                return moment(post.publication_date).format('MMMM YYYY').includes(moment(this.search).format('MMMM YYYY'));
            })
  }

            
        },
        
        methods: {
            
		},

	}
</script>