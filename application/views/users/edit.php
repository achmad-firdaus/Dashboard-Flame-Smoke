<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header ">
					<h5 class="card-title">User Edit</h5>
				</div>
				<div class="card-body ">
					<form action="<?= base_url('users/udate') ?>" method="POST">
						<div class="row">
							<div class="col-md-5 pr-1">
								<div class="form-group">
									<label>ID</label>
									<input type="text" class="form-control" placeholder="ID" name="id_user"
										value="<?= $getUser['id'] ?>" readonly>
								</div>
							</div>
							<div class="col-md-3 px-1">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" placeholder="Username" name="username"
										value="<?= $getUser['username'] ?>">
								</div>
							</div>
							<div class="col-md-4 pl-1">
								<div class="form-group">
									<label for="exampleInputEmail1">Password</label>
									<input type="password" class="form-control" placeholder="Password" name="password"
									value="<?= $getUser['password'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control" placeholder="first name" name="first_name"
										value="<?= $getUser['first_name'] ?>">
								</div>
							</div>
							<div class="col-md-4 px-1">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" placeholder="last name" name="last_name"
										value="<?= $getUser['last_name'] ?>">
								</div>
							</div>
							<div class="col-md-4 pl-1">
								<div class="form-group">
									<label for="exampleFormControlSelect1" >Roles</label>
									<select class="form-control" id="exampleFormControlSelect1" name="roles">
										<option style="background-color: #DCDCDC;" disabled value="<?= $getUser['roles'] ?>" selected="selected"><?= $getUser['roles'] ?></option>
										<option value="ADM" >ADM</option>
										<option value="SPV" >SPV</option>
										<option value="OPT" >OPT</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="update ml-auto mr-auto">
								<button type="submit" class="btn btn-primary btn-round">Update User</button>
							</div>
						</div>
					</form>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<!-- <i class="fa fa-history"></i> Updated 3 minutes ago -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
