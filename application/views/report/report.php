<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header ">
					<h5 class="card-title">Report</h5>
				</div>
				<div class="card-body ">
					<form id="generate_report">
						<div class="row">
							<div class="col-md-4 pr-1">
								<div class="form-group" >
									<label>Start Date</label>
									<input type="date" class="date form-control" placeholder="start name" name="start_date" id="datestart">
								</div>
							</div>
							<div class="col-md-4 px-1">
								<div class="form-group">
									<label>End Name</label>
									<input type="date" class="form-control" placeholder="start name" name="end_date" id="dateend">
								</div>
							</div>
							<div class="col-md-4 pl-1">
								<div class="form-group">
									<label for="exampleFormControlSelect1" >Status</label>
									<select class="form-control" id="exampleFormControlSelect1" name="status">
										<option value="" >ALL</option>
										<option value="ALARM" >ALARM</option>
										<option value="TROUBLE" >TROUBLE</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="update ml-auto mr-auto">
								<button type="button" class="btn btn-primary btn-round" id="submit">Generate Report</button>
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
