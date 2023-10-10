@extends('admin.template.main')


@section('content')
    <div class="row mb-3">
        <h3>Articles<span class="h4 text-secondary"> List</span></h3>
        <div class="col-md-11 offset-md-1 border-bottom border-secondary">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('gwynadmin') }}/article/add" class="btn btn-sm btn-outline-primary float-end" type="button">
                        <i class="fa fa-plus"></i> New
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 pl-0 pr-0">
                            <table id="data-artikel" class="table table-responsive-sm table-bordered table-striped table-md"
                                style="width: 100%;">
                                <thead>
                                    <th style="width:40%">Url Key</th>
                                    <th style="width:35%">Judul</th>
                                    <th style="width:15%">Kategori</th>
                                    <th style="width:10%"></th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection


@section('footcode')
@endsection
