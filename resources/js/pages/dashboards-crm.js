/*
 * Vireo — crm dashboard page script (Laravel edition).
 * Faithful port of the inline chart module in src/html/dashboards/crm.html.
 * Uses the SHARED ApexCharts wrapper (relative import) so charts inherit the
 * Aurora palette, dark mode, and live re-theme on the ax:change event.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Pipeline funnel as horizontal stacked bar (won + open)
const bar = document.getElementById('ax-pipeline-bar');
if (bar) renderChart(bar, 'bar', [
{ name: 'Won', data: [62, 88, 96, 84, 312] },
{ name: 'Open', data: [820, 540, 360, 196, 0] },
], {
height: 320, legend: 'none', stacked: true,
apex: {
colors: [cv('--ax-accent'), cv('--ax-viz-cyan')],
plotOptions: { bar: { horizontal: true, borderRadius: 4, barHeight: '58%' } },
xaxis: { categories: ['Lead','Qualified','Proposal','Negotiation','Won'], labels: { formatter: (v) => '$' + v + 'K' } },
},
});

const el = document.getElementById('ax-source-donut');
if (el) renderChart(el, 'donut', [38,24,20,11,7], {
height: 230, legend: 'none',
apex: {
labels: ['Inbound','Referral','Outbound','Events','Partner'],
colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
stroke: { width: 0 },
plotOptions: { pie: { donut: { size: '72%', labels: {
show: true, name: { fontFamily: cv('--ax-font-sans') },
value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
total: { show: true, label: 'Leads', formatter: () => '1,180' } } } } },
},
});

const range = document.getElementById('ax-forecast-range');
if (range) renderChart(range, 'rangeArea', [
{ name: 'Best-case range', type: 'rangeArea', data: [
{ x: 'Jul', y: [180, 240] }, { x: 'Aug', y: [200, 280] }, { x: 'Sep', y: [220, 320] },
{ x: 'Oct', y: [250, 360] }, { x: 'Nov', y: [280, 410] }, { x: 'Dec', y: [310, 460] } ] },
{ name: 'Committed', type: 'line', data: [
{ x: 'Jul', y: 200 }, { x: 'Aug', y: 232 }, { x: 'Sep', y: 258 },
{ x: 'Oct', y: 290 }, { x: 'Nov', y: 332 }, { x: 'Dec', y: 372 } ] },
], {
height: 240, legend: 'none',
apex: {
colors: [cv('--ax-viz-cyan'), cv('--ax-accent')],
fill: { opacity: [0.22, 1] },
stroke: { width: [0, 2.5], curve: 'smooth' },
yaxis: { labels: { formatter: (v) => '$' + v + 'K' } },
},
});

const radial = document.getElementById('ax-target-radial');
if (radial) renderChart(radial, 'radialBar', [78], {
height: 240, legend: 'none',
apex: {
labels: ['Attained'],
colors: [cv('--ax-accent')],
plotOptions: { radialBar: {
hollow: { size: '64%' },
track: { background: cv('--ax-surface-subtle') },
dataLabels: {
  name: { offsetY: 22, color: cv('--ax-text-muted'), fontSize: '13px' },
  value: { offsetY: -14, fontFamily: cv('--ax-font-mono'), fontWeight: 700, fontSize: '30px', color: cv('--ax-text-strong') },
},
} },
},
});
