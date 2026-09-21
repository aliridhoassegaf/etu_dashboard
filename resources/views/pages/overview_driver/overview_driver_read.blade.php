@extends('layouts.app')

{{-- Basic Tables — faithful re-expression of src/html/tables/basic.html.
Pure CSS table variants; same DOM/classes/ARIA, no page script. --}}
@section('head_custom')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

@endsection

@section('content')

  <!-- ════════════════ CONTENT ════════════════ -->
  <div class="ax-dash-grid">
    <nav data-ax-breadcrumb aria-label="Breadcrumb">
      <ol class="ax-breadcrumb__list">
        <li class="ax-breadcrumb__item"><a class="ax-breadcrumb__link" href="javascript:void(0)" aria-label="Home"><svg
              class="ax-breadcrumb__home" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
              stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path
                d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105">
              </path>
              <path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0"></path>
            </svg></a></li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">Overview</li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">{{ $title }}</li>
      </ol>
    </nav>
    <section class="ax-card ax-col--12" role="region" aria-label="Default table">
      <div class="ax-card__header">
        <div class="ax-card__titles">
          <h2 class="ax-card__title">{{ $title }}</h2>
          <p class="ax-card__subtitle">Monitor driver, recruitment, and operational status.</p>
        </div>
      </div>
      <div class="ax-card__body"
        style="padding-top:0;padding-bottom:0;display:flex;flex-direction:column;gap:var(--ax-space-3);">

        <div class="ax-tabs ax-tabs--segmented">
          @include('partials.overview_tab')
          <div class="ax-tabs__panel" role="tabpanel" x-show="isActive(1)" x-transition.opacity>
            <section>
              <div class="mb-5!">
                <div class="ax-field mb-4!">
                  <div class="ax-field__control">
                    <span class="ax-field__affix ax-field__affix--leading" aria-hidden="true">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2l0 -12" />
                        <path d="M16 3l0 4" />
                        <path d="M8 3l0 4" />
                        <path d="M4 11l16 0" />
                        <path d="M8 15h2v2h-2l0 -2" />
                      </svg>
                    </span>
                    <input id="date_range1" type="text" class="ax-input ax-input--with-leading-icon"
                      placeholder="Select date range" autocomplete="off" class="ax-input" style="max-width: 300px;">
                  </div>
                </div>

                <figure class="highcharts-figure" style="min-width: 100%;">
                  <div id="container1"></div>
                </figure>
              </div>

              <div>
                <div class="ax-field mb-4!">
                  <div class="ax-field__control">
                    <span class="ax-field__affix ax-field__affix--leading" aria-hidden="true">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2l0 -12" />
                        <path d="M16 3l0 4" />
                        <path d="M8 3l0 4" />
                        <path d="M4 11l16 0" />
                        <path d="M8 15h2v2h-2l0 -2" />
                      </svg>
                    </span>
                    <input id="date_range" type="text" class="ax-input ax-input--with-leading-icon"
                      placeholder="Select date range" autocomplete="off" class="ax-input" style="max-width: 300px;">
                  </div>
                </div>

                <figure class="highcharts-figure" style="min-width: 100%;">
                  <div id="container2"></div>
                </figure>
              </div>

            </section>
          </div>
        </div>
      </div>
    </section>


  </div>
@endsection

@section('foot_custom')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script>
    function resetAssignmentStatus() {

      const data = @json($assignmentStatusTotal);

      assignmentChart.update({

        xAxis: {
          categories: data.dates,

          labels: {
            step: data.dates.length > 10 ? 3 : 1
          }
        },

        subtitle: {
          text: `${formatDate(data.start_date)} - ${formatDate(data.end_date)}`
        }

      }, false);

      Object.entries(data.statuses).forEach(([status, statusInfo]) => {

        const chartSeries = assignmentChart.series.find(
          item => item.name === status
        );

        if (chartSeries) {
          chartSeries.setData(
            statusInfo.data,
            false
          );
        }

      });

      assignmentChart.redraw();
    }

    function resetUserRegister() {

      const data = @json($userRegisterTotal);

      userRegisterChart.update({

        xAxis: {
          categories: data.dates,

          labels: {
            step: data.dates.length > 10 ? 3 : 1
          }
        },

        subtitle: {
          text: `${formatDate(data.start_date)} - ${formatDate(data.end_date)}`
        }

      }, false);

      Object.entries(data.statuses).forEach(([status, statusInfo]) => {

        const chartSeries = userRegisterChart.series.find(
          item => item.name === status
        );

        if (chartSeries) {
          chartSeries.setData(
            statusInfo.data,
            false
          );
        }

      });

      userRegisterChart.redraw();
    }

    function formatDate(dateString) {

      const [year, month, day] = dateString.split('-');

      const monthNames = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
      ];

      return `${Number(day)} ${monthNames[Number(month) - 1]} ${year}`;
    }
  </script>

  <script>
    const chartData1 = @json($userRegisterTotal);

    const series1 = [];

    Object.entries(chartData1.statuses).forEach(([status, statusInfo]) => {

      // Buat series1
      series1.push({
        name: status,
        color: '#' + statusInfo.color,
        data: statusInfo.data
      });
    });

    let userRegisterChart = Highcharts.chart('container1', {

      chart: {
        type: 'spline'
      },

      title: {
        text: 'Driver Recruitment'
      },

      subtitle: {
        text: `${formatDate(chartData1.start_date)} - ${formatDate(chartData1.end_date)}`
      },

      xAxis: {
        type: 'category',

        categories: chartData1.dates,

        labels: {
          step: chartData1.dates.length > 10 ? 3 : 1,

          formatter: function () {

            const parts = this.value.split('-');

            const date = new Date(
              Number(parts[0]),
              Number(parts[1]) - 1,
              Number(parts[2])
            );

            return date.toLocaleDateString('en-US', {
              day: 'numeric',
              month: 'short',
              year: 'numeric'
            });
          }
        }
      },

      yAxis: {
        min: 0,
        allowDecimals: false,
        title: {
          text: 'Total User Register'
        }
      },

      tooltip: {
        shared: true,

        formatter: function () {

          const date = this.points[0].point.category;

          const [year, month, day] = date.split('-');

          const monthNames = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
          ];

          const formattedDate =
            `${Number(day)} ${monthNames[Number(month) - 1]} ${year}`;

          let html = `<b>${formattedDate}</b><br/>`;

          this.points.forEach(point => {
            html += `
                          <span style="color:${point.color}">●</span>
                          ${point.series.name}: <b>${point.y}</b><br/>
                        `;
          });

          return html;
        }
      },

      plotOptions: {
        spline: {
          dataLabels: {
            enabled: false
          },
          marker: {
            enabled: true,
            radius: 4
          }
        }
      },

      series: series1
    });
  </script>

  <script>
    $(function () {

      $(function () {

        $('#date_range1').daterangepicker({

          autoUpdateInput: false,
          opens: 'left',

          maxSpan: {
            days: 30
          },

          locale: {
            format: 'DD/MM/YYYY',
            separator: ' - ',
            applyLabel: 'Apply',
            cancelLabel: 'Reset',
            firstDay: 1
          }

        }, function (start, end) {

          $('#date_range1').val(
            start.format('DD/MM/YYYY') +
            ' - ' +
            end.format('DD/MM/YYYY')
          );

          loadUserRegister(
            start.format('YYYY-MM-DD'),
            end.format('YYYY-MM-DD')
          );

        });


        // RESET
        $('#date_range1').on('cancel.daterangepicker', function (ev, picker) {

          // Kosongkan input
          $(this).val('');

          // Hapus tanggal yang tersimpan di daterangepicker
          picker.setStartDate(moment());
          picker.setEndDate(moment());

          // Reset chart
          resetUserRegister();

        });

      });

    });

    function loadUserRegister(startDate, endDate) {

      $.ajax({
        url: '/overview-driver/user-register',
        type: 'GET',

        data: {
          start_date: startDate,
          end_date: endDate
        },

        success: function (response) {

          const data = response.data;

          // Update X-Axis
          userRegisterChart.update({

            xAxis: {
              categories: data.dates,

              labels: {
                step: data.dates.length > 10 ? 3 : 1
              }
            },

            subtitle: {
              text: `${formatDate(data.start_date)} - ${formatDate(data.end_date)}`
            }

          }, false);

          // Update series
          Object.entries(data.statuses).forEach(([status, statusInfo]) => {

            const chartSeries = userRegisterChart.series.find(
              item => item.name === status
            );

            if (chartSeries) {
              chartSeries.setData(
                statusInfo.data,
                false
              );
            }

          });

          userRegisterChart.redraw();
        },

        error: function (xhr) {

          console.error(xhr);

        }
      });

    }
  </script>







  <script>
    const chartData = @json($assignmentStatusTotal);

    const series = [];

    Object.entries(chartData.statuses).forEach(([status, statusInfo]) => {

      // Buat series
      series.push({
        name: status,
        color: '#' + statusInfo.color,
        data: statusInfo.data
      });
    });

    let assignmentChart = Highcharts.chart('container2', {

      chart: {
        type: 'column'
      },

      title: {
        text: 'Driver Assignment Status'
      },

      subtitle: {
        text: `${formatDate(chartData.start_date)} - ${formatDate(chartData.end_date)}`
      },

      xAxis: {
        type: 'category',

        categories: chartData.dates,

        labels: {
          step: chartData.dates.length > 10 ? 3 : 1,

          formatter: function () {

            const parts = this.value.split('-');

            const date = new Date(
              Number(parts[0]),
              Number(parts[1]) - 1,
              Number(parts[2])
            );

            return date.toLocaleDateString('en-US', {
              day: 'numeric',
              month: 'short',
              year: 'numeric'
            });
          }
        }
      },

      yAxis: {
        min: 0,
        allowDecimals: false,
        title: {
          text: 'Total Assignment'
        }
      },

      tooltip: {
        shared: true,

        formatter: function () {

          const date = this.points[0].point.category;

          const [year, month, day] = date.split('-');

          const monthNames = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
          ];

          const formattedDate =
            `${Number(day)} ${monthNames[Number(month) - 1]} ${year}`;

          let html = `<b>${formattedDate}</b><br/>`;

          this.points.forEach(point => {
            html += `
                          <span style="color:${point.color}">●</span>
                          ${point.series.name}: <b>${point.y}</b><br/>
                        `;
          });

          return html;
        }
      },

      plotOptions: {
        column: {
          stacking: 'normal',

          dataLabels: {
            enabled: false,
            formatter: function () {
              return this.y > 0 ? this.y : null;
            }
          }
        }
      },

      series: series
    });
  </script>

  <script>
    $(function () {

      $(function () {

        $('#date_range').daterangepicker({

          autoUpdateInput: false,
          opens: 'left',

          maxSpan: {
            days: 30
          },

          locale: {
            format: 'DD/MM/YYYY',
            separator: ' - ',
            applyLabel: 'Apply',
            cancelLabel: 'Reset',
            firstDay: 1
          }

        }, function (start, end) {

          $('#date_range').val(
            start.format('DD/MM/YYYY') +
            ' - ' +
            end.format('DD/MM/YYYY')
          );

          loadAssignmentStatus(
            start.format('YYYY-MM-DD'),
            end.format('YYYY-MM-DD')
          );

        });


        // RESET
        $('#date_range').on('cancel.daterangepicker', function (ev, picker) {

          // Kosongkan input
          $(this).val('');

          // Hapus tanggal yang tersimpan di daterangepicker
          picker.setStartDate(moment());
          picker.setEndDate(moment());

          // Reset chart
          resetAssignmentStatus();

        });

      });

    });

    function loadAssignmentStatus(startDate, endDate) {

      $.ajax({
        url: '/overview-driver/assignment-status',
        type: 'GET',

        data: {
          start_date: startDate,
          end_date: endDate
        },

        success: function (response) {

          const data = response.data;

          // Update X-Axis
          assignmentChart.update({

            xAxis: {
              categories: data.dates,

              labels: {
                step: data.dates.length > 10 ? 3 : 1
              }
            },

            subtitle: {
              text: `${formatDate(data.start_date)} - ${formatDate(data.end_date)}`
            }

          }, false);

          // Update series
          Object.entries(data.statuses).forEach(([status, statusInfo]) => {

            const chartSeries = assignmentChart.series.find(
              item => item.name === status
            );

            if (chartSeries) {
              chartSeries.setData(
                statusInfo.data,
                false
              );
            }

          });

          assignmentChart.redraw();
        },

        error: function (xhr) {

          console.error(xhr);

        }
      });

    }
  </script>
@endsection