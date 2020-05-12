<?php $this->load->view("petugas_lapangan/includes_petugas_lapangan/header") ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Simple Table</h4>

        <a href="<?php echo base_url("Petugas_lapangan/Pendaftaran/insert") ?>" class="btn btn-primary">Tambah Pendaftaran</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                #
              </th>
              <th>
                Nama
              </th>
              <th>
                No_telpon
              </th>
              <th>
                Tanggal
              </th>
              <th>
                Kecamatan
              </th>
              <th>
                Desa
              </th>
              <th class="text-right">
                Action
              </th>
            </thead>
            <tbody>
              <?php foreach ($pendaftaran_data as $key => $value) : ?>
                <tr>
                  <td>
                    <?php echo $key+1; ?>
                  </td>
                  <td>
                    <?php echo $value->nama ?>
                  </td>
                  <td>
                    <?php echo $value->no_telpon ?>
                  </td>
                  <td>
                    <?php echo $value->tanggal ?>
                  </td>
                  <td>
                    <?php echo $value->kecamatan ?>
                  </td>
                  <td>
                    <?php echo $value->desa ?>
                  </td>
                  <td class="text-right">
                    <a href="<?php echo base_url("Petugas_lapangan/Lahan/insert/".$value->id) ?>" class="btn btn-primary">Lahan</a>
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
<?php $this->load->view("petugas_lapangan/includes_petugas_lapangan/footer") ?>