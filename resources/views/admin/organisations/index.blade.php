@extends('admin.layouts.master')

@section('main-content')

  <section class="section">
        <div class="section-header">
            <h1>{{ __('Organisations') }}</h1>
            {{ Breadcrumbs::render('organisations') }}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('organisations_create')
                            <div class="card-header">
                                <a href="{{ route('admin.organisations.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> {{ __('Add Administrator') }}</a>
                            </div>
                        @endcan
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="maintable" data-url="{{ route('admin.organisations.get-organisations') }}" data-hidecolumn="{{ auth()->user()->can('organisations_show') || auth()->user()->can('organisations_edit') || auth()->user()->can('organisations_delete') }}">
                                    <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Exam Name') }}</th>
                                            <th>{{ __('Exam Url') }}</th>
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
    <script src="{{ asset('js/organizations/index.js') }}"></script>
@endsection
