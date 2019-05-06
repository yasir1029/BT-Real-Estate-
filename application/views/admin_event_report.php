<?php include_once('admin_header.php');?>


<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Event Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>table</span></a></li>
						<li class="active"><span>Export</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
                                                        <th>S.NO</th>
														<th>Name</th>
                                                        <th>Posted On</th>
                                                        <th>Posted by</th>
                                                        <th>Event Date</th>
												
													</tr>
												</thead>
												<tfoot>
													<tr>
                                                        <th>S.NO</th>
														<th>Name</th>
														<th>Posted On</th>
                                                        <th>Posted by</th>
                                                        <th>Event Date</th>
														
													</tr>
												</tfoot>
												<tbody>
                                                    <?php $count = $this->uri->segment(3,0);?>
                                                    <?php foreach($events as $event):?>
													<tr>
                                                        <td><?= ++$count ?></td>
														<td><?= $event->e_name ?></td>
														<td><?= $event->posted_on ?></td>
                                                        <td><?= $event->posted_by ?></td>
														<td><?= $event->e_date ?></td>
													</tr>
                                                    <?php endforeach;?>
													
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
			</div>


<?php include_once('admin_footer.php');?>