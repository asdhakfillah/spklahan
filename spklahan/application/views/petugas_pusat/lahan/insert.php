<?php $this->load->view("admin/includes/header") ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('') ?>

          
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Penanggung jawab</label>
                    <div class="col-md-10">
                        <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo $data_pendaftaran->nama ?>">
                        <?php echo form_error('nama', '', '') ?>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-2 col-form-label">kecamatan</label>
                    <div class="col-md-10">
                        <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" value="<?php echo $data_pendaftaran->kecamatan ?>">
                        <?php echo form_error('kecamatan', '', '') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Desa</label>
                    <div class="col-md-10">
                        <input type="text" name="desa" class="form-control" placeholder="desa" value="<?php echo $data_pendaftaran->desa ?>">
                        <?php echo form_error('desa', '', '') ?>
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama Petugas</label>
                    <div class="col-md-10">
                        <input type="text" name="namapetugas" class="form-control" value=>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Sumber air</label>
                    <div class="col-md-10">
                        <select name="sumberair" class="form-control">
                            <option value="1">Ada</option>
                            <option value="2">Tidak Ada</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Minat Masyarakat</label>
                    <div class="col-md-10">
                        <select name="minatmasyarakat" class="form-control">
                            <option value="100">Sangat Minat</option>
                            <option value="80">Minat</option>
                            <option value="60">Kurang Minat</option>
                            <option value="40">Cukup Minat</option>
                            <option value="20">Tidak Minat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Segi Kesehatan</label>
                    <div class="col-md-10">
                        kekeruhan
                        <input type="number" name="nilai_kekeruhan" class="form-control" step="0.01">
                        Sisa khlor
                        <input type="number" name="nilai_sisa_khlor" class="form-control" step="0.01">
                        pH
                        <input type="number" name="nilai_ph" class="form-control" step="0.01">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Jarak Sumber Air</label>
                    <div class="col-md-10">
                        <input type="number" name="jaraksumberair" class="form-control" min=0 value=0>
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-md-2 col-form-label">perizinan</label>
                    <div class="col-md-10">
                        <select name="perizinan" class="form-control">
                            <option value="1">izin</option>
                            <option value="2">Tidak izin</option>
                        </select>
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-md-2 col-form-label">Investor</label>
                    <div class="col-md-10">
                        <select name="investor" class="form-control">
                            <option value="50">Pemerintah</option>
                            <option value="30">Perorangan</option>
                            <option value="10">PT</option>
                        </select>
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kontur Tanah</label>
                    <div class="col-md-10">
                        <select name="konturtanah" class="form-control">
                            <option value="1">Pegunungan</option>
                            <option value="2">Dataran</option>
                        </select>
                    </div>
                </div>

                

                <div class="row">
                    <div class="offset-md-2 col-md-12">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("admin/includes/footer") ?>
