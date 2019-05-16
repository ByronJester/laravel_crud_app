<template>
	<div class="container-fluid">
		<div class = "row">
			<div class="col-md-4">
				<div class="well well-sm">
					<h2>LOGIN ACCOUNT</h2>
					<input type="text" class="form-control" v-model = "user.username" placeholder="Username" >
					<input type="password" class="form-control" v-model = "user.password" placeholder="Password">
					<input type="submit" class="form-control btn btn-primary" v-on:click.prevent = "getuser" value = "Login">
				</div>
				
			</div>

			<div class="col-md-4">
				
			</div>

			<div class="col-md-4">
			</div>

		</div>
	</div>
</template>

<script>
export default {
	data: function (){
		return {
			user: {
				username: '',
				password: ''
			}
		}
	},
	created: function(){
	
	},
	methods: {
		getuser: function (){
			var user_data = {
				'un': this.user.username,
				'pw': this.user.password
			}

			axios({
  			method: 'POST',
  			url: '/api/login',
  			data: user_data
  		}).then(response =>{
  			console.log(response.data)
  		}).catch(error => {

  		})

		}
	}
}
</script>

<style>
	input{
		margin-top: 3%;
		margin-bottom: 3%;
	}

	h2 {
		text-align: center;
	}
</style>