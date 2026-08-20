/*
 * Vireo — finance dashboard page script (Laravel edition).
 * Faithful port of the inline chart module in src/html/dashboards/finance.html.
 * Uses the SHARED ApexCharts wrapper (relative import) so charts inherit the
 * Aurora palette, dark mode, and live re-theme on the ax:change event.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const mixed = document.getElementById('ax-cashflow-mixed');
if (mixed) renderChart(mixed, 'line', [
{ name: 'Income', type: 'column', data: [38,40,39,43,45,42,46,47,45,48,47,48.2] },
{ name: 'Expenses', type: 'column', data: [-26,-28,-27,-29,-31,-30,-32,-33,-31,-32,-33,-31.76] },
{ name: 'Net', type: 'line', data: [12,12,12,14,14,12,14,14,14,16,14,16.44] },
], {
height: 320, legend: 'none',
apex: {
colors: [cv('--ax-success-500'), cv('--ax-danger-500'), cv('--ax-accent')],
stroke: { width: [0, 0, 2.5], curve: 'smooth' },
plotOptions: { bar: { borderRadius: 4, columnWidth: '52%' } },
yaxis: { labels: { formatter: (v) => '$' + Math.abs(v).toFixed(0) + 'K' } },
xaxis: { categories: ['Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May','Jun'] },
},
});

const el = document.getElementById('ax-spend-donut');
if (el) renderChart(el, 'donut', [44,18,15,13,10], {
height: 230, legend: 'none',
apex: {
labels: ['Payroll','Software','Marketing','Office','Other'],
colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
stroke: { width: 0 },
plotOptions: { pie: { donut: { size: '72%', labels: {
show: true, name: { fontFamily: cv('--ax-font-sans') },
value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
total: { show: true, label: 'Spent', formatter: () => '$31.8K' } } } } },
},
});
