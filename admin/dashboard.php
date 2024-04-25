<?php include "inc/header.php" ?>
	<!--wrapper-->
	<div class="wrapper">

		<?php include "inc/leftmenu.php" ?>

		<!--start header part of dashboard -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">						
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							
							<li class="nav-item dropdown dropdown-large">								
								<div class="dropdown-menu dropdown-menu-end">									
									<div class="header-notifications-list">
									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">								
								<div class="dropdown-menu dropdown-menu-end">									
									<div class="header-message-list">										
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">Pauline Seitz</p>
								<p class="designattion mb-0">Web Designer</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">							
							<li><a class="dropdown-item" href="dashboard.php"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header part of dashboard -->

		<!--start dashboard body page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				<div class="row">
					<div class="col-12 col-lg-12 col-xl-6">
					 <div class="row row-cols-1 row-cols-lg-2">
						 <div class="col">
                            <div class="card radius-10 overflow-hidden">
								<div class="card-body">
								  <div class="font-35 text-warning"><i class='bx bx-group'></i></div>
								  <h3 class="mb-0 mt-0">928</h3>
								  <p class="mb-0">Employee NPS</p>
								</div>
								<div id="emp-nps"></div>
								</div>
						 </div>
						 <div class="col">
							<div class="card radius-10 overflow-hidden">
								<div class="card-body">
									<div class="font-35 text-primary"><i class='bx bx-dollar'></i></div>
								  <h3 class="mb-0 mt-0">$20.2K</h3>
								  <p class="mb-0 mt-1">Training Expenses</p>
								</div>
								<div id="training-expenses"></div>
							  </div>
						</div>
					 </div>
			 
					 <div class="row row-cols-1 row-cols-lg-2">
						 <div class="col">
                            <div class="card radius-10 overflow-hidden">
								<div class="card-body">
									<div class="font-35 text-danger"><i class='bx bx-camera'></i></div>
									<h3 class="mb-0 mt-0">32</h3>
									<p class="mb-0 mt-1">CSR Activities</p>
								</div>
								<div id="csr-activities"></div>
							</div>
						 </div>

						 <div class="col">
							<div class="card radius-10 overflow-hidden">
								<div class="card-body">
									<div class="font-35 text-success"><i class='bx bxs-face'></i></div>
									<h3 class="mb-0 mt-0">14</h3>
									<p class="mb-1">Starter This Month</p>
								</div>
								<div id="starter-this-month"></div>
							  </div>
						 </div>
					 </div>
			 
					 <div class="card radius-10 overflow-hidden">
						<div class="card-body">
						 <div class="d-flex align-items-center">
						   <div class="">
							 <h3 class="mb-0">78.49%</h3>
							 <p class="mb-0">Bounce Rate</p>
						   </div>
						   <div class="ms-auto">              
							 <div id="bounce-rate"></div>
						   </div>
						 </div>
						</div>
					  </div>
			 
					</div>
			 
					<div class="col-12 col-lg-12 col-xl-6">
					   <div class="card radius-10">
						  <div class="card-body">
							<div id="submitted-application"></div>
						  </div>
						</div>
						<div class="card radius-10">
						 <div class="card-body">
							 <div id="users-status"></div>
						 </div>
						</div>
					</div>
			 
				  </div><!--end row-->
			   
				   <div class="row">
						<div class="col-12 col-lg-8 col-xl-8">
						  <div class="card radius-10 overflow-hidden">
						   <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Recruitment Costs</h6>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							</div>
							  <div class="chart-container">
								 <div id="recruitment-cost"></div>
							  </div>
						   </div>
						 </div>
						</div>
						<div class="col-12 col-lg-4 col-xl-4">
						  <div class="card radius-10">
						   <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Applications By Source</h6>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							 </div>
							 <div class="chart-container d-flex align-items-center justify-content-center mt-3">
								<div id="application-by-source"></div>
							 </div>
						   </div>
						 </div>
						</div>
					  </div><!--end row-->
			   
				  <div class="row">
					<div class="col-12 col-lg-4 col-xl-4">
					   <div class="card radius-10">
						 <div class="card-body">
						   <div class="d-flex align-items-center">
						   <div class="">
							<h3 class="mt-3 mb-0">54</h3>
							  <p class="mb-0">Screening Calls</p>
						   </div>
							 <div class="card-content dash-array-chart-box ms-auto">
							  <div id="screening-calls"></div>
							 </div>
						   </div>
						 </div>
					   </div>
					   <div class="card radius-10">
						 <div class="card-body">
						   <div class="d-flex align-items-center">
						   <div class="">
							<h3 class="mt-3 mb-0">82</h3>
							  <p class="mb-0">Assignments</p>
						   </div>
							 <div class="card-content dash-array-chart-box ms-auto">
							  <div id="assignments"></div>
							 </div>
						   </div>
						 </div>
					   </div>
					   <div class="card radius-10">
						 <div class="card-body">
						   <div class="d-flex align-items-center">
						   <div class="">
							<h3 class="mt-3 mb-0">92</h3>
							  <p class="mb-0">Interviews</p>
						   </div>
							 <div class="card-content dash-array-chart-box ms-auto">
							  <div id="interviews"></div>
							 </div>
						   </div>
						 </div>
					   </div>
					</div>
					<div class="col-12 col-lg-4 col-xl-4">
					  <div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Vacancies Status</h6>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							 </div>
						   <div class="text-center chart-container-9 d-flex align-items-center justify-content-center">
							<div id="vacancies-status"></div>
						  </div>
						 </div>
						 <div class="card-footer bg-transparent border-top">
						 <div class="row align-items-center text-center">
						   <div class="col border-end">
							<h4 class="mb-0">452</h4>
							<small class="extra-small-font">Filled Vacancies</small>
						 </div>
						   <div class="col">
						  <h4 class="mb-0">680</h4>
						  <small class="extra-small-font">Total Vacancies</small>
						 </div>
						 </div>
						</div>
					  </div>
					</div>
					<div class="col-12 col-lg-4 col-xl-4">
					  <div class="card radius-10">
					   <div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Top Referrers</h6>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						 </div>
						  <div class="">
							<div id="top-referrers"></div>
						  </div>
					   </div>
					 </div>
					</div>
				  </div><!--end row-->

			</div>
		</div>
		<!--end dashboard body page wrapper -->

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->

		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>


		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2024. All right reserved.</p>
		</footer>

	</div>
	<!--end wrapper-->
<?php include "inc/footer.php" ?>