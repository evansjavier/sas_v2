<?php $page = 'index'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
				<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
					<div class="my-auto mb-2">
						<h3 class="page-title mb-1">Admin Dashboard</h3>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="index.html">Dashboard</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
						<div class="mb-2">
							<a href="/add-student" class="btn btn-primary d-flex align-items-center me-3"><i
									class="ti ti-square-rounded-plus me-2"></i>Add New Student</a>
						</div>
												<div class="mb-2">
							<a href="{{ route('instructors.create') }}" class="btn btn-primary d-flex align-items-center me-3"><i
									class="ti ti-square-rounded-plus me-2"></i>Add New Instructor</a>
						</div>

						<div class="mb-2">
							<a href="collect-fees.html" class="btn btn-light d-flex align-items-center">Sim Report</a>
						</div>
					</div>
				</div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">'


                    <!-- Dashboard Content -->
                    <div class="card" style="background-color:#0B0930; color:white; border:none; border-radius:12px;">
                        <div class="card-body d-flex align-items-center justify-content-between">

                            <!-- IZQUIERDA (texto) -->
                            <div>
                            <h1 class="mb-2" style="color: aliceblue;">Welcome Back, {{ Auth::user()->name ?? 'User'    }}</h1>
                            <p>Have a great day! ✈️</p>
                            </div>

                            <!-- DERECHA (logo) -->
                            <div>
                            <img src="{{URL::asset('build/img/general/logo_sas_blanco.png')}}" alt="logo" style="height:130px;">
                            </div>

                        </div>
                    </div>
                    <!-- /Dashboard Content -->

                    {{-- Alert Message --}}
                    <div class="alert-message">
                        <div class="alert alert-success  d-flex align-items-center justify-content-between border-success mb-4"
                            role="alert">
                            <div class="d-flex align-items-center">
                                <p>As you are aware, according to the interpretation applied by the Spanish Competent Authority and in line with Regulation (EU) No 1178/2011, an SFI was not permitted to provide instruction during the so-called ninth session of a course including ZFTT, i.e. the ZFTT session.

                                    Following a query raised to EASA by a Competent Authority, EASA has clarified that any type of instructor may provide instruction during this session.

                                    Therefore, it is hereby informed that SFI, TRI, TRI LT, TRI/r LIFUS and TRI/r LT LIFUS instructors are also authorised to provide instruction during said session.

                                    <strong class="mx-1">“Term1”</strong>
                                </p>
                            </div>
                            <button type="button" class="btn-close p-0" data-bs-dismiss="alert"
                                aria-label="Close"><span><i class="ti ti-x"></i></span></button>
                        </div>
                    </div>
                    {{-- /Alert Message --}}
                </div>
            </div>

            <!-- Totals metrics -->
            <div class="row">

                <!-- Total Students -->
                <div class="col-xxl-3 col-sm-6 d-flex">
                    <div class="card flex-fill animate-card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl bg-danger-transparent me-2 p-1">
                                    <img src="{{URL::asset('build/img/icons/student.svg')}}" alt="img">
                                </div>
                                <div class="overflow-hidden flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h2 class="counter">54</h2>
                                    </div>
                                    <p>Total Students</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                                <p class="mb-0">Active : <span class="text-dark fw-semibold">45</span></p>
                                <span class="text-light">|</span>
                                <p>Inactive : <span class="text-dark fw-semibold">10</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total Students -->

                <!-- Total Teachers -->
                <div class="col-xxl-3 col-sm-6 d-flex">
                    <div class="card flex-fill animate-card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl me-2 bg-secondary-transparent p-1">
                                    <img src="{{URL::asset('build/img/icons/teacher.svg')}}" alt="img">
                                </div>
                                <div class="overflow-hidden flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h2 class="counter">28</h2>
                                    </div>
                                    <p>Total Instructors</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                                <p class="mb-0">Active : <span class="text-dark fw-semibold">20</span></p>
                                <span class="text-light">|</span>
                                <p>Inactive : <span class="text-dark fw-semibold">8</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total Teachers -->

                <!-- Total Staff -->
                <div class="col-xxl-3 col-sm-6 d-flex">
                    <div class="card flex-fill animate-card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl me-2 bg-warning-transparent p-1">
                                    <img src="{{URL::asset('build/img/icons/staff.svg')}}" alt="img">
                                </div>
                                <div class="overflow-hidden flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h2 class="counter">10</h2>
                                    </div>
                                    <p>Total Staff</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                                <p class="mb-0">Active : <span class="text-dark fw-semibold">16</span></p>
                                <span class="text-light">|</span>
                                <p>Inactive : <span class="text-dark fw-semibold">0</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total Staff -->

                <!-- Total Subjects -->
                <div class="col-xxl-3 col-sm-6 d-flex">
                    <div class="card flex-fill animate-card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl me-2 bg-success-transparent p-1">
                                    <img src="{{URL::asset('build/img/icons/subject.svg')}}" alt="img">
                                </div>
                                <div class="overflow-hidden flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h2 class="counter">12</h2>
                                    </div>
                                    <p>Total Courses</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                                <p class="mb-0">Active : <span class="text-dark fw-semibold">11</span></p>
                                <span class="text-light">|</span>
                                <p>Inactive : <span class="text-dark fw-semibold">2</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total Subjects -->

            </div>
            <!-- /Totals metrics -->

        </div>

    </div>
    <!-- /Page Wrapper -->
    @component('components.modal-popup')
    @endcomponent
@endsection
