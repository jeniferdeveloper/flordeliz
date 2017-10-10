  @extends('app')
        @section('content')

        <div id="home-page" class="container">
            <div class="content">
                <div class="title">Flor de Liz - Laravel 5.1 com Ionic Web App</div>
            </div>
        </div>
    
    <section id="content-menu">
     <div style="position:absolute; top:60px; left:10px; width:500px; height:500px;">
    {{-- <canvas id="myChart" width="200" height="200"></canvas> --}}
    </div>
      </section>

  
 
    {{-- <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    
        <script>        
    // Any of the following formats may be used
    var ctx = document.getElementById("myChart");
{{--var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        hover: {
            // Overrides the global setting
            mode: 'index'
        }
    }
}); --}}
{{-- var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Item 1', 'Item 2', 'Item 3'],
        datasets: [
            {
                type: 'bar',
                label: 'Bar Component',
                data: [10, 20, 30],
            },
            {
                type: 'line',
                label: 'Line Component',
                data: [30, 20, 10],
            }
        ]
    }
}); --}}

{{-- var data = {
    datasets: [{
        data: [
            11,
            16,
            7,
            3,
            14
        ],
        backgroundColor: [
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB"
        ],
        label: 'Red' // for legend
    }],
    labels: [
        "Red",
        "Green",
        "Yellow",
        "Grey",
        "Blue"
    ]
}; --}}

var data = {
    labels: [
        "Red",
        "Blue",
        "Yellow"
    ],
    datasets: [
        {
            data: [300, 50, 100],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ]
        }]
};
new Chart(ctx, {
   
    type: "pie",
    data: data,
    options: {
responsive: true,
    maintainAspectRatio: true,
            scale: {
                
                reverse: true,
                ticks: {
                    beginAtZero: true
                }
            }
    }
});

{{-- 
        var options = {
    width:400,
    height:200,
  // If high is specified then the axis will display values explicitly up to this value and the computed maximum from the data is ignored
  high: 100,
  // If low is specified then the axis will display values explicitly down to this value and the computed minimum from the data is ignored
  low: 0,
  // This option will be used when finding the right scale division settings. The amount of ticks on the scale will be determined so that as many ticks as possible will be displayed, while not violating this minimum required space (in pixel).
  scaleMinSpace: 20,
  // Can be set to true or false. If set to true, the scale will be generated with whole numbers only.
  onlyInteger: true,
  // The reference value can be used to make sure that this value will always be on the chart. This is especially useful on bipolar charts where the bipolar center always needs to be part of the chart.
  referenceValue: 5
};
        var data = {
  // A labels array that can contain any sort of values
  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
  // Our series array that contains series objects or in this case series data arrays
  series: [
    [5, 2, 4, 2, 0]
  ]
}; --}}

// Create a new line chart object where as first parameter we pass in a selector
// that is resolving to our chart container element. The Second parameter
// is the actual data object.
{{-- new Chartist.Line('.ct-chart', data,options);   
new Chartist.Line('#chart1', {
    labels: [1, 2, 3, 4],
    series: [[100, 120, 180, 200]]
  }); --}}

  // Initialize a Line chart in the container with the ID chart2
  {{-- new Chartist.Bar('#chart2', {
    labels: [1, 2, 3, 4],
    series: [[5, 2, 8, 3]]
  }); --}}
        </script>
  @endsection
