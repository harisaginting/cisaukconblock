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
                    <a href="{{ url('gwynadmin') }}/article/add" class="btn btn-sm btn-outline-primary float-end"
                        type="button">
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
    <script type="text/javascript">
        var Page = function() {

            var tableInit = function() {
                var table = $('#data-artikel').DataTable({
                    language: {
                        searchPlaceholder: "Cari"
                    },
                    processing: true,
                    serverSide: true,
                    dom: '<f<t>ip>',
                    ajax: {
                        url: "{{ route('admin-article-list') }}",
                        type: 'GET',
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                        },
                        data: {
                            kategorial: $('#kategorial').val(),
                            sektor: $('#sektor').val(),
                            status: $('#status').val(),
                            marga: $('#marga').val()
                        },
                    },
                    aoColumns: [{
                            mRender: function(data, type, obj) {
                                return obj.url_key;
                            }
                        },
                        {
                            mRender: function(data, type, obj) {
                                return obj.title;
                            }
                        },
                        {
                            mRender: function(data, type, obj) {
                                if (obj.category === null || obj.category === "null" || obj
                                    .category === "") {
                                    return "semua kategori";
                                }
                                return obj.category
                            }
                        },
                        {
                            mRender: function(data, type, obj) {
                                return "<a style='margin-left:5px;' class='btn btn-info btn-sm btn-edit' href='{{ url('/') }}/articles/" +
                                    obj.url_key +
                                    "' target='_blank'><i class='fa fa-eye'></i></a><a style='margin-left:5px;' class='btn btn-warning btn-sm btn-edit' href='" +
                                    base_url + "/article/edit/" + obj.id +
                                    "' ><i class='fa fa-edit'></i></a>"
                            }
                        },

                    ],
                    fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        $(nRow).addClass('r_anggota');
                        $(nRow).attr('data-id', aData['id']);
                    }
                });
            };

            return {
                init: function() {

                    $("#sektor").select2({
                        placeholder: "Pilih sektor",
                        width: 'resolve',
                        allowClear: 'true',
                        ajax: {
                            type: 'GET',
                            delay: 200,
                            url: "{{ url('/') }}/api/v1/get-config/sektor",
                            dataType: "json",
                            data: function(params) {
                                return {
                                    q: params.term,
                                    page: params.page,
                                };
                            },
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(obj) {
                                        return {
                                            id: obj.id,
                                            text: obj.value
                                        };
                                    })
                                };
                            },

                        }
                    });


                    $("#marga").select2({
                        placeholder: "Pilih Marga",
                        width: 'resolve',
                        allowClear: 'true',
                        ajax: {
                            type: 'GET',
                            delay: 200,
                            url: "{{ url('/') }}/api/v1/get-marga",
                            dataType: "json",
                            data: function(params) {
                                return {
                                    q: params.term,
                                    page: params.page,
                                };
                            },
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(obj) {
                                        return {
                                            id: obj.id,
                                            text: obj.value
                                        };
                                    })
                                };
                            },

                        }
                    });
                    tableInit();
                    $(document).on('change', '.filter_data_anggota', function(e) {
                        e.stopImmediatePropagation();
                        $('#data-artikel').dataTable().fnDestroy();
                        tableInit();
                    });
                }
            };

        }();

        jQuery(document).ready(function() {
            Page.init();
        });
    </script>
@endsection
