@extends('admin.layouts.app')

@section('content')
<div class="row mb-3">
        <div class="col-6">
            <h1>Edit subCategory</h1>
        </div>
    </div>
	<div class="container d-flex flex-column">
			<div class="row">
				<div class=" col-lg-12 mx-auto d-table h-100">
					<div class="d-table-cell ">
						<div class="card">
							<div class="card-body">
							@if (session('alert'))
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>{{ session('alert') }}</strong>
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								@endif
								<div class="m-sm-4">
                                    <form class="md-float-material form-material" method="post" action="{{ route('subcategories.update', $subcategory->id) }}" enctype="multipart/form-data">
                                      @csrf 
									  @method('PUT')
                                      <div class="mb-3">
											<label class="form-label"> name</label>
											<input class="form-control form-control-lg"  type="text" value="{{$subcategory->name}}" name="name" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label"> Category</label>
											<select class="form-select mb-3" name ="category_id">
												<option value ="" disable> select category</option>
												@foreach($categories as $cat)
												<option value="{{ $cat->id }}"{{ $subcategory->id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
												@endforeach
											</select>
											
										</div>
			
										<div class="text-center mt-3">
                                        <button type="submit" class="btn btn-md btn-block waves-effect waves-light text-center text-light m-b-20" style="background: black;">submit</button>
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
