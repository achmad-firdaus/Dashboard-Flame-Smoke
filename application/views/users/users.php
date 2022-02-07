<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header ">
					<h5 class="card-title">Users 
                        <h6>
                            <a class="btn btn-info" href='<?= base_url('users/add') ?>' role="button">Add User</a> 
                        </h6>
                    </h5>
				</div>
				<div class="card-body ">
					<table id="table-users" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>FIRST NAME</th>
								<th>LAST NAME</th>
								<th>USERNAME</th>
								<th>ROLE</th>
								<th>ACTION</th>
							</tr>
						</thead>
					</table>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-history"></i> data users
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
