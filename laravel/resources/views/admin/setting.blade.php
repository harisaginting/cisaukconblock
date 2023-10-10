@extends('admin.template.main')


@section('content')
    <div class="row mb-3">
        <h3>Application<span class="h4 text-secondary"> Settings</span></h3>
        <div class="col-md-11 offset-md-1 border-bottom border-secondary">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Information</h5>
                </div>
                <div class="card-body">
                    <form class="row" id="form-artikel" method="post" action="{{ url('/') }}/artikel/save">
                        <div class="col-sm-12 form-group mb-2">
                            <label><i class="fa fa-globe"></i> Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="application name" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label><i class="fa fa-whatsapp"></i> Whatsapp</label>
                            <input type="text" name="whatsapp" id="whatsapp" placeholder="whatsapp phone number" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-end" type="button">save</button>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Logo</h5>
                </div>
                <div class="card-body">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-end" type="button">save</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footcode')
@endsection
