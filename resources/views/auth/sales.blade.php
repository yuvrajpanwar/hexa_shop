@extends('admin_layout/admin_app')

@section('content')   

      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <h1 class="page-title">Sales</h1>
          </div> <!-- .col-12 -->
        </div> <!-- .row -->
      </div> 

      <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xs-6" >
              <div class="chart-container" style="position: relative; height: 375px;border: 1px solid #00345e ;">
                <canvas id="myPieChart"></canvas>
              </div>
            </div>
            <div class="col-lg-6 col-xs-6">
              <div class="chart-container"style="position: relative; height: 375px;border: 1px solid #00345e ;">
                <canvas id="myBarChart"></canvas>
              </div>
            </div>
        </div>
      </div>
  
@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('myPieChart').getContext('2d');
  var data = {
    labels: [ {!! implode(', ', array_map(fn($category) => '"' . $category['name'] . '"',$categories->toArray())) !!}],

    datasets: [{
      data: [{{ implode(', ', array_map(fn($sale) => $sale , $category_sale  )) }}],
      borderColor: 'black',
      borderWidth: 0,
      backgroundColor: ['#86B6F6','#DF826C','#80BCBD','#F6D776','#AC87C5','#F6B17A','#A9B388'],
    }]
  };
  var options = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        position: 'bottom',
        labels: {
          color: '#00345e',
        },
        padding: {
                top: 20
        } 

      },
      title: {
        display: true,
        text: 'Total Sale',
        padding: {
          top: 10,
          bottom: 20
        },
        color: '#00345e',
        font: {
          weight: 'bold',
          size: 22
        }
      }
    },
    scales: {
      x: {
        display:false,
        ticks: {
          color: 'white'
        }
      },
      y: {
        display:false,
        ticks: {
          color: 'white'
        }
      }
    }
  };

  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: options
  });
</script>

<script>
  var ctx = document.getElementById('myBarChart').getContext('2d');

  var data = {
    // labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5', 'Category 6', 'Other'],
    labels: [ {!! implode(', ', array_map(fn($category) => '"' . $category['name'] . '"',$categories->toArray())) !!}],
   
    datasets: [
      {
      // data: [15, 10, 25, 5, 20, 15, 10],
      data: [{{ implode(', ', array_map(fn($sale) => $sale , $category_sale  )) }}],
    
      backgroundColor: ['#86B6F6','#DF826C','#80BCBD','#F6D776','#AC87C5','#F6B17A','#A9B388'],
    }]
  };

  var options = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display:false,
        position: 'bottom',
        labels: {
          color: '#00345e',
          
        },
        // padding: 20
      },
      title: {
        display: true,
        text: 'Total Sale',
        padding: {
          top: 10,
          bottom: 20
        },
        color: '#00345e',
        font: {
          weight: 'bold',
          size: 22
        }
      }
    },
    scales: {
      x: {
        ticks: {
          color: '#00345e'
        }
      },
      y: {
        ticks: {
          color: '#00345e'
        }
      }
    }
  };

  var myPieChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });
</script>
    
@endpush
