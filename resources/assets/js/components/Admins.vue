<template>
	<div class="container-fluid">
		<div class = "row">
			<div class="col-md-4">
				<div class="well well-sm">
					<h2>LOGIN ACCOUNT</h2>
					<input type="text" class="form-control" v-model = "user.username" placeholder="Username" >
					<input type="password" class="form-control" v-model = "user.password" placeholder="Password">
					<input type="submit" class="form-control btn btn-primary" v-on:click.prevent = "login" value = "Login">
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
		login: function (){
			var user_data = {
				'un': this.user.username,
				'pw': this.user.password
			}

			axios({
  			method: 'POST',
  			url: '/api/login',
  			data: user_data
  		}).then(response =>{
  			if(response.data.code > 0){
  				window.location = '/profile'
  			}else{
  				swal({
					  title: 'Error!',
					  type: 'warning', 
					  html: `<b>${response.data.msg}</b>`,
					  showCloseButton: true,
					  showCancelButton: false,
					  focusConfirm: false,
					  confirmButtonText:'OKAY',
					  cancelButtonText:'Cancel',
					}).then(result =>{        
					  
					}, dismiss => {
						
					})
  			}
  		}).catch(error => {

  		})

		},

		logout: function(){
			
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