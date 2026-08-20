/*
 * Vireo — healthcare dashboard page script (Laravel edition).
 *
 * Faithful port of the inline chart module in the HTML reference
 * (src/html/dashboards/healthcare.html). Uses the SHARED ApexCharts wrapper so charts
 * inherit the Aurora palette, dark mode & live re-theme on the `ax:change` event.
 * KPI sparklines and any data-attr charts auto-init via plugins/charts.js.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const dept = document.getElementById('ax-hc-dept');
if (dept) renderChart(dept, 'donut', [38, 31, 28, 25, 20], {
  height: 220, legend: 'none',
  apex: {
    labels: ['Cardiology', 'Neurology', 'Pediatrics', 'Orthopedics', 'General'],
    colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber'), cv('--ax-viz-emerald')],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '72%', labels: { show: true, value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 }, total: { show: true, label: 'Today', formatter: () => '142' } } } } },
  },
});
