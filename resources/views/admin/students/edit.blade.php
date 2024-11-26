@extends('admin.layouts.master')

@section('main-content')
	
	<section class="section">
        <div class="section-header">
            <h1>{{ __('Students') }}</h1>
            {{ Breadcrumbs::render('students/edit') }}
        </div>

        <div class="section-body">
        	<div class="row">
	   			<div class="col-12 col-md-12 col-lg-12">
			    	<form action="{{ route('admin.students.update', $user) }}" method="POST" enctype="multipart/form-data">
			    		@csrf
			    		@method('PUT')
				    	<div class="card">
					    	<div class="card-body">
					    		<div class="form-row">
							        <div class="form-group col">
				                        <label>{{ __('Name') }}</label> <span class="text-danger">*</span>
				                        <input type="text" name="first_name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
				                        @error('name')
					                        <div class="invalid-feedback">
					                          	{{ $message }}
					                        </div>
					                    @enderror
				                    </div>
							        <div class="form-group col">
				                        <label>{{ __('Organization') }}</label> <span class="text-danger">*</span>
				                        <input type="text" name="organization" class="form-control @error('organization') is-invalid @enderror" value="{{ old('organization', $user->organization) }}">
				                        @error('organization')
					                        <div class="invalid-feedback">
					                          	{{ $message }}
					                        </div>
					                    @enderror
				                    </div>
				                </div>

				                <div class="form-row">
							        <div class="form-group col">
				                        <label>{{ __('Exam') }}</label> <span class="text-danger">*</span>
				                        <input type="text" name="exam" class="form-control @error('exam') is-invalid @enderror" value="{{ old('exam', $user->exam) }}">
				                        @error('exam')
					                        <div class="invalid-feedback">
					                          	{{ $message }}
					                        </div>
					                    @enderror
				                    </div>
							        <div class="form-group col">
				                        <label>{{ __('Free mock test') }}</label>
				                        <input type="text" name="phone" class="form-control @error('free_mock_tests') is-invalid @enderror" value="{{ old('free_mock_tests', $user->free_mock_tests) }}">
				                        @error('free_mock_tests')
					                        <div class="invalid-feedback">
					                          	{{ $message }}
					                        </div>
					                    @enderror
				                    </div>
				                </div>

								<div class="form-row">
							        <div class="form-group col">
				                        <label>{{ __('Registered') }}</label>
				                        <input type="text" name="is_registered" class="form-control @error('is_registered') is-invalid @enderror" value="{{ old('is_registered', $user->is_registered) }}">
				                        @error('is_registered')
					                        <div class="invalid-feedback">
					                          	{{ $message }}
					                        </div>
					                    @enderror
				                    </div>
							       
				                </div>

<!-- 				                
				                <div class="form-row">
				                	<div class="form-group col-md-6">
							            <label>{{ __('levels.status') }}</label> <span class="text-danger">*</span>
							            <select name="status" class="form-control @error('status') is-invalid @enderror">
							            	@foreach(trans('user_statuses') as $key => $status)
							                	<option value="{{ $key }}" {{ (old('status', $user->status) == $key) ? 'selected' : '' }}>{{ $status }}</option>
							                @endforeach
							            </select>
							            @error('status')
					                        <div class="invalid-feedback">
					                          	{{ $message }}
					                        </div>
					                    @enderror
							        </div>
				                </div> -->
			                    
							</div>
					        <div class="card-footer">
		                    	<button class="btn btn-primary mr-1" type="submit">{{ __('Submit') }}</button>
		                  	</div>
						</div>
		            </form>
				</div>
        	</div>
        </div>
    </section>

@endsection


@section('scripts')
	<script src="{{ asset('js/customer/edit.js') }}"></script>
@endsection