</div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url("assets/") ?>assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="<?php echo base_url("assets/") ?>assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url("assets/") ?>assets/js/init/fullcalendar-init.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

   <!--  <script>
      $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
  }
    </script> -->
</body>
<!-- <script>
  var table = "";
  var data_today = [];
  var label = [];
  var data_yesterday = [];

  var isToday = true;

  var mode      = 'index'
  var intersect = true;
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  $(function(){
    today();
    datepick();
  })

  var canvas = $('#visitors-chart')
  var chart  = new Chart(canvas, {
    scales             : {
      yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
          },
          ticks    : $.extend({
            
            stepSize: 1.0
          }, ticksStyle)
        }],
        xAxes: [{
          gridLines: {
            display: true
          },
          ticks    : ticksStyle
        }]
      }
    });

  function datepick(){
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    })
  }

  // function loadChart(data_today,label){
  //   // chart.destroy();
  //   chart  = new Chart(canvas, {
  //     data   : {
  //       labels  : label,
  //       datasets: [
  //       {
  //         type                : 'line',
  //         data                : data_today,
  //         backgroundColor     : '#FF6384',
  //         borderColor         : '#FF6384',
  //         fill                : false
  //       }]
  //     },
  //     options: {
  //       maintainAspectRatio: false,
  //       tooltips           : {
  //         mode     : mode,
  //         intersect: intersect
  //       },
  //       hover              : {
  //         mode     : mode,
  //         intersect: intersect
  //       },
  //       legend             : {
  //         display: false
  //       },
  //       scales             : {
  //         yAxes: [{
  //         // display: false,
  //         gridLines: {
  //           display      : true,
  //         },
  //         ticks    : $.extend({
  //           stepSize: 1.00
  //         }, ticksStyle)
  //       }],
  //       xAxes: [{
  //         gridLines: {
  //           display: true
  //         },
  //         ticks    : ticksStyle
  //       }]
  //     }
  //   }
  // })


  // }

  // function loadChartToday() {
  //   // chart.destroy();
  //   // $.getJSON('<?php echo base_url('api/chart/get_today') ?>', function(data) {
  //   //   $.each(data, function(index) {
  //   //     data_today.push(data[index])
  //   //   });
  //   // });
  //   $.ajax({
  //       url: '<?php echo base_url('api/chart/get_today') ?>',
  //       type: "GET",
  //       dataType: 'JSON',
  //       success: function (data) {
  //           for (var x = 0; x < data.length; x++) {
  //               // content = data[x].Id;
  //               data_today.push(data[x].suhu)
  //               label.push(data[x].label);
  //              // updateListing(data[x]);
  //           }
  //           loadChart(data_today,label);
  //       }
  //   });
  // }

  function today(){
    $("input[name='datepicker']").val("");
    data_today = [];
    label = [];
    isToday = true;
    loadChartToday();
    var table = $("#example1").DataTable({
      dom: 'Bfrtip',
      buttons: ['excel', 'pdf', 'print'],
      "destroy" : true,
      "processing": true,
      "ajax":{
        "url": '<?php echo base_url('api/chart/getData') ?>',
      },

      "columns": [
          { data: 'id'},
          { data: 'nama' },
          { data: 'namapetugas' },
          { data: 'kecamatan' },
          { data: 'desa' },
          { data: 'sumberair' },
          { data: 'minatmasyarakat' },
          { data: 'segikesehatan' },
          { data: 'jaraksumber' },
          { data: 'perizinan' },
          { data: 'investor' },
          { data: 'konturtanah' },
          { data: 'hasil' }
          ]
    });

    if (isToday) {
      setInterval( function () {
        data_today = [];
        label = [];
        chart.destroy();
        table.ajax.reload();
        loadChartToday();
      }, 1000 * 60 * 60 );
    }
  }

  function get_by_date(){
    var date_search = $("input[name='datepicker']").val();
    if (date_search == "") {

    }else {
      isToday = false;
      $.ajax({
       type: "POST",
       url: '<?php echo base_url('api/chart/get_by_date') ?>',
       data: {date_search:date_search},
       success: function(response){
        var json = $.parseJSON(response);
        date_today = [];
        chart.destroy();
        loadChart(json.chart,json.label);

        var table = $("#example1").DataTable({
          "destroy" : true,
          "processing": true,
          dom: 'Bfrtip',
          buttons: ['excel', 'pdf', 'print'],
          "data": json.table,
          "dataSrc": "table",
          "columns": [
          { data: 'id'},
          { data: 'nama' },
          { data: 'namapetugas' },
          { data: 'kecamatan' },
          { data: 'desa' },
          { data: 'sumberair' },
          { data: 'minatmasyarakat' },
          { data: 'segikesehatan' },
          { data: 'jaraksumber' },
          { data: 'perizinan' },
          { data: 'investor' },
          { data: 'konturtanah' },
          { data: 'hasil' }
          ]
        });
      }
    });
    }
  }
          ]
        });
      }
    });
    }
  }

</script>  -->
</html>
