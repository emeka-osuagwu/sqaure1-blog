<template>
    <div>
        <article id="post_list" v-for="post in appStore.posts" :key="post.id" class="blog-post">
            <h2 class="blog-post-title">{{post.title}}</h2>
            <p class="blog-post-meta">{{post.created_at}} by <a>{{post.user.name}}</a></p>
            <p>{{post.description}}</p>
            <hr>
        </article>
    </div>
</template>

<script>
    import {mapState} from "vuex"
    
	export default {

        created(){
            this.$store.dispatch('getPosts')
        },

	    computed: {
	        ...mapState({
	            appStore: state => state
	        })
	    }
	}
</script>