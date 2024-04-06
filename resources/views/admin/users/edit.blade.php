@extends('admin.layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-6">
            <h1>Edit User</h1>
        </div>
    </div>

    <div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class=" col-lg-12 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Punjabi App</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
							@if (session('alert'))
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>{{ session('alert') }}</strong>
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								@endif
								<div class="m-sm-4">
									
                                    <form class="md-float-material form-material" method="post" action="{{ route('users.update', $user->id) }}">
                                      @csrf 
                                     @method('PUT')
                                      <div class="mb-3">
											<label class="form-label">First name</label>
											<input class="form-control form-control-lg" value ="{{$user->first_name}}" type="text" name="first_name" placeholder="Enter your First Name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Last name</label>
											<input class="form-control form-control-lg" type="text"  value ="{{$user->last_name}}" name="last_name" placeholder="Enter your last Name" />
										</div>
                                       <div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" value ="{{$user->email}}" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											<small>
                                          </small>
                                          <div class="mb-3">
											<label class="form-label">DOB</label>
											<input class="form-control form-control-lg" type="date"  value ="{{$user->DoB}}"name="dob" placeholder="Enter date" />
											<small>
                                          </small>
										</div>
										<div class="mb-3">
											<label class="form-label">Phone</label>
											<input class="form-control form-control-lg" type="number"min-lenth ="11" max-length ="11"  value ="{{$user->phone}}" name="phone" placeholder="Enter your phone" />
											<small>
                                          </small>
										</div>
										<input class="form-control form-control-lg" type="hidden" value="1" name="role_id" />
									
										<div class="text-center mt-3">
                                        <button type="submit" class="btn btn-md btn-block waves-effect waves-light text-center text-light m-b-20" style="background: black;">Update</button>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
@endsection
