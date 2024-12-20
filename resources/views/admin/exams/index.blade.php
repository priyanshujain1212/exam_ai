@extends('admin.layouts.master')

@section('main-content')
  
  <section class="section">
        <div class="section-header">
            <h1>{{ __('Exams') }}</h1>
            {{ Breadcrumbs::render('exams') }}
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('exams_create')
                            <div class="card-header">
                                <a href="{{ route('admin.exams.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> {{ __('Add Exams') }}</a>
                            </div>
                        @endcan
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="maintable" data-url="{{ route('admin.exams.get-exams') }}" data-hidecolumn="{{ auth()->user()->can('exams_show') || auth()->user()->can('exams_edit') || auth()->user()->can('exams_delete') }}">
                                    <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Organisation') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/exams/index.js') }}"></script>
@endsection
