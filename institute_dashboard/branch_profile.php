<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../default.php");
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once("../head.php"); ?>
	</head>

	<body>
		<!-- NAVIGATION -->
		<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
			<div class="container-fluid">
				<!-- Toggler -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Brand -->
				<a class="navbar-brand" href="../institute_dashboard/">
					<img src="../assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="...">
				</a>
				<!-- User (xs) -->
				<div class="navbar-user d-md-none">
					<!-- Dropdown -->
					<div class="dropdown">
					</div>
				</div>
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidebarCollapse">
					<!-- Form -->
					<form class="mt-4 mb-3 d-md-none">
						<div class="input-group input-group-rounded input-group-merge input-group-reverse">
							<input class="form-control" type="search" placeholder="Search" aria-label="Search">
							<div class="input-group-text">
								<span class="fe fe-search"></span>
							</div>
						</div>
					</form>
					<!-- Navigation -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="../institute_dashboard" class="nav-link ">
								<i class="fe fe-home"></i> Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
								<i class="fe uil-user"></i>Student
							</a>
							<div class="collapse" id="sidebarProfile">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="student_list.php" class="nav-link ">
											View Student List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_student.php" class="nav-link">
											Add New Student
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_student.php" class="nav-link">
											Edit Student Details
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#sidebarPages" class="nav-link " data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
								<i class="fe uil-graduation-cap"></i>Faculty
							</a>
							<div class="collapse" id="sidebarPages">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="faculty_list.php" class="nav-link ">
											View Faculty List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_faculty.php" class="nav-link ">
											Add New Faculty
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_faculty.php" class="nav-link">
											Edit Faculty Details
										</a>
									</li>
									<li class="nav-item">
										<a href="faculty_profile.php" class="nav-link ">
											Faculty Profile
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#sidebarCrm" class="nav-link active" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm">
								<i class="fe uil-book"></i>Branch/subject
							</a>
							<div class="" id="sidebarCrm">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="branch_list.php" class="nav-link">
											View Branch List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_branch.php" class="nav-link">
											Add New Branch
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_branch.php" class="nav-link">
											Edit Branch
										</a>
									</li>
									<li class="nav-item">
										<a href="subject_list.php" class="nav-link">
											View Subject List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_subject.php" class="nav-link">
											Add New Subject
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_subject.php" class="nav-link">
											Edit Subject
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link ">
								<i class="fe fe-percent"></i> Marksheet
							</a>
						</li>
						<li class="nav-item">
							<a href="update.php" class="nav-link ">
								<i class="fe fe-bell"></i>Updates
							</a>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="#" data-toggle="modal">
								<span class="fe fe-bell"></span> Notifications
							</a>
						</li>
					</ul>
					<!-- Divider -->
					<hr class="navbar-divider my-3">
					<!-- Heading -->
					<h6 class="navbar-heading">
						Help Center
					</h6>
					<!-- Navigation -->
					<ul class="navbar-nav mb-md-4">
						<li class="nav-item">
							<a href="#" class="nav-link ">
								<i class="fe fe-user"></i>Account related Details
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link ">
								<i class="fe fe-book"></i>Study related querys
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="header">
				<!-- HEADER -->
				<div class="header">
					<div class="container-fluid">
						<!-- Body -->
						<div class="header-body">
							<div class="row align-items-end">
								<div class="col">
									<!-- Pretitle -->
									<h6 class="header-pretitle">
										Branch
									</h6>
									<!-- Title -->
									<h1 class="header-title">
										Profile
									</h1>
								</div>
							</div>
							<!-- / .row -->
						</div>
						<!-- / .header-body -->
					</div>
				</div>
				<!-- / .header -->
				<?php
				include_once("../config.php");
				$studentenr = $_GET['brid'];
				$_SESSION["userrole"] = "Institute";
				if (isset($studentenr)) {
					$sql = "SELECT * FROM branchmaster WHERE BranchId = '$studentenr'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);

				?>
					<br><br>
					<div class="container-fluid">
						<!-- Body -->
						<div class="header-body mt-n5 mt-md-n6">
							<div class="row align-items-center">

								<div class="col mb-3 ml-n3 ml-md-n2">
									<h1 class="header-title">
										<?php echo $row['BranchName']; ?>
									</h1>
									<h5 class="header-pretitle mt-2">
										<?php echo $row['BranchCode']; ?>
									</h5>
								</div>
								<div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">
									<!-- Button -->
									<a href="edit_branch.php?brid=<?php echo $row['BranchId']; ?>" class="btn btn-primary d-block d-md-inline-block btn-md">
										Edit Details
									</a>
								</div>
							</div>
							<!-- / .row -->
							<div class="row align-items-center">
								<div class="col">
									<!-- Nav -->
									<ul class="nav nav-tabs nav-overflow header-tabs">
										<?php
											$a=1;
											while($a<=$row['BranchSemesters']){?>
												<li class="nav-item" <?php echo $a?"active":""; ?>>
													<a href="#" class="nav-link h3">
													Sem <?php echo $a;?>
													</a>
												</li>
											<?php $a++;
											}
										?>
									</ul>
								</div>
							</div>
						</div>
						<!-- / .header-body -->
					</div>
			</div>
			<!-- CONTENT -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-4">
						<!-- Files -->
						<div class="card-group">
							<div class="card">
								<img src="../assets/img/files/file-3.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Card title</h5>
									<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
									<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="card-group">
							<div class="card">
								<img src="../assets/img/files/file-3.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Card title</h5>
									<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
									<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
				} else { ?>
			<div class="container-fluid">
				<form class="mb-4" method="post">
					<div class="col">
						<div class="row">
							<div class="col-md-4">
								<div class="input-group input-group-merge input-group-reverse">
									<input class="form-control list-search" type="text" name="enr" placeholder="Enter Faculty Code">
									<div class="input-group-text">
										<span class="fe fe-search"></span>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="col-auto">
									<!-- Button -->
									<button class="btn btn-primary" type="submit" name="ser" value="2">
										Search
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php
					if (isset($_POST['ser'])) {
						$er = $_POST['enr'];
						$qur = "SELECT * FROM facultymaster WHERE FacultyCode = '$er';";
						$res = mysqli_query($conn, $qur);
						$row = mysqli_fetch_assoc($res);
						if (isset($row)) { ?>
					<div class="container-fluid">
						<hr class="navbar-divider my-4">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<a href="profile-posts.html" class="avatar avatar-lg">
											<img src="../src/uploads/facprofile/<?php echo $row['FacultyProfilePic']; ?>" alt="..." class="avatar-img rounded-circle">
										</a>
									</div>
									<div class="col ml-n2">
										<!-- Title -->
										<h4 class="mb-1">
											<a href="faculty_profile.php"><?php echo $row['FacultyFirstName'] . " " . $row['FacultyLastName']; ?></a>
										</h4>
										<!-- Text -->
										<p class="small mb-1">
											<?php echo $row['FacultyCode']; ?>
										</p>
										<!-- Status -->
										<p class="small mb-1">
											<?php echo $row['FacultyBranch']; ?>
										</p>
									</div>
									<div class="col-auto">
										<!-- Button -->
										<a href="faculty_profile.php?facultycode=<?php echo $row['FacultyCode']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
											View
										</a>
									</div>
								</div>
								<!-- / .row -->
							</div>
							<!-- / .card-body -->
						</div>
					</div>
		<?php
						}
					}
				}
		?>
		</div>
		<!-- / .main-content -->
		<!-- JAVASCRIPT -->
		<!-- Map JS -->
		<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
		<!-- Vendor JS -->
		<script src="../assets/js/vendor.bundle.js"></script>
		<!-- Theme JS -->
		<script src="../assets/js/theme.bundle.js"></script>
	</body>

	</html>
<?php } ?>