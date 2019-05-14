<template>
	<div class = "container-fluid">
		<div class = "row">
			<div class = "col-md-6">
				<div class = "well well-sm" v-for = "user in users">
					<h1>Hello {{user.first_name}}</h1>
					<button class = "btn btn-primary" data-toggle="modal" data-target="#myProfile" v-on:click.prevent = "viewProfile(user.applicants_id)">
						<span  class = "glyphicon glyphicon-eye-open"></span>
					</button>
					<button class = "btn btn-danger"  v-on:click.prevent = "deleteAccount(user.applicants_id)">
						<span  class = "glyphicon glyphicon-remove"></span>
					</button>
				</div>
			</div>

			<div class="modal fade" id="myProfile" tabindex="-1" role="dialog" >
			  <div class="modal-dialog">
			    <div class="modal-content">
			    	<div class="row">
							<div class="col-sm-12">
					      <div class="modal-header">
					        <h5 class="modal-title">PROFILE</h5>
					      </div>
					    </div>
					  </div> 

					  <div class="row" >
				      <div class="col-sm-12" >
					      <div class="modal-body" >
					      	<div class="col-xs-6" >
						      	<div class="well well-sm well_text">
						        	<input type="text" class="form-control" name="" v-model = "user_info.u_name" placeholder="Username" >
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="password" class="form-control" name="" v-model = "user_info.p_word" placeholder="Password">
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name="" v-model = "user_info.f_name" placeholder="First Name" >
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name="" v-model = "user_info.m_name" placeholder="Middle Name">
						        </div>
						      </div>

						      <div class="col-xs-6">
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name="" v-model = "user_info.l_name" placeholder="Last Name">
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name="" v-model = "user_info.email" placeholder="Email">
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name="" v-model = "user_info.mobile" placeholder="Mobile #">
					        	</div>
					        	<div class="well well-sm well_text">
						        	<button class="btn btn-primary" name="" v-on:click.prevent = "editProfile(user_info.usr_id)" style="width: 100%; height: 40px; margin-top: 4%; margin-bottom: 4%;">
						        		<span class="fa fa-users-cog fa-lg">
						        			UPDATE
						        		</span>
						        		
						        	</button>
					        	</div>
					        </div>
					      </div>
				     	</div>
				    </div>

			     	<div class="row">
							<div class="col-sm-12">
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>

			    </div>
			  </div>
			</div>

			<div class="col-md-6">
				<div class="well well-sm" style="text-align: center;">
					<h1>CREATE ACCOUNT</h1>
				</div>
				<div class="well well-sm">
					<input type="text" class="form-control" name="" v-model ="c_user.u_name"  placeholder="Username" required>
					<input type="password" class="form-control" name=""   v-model ="c_user.p_word" placeholder="Password" required>
					<input type="text" class="form-control" name=""  v-model ="c_user.f_name" placeholder="First Name" required>
					<input type="text" class="form-control" name=""   v-model ="c_user.m_name" placeholder="Middle Name" required>
					<input type="text" class="form-control" name=""   v-model ="c_user.l_name" placeholder="Last Name" required>
					<input type="text" class="form-control" name=""  v-model ="c_user.email" placeholder="Email" required>
					<input type="text" class="form-control" name=""   v-model ="c_user.mobile"placeholder="Mobile #" required>
					<input type="submit" class="btn btn-primary"  value = "CREATE ACCOUNT" required style="width: 100%;" v-on:click.prevent = "createAccount">
				</div>
			</div>

		</div>
	</div>
</template>

<script>

export default {
	data: function(){
		return {
			users 			: [],
			user_info		: {
				usr_id: '',
				u_name: '',
				p_word: '',
				f_name: '',
				m_name: '',
				l_name: '',
				email	: '',
				mobile: ''
			},
			c_user			: {
				u_name: '',
				p_word: '',
				f_name: '',
				m_name: '',
				l_name: '',
				email	: '',
				mobile: ''
			}
		}
	},
	created: function(){
		this.getAllUsers()
	},
	methods: {
		getAllUsers () {
  		axios({
  			method: 'POST',
  			url: '/api/getUsers'
  		}).then(response =>{
  			this.users = response.data
  		}).catch(error => {

  		})
  	},
  	viewProfile (id){
  		axios({
  			method: 'GET',
  			url: `/api/profile/${id}/edit`,
  		}).then(response => {
  			if(response.data[0].applicants_id == id){
  				this.user_info.usr_id = response.data[0].applicants_id
  				this.user_info.u_name = response.data[0].username
  				this.user_info.p_word = response.data[0].password
  				this.user_info.f_name = response.data[0].first_name
  				this.user_info.m_name = response.data[0].middle_name
  				this.user_info.l_name = response.data[0].last_name
  				this.user_info.email 	= response.data[0].email
  				this.user_info.mobile = response.data[0].mobile
  			}
  		}).catch(error => {

  		})

  	},
  	editProfile (id){
  		var user_data = {
  			'un': this.user_info.u_name,
  			'pw': this.user_info.p_word,
  			'fn': this.user_info.f_name,
  			'mn': this.user_info.m_name,
  			'ln': this.user_info.l_name,
  			'em': this.user_info.email,
  			'pn': this.user_info.mobile
  		}

  		axios({
  			method: 'PATCH',
  			url: `/api/profile/${id}`,
  			data: user_data
  		}).then(response => {
  			this.getAllUsers()
  			if(response.data.code > 0){
  				swal({
					  title: 'Success!',
					  type: 'success', 
					  html: `<b>${response.data.msg}</b>`,
					  showCloseButton: true,
					  showCancelButton: false,
					  focusConfirm: false,
					  confirmButtonText:'OKAY',
					  cancelButtonText:'Cancel',
					}).then(result =>{        
					  
					}, dismiss => {
						
					})
  			}else{
  				swal({
					  title: 'Warning!',
					  type: 'error', 
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
  	createAccount (){
  		var user_data = {
  			'un': this.c_user.u_name,
  			'pw': this.c_user.p_word,
  			'fn': this.c_user.f_name,
  			'mn': this.c_user.m_name,
  			'ln': this.c_user.l_name,
  			'em': this.c_user.email,
  			'pn': this.c_user.mobile
  		}
  		axios({
  			method: 'POST',
  			url: '/api/profile',
  			data: user_data
  		}).then(response => {
  			this.getAllUsers()
  			if(response.data.code > 0){
  				this.c_user.u_name = ""
	  			this.c_user.p_word = ""
	  			this.c_user.f_name = ""
	  			this.c_user.m_name = ""
	  			this.c_user.l_name = ""
	  			this.c_user.email  = ""
	  			this.c_user.mobile = ""

  				swal({
					  title: 'Success!',
					  type: 'success', 
					  html: `<b>${response.data.msg}</b>`,
					  showCloseButton: true,
					  showCancelButton: false,
					  focusConfirm: false,
					  confirmButtonText:'OKAY',
					  cancelButtonText:'Cancel',
					}).then(result =>{        
					  
					}, dismiss => {
						
					})
  			}else{
  				swal({
					  title: 'Warning!',
					  type: 'error', 
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
  		}).catch(error =>{

  		})
  	},
  	deleteAccount (id){
  		swal({
			  title: 'Warning!',
			  type: 'warning', 
			  html: `<b>Are you sure to delete this account ?</b>`,
			  showCloseButton: true,
			  showCancelButton: true,
			  focusConfirm: false,
			  confirmButtonText:'OKAY',
			  cancelButtonText:'Cancel',
			}).then(result =>{        
			  axios({
			  	method: 'DELETE',
			  	url: `/api/profile/${id}`
			  }).then(response => {
			  	this.getAllUsers()
				  if(response.data.code > 0){
				  	swal({
						  title: 'Good Job!',
						  type: 'success', 
						  html: `<b>${response.data.msg}</b>`,
						  showCloseButton: true,
						  showCancelButton: false,
						  focusConfirm: false,
						  confirmButtonText:'OKAY',
						  cancelButtonText:'Cancel',
						})
				  }else{
				  	swal({
						  title: 'Error!',
						  type: 'error', 
						  html: `<b>${response.data.msg}</b>`,
						  showCloseButton: true,
						  showCancelButton: false,
						  focusConfirm: false,
						  confirmButtonText:'OKAY',
						  cancelButtonText:'Cancel',
						})
				  }
			  	
			  }).catch(error => {

			  })
			}, dismiss => {
				
			})

  	}

	},
	filters:{

	}
}
</script>


<style>
	.well-sm {
		margin-top: 5px;
		padding-top: 0px !important;
		padding-bottom:  0px !important;
	}

	.btn {
		margin-top: 5px;
		margin-bottom: 5px;

	}

	.modal-title{
		text-align: center;
		font-size: 24px;
		font-weight: bold;
	}
	.form-control{
		text-align: center;
		margin-top: 10px;
		margin-bottom: 10px;
		width: 100%;
		height: 40px;
		font-size: 12px;
	}

	.modal-header {
		background-color: #ff6b6b;
		color: white;
	}

	.modal-footer {
		background-color: #ff6b6b;
		color: white;
	}

	.btn-default{
		background-color: #c8d6e5;
	}

</style>