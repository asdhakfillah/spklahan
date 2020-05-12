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
                    <label class="col-md-2 col-form-label">kecamatan</label>
                    <div class="col-md-10">
                        <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" value="<?php echo $data_status->kecamatan ?>">
                        <?php echo form_error('kecamatan', '', '') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Desa</label>
                    <div class="col-md-10">
                        <input type="text" name="desa" class="form-control" placeholder="desa" value="<?php echo $data_status->desa ?>">
                        <?php echo form_error('desa', '', '') ?>
                    </div>
                </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">Status</label>
                    <div class="col-md-10">
                        <select name="status" class="form-control">
                            <option>Lahan Rekomendasi</option>
                            <option>Lahan Tidak layak</option>
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
