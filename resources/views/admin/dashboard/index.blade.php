@extends('admin.layouts.master')

@section('main-content')
	<section class="section">
        <div class="section-header">
            <h1>{{ __('Dashboard') }}</h1>
            {{ Breadcrumbs::render('dashboard') }}
        </div>

        @if(auth()->user()->myrole == \App\Enums\UserRole::ADMIN)
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-paper-plane"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total Order') }}</h4>
                            </div>
                            <div class="card-body">
                             
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total User') }}</h4>
                            </div>
                            <div class="card-body">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total Shop') }}</h4>
                            </div>
                            <div class="card-body">
                          
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total Income') }}</h4>
                            </div>
                            <div class="card-body">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-plus-square"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total Order') }}</h4>
                            </div>
                            <div class="card-body">
                             
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-paper-plane"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Order Pending') }}</h4>
                            </div>
                            <div class="card-body">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-star"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Order Process') }}</h4>
                            </div>
                            <div class="card-body">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Order Completed') }}</h4>
                            </div>
                            <div class="card-body">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(auth()->user()->myrole == \App\Enums\UserRole::DELIVERYBOY)
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-plus-square"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total Order') }}</h4>
                            </div>
                            <div class="card-body">
                         
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-star"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Order Process') }}</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalProcessOrders->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Order Completed') }}</h4>
                            </div>
                            <div class="card-body">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total Product Price') }}</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalIncome }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

		<div class="row">
		    <div class="col-md-12">
		        <div class="card">
			        <div class="card-body">
			        	<div id="earningGraph"></div>
			        </div>
			    </div>
			</div>
		</div>

        <div class="row">
		    <div class="col-md-8">
		        <div class="card">
		            <div class="card-header">
		                  <div class="card-header-action">
		                   </div>
		            </div>
		            <div class="card-body p-0">
		                <div class="table-responsive table-invoice">
		                    <table class="table table-striped">
		                        <tr>
		                            <th>{{ __('Name') }}</th>
		                            <th>{{ __('Status') }}</th>
		                            <th>{{ __('Total') }}</th>
		                            <th>{{ __('Action') }}</th>
		                        </tr>
		               
		                    </table>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-4">
				<div class="card">
				    <div class="profile-dashboard bg-maroon-light">
					    <a href="{{ route('admin.profile') }}">
					        <img src="{{ auth()->user()->images }}" alt="">
					    </a>
					    <h1>{{ auth()->user()->name }}</h1>
					    <p>
			            	{{ auth()->user()->getrole->name ?? '' }}
					    </p>
					</div>
			        <div class="list-group">
			            <li class="radius-none list-group-item list-group-item-action"><i class="fa fa-user"></i> {{ auth()->user()->username }}</li>
			            <li class="list-group-item list-group-item-action"><i class="fa fa-envelope"></i> {{ auth()->user()->email }}</li>
			            <li class="list-group-item list-group-item-action"><i class="fa fa-phone"></i> {{ auth()->user()->phone }}</li>
			            <li class="list-group-item list-group-item-action"><i class="fa fa-map"></i> {{ auth()->user()->address }}</li>
			        </div>
				</div>
		    </div>
		</div>
    </section>

@endsection

@section('scripts')
	<script src="{{ asset('assets/modules/highcharts/highcharts.js') }}"></script>
	<script src="{{ asset('assets/modules/highcharts/highcharts-more.js') }}"></script>
	<script src="{{ asset('assets/modules/highcharts/data.js') }}"></script>
	<script src="{{ asset('assets/modules/highcharts/drilldown.js') }}"></script>
	<script src="{{ asset('assets/modules/highcharts/exporting.js') }}"></script>
	@include('vendor.installer.update.OrderIncomeGraph')
@endsection
