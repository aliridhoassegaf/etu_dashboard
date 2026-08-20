/*
 * Vireo — lms dashboard page script (Laravel edition).
 *
 * Faithful port of the inline chart module in the HTML reference
 * (src/html/dashboards/lms.html). Uses the SHARED ApexCharts wrapper so charts
 * inherit the Aurora palette, dark mode & live re-theme on the `ax:change` event.
 * KPI sparklines and any data-attr charts auto-init via plugins/charts.js.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Enrollments (column) + Revenue (line) mixed
const er = document.getElementById('ax-enroll-rev');
if (er) {
  renderChart(er, 'line', [
    { name: 'Enrollments', type: 'column', data: [820, 940, 880, 1120, 1240, 1180, 1380, 1290, 1460, 1520, 1610, 1740] },
    { name: 'Revenue ($K)', type: 'line', data: [32, 38, 35, 44, 48, 46, 52, 49, 55, 58, 61, 66] },
  ], {
    height: 300, legend: 'none', accent: true,
    apex: {
      colors: [cv('--ax-accent'), cv('--ax-viz-amber')],
      stroke: { width: [0, 3], curve: 'smooth' },
      plotOptions: { bar: { borderRadius: 4, columnWidth: '52%' } },
      yaxis: [
        { labels: { formatter: (v) => Math.round(v) } },
        { opposite: true, labels: { formatter: (v) => '$' + Math.round(v) + 'K' } },
      ],
    },
  });
}

// Students by category donut
const cat = document.getElementById('ax-lms-cat');
if (cat) {
  renderChart(cat, 'donut', [38, 24, 21, 17], {
    height: 220, legend: 'none',
    apex: {
      labels: ['Development', 'Design', 'Business', 'Marketing'],
      colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
      stroke: { width: 0 },
      plotOptions: { pie: { donut: { size: '72%', labels: { show: true,
        name: { fontFamily: cv('--ax-font-sans') },
        value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
        total: { show: true, label: 'Students', formatter: () => '18.4K' } } } } },
    },
  });
}

// Completion radial gauge
const comp = document.getElementById('ax-completion-ring');
if (comp) {
  renderChart(comp, 'radialBar', [64], {
    height: 160, legend: 'none', accent: true,
    apex: {
      colors: [cv('--ax-accent')],
      plotOptions: { radialBar: { hollow: { size: '58%' },
        track: { background: cv('--ax-fill-hover') },
        dataLabels: { name: { show: false }, value: { offsetY: 6, color: cv('--ax-text-strong'), fontSize: '20px', fontFamily: cv('--ax-font-mono'), fontWeight: 700, formatter: (v) => v + '%' } } } },
      fill: { type: 'solid' },
    },
  });
}

// Instructor rating gauge (4.7 / 5 = 94%)
const rating = document.getElementById('ax-rating-ring');
if (rating) {
  renderChart(rating, 'radialBar', [94], {
    height: 160, legend: 'none',
    apex: {
      colors: [cv('--ax-warning-500')],
      plotOptions: { radialBar: { hollow: { size: '58%' },
        track: { background: cv('--ax-fill-hover') },
        dataLabels: { name: { show: false }, value: { offsetY: 6, color: cv('--ax-text-strong'), fontSize: '20px', fontFamily: cv('--ax-font-mono'), fontWeight: 700, formatter: () => '4.7' } } } },
      fill: { type: 'solid' },
    },
  });
}
