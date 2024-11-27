@extends('admin.layouts.master')

@section('main-content')
	
	<section class="section">
        <div class="section-header">
            <h1>{{ __('Exams') }}</h1>
            {{ Breadcrumbs::render('exams/add') }}
        </div>

        <div class="section-body">
        	<div class="row">
	   			<div class="col-12 col-md-6 col-lg-6">
				    <div class="card">
					<form action="{{ route('admin.exams.exams-store') }}" method="POST">
								@csrf
								<div class="card-body">
									<!-- Name Input -->
									<div class="form-group">
										<label>{{ __('levels.name') }}</label> <span class="text-danger">*</span>
										<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
										@error('name')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>

									<!-- Organisation Dropdown -->
									<div class="form-group">
										<label>{{ __('Select Organisation') }}</label>
										<select name="organisation_name" class="form-control @error('organisation_name') is-invalid @enderror">
											<option value="" selected disabled>{{ __('Choose Organisation') }}</option>
											@foreach($organizations as $organisation)
												<option value="{{ $organisation->name }}">{{ $organisation->name }}</option>
											@endforeach
										</select>
										@error('organisation_name')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>

								<div class="card-footer">
									<button class="btn btn-primary mr-1" type="submit">{{ __('Submit') }}</button>
								</div>
							</form>

					</div>
				</div>
			</div>
        </div>
    </section>

@endsection
