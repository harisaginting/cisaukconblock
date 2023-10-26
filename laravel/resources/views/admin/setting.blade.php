@extends('admin.template.main')


@section('content')
    <div class="row mb-3">
        <h3>Application<span class="h4 text-secondary"> Settings</span></h3>
        <div class="col-md-11 offset-md-1 border-bottom border-secondary">
        </div>
    </div>

    <div class="row">
        <div class="offset-md-3 col-md-6 col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Information</h5>
                </div>
                <div class="card-body">
                    <form class="row" id="form-info" method="post">
                        <div class="col-sm-12 form-group mb-2">
                            <label><i class="fa fa-globe"></i> Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $setting['name'] ?? '' }}"
                                placeholder="application name" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label><i class="fa fa-whatsapp"></i> Whatsapp</label>
                            <input type="text" name="whatsapp" id="whatsapp" placeholder="whatsapp phone number"
                                class="form-control" value="{{ $setting['whatsapp'] ?? ''  }}" required>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center d-md-block">
                    <button class="btn btn-primary btn-md" type="button" id="btn-save-info">save</button>
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
                                    alert("data berhasil diupdate");
                                    location.reload();
                                    window.location.href = "{{ route('admin-setting') }}";
                                } else {

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
