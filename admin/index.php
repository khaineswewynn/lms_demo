<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/batchController.php';

$course_con=new CourseController();
$courses=$course_con->getCourses();

$batch_con=new BatchController();
$batches=$batch_con->getBatches();

$batch_per_year=$batch_con->batchPerYear();

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Courses</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo sizeof($courses);?></h1>
												
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Batches</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo sizeof($batches); ?></h1>
												
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Earnings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">$21.300</h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Orders</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">64</h1>
												<div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Movement</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Browser Usage</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Chrome</td>
													<td class="text-end">4306</td>
												</tr>
												<tr>
													<td>Firefox</td>
													<td class="text-end">3801</td>
												</tr>
												<tr>
													<td>IE</td>
													<td class="text-end">1689</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Number of Batches</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>No</th>
											<th class="d-none d-xl-table-cell">Year</th>
											<th class="d-none d-xl-table-cell">Total Batches</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										$count=1;
										
											foreach($batch_per_year as $batch)
											{
												echo "<tr>";
												echo "<td>".$count++."</td>";
												echo "<td>".$batch['year']."</td>";
												echo "<td>".$batch['total']."</td>";
												echo "</tr>";
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>


<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>