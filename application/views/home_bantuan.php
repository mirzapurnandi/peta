<script type="text/javascript">
  function init_chart_doughnut() {

    if (typeof(Chart) === 'undefined') {
      return;
    }

    console.log('init_chart_doughnut');

    if ($('.canvasDoughnutjns').length) {

      var chart_doughnut_settings = {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
          labels: [
            "Pria",
            "Wanita"
          ],
          datasets: [{
            data: [<?= $total_pria . ', ' . $total_wanita ?>],
            backgroundColor: [
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#36CAAB",
              "#49A9EA"
            ]
          }]
        },
        options: {
          legend: false,
          responsive: false
        }
      }

      $('.canvasDoughnutjns').each(function() {

        var chart_element = $(this);
        var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

      });

    }

    if ($('.canvasDoughnutprodi').length) {

      var chart_doughnut_settings1 = {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
          labels: [<?= $arr_n; ?>],
          datasets: [{
            data: [<?= $arr_j; ?>],
            backgroundColor: [
              "#1DC3C7",
              "#9B59B6",
              "#E74C3C",
              "#26B99A",
              "#3498DB",
              "#3444DB",
              "#3444AS",
              "#34445Q",
              "#344412",
              "#E22912",
              "#D33916",
              "#C88917",
              "#888919",
              "#1B519A"
            ],
            hoverBackgroundColor: [
              "#1FD4D8",
              "#B370CF",
              "#E95E4F",
              "#36CAAB",
              "#49A9EA",
              "#CFD4D8",
              "#B370CF",
              "#E95E4F",
              "#36CAAB",
              "#49A9EA",
              "#B370CF",
              "#E95E4F",
              "#36CAAB",
              "#49A9EA"
            ]
          }]
        },
        options: {
          legend: false,
          responsive: false
        }
      }

      $('.canvasDoughnutprodi').each(function() {

        var chart_element = $(this);
        var chart_doughnut = new Chart(chart_element, chart_doughnut_settings1);

      });

    }

  }

  $(document).ready(function() {
    init_chart_doughnut();
  });
</script>