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
                    <label class="col-md-2 col-form-label">nama</label>
                    <div class="col-md-10">
                        <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo set_value('nama') ?>">
                        <?php echo form_error('nama', '', '') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nomor telpon</label>
                    <div class="col-md-10">
                        <input type="text" name="no_telpon" class="form-control" placeholder="no_telpon" value="<?php echo set_value('no_telpon') ?>">
                        <?php echo form_error('no_telpon', '', '') ?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">tanggal</label>
                    <div class="col-md-10">
                        <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="<?php echo set_value('tanggal') ?>">
                        <?php echo form_error('tanggal', '', '') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">kecamatan</label>
                    <div class="col-md-10">
                        <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" value="<?php echo set_value('kecamatan') ?>">
                        <?php echo form_error('kecamatan', '', '') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">desa</label>
                    <div class="col-md-10">
                        <input type="text" name="desa" class="form-control" placeholder="desa" value="<?php echo set_value('desa') ?>">
                        <?php echo form_error('desa', '', '') ?>
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
