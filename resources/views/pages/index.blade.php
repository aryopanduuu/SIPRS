@extends('layouts.app')

@section('content')
<section class="section home-banner row-middle">
	<div class="inner-bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9">
				<div class="banner-content">
					<h1>Clean Medical Template</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
					<a title="Consult" class="btn btn-primary consult-btn" href="appointment.html">Consult</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section features">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-header text-center">
					<h3 class="header-title">About Medifab</h3>
					<div class="line"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
						nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
						Duis dictum eget dolor vel blandit.</p>
				</div>
			</div>
		</div>
		<div class="row feature-row">
			<div class="col-md-4">
				<div class="feature-box">
					<div class="feature-img">
						<img width="60" height="60" alt="Book an Appointment" src="assets/img/icon-01.png">
					</div>
					<h4>Book an Appointment</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="feature-box">
					<div class="feature-img">
						<img width="60" height="60" alt="Consult with a Doctor" src="assets/img/icon-02.png">
					</div>
					<h4>Consult with a Doctor</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="feature-box">
					<div class="feature-img">
						<img width="60" height="60" alt="Make a family Doctor" src="assets/img/icon-03.png">
					</div>
					<h4>Make a family Doctor</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section meet-doctors">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-header text-center">
					<h3 class="header-title">Meet our Doctors</h3>
					<div class="line"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
						nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
						Duis dictum eget dolor vel blandit.
					</p>
				</div>
			</div>
		</div>
		<div id="our_doctor" class="owl-carousel text-center">
			<div class="item">
				<div class="doctor text-center">
					<a href="doctor-details.html">
						<img src="assets/img/doctor-thumb-01.jpg" alt="Dr. Albert Sandoval" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Albert Sandoval</div>
						<div class="doctors-position">Neurologist</div>
					</a>
				</div>
			</div>
			<div class="item">
				<a href="doctor-details.html">
					<div class="doctor text-center">
						<img src="assets/img/doctor-thumb-02.jpg" alt="Dr. Linda Barrett" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Linda Barrett</div>
						<div class="doctors-position">Dentist</div>
					</div>
				</a>
			</div>
			<div class="item">
				<div class="doctor text-center">
					<a href="doctor-details.html">
						<img src="assets/img/doctor-thumb-03.jpg" alt="Dr. Cristina Groves" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Cristina Groves</div>
						<div class="doctors-position">Gynecologist</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="doctor text-center">
					<a href="doctor-details.html">
						<img src="assets/img/doctor-thumb-04.jpg" alt="Dr. Henry Daniels" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Henry Daniels</div>
						<div class="doctors-position">Cardiologist</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="doctor text-center">
					<a href="doctor-details.html">
						<img src="assets/img/doctor-thumb-05.jpg" alt="Dr. Diana Bailey" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Diana Bailey</div>
						<div class="doctors-position">General Surgery</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="doctor text-center">
					<a href="doctor-details.html">
						<img src="assets/img/doctor-thumb-06.jpg" alt="Dr. Justin Parker" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Justin Parker</div>
						<div class="doctors-position">Physical Therapist</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="doctor text-center">
					<a href="doctor-details.html">
						<img src="assets/img/doctor-thumb-07.jpg" alt="Dr. Marie Wells" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Marie Wells</div>
						<div class="doctors-position">Psychiatrist</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="doctor text-center">
					<a href="doctor-details.html">
						<img src="assets/img/doctor-thumb-08.jpg" alt="Dr. Pamela Curtis" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Pamela Curtis</div>
						<div class="doctors-position">Pediatrics</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="doctor text-center">
					<a href="doctor-details.html">
						<img src="assets/img/doctor-thumb-09.jpg" alt="Dr. Ronald Jacobs" class="rounded-circle" width="150" height="150">
						<div class="doctors-name">Dr. Ronald Jacobs</div>
						<div class="doctors-position">Oncologist</div>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="see-all">
					<a href="doctors.html" class="btn btn-primary see-all-btn">See all Doctors</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section departments">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-header text-center">
					<h3 class="header-title">Departments</h3>
					<div class="line"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
						nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
						Duis dictum eget dolor vel blandit.
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="dept-box">
					<div class="dept-img">
						<a href="department-details.html"><img width="67" height="80" alt="Dentists" src="assets/img/icon-04.png"></a>
					</div>
					<h4>
						<a href="department-details.html">Dentists</a>
					</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dept-box">
					<div class="dept-img">
						<a href="department-details.html"><img width="63" height="80" alt="Neurology" src="assets/img/icon-05.png"></a>
					</div>
					<h4><a href="department-details.html">Neurology</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dept-box">
					<div class="dept-img">
						<a href="department-details.html"><img width="92" height="80" alt="Opthalmology" src="assets/img/icon-06.png"></a>
					</div>
					<h4><a href="department-details.html">Opthalmology</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dept-box">
					<div class="dept-img">
						<a href="department-details.html"><img width="40" height="80" alt="Orthopedics" src="assets/img/icon-07.png"></a>
					</div>
					<h4><a href="department-details.html">Orthopedics</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dept-box">
					<div class="dept-img">
						<a href="department-details.html"><img width="76" height="80" alt="Cancer Department" src="assets/img/icon-08.png"></a>
					</div>
					<h4><a href="department-details.html">Cancer Department</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dept-box">
					<div class="dept-img">
						<a href="department-details.html"><img width="47" height="80" alt="ENT Department" src="assets/img/icon-09.png"></a>
					</div>
					<h4><a href="department-details.html">ENT Department</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor.
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="see-all">
					<a href="departments.html" class="btn btn-primary see-all-btn">See all Departments</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section testimonials">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-header text-center">
					<h3 class="header-title">Testimonials</h3>
					<div class="line"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
						nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
						Duis dictum eget dolor vel blandit.
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="testimonial_slider" class="owl-carousel text-center">
					<div class="item">
						<div class="testimonial-list">
							<div class="testimonial-img">
								<img class="img-fluid" src="assets/img/testi-03.jpg" alt="" width="150" height="150">
							</div>
							<div class="testimonial-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
									tempor incididunt ut labore et dolore.
								</p>
							</div>
							<div class="testimonial-author">
								<h3 class="testi-user">- Jennifer Robinson</h3>
								<span>Leland, USA</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial-list">
							<div class="testimonial-img">
								<img class="img-fluid" src="assets/img/testi-02.jpg" alt="" width="150" height="150">
							</div>
							<div class="testimonial-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
									tempor incididunt ut labore et dolore.
								</p>
							</div>
							<div class="testimonial-author">
								<h3 class="testi-user">- Denise Stevens</h3>
								<span>Abington, USA</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial-list">
							<div class="testimonial-img">
								<img class="img-fluid" src="assets/img/testi-05.jpg" alt="" width="150" height="150">
							</div>
							<div class="testimonial-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
									tempor incididunt ut labore et dolore.
								</p>
							</div>
							<div class="testimonial-author">
								<h3 class="testi-user">- Charles Ortega</h3>
								<span>El Paso, USA</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial-list">
							<div class="testimonial-img">
								<img class="img-fluid" src="assets/img/testi-04.jpg" alt="" width="150" height="150">
							</div>
							<div class="testimonial-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
									tempor incididunt ut labore et dolore.
								</p>
							</div>
							<div class="testimonial-author">
								<h3 class="testi-user">- Kyle Bowman</h3>
								<span>Vero Beach, USA</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial-list">
							<div class="testimonial-img">
								<img class="img-fluid" src="assets/img/testi-01.jpg" alt="" width="150" height="150">
							</div>
							<div class="testimonial-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
									tempor incididunt ut labore et dolore.
								</p>
							</div>
							<div class="testimonial-author">
								<h3 class="testi-user">- Linda Carpenter</h3>
								<span>Tallahassee, USA</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection