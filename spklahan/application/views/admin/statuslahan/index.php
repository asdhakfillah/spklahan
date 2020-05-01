<?php $this->load->view("admin/includes/header") ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                #
                            </th> 

                            <th>
                                Kecamatan
                            </th>
                            
                            <th>
                                Desa
                            </th>

                            <th>
                                Status
                            </th>
                        </thead>
                        <tbody>
                            <?php foreach ($data_status as $key => $value) : ?>
                                <tr>
                                    <td>
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->kecamatan ?>
                                    </td>
                                    <td>
                                        <?php echo $value->desa ?>
                                    </td>
                                    <td>
                                        <?php echo $value->status ?>
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