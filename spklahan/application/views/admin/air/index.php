<?php $this->load->view("admin/includes/header") ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>

                <a href="<?php echo base_url("air/perhitungan") ?>" class="btn btn-primary">Calculation</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                #
                            </th>
                            <th>
                                Penangggung Jawab
                            </th> 
                            <th>
                                Kecamatan
                            </th>
                            
                            <th>
                                Desa
                            </th>
                            
                            <th>
                                Nama Petugas
                            </th>
                            
                            <th>
                                Kekeruhan
                            </th>
                            
                            <th>
                                Sisa Khlor
                            </th>
                            
                            <th>
                                pH
                            </th>
                            <th>
                                Hasil
                            </th>

                        </thead>
                        <tbody>
                            <?php foreach ($data_perhitungan as $key => $value) : ?>
                                <tr>
                                    <td>
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->nama ?>
                                    </td>
                                    <td>
                                        <?php echo $value->kecamatan ?>
                                    </td>
                                    <td>
                                        <?php echo $value->desa ?>
                                    </td>
                                    <td>
                                        <?php echo $value->namapetugas ?>
                                    </td>
                                    <td>
                                        <?php echo $value->kekeruhan ?>
                                    </td>
                                    <td>
                                        <?php echo $value->sisakhlor ?>
                                    </td>
                                    <td>
                                        <?php echo $value->ph ?>
                                    </td>
                                    <td>
                                        <?php echo $value->hasil ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("admin/includes/footer") ?>