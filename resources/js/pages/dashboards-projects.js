/*
 * Vireo — projects dashboard page script (Laravel edition).
 * Faithful port of the inline chart module in src/html/dashboards/projects.html.
 * Uses the SHARED ApexCharts wrapper (relative import) so charts inherit the
 * Aurora palette, dark mode, and live re-theme on the ax:change event.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const col = document.getElementById('ax-throughput-col');
if (col) renderChart(col, 'bar', [
{ name: 'Created', data: [180,164,192,158,176,148,168,140,156,132,144,128] },
{ name: 'Completed', data: [142,150,166,170,158,172,180,176,188,182,196,204] },
], {
height: 320, legend: 'none',
apex: {
colors: [cv('--ax-viz-cyan'), cv('--ax-accent')],
plotOptions: { bar: { borderRadius: 4, columnWidth: '60%' } },
xaxis: { categories: ['W1','W2','W3','W4','W5','W6','W7','W8','W9','W10','W11','W12'] },
},
});

const status = document.getElementById('ax-status-donut');
if (status) renderChart(status, 'donut', [24,9,5,4], {
height: 230, legend: 'none',
apex: {
labels: ['On track','At risk','Delayed','Done'],
colors: [cv('--ax-viz-emerald'), cv('--ax-viz-amber'), cv('--ax-viz-red'), cv('--ax-viz-cyan')],
stroke: { width: 0 },
plotOptions: { pie: { donut: { size: '72%', labels: {
show: true, name: { fontFamily: cv('--ax-font-sans') },
value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
total: { show: true, label: 'Projects', formatter: () => '42' } } } } },
},
});

const work = document.getElementById('ax-workload-bar');
if (work) renderChart(work, 'bar', [
{ name: 'Tasks', data: [34, 28, 26, 21, 17, 12] },
], {
height: 280, legend: 'none', accent: true,
apex: {
plotOptions: { bar: { horizontal: true, borderRadius: 4, barHeight: '56%', distributed: true } },
colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber'), cv('--ax-viz-emerald')],
xaxis: { categories: ['Lena B.','Devon O.','Tomás H.','Priya N.','Ava S.','Marc R.'] },
tooltip: { y: { title: { formatter: () => 'Assigned' } } },
},
});
