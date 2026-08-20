/*
 * Vireo — pos dashboard page script (Laravel edition).
 *
 * Faithful port of the inline chart module in the HTML reference
 * (src/html/dashboards/pos.html). Uses the SHARED ApexCharts wrapper so charts
 * inherit the Aurora palette, dark mode & live re-theme on the `ax:change` event.
 * KPI sparklines and any data-attr charts auto-init via plugins/charts.js.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const cat = document.getElementById('ax-pos-cat');
if (cat) renderChart(cat, 'donut', [34, 26, 18, 13, 9], {
  height: 220, legend: 'none',
  apex: {
    labels: ['Beverages', 'Bakery', 'Snacks', 'Produce', 'Household'],
    colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber'), cv('--ax-viz-emerald')],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '72%', labels: { show: true, value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 }, total: { show: true, label: 'Sales', formatter: () => '$9.8K' } } } } },
  },
});
