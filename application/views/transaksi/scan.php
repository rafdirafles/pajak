<div class="main-panel">
	<!-- BEGIN : Main Content-->
	<div class="main-content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="row">
				<div class="col-12">
					<div class="content-header"><?= $title  ?></div>
					<p class="content-sub-header mb-1">Scan your <b>Qr Code </b>faktur pajak here.</p>
				</div>
			</div>
			<!--Hoverable Rows Starts-->
			<section id="hoverable-rows">
				<div class="row">
				</div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<center>
								<h4 class="card-title"><i class="fas fa-fw fa-qrcode mr-2"></i>SCAN FAKTUR PAJAK </h4>
							</center>
						</div>
						<div class="card-content">
							<div class="card-body">
								<ul class="nav nav-tabs nav-justified">
									<li class="nav-item">
										<a class="nav-link <?= $_COOKIE['active']; ?>" id="active-tab" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">Custom</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?= $_COOKIE['link']; ?>" id="link-tab" data-toggle="tab" href="#link" aria-controls="link" aria-expanded="false">Bulan ini</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?= $_COOKIE['click']; ?>" id="click-tab" data-toggle="tab" href="#click" aria-controls="click" aria-expanded="false">Bulan Tanggal Faktur Pajak</a>
									</li>
								</ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade <?= $_COOKIE['tab-pane-active']; ?>" id="active" aria-labelledby="active-tab" aria-expanded="true">
										<br>
										<form action="<?= base_url('') ?>transaksi/scan" method="post" class="form group pl-3 " id="scanAction">
											<div class="row">
												<div class="col-md-12">
													<!-- onchange="loadDoc(this.value)" -->
													<div class="form-group row align-items-center">
														<div class="col-lg-12 col-12">
															<input type="text" id="scan" placeholder="Scan Barcode" name="scan" class="form-control" autofocus>
														</div>
														<div class="col-lg-4 col-9">
															<?= form_error('scan', '<small class="text-danger">', '</small>') ?>
														</div>
													</div>
													<div>
														<center>
															<button type="submit" class="btn btn-success mr-1"><i class="ft-alert-circle mr-2"></i>CEK FAKTUR</button>
														</center>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="tab-pane fade <?= $_COOKIE['tab-pane-link']; ?>" id="link" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
										<p class="m-0">Chocolate bar gummies sesame snaps. Liquorice cake sesame snaps cotton candy cake sweet brownie. Cotton candy candy canes brownie. Biscuit pudding sesame snaps pudding pudding sesame snaps biscuit tiramisu.</p>
									</div>
									<div class="tab-pane fade <?= $_COOKIE['tab-pane-click']; ?>" id="click" role="tabpanel" aria-labelledby="click-tab" aria-expanded="false">
										<p class="m-0">Fruitcake marshmallow donut wafer pastry chocolate topping cake. Powder powder gummi bears jelly beans. Gingerbread cake chocolate lollipop. Jelly oat cake pastry marshmallow sesame snaps.</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
		</div>
	</div>
	</section>
	<!--Hoverable rows Ends-->
</div>
</div>
<!-- END : End Main Content-->