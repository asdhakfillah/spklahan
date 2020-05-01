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
                    <label class="col-md-2 col-form-label">Penanggung Jawab</label>
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
                        <input type="text" name="namapetugas" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kekeruhan</label>
                    <div class="col-md-10">
                        <input type="number" name="kekeruhan" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Sisa Khlor</label>
                    <div class="col-md-10">
                        <input type="number" name="sisakhlor" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">PH</label>
                    <div class="col-md-10">
                        <input type="number" name="ph" class="form-control">
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
