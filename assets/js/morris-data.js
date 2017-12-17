// Morris.js Charts sample data for SB Admin template

$(function() {
    $(document).ready(function(){
      $.getJSON( "http://localhost/CodeIgniter-2.2.6/index.php/web/index/gender", function( obj ) {
        // Donut Chart
        $.each(obj, function() {
            if (this.label == "L") {
                this.label = "Laki-laki";
            }
            if (this.label == "P") {
                this.label = "Perempuan";
            }
        });
        var Chart = Morris.Donut({
            element: 'morris-donut-chart',
            data: obj,
            colors: ['deepskyblue', 'deeppink'],
            resize: true
        });
        Chart.options.data.forEach(function(label, n){
          var legendItem = $('<span style="margin-right: 10px;"></span>').text( label['label'] + ": " +label['value']).prepend('<i class="fa fa-circle">&nbsp;</i>');
          legendItem.find('i')
            .css('color', Chart.options.colors[n])
            // .css('width', '20px')
            // .css('display', 'inline-block')
            // .css('margin', '5px');
          $('#legend').append(legendItem)
        });
      });
        $.getJSON( "http://localhost/CodeIgniter-2.2.6/index.php/web/index/peminjaman", function( obj ) {
          // Line Chart
          Morris.Line({
              // ID of the element in which to draw the chart.
              element: 'morris-line-chart',
              // Chart data records -- each entry in this array corresponds to a point on
              // the chart.
              data: obj,
              // The name of the data record attribute that contains x-visitss.
              xkey: 'tgl_pinjam',
              // A list of names of data record attributes that contain y-visitss.
              ykeys: ['jumlah'],
              // Labels for the ykeys -- will be displayed when you hover over the
              // chart.
              labels: ['Jumlah Peminjaman'],
              // Disables line smoothing
              smooth: false,
              resize: true,
              hideHover: 'auto',
              lineColors: ['darkred', 'green', 'blue']
          });
        });
      $.getJSON( "http://localhost/CodeIgniter-2.2.6/index.php/web/index/anggota", function( obj ) {
        // Area Chart
        Morris.Area({
            element: 'morris-area-chart',
            data: obj,
            xkey: 'tgl_daftar',
            ykeys: ['pria', 'wanita'],
            labels: ['Jumlah Pria', 'Jumlah Wanita'],
            pointSize: 2,
            hideHover: 'auto',
            lineColors: ['steelblue', 'seagreen', 'blue'],
            resize: true
        });
      });
      $.getJSON( "http://localhost/CodeIgniter-2.2.6/index.php/web/index/umur_anggota", function( obj ) {
        // Bar Chart
        Morris.Bar({
            element: 'morris-bar-chart',
            data: obj,
            xkey: 'age_range',
            ykeys: ['count'],
            labels: ['Jumlah'],
            barRatio: 0.4,
            xLabelAngle: 35,
            hideHover: 'auto',
            barColors: ['peru', '#333333', '#4d4d4d', '#666666', '#808080', '#999999', '#b3b3b3', '#cccccc'],
            resize: true
        });
      });
    });
});
