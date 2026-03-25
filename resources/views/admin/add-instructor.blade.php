<?php $page = 'add-instructor'; ?>
@extends('layout.mainlayout')
@section('content')
  	<!-- Page Wrapper -->
      <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{ isset($instructor) ? 'Edit Instructor' : 'Add Instructor' }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{url('index')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('admin/instructors')}}">Instructors</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ isset($instructor) ? 'Edit Instructor' : 'Add Instructor' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <div class="col-md-12">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                                        @if(isset($instructor))
                    <form action="{{ route('instructors.update', $instructor->id) }}" method="POST">
                        @method('PUT')
                    @else
                    <form action="{{ route('instructors.store') }}" method="POST">
                    @endif
                        @csrf

                        <!-- Personal Information -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="d-flex align-items-center">
                                    <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                        <i class="ti ti-info-square-rounded fs-16"></i>
                                    </span>
                                    <h4 class="text-dark">Personal Information</h4>
                                </div>
                            </div>
                            <div class="card-body pb-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                            <div
                                                class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames">
                                                <i class="ti ti-photo-plus fs-16"></i>
                                            </div>
                                            <div class="profile-upload">
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn mb-3">
                                                        Upload
                                                        <input type="file" class="form-control image-sign"
                                                            multiple="">
                                                    </div>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary mb-3">Remove</a>
                                                </div>
                                                <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cols-xxl-5 row-cols-md-6">
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Flight School License Number</label>
                                            <input type="text" class="form-control" name="license_number" value="{{ old('license_number', isset($instructor) ? $instructor->license_number : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Callsign</label>
                                            <input type="text" class="form-control" name="callsign" value="{{ old('callsign', isset($instructor) ? $instructor->callsign : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" required value="{{ old('name', isset($instructor) ? $instructor->name : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Attributions</label>
                                            <select class="select" name="attributions[]" multiple>
                                                @foreach($attributions as $attribution)
                                                    <option value="{{ $attribution->id }}" {{ (is_array(old('attributions')) && in_array($attribution->id, old('attributions'))) || (isset($instructor) && $instructor->attributions->contains($attribution->id)) ? 'selected' : '' }}>{{ $attribution->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Preferred Branch (Hub)</label>
                                            <select class="select" name="preferred_hub_id">
                                                <option value="">Select Branch</option>
                                                @foreach(\App\Models\Branch::all() as $branch)
                                                    <option value="{{ $branch->id }}" {{ (old('preferred_hub_id', isset($instructor) ? $instructor->preferred_hub_id : '') == $branch->id) ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Instructor Roles <span class="text-danger">*</span></label>
                                            <select class="select" name="roles[]" multiple disabled>
                                                @foreach(\App\Models\Role::where('name', '!=', 'student')->where('name', '!=', 'admin')->get() as $role)
                                                    <option value="{{ $role->id }}" {{ (is_array(old('roles')) && in_array($role->id, old('roles'))) || (isset($instructor) && $instructor->roles->contains($role->id)) || (!old('roles') && !isset($instructor) && $role->name === 'instructor') ? 'selected' : '' }} {{ $role->name === 'instructor' ? 'disabled' : '' }}>{{ ucfirst($role->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <select class="select" name="gender">
                                                <option value="">Select</option>
                                                <option value="male" {{ (old('gender', isset($instructor) ? $instructor->gender : '') == 'male') ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ (old('gender', isset($instructor) ? $instructor->gender : '') == 'female') ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Primary Contact Number</label>
                                            <input type="text" class="form-control" name="phone" value="{{ old('phone', isset($instructor) ? $instructor->phone : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" required autocomplete="off" value="{{ old('email', isset($instructor) ? $instructor->email : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ old('address', isset($instructor) ? $instructor->address : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Post Code</label>
                                            <input type="text" class="form-control" name="post_code" value="{{ old('post_code', isset($instructor) ? $instructor->post_code : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" value="{{ old('city', isset($instructor) ? $instructor->city : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select class="select" name="country_id">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" {{ (old('country_id', isset($instructor) ? $instructor->country_id : '') == $country->id) ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', isset($instructor) && $instructor->date_of_birth ? $instructor->date_of_birth->format('Y-m-d') : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Place of Birth</label>
                                            <input type="text" class="form-control" name="place_of_birth" value="{{ old('place_of_birth', isset($instructor) ? $instructor->place_of_birth : '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Personal Information -->

                        <!-- Additional Fields can go here if needed -->

                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <div class="d-flex align-items-center">
                                    <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                        <i class="ti ti-file fs-16"></i>
                                    </span>
                                    <h4 class="text-dark">Password</h4>
                                </div>
                            </div>
                            <div class="card-body pb-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">New Password @if(!isset($instructor))<span class="text-danger">*</span>@endif</label>
                                            <input type="password" class="form-control" name="password" autocomplete="new-password" {{ isset($instructor) ? "" : "required" }}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password @if(!isset($instructor))<span class="text-danger">*</span>@endif</label>
                                            <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password" {{ isset($instructor) ? "" : "required" }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save Instructor</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
      </div>
      <!-- /Page Wrapper -->

@endsection
