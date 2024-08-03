<!DOCTYPE html><!--
    * CoreUI - Free Bootstrap Admin Template
    * @version v4.2.2
    * @link https://coreui.io/product/free-bootstrap-admin-template/
    * Copyright (c) 2023 creativeLabs Łukasz Holeczek
    * Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
    -->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>GWYN ADMIN</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('public') }}/admin/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('public') }}/admin/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public') }}/admin/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ url('public') }}/admin/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ url('public') }}/admin/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="{{ url('public') }}/admin/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="{{ url('public') }}/admin/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/jqueryvalidation.min.js"></script>
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/bootbox.min.js"></script>
    <script type="text/javascript">
        const base_url          = "{{url('/')}}";
        const customer_token    = localStorage.getItem('_token');
        const global            = $(document);
    </script>
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-5 text-white bg-secondary img-fluid d-none d-md-block">
                            <div class="card-body text-center">
                                <img width="auto" alt="Gwyn Logo" src="{{ url('public') }}/admin/logo/clear/3.png" style="object-fit: contain;object-position:center;width:100%;" />
                            </div>
                        </div>
                        
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <form id="form-login">
                                    <h1>Login</h1>
                                    <p class="text-medium-emphasis">Sign In to your account</p>
                                    <div class="input-group mb-3"><span class="input-group-text">
                                            <svg class="icon">
                                                <use
                                                    xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-user">
                                                </use>
                                            </svg></span>
                                        <input class="form-control" id="username" name="username" autocomplete="none"
                                            type="text" placeholder="Username">
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                            <svg class="icon">
                                                <use
                                                    xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-lock-locked">
                                                </use>
                                            </svg></span>
                                        <input class="form-control" id="password" name="password" autocomplete="none"
                                            type="password" placeholder="Password">
                                    </div>
                                    <div class="alert alert-danger alert-block col-12 d-none" id="errLogin"></div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button id="btn-login" class="btn btn-primary px-4"
                                                type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ url('public') }}/admin/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="{{ url('public') }}/admin/vendors/simplebar/js/simplebar.min.js"></script>
    <script></script>

</body>
<script type="text/javascript">
    const f_username = $("#username");
    const f_password = $("#password");
    class Login {
        constructor() {}

        setToken(token) {
            this.token = token();
        }

        getToken(token) {
            return this.token;
        }

        username = () => {
            return f_username.val();
        }
        password = () => {
            return f_password.val();
        }

        login = async (username, password) => {
            let data = {
                "username": username,
                "password": password
            };
            return await fetch("{{ route('admin-login-process') }}", {
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    mode: 'cors', // no-cors, *cors, same-origin
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    referrerPolicy: 'no-referrer',
                    body: JSON.stringify(data)
                }).then(r =>
                    r.json())
                .then(data => {
                    return data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
        
    }
    document.addEventListener('DOMContentLoaded', function() {
        const form = new Login();
        const submitForm = () => {
            if ($("#form-login").valid()) {
                form.login(form.username(), form.password()).then((data) => {
                    f_username.attr("readOnly", true);
                    f_password.attr("readOnly", true);
                    if (data.status == 200) {
                        localStorage.setItem('_token', data.data.token);
                        window.location.href = "{{ route('admin') }}";
                        // alert("selamat datang " + data.data.user.nama);
                    } else {
                        m = "username atau password kamu salah";
                        if (data.message) {
                            m = data.message;
                        }
                        f_username.attr("readOnly", false);
                        f_password.attr("readOnly", false);
                        $("#errLogin").removeClass("d-none");
                        $("#errLogin").text(m);
                    }
                });
            }
        }
        $(document).on("click", "#btn-login", (e) => {
            e.preventDefault();
            submitForm();
        });
        $(document).on("submit", "#form-login", (e) => {
            e.preventDefault();
            submitForm();
        });
    });
</script>

<script type="text/javascript">
    var CheckAuth = function () {
    validateToken = async(token) =>{
          return await fetch(base_url+"/api/validate-token/"+token, {
            method      : 'GET', // *GET, POST, PUT, DELETE, etc.
            mode        : 'cors', 
            referrerPolicy: 'no-referrer'
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
            let token = localStorage.getItem('_token');
            if (token === "" || token === null) {
              console.log("no auth");
            }else{
              validateToken(token).then((data)=>{
                $("#loader").addClass("hidden");
                  if(data.status !== 200){
                    console.log("no auth");
                  }else{
                    console.log("token valid");
                    window.location.href = "{{route('admin')}}";
                  }
              });  
            }
          }
      };

  }();

  jQuery(document).ready(function() {
      CheckAuth.init();
  });  
  </script>

</html>
