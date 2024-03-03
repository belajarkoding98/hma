<!-- sample modal content -->
<div id="editPengguna" class="modal fade" role="dialog" aria-labelledby="editPengguna" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Pengguna </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            @if($errors->any())
            <div class="alert alert-danger">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
            @endif
            <form action="" id="formEditPengguna" method="post">
                {{ method_field('PUT')}}
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label"><span
                                        class="text-danger">*</span>Nama Lengkap</label>
                                <div class="col-sm-8">
                                    <input name="user_fullname" class="form-control" type="text" id="edit_user_fullname"
                                        value="{{old('user_fullname') }}" required />
                                    <span class="error invalid-feedback">{{$errors->first('user_fullname')}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label"><span
                                        class="text-danger">*</span>Email</label>
                                <div class="col-sm-8">
                                    <input name="user_email" class="form-control" type="text" id="edit_user_email"
                                        value="{{old('user_email')}}" required />
                                    <span class="error invalid-feedback">{{$errors->first('user_email')}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label"><span
                                        class="text-danger">*</span>Password</label>
                                <div class="col-sm-8">
                                    <input name="password" class="form-control" type="password" id="edit_password" />
                                    <span class="error invalid-feedback">AAAA</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label"><span
                                        class="text-danger">*</span>Konfirmasi Password</label>
                                <div class="col-sm-8">
                                    <input name="password_confirm" class="form-control" type="password"
                                        id="edit_password_confirm" />
                                    <span class="error invalid-feedback">{{$errors->first('password_confirm')}}</span>
                                </div>
                            </div>
                            <span class="text-danger">Kosongkan Password jika tidak ingin diganti</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" id="btnAddPengguna" class="btn btn-danger waves-light">Ya</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->