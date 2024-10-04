<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
          <div class="clear-both overflow-hidden shadow-xl sm:rounded-lg p-4 bg-slate-50">
            @livewire('document.count')
          </div>

          <div class="grid md:grid-cols-2 mt-6 gap-6 hidden">
              <div class="bg-slate-800 shadow-lg rounded">
                  <div class="mb-3">
                    <h6 class="uppercase text-gray-100 mb-1 text-xs font-semibold">
                      Overview
                    </h6>
                    <h2 class="text-white text-xl font-semibold">
                      Payments
                    </h2>
                  </div>
                  <!-- Line Chart -->
                  <div class="relative" style="height:350px">
                      <canvas id="line-chart"></canvas>
                  </div>
              </div>
              <div class="bg-white p-4 shadow-lg rounded">
                  <div class="mb-3">
                    <h6 class="uppercase text-gray-500 mb-1 text-xs font-semibold">
                      Performance
                    </h6>
                    <h2 class="text-gray-800 text-xl font-semibold">
                      Total Orders
                    </h2>
                  </div>
                  <!-- Bar Chart -->
                  <div class="relative" style="height:350px">
                      <canvas id="bar-chart"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"
  />
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
    charset="utf-8"
  ></script>

  <script type="text/javascript">


    (function() {
      /* Chart initialisations */
      /* Line Chart */
      var config = {
        type: "line",
        data: {
          labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July"
          ],
          datasets: [
            {
              label: 'Paid',
              backgroundColor: "#4c51bf",
              borderColor: "#4c51bf",
              data: [65, 78, 66, 44, 56, 67, 75],
              fill: false
            },
            {
              label: 'Received',
              fill: false,
              backgroundColor: "#ed64a6",
              borderColor: "#ed64a6",
              data: [40, 68, 86, 74, 56, 60, 87]
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          title: {
            display: false,
            text: "Sales Charts",
            fontColor: "white"
          },
          legend: {
            labels: {
              fontColor: "white"
            },
            align: "end",
            position: "bottom"
          },
          tooltips: {
            mode: "index",
            intersect: false
          },
          hover: {
            mode: "nearest",
            intersect: true
          },
          scales: {
            xAxes: [
              {
                ticks: {
                  fontColor: "rgba(255,255,255,.7)"
                },
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: "Month",
                  fontColor: "white"
                },
                gridLines: {
                  display: false,
                  borderDash: [2],
                  borderDashOffset: [2],
                  color: "rgba(33, 37, 41, 0.3)",
                  zeroLineColor: "rgba(0, 0, 0, 0)",
                  zeroLineBorderDash: [2],
                  zeroLineBorderDashOffset: [2]
                }
              }
            ],
            yAxes: [
              {
                ticks: {
                  fontColor: "rgba(255,255,255,.7)"
                },
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: "Value",
                  fontColor: "white"
                },
                gridLines: {
                  borderDash: [3],
                  borderDashOffset: [3],
                  drawBorder: false,
                  color: "rgba(255, 255, 255, 0.15)",
                  zeroLineColor: "rgba(33, 37, 41, 0)",
                  zeroLineBorderDash: [2],
                  zeroLineBorderDashOffset: [2]
                }
              }
            ]
          }
        }
      };
      var ctx = document.getElementById("line-chart").getContext("2d");
      window.myLine = new Chart(ctx, config);

      /* Bar Chart */
      config = {
        type: "bar",
        data: {
          labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July"
          ],
          datasets: [
            {
              label: 'Sales',
              backgroundColor: "#ed64a6",
              borderColor: "#ed64a6",
              data: [30, 78, 56, 34, 100, 45, 13],
              fill: false,
              barThickness: 8
            },
            {
              label: 'Purchase',
              fill: false,
              backgroundColor: "#4c51bf",
              borderColor: "#4c51bf",
              data: [27, 68, 86, 74, 10, 4, 87],
              barThickness: 8
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          title: {
            display: false,
            text: "Orders Chart"
          },
          tooltips: {
            mode: "index",
            intersect: false
          },
          hover: {
            mode: "nearest",
            intersect: true
          },
          legend: {
            labels: {
              fontColor: "rgba(0,0,0,.4)"
            },
            align: "end",
            position: "bottom"
          },
          scales: {
            xAxes: [
              {
                display: false,
                scaleLabel: {
                  display: true,
                  labelString: "Month"
                },
                gridLines: {
                  borderDash: [2],
                  borderDashOffset: [2],
                  color: "rgba(33, 37, 41, 0.3)",
                  zeroLineColor: "rgba(33, 37, 41, 0.3)",
                  zeroLineBorderDash: [2],
                  zeroLineBorderDashOffset: [2]
                }
              }
            ],
            yAxes: [
              {
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: "Value"
                },
                gridLines: {
                  borderDash: [2],
                  drawBorder: false,
                  borderDashOffset: [2],
                  color: "rgba(33, 37, 41, 0.2)",
                  zeroLineColor: "rgba(33, 37, 41, 0.15)",
                  zeroLineBorderDash: [2],
                  zeroLineBorderDashOffset: [2]
                }
              }
            ]
          }
        }
      };
      ctx = document.getElementById("bar-chart").getContext("2d");
      window.myBar = new Chart(ctx, config);
    })();
  </script>
  
</x-app-layout>