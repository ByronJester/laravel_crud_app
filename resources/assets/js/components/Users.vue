<template>
	<div class = "container-fluid">
		<div class = "row">

			<div class = "col-md-12">
				<!-- ADD USER BUTTON -->
				<button class = "btn btn-success" data-toggle="modal" data-target="#add_user">
					<span  class = "fa fa-user-plus fa-lg"></span>
				</button>
				<!--  -->
				<!-- USER TABLE -->
				<table>
					<tr>
						<th>Username</th>
			      <th>Full Name</th>
			      <th>Email</th>
			      <th>Mobile No.</th>
			      <th>Action</th>
					</tr>
					<tr v-for= "user in users">
						<td>@{{user.username}}</td>
						<td>{{user.first_name}} {{user.middle_name}} {{user.last_name}}</td>
						<td>{{user.email}}</td>
						<td>{{user.mobile}}</td>
						<td>
							<button class = "btn btn-primary" data-toggle="modal" data-target="#myProfile" v-on:click.prevent = "viewProfile(user.applicants_id)">
								<span  class = "glyphicon glyphicon-eye-open"></span>
							</button>
							<button class = "btn btn-danger"  v-on:click.prevent = "deleteAccount(user.applicants_id)">
								<span  class = "glyphicon glyphicon-remove"></span>
							</button>
						</td>
					</tr>
				</table>
				<!--  -->
			</div>
			

			<!-- EDIT ACCOUNT MODAL -->
			<div class="modal fade" id="myProfile" tabindex="-1" role="dialog" >
			  <div class="modal-dialog">
			    <div class="modal-content">
			    	<div class="row">
							<div class="col-sm-12">
					      <div class="modal-header upd-acc">
					      	<button type="button fa fa-user-plus fa-lg" class="close" data-dismiss="modal">
					      		<span class="fa fa-times-circle">
				        		</span>
					      	</button>
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
					      <div class="modal-footer upd-acc">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>

			    </div>
			  </div>
			</div>
			<!-- END OF EDIT ACCOUNT MODAL -->

			<!-- ADD ACCOUNT MODAL -->
			<div class="modal fade" id="add_user" tabindex="-1" role="dialog" >
			  <div class="modal-dialog">
			    <div class="modal-content">
			    	<div class="row">
							<div class="col-sm-12">
					      <div class="modal-header add-acc">
					      	<button type="button fa fa-user-plus fa-lg" class="close" data-dismiss="modal">
					      		<span class="fa fa-times-circle">
				        		</span>
					      	</button>
					        <h5 class="modal-title">ADD ACCOUNT</h5> 
					      </div>
					    </div>
					  </div> 

					  <div class="row" >
				      <div class="col-sm-12" >
					      <div class="modal-body" >
					      	<div class="col-xs-6" >
						      	<div class="well well-sm well_text">
						        	<input type="text" class="form-control" name="" v-model ="c_user.u_name"  placeholder="Username" required>
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="password" class="form-control" name=""   v-model ="c_user.p_word" placeholder="Password" required>
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="password" class="form-control" name=""   v-model ="c_user.cpword" placeholder="Confirm Password" required>
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name=""  v-model ="c_user.f_name" placeholder="First Name" required>
						        </div>
						      </div>

						      <div class="col-xs-6">
						      	<div class="well well-sm well_text">
						        	<input type="text" class="form-control" name=""   v-model ="c_user.m_name" placeholder="Middle Name" required>
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name=""   v-model ="c_user.l_name" placeholder="Last Name" required>
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name=""  v-model ="c_user.email" placeholder="Email" required>
						        </div>
						        <div class="well well-sm well_text">
						        	<input type="text" class="form-control" name=""   v-model ="c_user.mobile"placeholder="Mobile #" required>
					        	</div>
					        </div>
					      </div>
				     	</div>
				    </div>

			     	<div class="row">
							<div class="col-sm-12">
					      <div class="modal-footer add-acc">
					      	<button type="button" class="btn btn-default" v-on:click.prevent = "createAccount()">
					      		<span class="fa fa-user-plus fa-lg">
				        			CREATE
				        		</span>
					      	</button>
					        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
					      </div>
					    </div>
					  </div>

			    </div>
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
				cpword: '',
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
  			'cp': this.c_user.cpword,
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

	.upd-acc {
		background-color: #00a8ff;
		color: white;
	}

	.add-acc{
		background-color: #00b894;
		color: white;
	}

	.btn-default{
		background-color: #c8d6e5;
	}

	table {
		margin-top: 5px;
  	width: 100%;
	}

	table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}

	th, td {
	  padding-top: 5px;
	  padding-bottom: 5px;
	  text-align: center;
	}

	th {
	  background-color: #60a3bc;
	}

	td {
	  background-color: #f1f2f6;
	}

	.fa-times-circle{
		color: red;
	}
</style>