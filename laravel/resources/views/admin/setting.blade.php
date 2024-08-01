@extends('admin.template.main')


@section('content')
    <div class="row mb-3">
        <h3>Application<span class="h4 text-secondary"> Settings</span></h3>
        <div class="col-md-11 offset-md-1 border-bottom border-secondary">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Contact Information</h5>
                </div>
                <div class="card-body">
                    <form id="form-info" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="col-sm-12 form-group mt-2 mb-2">
                                    <label><i class="fa fa-globe"></i> Application Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $setting['name'] ?? '' }}" placeholder="application name" required>
                                </div>
                                <div class="col-sm-12 form-group mt-2">
                                    <label><i class="fa fa-envelope"></i> Email</label>
                                    <input type="text" name="email" id="email" placeholder="email"
                                        class="form-control" value="{{ $setting['email'] ?? '' }}" required>
                                </div>
                                <div class="col-sm-12 form-group mt-2">
                                    <label><i class="fa fa-phone"></i> Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="phone number"
                                        class="form-control" value="{{ $setting['phone'] ?? '' }}" >
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="col-sm-12 form-group mt-2">
                                    <label><i class="fa fa-whatsapp"></i> Whatsapp</label>
                                    <input type="text" name="whatsapp" id="whatsapp" placeholder="whatsapp phone number"
                                        class="form-control" value="{{ $setting['whatsapp'] ?? '' }}" required>
                                </div>

                                <div class="col-sm-12 form-group mt-2">
                                    <label><i class="fa fa-facebook"></i> Facebook</label>
                                    <input type="text" name="facebook" id="facebook" placeholder="facebook username"
                                        class="form-control" value="{{ $setting['facebook'] ?? '' }}">
                                </div>

                                <div class="col-sm-12 form-group mt-2">
                                    <label><i class="fa fa-instagram"></i> Instagram</label>
                                    <input type="text" name="instagram" id="instagram" placeholder="instagram username"
                                        class="form-control" value="{{ $setting['instagram'] ?? '' }}">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="w-100">
                                    <h5>Address</h5>
                                </div>
                                <div class="col-6">
                                    <div class="col-sm-12 form-group">
                                        <label><i class="fa fa-home"></i> Street</label>
                                        <input type="text" name="address_street" id="address_street"
                                            placeholder="address street" class="form-control"
                                            value="{{ $setting['address_street'] ?? '' }}">
                                    </div>

                                    <div class="col-sm-12 form-group mt-2">
                                        <label><i class="fa fa-home"></i> Province / District</label>
                                        <input type="text" name="address_district" id="address_district"
                                            placeholder="address province / district" class="form-control"
                                            value="{{ $setting['address_district'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center d-md-block">
                    <button class="btn btn-primary btn-md px-5" type="button" id="btn-save-info">save</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footcode')
    <script>
        var Page = function() {
            saveInfo = async () => {
                var formData = JSON.stringify($("#form-info").serializeArray());
                return await fetch("{{ route('admin-setting-save') }}", {
                        method: 'POST', // *GET, POST, PUT, DELETE, etc.
                        mode: 'cors',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + token,
                        },
                        referrerPolicy: 'no-referrer',
                        body: formData
                    }).then(r =>
                        r.json())
                    .then(data => {
                        return data;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        bootbox.alert({
                            message: 'update error!',
                            backdrop: true,
                            buttons: {
                                ok: {
                                    label: 'Yes',
                                    className: 'px-5 btn-primary'
                                },
                            },
                            callback: function(result) {
                                console.log(
                                    'This was logged in the callback: ' +
                                    result);
                            }
                        });
                    });
            }

            return {
                init: function() {
                    $(document).on('click', '#btn-save-info', function(e) {
                        e.preventDefault();
                        if ($("#form-info").valid()) {
                            $("#loader").removeClass("hidden");
                            saveInfo().then((data) => {
                                $("#loader").addClass("hidden");
                                if (data.status == 200) {
                                    bootbox.alert({
                                        message: 'update success!',
                                        backdrop: true,
                                        buttons: {
                                            ok: {
                                                label: 'OK',
                                                className: 'px-5 btn-primary'
                                            },
                                        },
                                        callback: function(result) {
                                            console.log(
                                                'This was logged in the callback: ' +
                                                result);
                                        }
                                    });
                                } else {
                                    bootbox.alert({
                                        message: 'update error!',
                                        backdrop: true,
                                        buttons: {
                                            ok: {
                                                label: 'OK',
                                                className: 'px-5 btn-primary'
                                            },
                                        },
                                        callback: function(result) {
                                            console.log(
                                                'This was logged in the callback: ' +
                                                result);
                                        }
                                    });
                                }
                            });

                        }
                    });
                }
            };

        }();

        jQuery(document).ready(function() {
            Page.init();
        });
    </script>
@endsection
