<template>
    <div class="login-bod">
        <main class="form-signin">
            <form>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input v-model="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea v-model="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                  <div class="col-auto">
                    <button @click="create" type="submit" class="btn btn-primary mb-3">Create</button>
                </div>
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

	    computed: {
	        ...mapState({
	            appStore: state => state
            })
            
        },
        methods: {
            
			create(){
                if(
                    this.title === null || this.title === ''||
                    this.description === null || this.description === ''
                ){
                    this.$swal('Field are required');
                }
                else {
                    var data = {
                    	"title": this.title,
                    	"description": this.description,
                    }

                    this.$store.dispatch('createPost', data)

                    this.title = ""
                    this.description = ""
                }
            }
            
		},

	}
</script>