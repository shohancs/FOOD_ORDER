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
								<div class="card-body">
									<div class="p-4 border radius-15">

										<!-- ### START: MAIN BODY CONTENT  ### -->

										<!-- START: FORM -->
										<form action="category.php?do=Store" method="POST" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="">Category Name</label>
														<input type="text" name="cat_name" class="form-control" required autocomplete="off" placeholder="enter category name">
													</div>

													<div class="mb-3">
														<label for="">Price (Taka)</label>
														<input type="text" name="price" class="form-control" required autocomplete="off" placeholder="enter price amount">
													</div>

													<div class="mb-3">
														<label for="">Select the Parent Category [ If Any ]</label>
														<select class="form-select" name="is_parent">
														  <option value="1">Please select the parent category</option>
														  <?php  
														  	$sql = "SELECT * FROM category WHERE is_parent = 1 AND status = 1 ORDER BY cat_name ASC";
														  	$query = mysqli_query( $db, $sql );

														  	while ( $row = mysqli_fetch_assoc( $query ) ) {
														  		$cat_id		= $row['cat_id'];
														  		$cat_name 	= $row['cat_name']; 
														  		?>
														  		<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
														  		<?php
														  	}

														  ?>
														</select>
													</div>													

													<div class="mb-3">
														<label for="">Short Description</label>
														<textarea name="short_desc" class="form-control" cols="30" rows="3" placeholder="enter short description.." id="editor"></textarea>
													</div>

													<div class="mb-3">
														<label for="">Long Description</label>
														<textarea name="long_desc" class="form-control" cols="30" rows="10" placeholder="enter long description.." id="editor1"></textarea>
													</div>
												</div>
												<div class="col-lg-6">
													
													<div class="row">
														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Category Image <sup style="font-size: 8px; color: #DD5353; top: -9px;"><small><i class="fa-solid fa-star"></i></small></sup></label>
																<input class="form-control" name="catImg_one" type="file" id="formFile">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Category Image <sup>(optional)</sup></label>
																<input class="form-control" name="catImg_two" type="file" id="formFile">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Category Image <sup>(optional)</sup></label>
																<input class="form-control" name="catImg_three" type="file" id="formFile">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="mb-3">
																<label for="">Category Image <sup>(optional)</sup></label>
																<input class="form-control" name="catImg_four" type="file" id="formFile">
															</div>
														</div>
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
															<input type="submit" name="cat_add" class="btn btn-primary" value="Add New Category">
														</div>
													</div>
												</div>
											</div>											
										</form>
										<!-- END: FORM -->

										<!-- ### END: MAIN BODY CONTENT  ### -->
										
									</div>
								</div>
							</div>
						</div>				
					</div>
				<?php }

				else if ( $do == "Store" ) {
					if ( isset($_POST['cat_add']) ) {
						$cat_name 		= $_POST['cat_name'];
						$price 			= $_POST['price'];
						$is_parent 		= $_POST['is_parent'];
						$short_desc 	= $_POST['short_desc'];
						$long_desc 		= $_POST['long_desc'];
						
						$catImg_two 	= $_POST['catImg_two'];
						$catImg_three 	= $_POST['catImg_three'];
						$catImg_four 	= $_POST['catImg_four'];
						$status 		= $_POST['status'];

						$catImg_one 	= $_FILES['catImg_one']['name'];
						$temp_img 		= $_FILES['image']['tem_name'];

						if (!empty($catImg_one)) {
							$img = rand(0, 999999) . "_" . $catImg_one;
							move_uploaded_file($temp_img, 'assets/images/category/' . $img);
						}
						

						$addCatSql = "INSERT INTO category ( cat_name , short_desc, long_desc, is_parent, img_one, img_two, img_three, img_four, price, status, join_date ) VALUES ( '$cat_name', '$short_desc', '$long_desc', '$is_parent', '$img', '$imgTwo', '$imgThree', '$imgFour', '$price', '$status', now() )";
						$addCatQuery = mysqli_query( $db, $addCatSql );

						if ( $addCatSql ) {
							header( "Location:category.php?do=Manage" );
						}
						else {
							die("Mysqli Error" . mysqli_error($db));
						}
					}
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