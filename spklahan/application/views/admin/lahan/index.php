<?php $this->load->view("admin/includes/header") ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>

                <a href="<?php echo base_url("Lahan/perhitungan") ?>" class="btn btn-primary">Calculation</a>
                <a href="<?php echo base_url(). 'Lahan/generate_to_pdf';?>"><button type="button" class="btn btn-outline-primary mr-2">Print Biodata DOMPDF</button></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table">
                        <thead class=" text-primary">
                            <th>
                                #
                            </th>
                            <th>
                                Penanggung jawab Desa
                            </th> 
                            <th>
                                Nama Petugas
                            </th> 
                            <th>
                                Kecamatan
                            </th>
                            
                            <th>
                                Desa
                            </th>
                            
                            <th>
                                Sumber Air
                            </th>
                            
                            <th>
                                Minat Masyarakat
                            </th>
                            
                            <th>
                                Segi Kesehatan
                            </th>
                            
                            <th>
                                Jarak 
                            </th>
                            <th>
                                Perizinan
                            </th>
                            <th>
                                Investor
                            </th>
                             <th>
                                Kontur Tanah
                            </th>

                            <th>
                                Hasil
                            </th>
                            <th>
                                Status
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
                                        <?php echo $value->namapetugas ?>
                                    </td>
                                    <td>
                                        <?php echo $value->kecamatan ?>
                                    </td>
                                    <td>
                                        <?php echo $value->desa ?>
                                    </td>
                                    <td>
                                        <?php echo $value->sumberair ?>
                                    </td>
                                    <td>
                                        <?php echo $value->minatmasyarakat ?>
                                    </td>
                                    <td>
                                        <?php echo $value->segikesehatan ?>
                                    </td>
                                    <td>
                                        <?php echo $value->jaraksumberair ?>
                                    </td>
                                    <td>
                                        <?php echo $value->perizinan ?>
                                    </td>
                                     <td>
                                        <?php echo $value->investor ?>
                                    </td>
                                     <td>
                                        <?php echo $value->konturtanah ?>
                                    </td>
                                    <td>
                                        <?php echo $value->hasil ?>
                                    </td>
                                     <td>
                                        <a href="<?php echo base_url("Statuslahan/insert/".$value->id) ?>" class="btn btn-primary">Lahan</a>
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
<!-- <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script> -->
<?php $this->load->view("admin/includes/footer") ?>