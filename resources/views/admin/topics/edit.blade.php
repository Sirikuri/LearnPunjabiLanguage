@extends('admin.layouts.app')

@section('content')
<div class="row mb-3">
        <div class="col-6">
            <h1>Edit Topic</h1>
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
                                    <form class="md-float-material form-material" method="post" action="{{ route('topics.update', $topic->id) }}" enctype="multipart/form-data">
                                      @csrf 
									  @method('PUT')
                                      <div class="mb-3">
											<label class="form-label"> name</label>
											<input class="form-control form-control-lg"  type="text" value="{{$topic->name}}" name="name" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label"> Category</label>
											<select class="form-select mb-3" id="category_id" name="category_id">
											<option value=""  selected>Select category</option>
											@foreach($categories as $cat)
												<option value="{{ $cat->id }}"{{ $topic->id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
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
										@if($topic->question_image)
										<img src="{{ asset('images/'.$topic->question_image) }}" width="60px" hight="60px" alt="Image">
										@endif
										</div>
										<div class="mb-3">
											<label class="form-label">question image</label>
											<input class="form-control form-control-lg"  type="file" name="question_image" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
										@if($topic->question_audio)
										<audio controls>
												<source src="{{ asset('audios/'.$topic->question_audio) }}" type="audio/mpeg">
												Your browser does not support the audio element.
											</audio>
											@endif
										</div>
										<div class="mb-3">
											<label class="form-label">question audio</label>
											
											<input class="form-control form-control-lg"  type="file" name="question_audio" placeholder="Enter your name" />
										</div>

										<div class="mb-3">
										@if($topic->answer_image)
										<img src="{{ asset('images/'.$topic->answer_image) }}" width="60px" hight="60px" alt="Image">
										@endif
										</div>
										<div class="mb-3">
											<label class="form-label">answer image</label>
											<input class="form-control form-control-lg"  type="file" name="answer_image" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
										@if($topic->answer_audio)
										<audio controls>
												<source src="{{ asset('audios/'.$topic->answer_audio) }}" type="audio/mpeg">
												Your browser does not support the audio element.
											</audio>
											@endif
										</div>
										<div class="mb-3">
											<label class="form-label">answer audio</label>
											
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
				$('#category_id').change(); // Trigger change event manually

$('select[name="category_id"]').on('change', function () {
	var catId = $(this).val();
	var url = "{{ route('loadsubcategory', ['id' => ':id']) }}";
	url = url.replace(':id', catId);

	if (catId) {
		$.ajax({
			url: url,
			type: "POST",
			dataType: "json",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function (data) {
				$('select[name="subcategory_id"]').empty();
				$.each(data, function (key, value) {
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
