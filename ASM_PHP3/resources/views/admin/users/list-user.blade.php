@extends('admin.layouts.default')

@section('title')
    {{-- Xem chi tiết: {{ $product['name'] }} --}}
    Danh sách Người Dùng
@endsection

@section('content')
    <style>
        .modal-backdrop {
            z-index: 1;
        }

        .container {
            max-width: 350px;
            background: #F8F9FD;
            background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
            border-radius: 40px;
            padding: 25px 35px;
            border: 5px solid rgb(255, 255, 255);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
            margin: 20px;
        }

        .heading {
            text-align: center;
            font-weight: 900;
            font-size: 30px;
            color: rgb(16, 137, 211);
        }

        .form {
            margin-top: 20px;
        }

        .form .input {
            width: 100%;
            background: white;
            border: none;
            padding: 15px 20px;
            border-radius: 20px;
            margin-top: 15px;
            box-shadow: #cff0ff 0px 10px 10px -5px;
            border-inline: 2px solid transparent;
        }

        .form .input::-moz-placeholder {
            color: rgb(170, 170, 170);
        }

        .form .input::placeholder {
            color: rgb(170, 170, 170);
        }

        .form .input:focus {
            outline: none;
            border-inline: 2px solid #12B1D1;
        }

        .form .forgot-password {
            display: block;
            margin-top: 10px;
            margin-left: 10px;
        }

        .form .forgot-password a {
            font-size: 11px;
            color: #0099ff;
            text-decoration: none;
        }

        .form .login-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
            color: white;
            padding-block: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .form .login-button:hover {
            transform: scale(1.03);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
        }

        .form .login-button:active {
            transform: scale(0.95);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
        }

        .social-account-container {
            margin-top: 25px;
        }

        .social-account-container .title {
            display: block;
            text-align: center;
            font-size: 10px;
            color: rgb(170, 170, 170);
        }

        .social-account-container .social-accounts {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 5px;
        }

        .social-account-container .social-accounts .social-button {
            background: linear-gradient(45deg, rgb(0, 0, 0) 0%, rgb(112, 112, 112) 100%);
            border: 5px solid white;
            padding: 5px;
            border-radius: 50%;
            width: 40px;
            aspect-ratio: 1;
            display: grid;
            place-content: center;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 12px 10px -8px;
            transition: all 0.2s ease-in-out;
        }

        .social-account-container .social-accounts .social-button .svg {
            fill: white;
            margin: auto;
        }

        .social-account-container .social-accounts .social-button:hover {
            transform: scale(1.2);
        }

        .social-account-container .social-accounts .social-button:active {
            transform: scale(0.9);
        }

        .agreement {
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .agreement a {
            text-decoration: none;
            color: #0099ff;
            font-size: 9px;
        }
    </style>
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            @if (session('messageError'))
                <div class="alert alert-primary" role="alert">
                    {{ session('messageError') }}
                </div>
            @endif
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-5 w-100">
                        <div class="d-flex justify-content-between mb-10 w-100">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">
                                    <h3 class="text-danger">Quản lý danh sách người dùng</h3>
                                </span>
                            </h3>
                            <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addUser">Thêm mới</a>
                        </div>
                    </div>

                    <div class="card-body pt-2">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed align-middle gs-0 gy-2 my-0">
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0" align="center">
                                                <th class="p-0 pb-3 min-w-100px r">
                                                    STT
                                                </th>
                                                <th class="p-0 pb-3 min-w-100px r pe-13">
                                                    Name
                                                </th>
                                                <th class="p-0 pb-3 w-150px r pe-7">
                                                    Email
                                                </th>
                                                <th class="p-0 pb-3 w-150px r pe-7">
                                                    Role
                                                </th>
                                                <th class="p-0 pb-3 w-201px r">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listUser as $key => $value)
                                                <tr align="center">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>
                                                        @if ($value->role == '1')
                                                            Admin
                                                        @elseif($value->role == '2')
                                                            User
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit"
                                                            data-id="{{ $value->id }}">Edit</a>
                                                        <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#modalDelete"
                                                            data-id="{{ $value->id }}">Delete</a>
                                                        <a href="" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#modalInfo">INFO</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- MODAL ADDUSER -->
    <div class="modal fade" id="addUser" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUserLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="z-index: 1000">
                    <form action="{{ route('admin.users.addUsers') }}" class="form" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input class="input" type="text" name="name" id="name" placeholder="Name"
                                for="name">
                            <input class="input" type="email" name="email" id="email" placeholder="E-mail"
                                for="email">
                            <input class="input" type="password" name="password" id="password" placeholder="Password"
                                for="password">
                            <div class="mt-3">
                                <label for="role">Select Role</label>
                                <select class="form-control input" id="role" name="role" for="role">
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                            <span class="forgot-password"><a href="#">Forgot Password ?</a></span>
                            <input class="login-button" type="submit" value="Sign In">
                        </div>
                    </form>
                    <div class="social-account-container">
                        <span class="title">Or Sign in with</span>
                        <div class="social-accounts">
                            <button class="social-button google">
                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 488 512">
                                    <path
                                        d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                    </path>
                                </svg></button>
                            <button class="social-button apple">
                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 384 512">
                                    <path
                                        d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z">
                                    </path>
                                </svg>
                            </button>
                            <button class="social-button twitter">
                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DELETE --}}
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDeleteLabel">Cảnh báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có muốn xóa không ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <form action="" id="confirmDelete" method="POST">
                        @method('delete')
                        <button class="btn btn-danger">Xác nhận Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal  EDIT-->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEditLabel">Chỉnh sửa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.users.editUsers') }}" class="form" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="idUserEdit" name="idUser">
                        <input class="input" type="text" name="name" id="nameEdit" placeholder="Name"
                            for="nameEdit">
                        <input class="input" type="email" name="emailUpdate" id="emailUpdate" placeholder="E-mail"
                            for="emailUpdate">
                        {{-- <input class="input" type="passwordEdit" name="passwordEdit" id="passwordEdit"
                            placeholder="passwordEdit" for="password"> --}}
                        <div class="mt-3">
                            <label for="roleEdit">Select Role</label>
                            <select class="form-control input" id="roleEdit" name="role" for="roleEdit">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-warning">Chỉnh sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
<script>
    // DELETE
    // const modalDelete = document.getElementById('modalDelete')
    // if (modalDelete) {
    //     modalDelete.addEventListener('show.bs.modal', event => {
    //         const button = event.relatedTarget
    //         const idUser = button.getAttribute('data-id')
    //         // console.log(recipient);

    //         let confirmDelete = document.querySelector('#confirmDelete')
    //         confirmDelete.setAttribute('action', '{{ route('admin.users.deleteUsers') }}?id=' + idUser)
    //     })
    // }

    var exampleModel = document.getElementById('modalDelete')
   exampleModel.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget
    var recipient = button.getAttribute('data-id')

    let confirmDelete = document.querySelector('#confirmDelete')
    confirmDelete.setAttribute('action', '{{ route("admin.users.deleteUsers") }}?id=' + idUser)
   })


    // EDIT
    const modalEdit = document.getElementById('modalEdit')
    if (modalEdit) {
        modalEdit.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const idUser = button.getAttribute('data-id')
            // console.log(recipient);

            // Call API
            let url = "{{ route('admin.users.detailUsers') }}?id=" + idUser;
            fetch(url, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                })
                .then((response) => response.json())
                .then((data) => {
                    // console.log(data);
                    document.querySelector('#idUserEdit').value = data.id
                    document.querySelector('#nameEdit').value = data.name
                    document.querySelector('#emailEdit').value = data.email
                    document.querySelector('#roleEdit').value = data.role

                })
        })
    }
</script>
