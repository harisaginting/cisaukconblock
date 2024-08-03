@extends('admin.template.main')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Edit</strong><span class="small ms-1">Article</span></div>
                <div class="card-body">
                    <form class="row" id="form-artikel" method="post" action="{{ url('/') }}/artikel/save">
                        <div class="col-sm-12 form-group">
                            <label><strong>Title</strong></label>
                            <input type="hidden" name="id_artikel" id="id_artikel" value="{{ $id }}">
                            <input type="text" name="title" id="title" class="form-control" required value="{{ $title }}">
                        </div>

                        <div class="col-sm-12 form-group">
                            <label><strong>Url key</strong></label>
                            <input type="text" name="url_key" id="url_key" value="{{ $url_key }}" class="form-control" required>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label><strong>Description</strong></label>
                            <textarea type="text" name="short_description" id="short_description" class="form-control" required maxlength="300">{{ $short_description }}</textarea>
                        </div>


                        <div class="col-sm-12 form-group">
                            <label><strong>Category</strong></label>
                            <select id="category" name="category" class="form-control filter_data_anggota">
                                <option value="">Semua Kategori</option>
                                <option value="GENERAL" selected>GENERAL</option>
                            </select>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label><strong>Desktop Picture</strong></label>
                            <div id="upload-image" style="width:100%;padding: 0px;"></div>
                            <input style="display: none;" type="file" id="upload-photo" accept="image/*">
                            <input style="display: none;" type="text" id="upload-photo-result"
                                name="upload-photo-result">
                            <div class="w-100 text-center">
                                <button type="button" class="btn btn-warning btn-sm hidden" id="btn-set-image">set
                                    foto</button>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label><strong>Mobile Picture</strong></label>
                            <div id="upload-image-mobile" style="width:100%;padding: 0px;"></div>
                            <input style="display: none;" type="file" id="upload-photo-mobile" accept="image/*">
                            <input style="display: none;" type="text" id="upload-photo-result-mobile"
                                name="upload-photo-result-mobile">
                            <div class="w-100 text-center">
                                <button type="button" class="btn btn-warning btn-sm hidden" id="btn-set-image-mobile">set
                                    foto</button>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-4">
                            <div id="summernote"></div>
                        </div>
                        <input type="hidden" name="content-value" id="content-value">
                    </form>
                    <div class="row">
                        <div class="col-sm-12 text-center pt-2">
                            <button type="button" class="btn btn-md btn-success" id="btn-save-artikel">submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footcode')
    <script>
        var Page = function() {
            var wywsigInit = function() {
                $('#summernote').summernote({
                    height: 600,
                    maxHeight: 1200
                });
            };

            saveArtikel = async () => {
                var formData = JSON.stringify($("#form-artikel").serializeArray());
                return await fetch("{{ route('admin-article-update') }}", {
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
                    wywsigInit();
                    $(document).on('click','#btn-save-artikel', function (e) {
                    e.preventDefault();
                    let content = $('#summernote').summernote('code');
                    $('#content-value').val(content);
                    $uploadCrop.result('base64','viewport').then(function (resp) {
                    $("#upload-photo-result").val(resp);
                    });
                    if($("#form-artikel").valid()){
                        $("#loader").removeClass("hidden");
                        saveArtikel().then((data)=>{
                            $("#loader").addClass("hidden");
                            if(data.status == 200){
                                alert("data berhasil diupdate");
                                location.reload();
                                window.location.href = "{{ route('admin-article') }}";
                            }else{
                                
                            }
                        });    
                        
                        
                    }
                });

                // upload foto
                $uploadCropCont = document.getElementById('upload-image');
                $uploadCrop = new Croppie($uploadCropCont, {
                    enableExif: true,
                    // enableResize: true,
                    enableOrientation: true,
                    viewport: {
                        width: 800,
                        height: 325
                    },
                    boundary: {
                        width: 805,
                        height: 330
                    }
                });

                $('#upload-photo').on('change', function () { 
                    var reader = new FileReader();
                    reader.onload = function (e) {
                    $uploadCrop.bind({
                    url: e.target.result
                    }).then(function(){
                        $uploadCrop.result('base64','viewport').then(function (resp) {
                        $("#upload-photo-result").val(resp);
                        });
                    });
                    
                    }
                reader.readAsDataURL(this.files[0]);
                $("#btn-set-image").removeClass("hidden");
                });

                $("#upload-image > .cr-boundary").on('click', function() {
                $("#upload-photo").click();
                });

                global.on("click","#btn-set-image", function(e){
                    e.preventDefault();
                    $uploadCrop.result('base64','viewport').then(function (resp) {
                        $("#upload-photo-result").val(resp);
                        alert("gambar desktop berhasil diatur");
                    });
                });

                $uploadCropContMobile = document.getElementById('upload-image-mobile');
                $uploadCropMobile     = new Croppie($uploadCropContMobile, {
                    enableExif: true,
                    // enableResize: true,
                    enableOrientation: true,
                    viewport: {
                        width: 350,
                        height: 350
                    },
                    boundary: {
                        width: 355,
                        height: 355
                    }
                });

                $('#upload-photo-mobile').on('change', function () { 
                    var reader = new FileReader();
                    reader.onload = function (e) {
                    $uploadCropMobile.bind({
                    url: e.target.result
                    }).then(function(){
                        $uploadCropMobile.result('base64','viewport').then(function (resp) {
                        $("#upload-photo-result-mobile").val(resp);
                        });
                    });
                    
                    }
                reader.readAsDataURL(this.files[0]);
                $("#btn-set-image-mobile").removeClass("hidden");
                });

                $("#upload-image-mobile > .cr-boundary").on('click', function() {
                $("#upload-photo-mobile").click();
                });

                global.on("click","#btn-set-image-mobile", function(e){
                    e.preventDefault();
                    $uploadCrop.result('base64','viewport').then(function (resp) {
                        $("#upload-photo-result-mobile").val(resp);
                        alert("gambar mobile berhasil diatur");
                    });
                });
            // end upload foto
                }
            };

        }();

        jQuery(document).ready(function() {
            Page.init();
        });
    </script>
@endsection
