/*
 * Vireo — hr dashboard page script (Laravel edition).
 *
 * Faithful port of the inline chart module in the HTML reference
 * (src/html/dashboards/hr.html). Uses the SHARED ApexCharts wrapper so charts
 * inherit the Aurora palette, dark mode & live re-theme on the `ax:change` event.
 * KPI sparklines and any data-attr charts auto-init via plugins/charts.js.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Headcount: joiners/leavers column + net line
const hc = document.getElementById('ax-headcount');
if (hc) {
  renderChart(hc, 'line', [
    { name: 'Joiners', type: 'column', data: [28, 32, 24, 38, 41, 36, 44, 39, 47, 42, 51, 48] },
    { name: 'Leavers', type: 'column', data: [14, 18, 12, 16, 19, 14, 21, 17, 18, 15, 16, 13] },
    { name: 'Net headcount', type: 'line', data: [1086, 1100, 1112, 1134, 1156, 1178, 1201, 1223, 1252, 1279, 1314, 1349] },
  ], {
    height: 300, legend: 'none',
    apex: {
      colors: [cv('--ax-viz-emerald'), cv('--ax-viz-red'), cv('--ax-accent')],
      stroke: { width: [0, 0, 3], curve: 'smooth' },
      plotOptions: { bar: { borderRadius: 3, columnWidth: '60%' } },
      yaxis: [
        { seriesName: 'Joiners', labels: { formatter: (v) => Math.round(v) } },
        { seriesName: 'Joiners', show: false },
        { opposite: true, labels: { formatter: (v) => (v / 1000).toFixed(2) + 'K' } },
      ],
    },
  });
}

// Department donut
const dept = document.getElementById('ax-dept-donut');
if (dept) {
  renderChart(dept, 'donut', [412, 286, 214, 198, 174], {
    height: 220, legend: 'none',
    apex: {
      labels: ['Engineering', 'Sales', 'Support', 'Marketing', 'Operations'],
      colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber'), cv('--ax-viz-emerald')],
      stroke: { width: 0 },
      plotOptions: { pie: { donut: { size: '72%', labels: { show: true,
        name: { fontFamily: cv('--ax-font-sans') },
        value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
        total: { show: true, label: 'People', formatter: () => '1,284' } } } } },
    },
  });
}

// Attendance stacked column
const att = document.getElementById('ax-attendance');
if (att) {
  renderChart(att, 'bar', [
    { name: 'Present', data: [842, 868, 851, 879, 824] },
    { name: 'Remote', data: [312, 286, 301, 274, 332] },
    { name: 'Leave', data: [84, 72, 91, 78, 96] },
    { name: 'Absent', data: [46, 58, 41, 53, 32] },
  ], {
    height: 300, legend: 'none', stacked: true,
    apex: {
      colors: [cv('--ax-viz-emerald'), cv('--ax-viz-cyan'), cv('--ax-viz-amber'), cv('--ax-viz-red')],
      plotOptions: { bar: { borderRadius: 4, columnWidth: '46%' } },
      xaxis: { categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
    },
  });
}
