<x-modal size="modal-xl" data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Tambah Data Guru
    </x-slot>

    @method('post')

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <input type="text" name="gender" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="phone">No.Telepon</label>
                <input type="text" name="phone" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="address">Alamat</label>
        <textarea name="address" id="address" rows="3" class="form-control"></textarea>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" >
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <div class="input-group datepicker" id="tanggal_lahir" data-target-input="nearest">
                    <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#tanggal_lahir" />
                    <div class="input-group-append" data-target="#tanggal_lahir" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select">
                    <option disabled selected>Pilih salah satu</option>
                    <option value="pns">PNS</option>
                    <option value="tetap">Guru Tetap</option>
                    <option value="tidak_tetap">Guru Tidak Tetap</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="path_image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="path_image" class="custom-file-input" id="path_image"
                        onchange="preview('.preview-path_image', this.files[0])">
                    <label class="custom-file-label" for="path_image">Choose file</label>
                </div>
            </div>

            <img src="" class="img-thumbnail preview-path_image" style="display: none;">
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="submitForm(this.form)">Simpan</button>
    </x-slot>
</x-modal>
