<?php $page = 'instructors-grid'; ?>
@extends('layout.mainlayout')
@section('content')
   <!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content content-two">
				@component('components.breadcrumb')
				@slot('title')
				Instructors
				@endslot
				@slot('item1')
				Dashboard
				@endslot
				@slot('item2')
				Peoples
				@endslot
				@slot('item3')
				Instructors
				@endslot
			   @endcomponent

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

				<div
					class="bg-white p-3 border rounded-1 d-flex align-items-center justify-content-between flex-wrap mb-4 pb-0">
					<h4 class="mb-3">Instructors Grid</h4>
					<div class="d-flex align-items-center flex-wrap">
						<div class="input-icon-start mb-3 me-2 position-relative">
								<span class="icon-addon">
									<i class="ti ti-calendar"></i>
								</span>
								<input type="text" class="form-control date-range bookingrange" placeholder="Select"
								value="Academic Year : 2024 / 2025">
							</div>
						<div class="dropdown mb-3 me-2">
							<a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
								data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
									class="ti ti-filter me-2"></i>Filter</a>
							<div class="dropdown-menu drop-width">
								<form action="{{url('guardians')}}">
									<div class="d-flex align-items-center border-bottom p-3">
										<h4>Filter</h4>
									</div>
									<div class="p-3 pb-0 border-bottom">
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Name</label>
													<select class="select">
														<option>Select</option>
														<option>William</option>
														<option>Stacey</option>
														<option>George</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Class</label>
													<select class="select">
														<option>Select</option>
														<option>III A</option>
														<option>II (A)</option>
														<option>VI (A)</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="p-3 d-flex align-items-center justify-content-end">
										<a href="#" class="btn btn-light me-3">Reset</a>
										<button type="submit" class="btn btn-primary">Apply</button>
									</div>
								</form>
							</div>
						</div>
						<div class="d-flex align-items-center bg-white border rounded-2 p-1 mb-3 me-2">
							<a href="{{url('teachers')}}" class=" btn btn-icon btn-sm me-1 bg-light primary-hover"><i
								class="ti ti-list-tree"></i></a>
							<a href="{{url('teacher-grid')}}" class=" active btn btn-icon btn-sm  primary-hover"><i
								class="ti ti-grid-dots"></i></a>
						  </div>
						<div class="dropdown mb-3">
							<a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
								data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by A-Z </a>
							<ul class="dropdown-menu p-3">
								<li>
									<a href="javascript:void(0);" class="dropdown-item rounded-1 active">
										Ascending
									</a>
								</li>
								<li><a href="javascript:void(0);" class="dropdown-item rounded-1">
										Descending
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item rounded-1">
										Recently Viewed
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item rounded-1">
										Recently Added
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row">
                    <!-- Instructor Grid -->
                        @forelse($instructors as $instructor)
                        <div class="col-xxl-3 col-xl-4 col-md-6 d-flex">
                                <div class="card flex-fill">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                                <a href="#" class="link-primary">I{{ str_pad($instructor->id, 6, "0", STR_PAD_LEFT) }}</a>
                                                <div class="d-flex align-items-center">
                                                        <span class="badge badge-soft-success d-inline-flex align-items-center me-1"><i class="ti ti-circle-filled fs-5 me-1"></i>Active</span>
                                                        <div class="dropdown">
                                                                <a href="#" class="btn btn-white btn-icon btn-sm d-flex align-items-center justify-content-center rounded-circle p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ti ti-dots-vertical fs-14"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-right p-3">
                                                                        <li>
                                                                                <a class="dropdown-item rounded-1" href="{{ route('instructors.edit', $instructor->id) }}"><i class="ti ti-edit-circle me-2"></i>Edit</a>
                                                                        </li>
                                                                        <li>
                                                                                <a class="dropdown-item rounded-1" href="#" data-bs-toggle="modal" data-bs-target="#delete-modal"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="bg-light-300 rounded-2 p-3 mb-3">
                                                        <div class="d-flex align-items-center">
                                                                <a href="#" class="avatar avatar-lg flex-shrink-0"><img src="{{URL::asset('build/img/profile.png')}}" class="img-fluid rounded-circle" alt="img"></a>
                                                                <div class="ms-2">
                                                                <h5 class="mb-0"><a href="#">{{ $instructor->name }}</a></h5>
                                                                <p class="mb-0 text-muted">No courses assigned</p>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="mb-3">
                                                        <p class="mb-0 d-inline-flex align-items-center text-gray-7">
                                                                <i class="ti ti-mail fs-16 me-2"></i>{{ $instructor->email }}
                                                        </p>
                                                </div>
                                                <div class="mb-3">
                                                        <p class="mb-0 d-inline-flex align-items-center text-gray-7">
                                                                <i class="ti ti-phone fs-16 me-2"></i>{{ $instructor->phone ?? 'N/A' }}
                                                        </p>
                                                </div>
                                                <div>
                                                        <p class="mb-0 d-inline-flex align-items-center text-gray-7">
                                                                <i class="ti ti-map-pin fs-16 me-2"></i>{{ $instructor->preferredHub->name ?? 'N/A' }}
                                                        </p>
                                                </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center flex-wrap gap-2">
                                                        @foreach($instructor->attributions as $attribution)
                                                        <span class="badge badge-soft-info">{{ $attribution->name }}</span>
                                                        @endforeach
                                                </div>
                                                <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-light btn-sm">View Details</a>
                                        </div>
                                </div>
                        </div>
                        @empty
                        <div class="col-12"><p class="text-center">No instructors found.</p></div>
                        @endforelse
                    <!-- /Instructor Grid -->

                    <div class="load-more text-center">
                        <a href="#" class="btn btn-primary"><i class="ti ti-loader-3"></i>Load More</a>
                    </div>
				</div>

			</div>
		</div>
		<!-- /Page Wrapper -->
        @component('components.modal-popup')
        @endcomponent
@endsection
