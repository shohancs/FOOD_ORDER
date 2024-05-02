<?php include "inc/header.php" ?>

	<div class="page-wrapper">
		<div class="page-content">

			<?php  
				$do = isset( $_GET['do'] ) ? $_GET['do'] : "Manage";

				if ( $do == "Manage" ) { ?>
					
					<!-- Start Breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Cuisine Management</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Cuisine Manage</li>
								</ol>
							</nav>
						</div>
					</div>
					<!-- End Breadcrumb-->

					<h6 class="mb-0 text-uppercase">MANAGE ALL CUISINE</h6>
					<hr>

					<div class="row row-cols-12 row-cols-lg-12 row-cols-xl-12">
						<div class="col">
							<div class="card radius-15">
								<div class="card-body text-center">
									<div class="p-4 border radius-15">

										<!-- ### START: MAIN BODY CONTENT  ### -->
										<!-- ### START: TABLE ### -->
										<div class="table-responsive">
											<table id="example" class="table table-striped table-hover table-bordered">
											  <thead class="table-dark">
											    <tr>
											      <th scope="col" style="text-align: center;">#Sl.</th>
											      <th scope="col" style="text-align: center;">Cuisine Name</th>
											      <th scope="col" style="text-align: center;">Join Date</th>
											      <th scope="col" style="text-align: center;">Status</th>
											      <th scope="col" style="text-align: center;">Action</th>
											    </tr>
											  </thead>

											  <tbody>

											  	<?php  

											  		$readSql = "SELECT * FROM cuisine WHERE status = 1 ORDER BY cu_name ASC";
											  		$query = mysqli_query( $db, $readSql );
											  		$cusineCount = mysqli_num_rows($query);

											  		if ( $cusineCount == 0 ) { ?>
											  			<div class="alert alert-warning" role="alert">
														  Sorry! No Cuisine Found into the Database.
														</div>
											  		<?php }

											  		else {
											  			$i = 0;

												  		while ( $row = mysqli_fetch_assoc( $query ) ) {
												  			$id  		= $row['id'];
												  			$cu_name  	= $row['cu_name'];
												  			$join_date  = $row['join_date'];
												  			$status  	= $row['status'];
												  			$i++;
												  			?>
												  				<tr>
															      <th scope="row" style="text-align: center;"><?php echo $i; ?></th>
															      <td style="text-align: center;"><?php echo $cu_name; ?></td>
															      <td style="text-align: center;"><?php echo $join_date; ?></td>
															      <td style="text-align: center;">
															      	<?php  

															      		if ( $status == 1 ) { ?>
															      			<span class="badge text-bg-success">ACTIVE</span>
															      		<?php }
															      		else if ( $status == 0 ) { ?>
															      			<span class="badge text-bg-danger">INACTIVE</span>
															      		<?php }

															      	?>
															      </td>
																   <td>
																      	<div class="action-btn">
																      		<ul>
																      			<li>
																      				<a href="cuisine.php?do=Edit&cuId=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
																      			</li>
																      			<li>
																      				<a href="" data-bs-toggle="modal" data-bs-target="#cuiTrush<?php echo $id; ?>"><i class="fa-solid fa-trash-can"></i></a>
																      			</li>
																      		</ul>
																      	</div>

																		<!-- ### START: MODAL PART ### -->
																		<div class="modal fade" id="cuiTrush<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog">
																				<div class="modal-content">
																				  <div class="modal-header">
																				    <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cu_name; ?></span> Trash folder!!</h1>
																				    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																				  </div>
																				  <div class="modal-body">
																				    <div class="modal-btn">
																				    	<a href="cuisine.php?do=Trash&CutrId=<?php echo $id; ?>"class="btn btn-danger me-3">Trash</a>
																		        		<a href="" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
																				    </div>	
																				  </div>
																				</div>
																			</div>
																		</div>
																		<!-- ### END: MODAL PART ### -->
																      </td>
															    </tr>
												  			<?php
												  		}
											  		}
											  		

											  	?>
											  	
													
											    
											  </tbody>
											</table>
										</div>										
										<!-- ### END: TABLE ### -->
										<!-- ### END: MAIN BODY CONTENT  ### -->
										
									</div>
								</div>
							</div>
						</div>				
					</div>

				<?php }

				else if ( $do == "Add" ) { ?>
					
					<!-- Start Breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Cuisine Management</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Add Cuisine</li>
								</ol>
							</nav>
						</div>
					</div>
					<!-- End Breadcrumb-->

					<h6 class="mb-0 text-uppercase">ADD NEW CUISINE</h6>
					<hr>

					<div class="row row-cols-12 row-cols-lg-12 row-cols-xl-12">
						<div class="col">
							<div class="card radius-15">
								<div class="card-body">
									<div class="p-4 border radius-15">

										<!-- ### START: MAIN BODY CONTENT  ### -->
										<!-- ### START: FORM ### -->
										<form action="cuisine.php?do=Store" method="POST">
											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="">Cuisine Name</label>
														<input type="text" name="cu_name" class="form-control" required autocomplete="off" placeholder="enter cuisine name">
													</div>

													<div class="mb-3">
														<label for="">Status</label>
														<select class="form-select" name="status">
														  <option value="1">Please select the status</option>
														  <option value="1">Active</option>
														  <option value="0">InActive</option>
														</select>
													</div>

													<div class="mb-3">
														<div class="d-grid gap-2">
															<input type="submit" name="cus_add" class="btn btn-primary" value="Add New Cuisine">
														</div>
													</div>
												</div>
											</div>
										</form>
										<!-- ### END: FORM ### -->
										<!-- ### END: MAIN BODY CONTENT  ### -->
										
									</div>
								</div>
							</div>
						</div>				
					</div>

				<?php }

				else if ( $do == "Store" ) {
					if ( isset( $_POST['cus_add'] ) ) {
						$cu_name 	= mysqli_real_escape_string($db, $_POST['cu_name']) ;
						$status 	= mysqli_real_escape_string($db, $_POST['status']);

						$addCuisine = "INSERT INTO cuisine(cu_name, join_date, status) VALUES ('$cu_name', now(), '$status')";
						$addQuery = mysqli_query( $db, $addCuisine );

						if ( $addCuisine ) {
							header("Location: cuisine.php?do=Manage");
						}
						else {
							die('Mysqli Error.' . mysqli_error($db));
						}
					}
				}

				else if ( $do == "Edit" ) {
					if ( isset( $_GET['cuId'] ) ) {
						$cuId = $_GET['cuId'];
						$editCuisine = "SELECT * FROM cuisine WHERE id=$cuId";
						$editQuery = mysqli_query( $db, $editCuisine );

						while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
							$id  		= $row['id'];
				  			$cu_name  	= $row['cu_name'];
				  			$status  	= $row['status'];
				  			?>
				  				<!-- Start Breadcrumb-->
								<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
									<div class="breadcrumb-title pe-3">Cuisine Management</div>
									<div class="ps-3">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb mb-0 p-0">
												<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
												</li>
												<li class="breadcrumb-item active" aria-current="page">Edit Cuisine</li>
											</ol>
										</nav>
									</div>
								</div>
								<!-- End Breadcrumb-->

								<h6 class="mb-0 text-uppercase">EDIT CUISINE</h6>
								<hr>

								<div class="row row-cols-12 row-cols-lg-12 row-cols-xl-12">
									<div class="col">
										<div class="card radius-15">
											<div class="card-body">
												<div class="p-4 border radius-15">

													<!-- ### START: MAIN BODY CONTENT  ### -->
													<!-- ### START: FORM ### -->
													<form action="cuisine.php?do=Update" method="POST">
														<div class="row">
															<div class="col-lg-6">
																<div class="mb-3">
																	<label for="">Cuisine Name</label>
																	<input type="text" name="cu_name" class="form-control" required autocomplete="off" placeholder="enter cuisine name" value="<?php echo $cu_name; ?>">
																</div>

																<div class="mb-3">
																	<label for="">Status</label>
																	<select class="form-select" name="status">
																	  <option value="1">Please select the status</option>
																	  <option value="1" <?php if( $status == 1 ){ echo "selected"; } ?>>Active</option>
																	  <option value="0" <?php if( $status == 0 ){ echo "selected"; } ?>>InActive</option>
																	</select>
																</div>

																<div class="mb-3">
																	<div class="d-grid gap-2">
																		<input type="hidden" name="cuUpId" value="<?php echo $id; ?>">
																		<input type="submit" name="cus_update" class="btn btn-primary" value="Update Cuisine">
																	</div>
																</div>
															</div>
														</div>
													</form>
													<!-- ### END: FORM ### -->
													<!-- ### END: MAIN BODY CONTENT  ### -->
													
												</div>
											</div>
										</div>
									</div>				
								</div>
				  			<?php
						} 
					}
					else {
						echo "Sorry Something Happening Wrong";
					}
				}

				else if ( $do == "Update" ) {
					if ( isset( $_POST['cus_update'] ) ) {
						$cuUpId 	= mysqli_real_escape_string($db, $_POST['cuUpId']);
						$cu_name 	= mysqli_real_escape_string($db, $_POST['cu_name']);
						$status 	= mysqli_real_escape_string($db, $_POST['status']);

						$updateSql = "UPDATE cuisine SET cu_name='$cu_name', status='$status' WHERE id='$cuUpId' ";
						$query = mysqli_query( $db, $updateSql );

						if ( $query ) {
							header("Location: cuisine.php?do=Manage");
						}
						else {
							die('Mysqli Error.' . mysqli_error($db));
						}
					}
				}

				else if ( $do == "Trash" ) {
					if ( isset($_GET['CutrId']) ) {
						$trCuiId = $_GET['CutrId'];
						$trashSql = "UPDATE cuisine SET status=0 WHERE id='$trCuiId' ";
						$trashQuery = mysqli_query( $db, $trashSql );

						if ( $trashQuery ) {
							header("Location: cuisine.php?do=Manage");
						}
						else {
							die('Mysqli Error.' . mysqli_error($db));
						}
							
					}
				}

				else if ( $do == "ManageTrash" ) { ?>
					
					<!-- Start Breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Cuisine Trash Management</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Cuisine Trash Manage</li>
								</ol>
							</nav>
						</div>
					</div>
					<!-- End Breadcrumb-->

					<h6 class="mb-0 text-uppercase">TRASH MANAGE CUISINE</h6>
					<hr>

					<div class="row row-cols-12 row-cols-lg-12 row-cols-xl-12">
						<div class="col">
							<div class="card radius-15">
								<div class="card-body text-center">
									<div class="p-4 border radius-15">

										<!-- ### START: MAIN BODY CONTENT  ### -->
										<!-- ### START: TABLE ### -->
										<div class="table-responsive">
											<table id="example" class="table table-striped table-hover table-bordered">
											  <thead class="table-dark">
											    <tr>
											      <th scope="col" style="text-align: center;">#Sl.</th>
											      <th scope="col" style="text-align: center;">Cuisine Name</th>
											      <th scope="col" style="text-align: center;">Join Date</th>
											      <th scope="col" style="text-align: center;">Status</th>
											      <th scope="col" style="text-align: center;">Action</th>
											    </tr>
											  </thead>

											  <tbody>

											  	<?php  

											  		$readSql = "SELECT * FROM cuisine WHERE status = 0 ORDER BY cu_name ASC";
											  		$query = mysqli_query( $db, $readSql );
											  		$cusineCount = mysqli_num_rows($query);

											  		if ( $cusineCount == 0 ) { ?>
											  			<div class="alert alert-warning" role="alert">
														  Sorry! No Cuisine Found into the Database.
														</div>
											  		<?php }

											  		else {
											  			$i = 0;

												  		while ( $row = mysqli_fetch_assoc( $query ) ) {
												  			$id  		= $row['id'];
												  			$cu_name  	= $row['cu_name'];
												  			$join_date  = $row['join_date'];
												  			$status  	= $row['status'];
												  			$i++;
												  			?>
												  				<tr>
															      <th scope="row" style="text-align: center;"><?php echo $i; ?></th>
															      <td style="text-align: center;"><?php echo $cu_name; ?></td>
															      <td style="text-align: center;"><?php echo $join_date; ?></td>
															      <td style="text-align: center;">
															      	<?php  

															      		if ( $status == 1 ) { ?>
															      			<span class="badge text-bg-success">ACTIVE</span>
															      		<?php }
															      		else if ( $status == 0 ) { ?>
															      			<span class="badge text-bg-danger">INACTIVE</span>
															      		<?php }

															      	?>
															      </td>
																   <td>
																      	<div class="action-btn">
																      		<ul>
																      			<li>
																      				<a href="cuisine.php?do=Edit&cuId=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
																      			</li>
																      			<li>
																      				<a href="" data-bs-toggle="modal" data-bs-target="#cuiDel<?php echo $id; ?>"><i class="fa-solid fa-trash-can"></i></a>
																      			</li>
																      		</ul>
																      	</div>

																		<!-- ### START: MODAL PART ### -->
																		<div class="modal fade" id="cuiDel<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog">
																				<div class="modal-content">
																				  <div class="modal-header">
																				    <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Delete <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cu_name; ?></span> Delete folder!!</h1>
																				    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																				  </div>
																				  <div class="modal-body">
																				    <div class="modal-btn">
																				    	<a href="cuisine.php?do=Delete&CuDelId=<?php echo $id; ?>"class="btn btn-danger me-3">Delete</a>
																		        		<a href="" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
																				    </div>	
																				  </div>
																				</div>
																			</div>
																		</div>
																		<!-- ### END: MODAL PART ### -->
																      </td>
															    </tr>
												  			<?php
												  		}
											  		}
											  		

											  	?>
											  	
													
											    
											  </tbody>
											</table>
										</div>
										
										<!-- ### END: TABLE ### -->
										<!-- ### END: MAIN BODY CONTENT  ### -->
										
									</div>
								</div>
							</div>
						</div>				
					</div>

				<?php }

				else if ( $do == "Delete" ) {
					if ( isset($_GET['CuDelId']) ) {
						$delCuiId = $_GET['CuDelId'];

						$delSql = "DELETE FROM cuisine WHERE id='$delCuiId'";
						$delQuery = mysqli_query($db, $delSql);

						if ( $delQuery ) {
							header("Location: cuisine.php?do=Manage");
						}
						else {
							die('Mysqli Error.' . mysqli_error($db));
						}
					}
				}
			?>	

			
		</div>
	</div>

<?php include "inc/footer.php" ?>