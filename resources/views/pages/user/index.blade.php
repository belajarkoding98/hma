@extends('layouts.admin_app')
@section('title', 'Master Pengguna')
@section('styles')
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Sweet Alert -->
<link href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ url('user') }}">Pengguna</a></li>
                        <li class="breadcrumb-item active">Master Pengguna</li>
                    </ol>
                </div>
                <h4 class="page-title">Pengguna</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    <a href="{{route('user.create')}}" data-toggle="modal" data-target="#tambahPengguna"
                        class="btn btn-success waves-effect waves-light m-b-10"><i
                            class="mdi mdi-check-all mr-2"></i>Tambah Data</a>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataUser as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->user_fullname }}</td>
                                <td>{{ $row->user_email }}</td>
                                <td>{!! ($row->user_status == '1' ? '<span class="badge badge-success">Aktif</span>' :
                                    '<span class="badge badge-danger">Tidak Aktif</span>') !!}</td>
                                <td>
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-edit"
                                        data-id="{{ $row->user_id }}" data-toggle="modal" data-target="#editPengguna"
                                        title="Edit"><i class="fas fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btndelete"
                                        title="hapus" data-id="{{ $row->user_id }}"
                                        data-user="{{ $row->user_fullname }}"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
@include('pages.user.create_modal')
@include('pages.user.edit_modal')
@endsection
@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
{{--
<script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script> --}}
<script src="{{asset('assets/pages/datatables.init.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#tambahPengguna').modal('show');
    @endif
</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btndelete').click(function (e) {
            e.preventDefault();

            var deleteid = $(this).closest("tr").find('.btndelete').data('id');
            var fullname = $(this).closest("tr").find('.btndelete').data('user');
            swal({
                title: 'Apakah Anda Yakin?',
                text: "akan menghapus data : " + fullname,
                icon: 'warning',
                button: true,
            })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '{{ url("user-delete") }}/' + deleteid,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                    icon: "success",
                                })
                                    .then((result) => {
                                        //AJAX RELOAD
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

        //memunculkan form edit nasabah
        $('body').on('click', '.btn-edit', function () {
            var id = $(this).data('id');
            $.get("{{ url('user-detail') }}" + '/' + id, function (data) {
                $('#edit_user_fullname').val(data.user_fullname);
                $('#edit_user_email').val(data.user_email);
                $('#formEditPengguna').attr('action', "user/" + data.user_id);
            })
        });
    });

</script>
@endsection