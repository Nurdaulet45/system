@extends('layouts.app_admin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                @include('include\result_messages')

                <div class="box-body">
                    <h1 class=" justify-content-center" style="text-align: center">Подтвержденные инциденты за неделю</h1>
                    <canvas id="myChart" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@parent

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Подтверждено',
        data: [],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [],
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var updateChart = function() {
      axios.get('/api/chart').then(res => {
          res.data;
          myChart.data.labels = res.data.currDate;
        myChart.data.datasets[0].data = res.data.counts;
        myChart.update();
      });
  }
  
  updateChart();
//   setInterval(() => {
//     updateChart();
//   }, 1000);
</script>
@endsection