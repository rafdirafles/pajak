<div class="main-panel">
	<!-- BEGIN : Main Content-->
	<div class="main-content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="row">
				<div class="col-12">
					<div class="content-header">Dashboard Super Admin</div>
				</div>
			</div>
			<!--Statistics cards Starts-->
			<div class="row">
				<div class="col-xl-3 col-lg-6 col-md-6 col-12">
					<div class="card gradient-starfall">
						<div class="card-content">
							<div class="card-body py-0">
								<div class="media pb-1">
									<div class="media-body white text-left">
										<span>
											<h5><a class="color white"
													href="<?= base_url('monitoring_teknisi/customer_aset'); ?>"
													class="success p-0" data-target="">Pelanggan</a></h5>
										</span>
										<!-- <h3 class="font-large-1 white mb-0"><?= $pelanggan['pelanggan']; ?></h3> -->
									</div>
									<div class="media-right white text-right">
										<i class="ft-user font-large-1"></i>
									</div>
								</div>
							</div>
							<div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-md-6 col-12">
					<div class="card gradient-ibiza-sunset">
						<div class="card-content">
							<div class="card-body py-0">
								<div class="media pb-1">
									<div class="media-body white text-left">
										<span>
											<h5><a class="color white"
													href="<?= base_url('monitoring_teknisi/customer_aset'); ?>"
													class="success p-0" data-target="">Jumlah Alat</a></h5>
										</span>
										<!-- <h5 class="font-large-1 white mb-0"><?= $alatinstall['transaksi']; ?></h5> -->
									</div>
									<div class="media-right white text-right">
										<i class="ft-archive font-large-1"></i>
									</div>
								</div>
							</div>
							<div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
							</div>

						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-6 col-md-6 col-12">
					<div class="card gradient-mint">
						<div class="card-content">
							<div class="card-body py-0">
								<div class="media pb-1">
									<div class="media-body white text-left">
										<span>
											<h5><a class="color white"
													href="<?= base_url('menu_teknisi/troubleshoot'); ?>"
													class="success p-0" data-target="">Perawatan Alat</a></h5>
										</span>
										<!-- <h3 class="font-large-1 white mb-0"><?= $status_pending['status']; ?></h3> -->
									</div>
									<div class="media-right white text-right">
										<i class="ft-phone-call font-large-1"></i>
									</div>
								</div>
							</div>
							<div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-md-6 col-12">
					<div class="card gradient-king-yna">
						<div class="card-content">
							<div class="card-body py-0">
								<div class="media pb-1">
									<div class="media-body white text-left">
										<span>
											<h5><a class="color white"
													href="<?= base_url('monitoring_teknisi/jadwal'); ?>"
													class="success p-0" data-target="">Jadwal Kunjungan</a></h5>
										</span>
										<!-- <h3 class="font-large-1 white mb-0"><?= $jadwalteknisi['jadwal']; ?></h3> -->
									</div>
									<div class="media-right white text-right">
										<i class="ft-list font-large-1"></i>
									</div>
								</div>
							</div>
							<div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Statistics cards Ends-->

			<div class="row">
				<!-- Column Chart starts -->
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Bar Chart</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<div class="height-400">
									<canvas id="column-chart"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Column Chart ends -->
			</div>

		</div>
	</div>
	<!-- END : End Main Content-->
