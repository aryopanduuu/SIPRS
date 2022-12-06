<footer class="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="footer-widget">
						<h4 class="footer-title">Lokasi</h4>
						<div class="about-clinic">
							<p><strong>Alamat:</strong><br>
								{!! nl2br($data->alamat) !!}
							</p>
							<p class="m-b-0">
								<strong>Nomor Telepon</strong>:
								<a href="tel:{{ $data->nomor_telepon }}">{{ $data->nomor_telepon }}</a>
								<br> <strong>Email</strong>:
								<a href="mailto:{{ $data->email }}">{{ $data->email }}</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="footer-widget">
						<h4 class="footer-title">Sitemap</h4>
						<ul class="footer-menu">
							<li>
								<a href="{{ route('tentang') }}">Tentang</a>
							</li>
							<li>
								<a href="{{ route('poli') }}">Poli</a>
							</li>
							<li>
								<a href="{{ route('spesialis') }}">Spesialis</a>
							</li>
							{{-- <li> --}}
							{{-- <a href="{{ route('dokter') }}">Dokter</a> --}}
							{{-- </li> --}}
							<li>
								<a href="{{ route('kontak') }}">Kontak</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 ml-auto">
					<div class="footer-widget">
						<h4 class="footer-title">Sosial Media</h4>
						<div class="appointment-btn">
							<p>Temui kami di sosial media</p>
							<ul class="social-icons clearfix">
								<li>
									<a href="#" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
								</li>
								<li>
									<a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
								</li>
								<li>
									<a href="#" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
								</li>
								<li>
									<a href="#" title="Google Plus" target="_blank"><i class="fab fa-google-plus-g"></i></a>
								</li>
								<li>
									<a href="#" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="copyright">
				<div class="row">
					<div class="col-12">
						<div class="copy-text text-center">
							<p>&#xA9; {{ date('Y') }} <a href="{{ route('home') }}">{{ config('app.name') }}</a>. All rights reserved.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
