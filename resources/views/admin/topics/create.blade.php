@extends('admin.layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-6">
            <h1>Add Topic</h1>
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
                                    <form class="md-float-material form-material" method="post" action="{{ route('topics.store') }}" enctype="multipart/form-data">
                                      @csrf 
                                      <div class="mb-3">
											<label class="form-label"> name</label>
											<input class="form-control form-control-lg"  type="text" name="name" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label"> Category</label>
											<select class="form-select mb-3" name ="category_id">
												<option value ="" disable> select category</option>
												@foreach($categories as $cat)
												<option value ="{{$cat->id}}">{{$cat->name}}</option>
												@endforeach
											</select>
										</div>

										<div class="mb-3">
											<label class="form-label">sub Category</label>
											<select class="form-select mb-3" name ="subcategory_id">
												<option value =""> select category</option>
											</select>
									
										</div>
									
										<div class="mb-3">
											<label class="form-label">Question image</label>
											<input class="form-control form-control-lg"  type="file" name="question_image" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label">question audio</label>
											<input class="form-control form-control-lg"  type="file" name="question_audio" placeholder="Enter your name" />
										</div>

										<div class="mb-3">
											<label class="form-label">Answer image</label>
											<input class="form-control form-control-lg"  type="file" name="answer_image" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Answer audio</label>
											<input class="form-control form-control-lg"  type="file" name="answer_audio" placeholder="Enter your name" />
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
		<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
		<script type="text/javascript">
            $(document).ready(function () {
   		 $('select[name="category_id"]').on('change', function () {
        var catId = $(this).val();
        var url = "{{ route('loadsubcategory', ['id' => ':id']) }}";
        url = url.replace(':id', catId);

        if (catId) {
            $.ajax({
                url: url,
                type: "POST", // Use POST method for CSRF token protection
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {

                    $('select[name="subcategory_id"]').empty();
                    $.each(data, function (key, value) {
						console.log(value.name);
                        $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('select[name="subcategory_id"]').empty();
        }
    });
});
        </script>
@endsection
