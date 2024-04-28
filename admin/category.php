<?php include "inc/header.php" ?>

	<div class="page-wrapper">
		<div class="page-content">

			<?php  

				// Ternary Condition
				$do = isset($_GET['do']) ? $_GET['do'] : "Manage";

				if ( $do == "Manage" ) { ?>
					
					<!-- Start Breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Category Management</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Category Manage</li>
								</ol>
							</nav>
						</div>
					</div>
					<!-- End Breadcrumb-->

					<h6 class="mb-0 text-uppercase">MANAGE ALL CATEGORY</h6>
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
											      <th scope="col" style="text-align: center;">Category Image</th>
											      <th scope="col" style="text-align: center;">Category Name</th>
											      <th scope="col" style="text-align: center;">Price (Taka)</th>
											      <th scope="col" style="text-align: center;">Quantity</th>
											      <th scope="col" style="text-align: center;">Parent/Child Category</th>
											      <th scope="col" style="text-align: center;">Rating</th>
											      <th scope="col" style="text-align: center;">Join Date</th>
											      <th scope="col" style="text-align: center;">Status</th>
											      <th scope="col" style="text-align: center;">Action</th>
											    </tr>
											  </thead>

											  <tbody>
											  	<?php  
											  		$catSql = "SELECT * FROM category WHERE status = 1";
											  		$catQuery = mysqli_query($db, $catSql);
											  		$catCount = mysqli_num_rows($catQuery);

											  		if ( $catCount == 0 ) { ?>
											  			<div class="alert alert-warning" role="alert">
														  Sorry! No Category Found into the Database.
														</div>
											  		<?php }

											  		else {
											  			$i = 0;

												  		while ( $row = mysqli_fetch_assoc($catQuery) ) {
												  			$cat_id  		= $row['cat_id'];
												  			$cat_name  		= $row['cat_name'];
												  			$short_desc  	= $row['short_desc'];
												  			$long_desc  	= $row['long_desc'];
												  			$is_parent  	= $row['is_parent'];
												  			$img_one  		= $row['img_one'];
												  			$quantity  		= $row['quantity'];
												  			$price  		= $row['price'];
												  			$rate  			= $row['rate'];
												  			$status  		= $row['status'];
												  			$join_date  	= $row['join_date'];
												  			$i++;
												  			?>
																<tr>
															      <th scope="row" style="text-align: center;"><?php echo $i; ?></th>
															      <td style="text-align: center;">
															      	<?php  
															      		if ( !empty($img_one) ) {
															      			echo '<img src="assets/images/category/' . $img_one .'" style="width: 60px;">';
															      		}
															      		else  {
															      			echo '<img src="assets/images/category/dummy_image.png" style="width: 60px;">';
															      		}
															      	?>
															      </td>
															      <td style="text-align: center;"><?php echo $cat_name; ?></td>
															      <td style="text-align: center;"><?php echo $price; ?> Taka</td>
															      <td style="text-align: center;">
															      	<?php  
															      		if ( $quantity != 0 ) { ?>
															      			<span class="badge text-bg-warning"><?php echo $quantity; ?> Pcs</span>
															      		<?php }

															      		else { ?>
															      			<span class="badge text-bg-danger">NULL</span>
															      		<?php }
															      	?>
															      </td>
															      <td style="text-align: center;">
															      	<?php  

															      		if ( $is_parent == 1 ) { ?>
															      			<span class="badge text-bg-primary">PARENT CATEGORY</span>
															      		<?php }

															      	?>
															      </td>
															      <td style="text-align: center;"><?php echo $rate; ?></td>
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
															      				<a href=""><i class="fa-regular fa-pen-to-square"></i></a>
															      			</li>
															      			<li>
															      				<a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></a>
															      			</li>
															      		</ul>
															      	</div>

																	<!-- ### START: MODAL PART ### -->
																	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																		<div class="modal-dialog">
																			<div class="modal-content">
																			  <div class="modal-header">
																			    <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?? To Move <i class="fa-regular fa-face-frown"></i><br> <span style="color: green;"><?php echo $cat_name; ?></span> Trash folder!!</h1>
																			    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																			  </div>
																			  <div class="modal-body">
																			    <div class="modal-btn">
																			    	<a href=""class="btn btn-danger me-3">Trash</a>
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
						<div class="breadcrumb-title pe-3">Category Management</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Add Category</li>
								</ol>
							</nav>
						</div>
					</div>
					<!-- End Breadcrumb-->

					<h6 class="mb-0 text-uppercase">ADD NEW CATEGORY</h6>
					<hr>

					<div class="row row-cols-12 row-cols-lg-12 row-cols-xl-12">
						<div class="col">
							<div class="card radius-15">
								<div class="card-body text-center">
									<div class="p-4 border radius-15">

										<!-- ### START: MAIN BODY CONTENT  ### -->

										<!-- START: FORM -->
										<form action="category.php?do=Store" method="POST"></form>
										<!-- END: FORM -->

										<!-- ### END: MAIN BODY CONTENT  ### -->
										
									</div>
								</div>
							</div>
						</div>				
					</div>
				<?php }

				else if ( $do == "Store" ) {
					echo "Store";
				}

				else if ( $do == "Edit" ) {
					echo "Edit";
				}

				else if ( $do == "Update" ) {
					echo "Update";
				}

				else if ( $do == "Trash" ) {
					echo "Trash";
				}

				else if ( $do == "ManageTrash" ) {
					echo "Manage Trash";
				}

				else if ( $do == "Delete" ) {
					echo "Delete";
				}

				

			?>

			

			
		</div>
	</div>

<?php include "inc/footer.php" ?>