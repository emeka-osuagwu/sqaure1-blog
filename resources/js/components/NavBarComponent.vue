<template>
	<div>
		<div class="container">
			<header class="blog-header py-3">
				<div class="row flex-nowrap justify-content-between align-items-center">
				<div class="col-4 pt-1">
					<router-link :to="'/'"><a class="btn btn-sm btn-outline-secondary" style="marginRight: 10px" href="#">Home</a></router-link>
				</div>
				<div class="col-4 text-center">
					<img class="" :src="this.iconUrl" alt="" width="72" height="57">
					
				</div>
				<div class="col-4 d-flex justify-content-end align-items-center">
					<router-link v-if="!appStore.isUserLoggedIn" :to="'login'"><a class="btn btn-sm btn-outline-secondary" style="marginRight: 10px" href="#">Login</a></router-link>
					<router-link v-if="!appStore.isUserLoggedIn" :to="'register'"><a class="btn btn-sm btn-outline-secondary" style="marginRight: 10px" href="#">Sign up</a></router-link>
					<router-link v-if="appStore.isUserLoggedIn" :to="'/post/create'"><a class="btn btn-sm btn-outline-secondary" style="marginRight: 10px" href="#">Add Post</a></router-link>
					<router-link v-if="appStore.isUserLoggedIn" :to="'/profile'"><a class="btn btn-sm btn-outline-secondary" style="marginRight: 10px" href="#">Profile</a></router-link>
					<a v-if="appStore.isUserLoggedIn" @click="logout" style="marginRight: 10px" class="btn btn-sm btn-outline-secondary" href="#">Logout</a>
				</div>
				</div>
			</header>
			<div class="nav-scroller py-1 mb-2"></div>
		</div>
	</div>
</template>


<script>
    import {mapState} from "vuex"
    
	export default {

		data() {
            return {
                iconUrl: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAA2FBMVEX///9YWVviIRz///1FRknl5eX9//vPz8/8//7+/f9MTlD/+v/xuLhWV1nKGgjkICDu7u7bhYPXGQfCCQD4//n/0tbdJCFlZmhsbG6MjIzfIxqDg4W2Ihj+2tLIGw33///51tz/7/M3OTysAAD///L85+v/7+zIZmi2AAD/5+LPTVDSJR7JLTXzxL3NFiPqpZ/UDxz/9ezYe3fKVVPMOz3jHRX2z8HJJSnrsKPgin/FYFf/7eG3PTXDGxvhmZL/2dW+KSj/ub7wnaTsGx6uZmupFybkdnTQgYAtdfVjAAAEHElEQVR4nO2dbXfSMBiGC5GYkCEyoXPFWaZsOtHJNtnmywSdL///H5kWKJ2kkK4tNNl9fdiBQ9vkWtIkfXrax3EAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwYPAZczgPPvG1OCzcattVTslckOkR/h+2Xed0zAyn9feT1eY/bbu+92HWhOs7KedGGkZ9Lo2hEf10IeY4JBxF9M7COzuXnEU1w/GjrYEQpg0zIUHP40IQDcTGFHktM1ETTjvfUa+jQa93WLghIcHfx68eZaQbOyLx/eM3b5/p8HqHU8pJkZYzw3olG439+QGZNGT+ybuBq8PLHREYFiiYv6EvD8nowftBU4OpoVPorJi/ISeM0w+ng6oGTQMNmc+5z84+Dt0Uhj4rsJ/mfx5KQ3p2PvRStWGBjZi7IZVrsfbXC3dkay8lwYqtffApjSEvdPldjOHl1WBU1RlMTTSkvuD966FmGz4x1fCz1YZyMO1/cT17DeV8T75+c7UmC0MNHU4vJxYbyvlQ0Osbuw15//vAs9qQ9M9dqw0denYhO2nTXkO/PZ4MvGaz6s2QS5fbavDdEkMu+I8bL75mk6ojmwzlkubnwNv13MhwNJJn5a28oLfG8LB16nruIk5TlV+apTVs1DWJYm1MHP/6Pbm5unoxZyIZ3FarpTRsVGpPNZnHvBlpn4zHnU5nfDAj+PxHPbSWwLCR+oCMt9t9Ssni3pPvk35rqFyKl8JQ9wbmfCtxGOixICIVGfpUGqpmyBIY1lPfhfZFcJkvBGvT6d0XSoQgLTlXlPM8TN9LY0eOoKK1G8yIlhlGsNCwCcOigGEORcAQhhmBYQ5FwBCGGYFhDkXAEIYZgWEORcCwlIaJgQ3VD2Ya8oSYoiqoY6Shw/f3nquoKbY10pDzbr2hoFKzpQ2501XtIQ0VlTXS0HG6DbWhYlMYwjAjMEzaD4YxYAjDjMAwaT8YxoAhDDMCw6T9YBgDhqU0tP8a3/44zUOItdkeL7U/5p0KGMIwIzDMoQgYwjAjMMyhCBjCMCMwzKEIGMIwIzDMoQgYmvb8YQiPhzPKbaj/DGkyZTfMTrkN9Z/lVjzcbYKh/vP4S1QMMbw3jT0YwhCGMIQhDGEIQxjCEIYbNQxyILR2q57Z7xHWMFS+J8oOQxYaqnupOe/zXmnorDcs/zvZVxrydYYmvFd/paFGGxYnuLk2dF13eSg1KL/FKkNnbrjVHCWZ88wsEYu0ckf8TUg7s4E8M7M6ZM8VtJw8KDo4F+Ko11MlD+ptIFfQJpi+IFLwbeZ7KhQ5jkx9rMnZ9T9BgjVKqMT0vGsrIEz6EcNz560gTKdHyApDw5nr3M0XaHIOywTUGRENzEO6TNRUS53UzFyyAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAA+Mf+T33egvPJ+gAAAAASUVORK5CYII="
            };
        },

	    computed: {
	        ...mapState({
	            appStore: state => state
	        })
		},
		
		methods: {
            
			logout(){
                this.$store.dispatch('logout')
			}
		},
	}
</script>