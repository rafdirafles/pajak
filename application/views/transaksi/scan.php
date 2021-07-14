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
							<!-- <div class="card-body">
								<h6 class="card-title"><i class="fas fa-fw fa-calendar-alt mr-2"></i>Pilih Masa Pajak</h6>
								<div>
									<input type="radio" id="custom" name="masaPajak">
									<label for="custom"> Custom <input type="month" name="masaPajak" id="custom" onchange="myFunction(this.value)"></label>

								</div>
								<div>
									<input type="radio" id="bulanIni" name="masaPajak" onchange="myFunction(this.value)" value="<?= date("m") ?>">
									<label for="bulanIni">Bulan Ini</label>
								</div>
								<div>
									<input type="radio" id="tanggalFaktur" name="masaPajak" onchange="myFunction(this.value)" value="tanggalFaktur" checked>
									<label for="tanggalFaktur">Tanggal Faktur</label>
								</div>
							</div> -->
							<div class="card-body">
								<ul class="nav nav-tabs nav-justified">
									<li class="nav-item">
										<a class="nav-link <?= $_COOKIE['active']; ?>" id="active-tab" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">Faktur Supplier RN</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?= $_COOKIE['link']; ?>" id="link-tab" data-toggle="tab" href="#link" aria-controls="link" aria-expanded="false">Faktur Supplier NON-RN</a>
									</li>
								</ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade <?= $_COOKIE['tab-pane-active']; ?>" id="active" aria-labelledby="active-tab" aria-expanded="true">
										<br>
										<form action="<?= base_url('') ?>transaksi/scan" method="post" class="form group pl-3 " id="scanAction">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group row align-items-center">
														<div class="col-lg-12 col-12 mb-1">
															<h6>Pilih Masa Pajak : </h6>
														</div>
														<div class="col-lg-4 col-4">
															<label for="custom"><input type="radio" id="custom" name="masaPajak" value="custom" <?= $_COOKIE['custom']; ?>>
																Custom <input type="month" name="masaPajakCustom">
															</label>
														</div>
														<div class="col-lg-4 col-4">
															<label for="bulanIni"><input type="radio" id="bulanIni" name="masaPajak" value="<?= date("Y-m")  ?>" <?= $_COOKIE['bulanini']; ?>>
																Bulan Ini</label>
														</div>
														<div class="col-lg-4 col-4">
															<label for="tanggalfaktur"><input type="radio" id="tanggalfaktur" name="masaPajak" value="tanggalfaktur" <?= $_COOKIE['tgl-faktur']; ?>>
																Tanggal Faktur</label>
														</div>

														<div class="col-lg-12 col-12 mt-2">
															<input type="text" id="scan" placeholder="Scan Barcode" name="scan" class="form-control" autofocus>
															<!-- <input type="text" id="masaPajakInput" name="masaPajakInput" class="form-control"> -->
															<input type="hidden" id="supplierRn" name="supplierRn" class="form-control" value="Y">
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
										<br>
										<form action="<?= base_url('') ?>transaksi/scan" method="post" class="form group pl-3 " id="scanAction">
											<div class="row">
												<div class="col-md-12">

													<div class="form-group row align-items-center">
														<div class="col-lg-12 col-12 mb-1">
															<h6>Pilih Masa Pajak : </h6>
														</div>
														<div class="col-lg-4 col-4">
															<label for="custom"><input type="radio" id="custom" name="masaPajak" value="custom" <?= $_COOKIE['custom']; ?>>
																Custom <input type="month" name="masaPajakCustom">
															</label>
														</div>
														<div class="col-lg-4 col-4">
															<label for="bulanIni"><input type="radio" id="bulanIni" name="masaPajak" value="<?= date("Y-m") ?>" <?= $_COOKIE['bulanini']; ?>>
																Bulan Ini</label>
														</div>
														<div class="col-lg-4 col-4">
															<label for="tanggalfaktur"><input type="radio" id="tanggalfaktur" name="masaPajak" value="tanggalfaktur" <?= $_COOKIE['tgl-faktur']; ?>>
																Tanggal Faktur</label>
														</div>
														<div class="col-lg-12 col-12 mt-2">
															<input type="text" id="scan" placeholder="Scan Barcode" name="scan" class="form-control" autofocus>
															<input type="hidden" id="supplierRn" name="supplierRn" class="form-control" value="N">
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