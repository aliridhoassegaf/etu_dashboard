/*
 * Vireo — Chart.js gallery page (charts/chartjs).
 * Faithful port of the inline module in src/html/charts/chartjs.html.
 * The Chart.js chart families are re-expressed through the shared ApexCharts
 * wrapper so every chart inherits the Aurora palette, dark mode + live re-theme
 * on ax:change — proving palette parity across the chart families.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();
const months = ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];

// ── Line ──
const line = document.getElementById('cj-line');
if (line) renderChart(line, 'line', [
  { name: 'Revenue', data: [42, 48, 45, 53, 57, 55, 62, 60, 68, 72, 70, 74] },
  { name: 'Target', data: [45, 48, 50, 52, 55, 57, 60, 62, 65, 68, 70, 72] },
], {
  height: 320, legend: 'none', accent: true,
  apex: {
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan')],
    stroke: { width: [2.5, 2], curve: 'smooth', dashArray: [0, 5] },
    markers: { size: 0, hover: { size: 5 } },
    xaxis: { categories: months },
    yaxis: { labels: { formatter: (v) => '$' + v + 'K' } },
  },
});

// ── Doughnut ──
const doughnut = document.getElementById('cj-doughnut');
if (doughnut) renderChart(doughnut, 'donut', [32, 24, 18, 11, 9, 6], {
  height: 320, legend: 'bottom',
  apex: {
    labels: ['Lighting', 'Desk', 'Drinkware', 'Storage', 'Stationery', 'Tech'],
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3'), cv('--ax-chart-4'), cv('--ax-chart-5'), cv('--ax-chart-6')],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '68%', labels: { show: true,
      name: { fontFamily: cv('--ax-font-sans') },
      value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600, formatter: (v) => v + '%' },
      total: { show: true, label: 'Categories', formatter: () => '6' } } } } },
  },
});

// ── Horizontal bar ──
const bar = document.getElementById('cj-bar');
if (bar) renderChart(bar, 'bar', [{ name: 'Orders', data: [486, 372, 214, 158, 96] }], {
  height: 300, legend: 'none',
  apex: {
    plotOptions: { bar: { horizontal: true, borderRadius: 4, barHeight: '60%', distributed: true } },
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3'), cv('--ax-chart-4'), cv('--ax-chart-5')],
    xaxis: { categories: ['Organic', 'Direct', 'Referral', 'Social', 'Email'] },
  },
});

// ── Stacked column ──
const column = document.getElementById('cj-column');
if (column) renderChart(column, 'bar', [
  { name: 'New', data: [41, 46, 43, 50, 56, 52] },
  { name: 'Returning', data: [32, 35, 34, 39, 41, 40] },
], {
  height: 300, legend: 'bottom', stacked: true,
  apex: {
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2')],
    plotOptions: { bar: { columnWidth: '52%', borderRadius: 4 } },
    xaxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'] },
  },
});

// ── Radar ──
const radar = document.getElementById('cj-radar');
if (radar) renderChart(radar, 'radar', [
  { name: 'Marcus', data: [85, 72, 90, 65, 78, 88] },
  { name: 'Priya', data: [70, 88, 75, 92, 84, 66] },
], {
  height: 320, legend: 'bottom',
  apex: {
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2')],
    stroke: { width: 2 },
    fill: { opacity: 0.14 },
    markers: { size: 3 },
    xaxis: { categories: ['Code', 'Design', 'Data', 'Comms', 'Ops', 'QA'] },
  },
});

// ── Polar area ──
const polar = document.getElementById('cj-polar');
if (polar) renderChart(polar, 'polarArea', [14, 23, 11, 17, 9], {
  height: 320, legend: 'bottom',
  apex: {
    labels: ['Billing', 'Bugs', 'How-to', 'Feature', 'Account'],
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3'), cv('--ax-chart-4'), cv('--ax-chart-5')],
    stroke: { width: 1, colors: [cv('--ax-border')] },
    fill: { opacity: 0.78 },
    yaxis: { show: false },
  },
});

// ── Pie ──
const pie = document.getElementById('cj-pie');
if (pie) renderChart(pie, 'pie', [38, 27, 14, 9, 7, 5], {
  height: 320, legend: 'bottom',
  apex: {
    labels: ['Direct', 'Organic', 'Referral', 'Social', 'Email', 'Paid'],
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3'), cv('--ax-chart-4'), cv('--ax-chart-5'), cv('--ax-chart-6')],
    stroke: { width: 0 },
  },
});

// ── Mixed (column + line) ──
const mixed = document.getElementById('cj-mixed');
if (mixed) renderChart(mixed, 'line', [
  { name: 'Sessions', type: 'column', data: [9.2, 10.4, 9.8, 11.2, 12.6, 11.9, 13.4, 14.1, 13.7, 15.2, 16.1, 17.4] },
  { name: 'Conversion %', type: 'line', data: [2.1, 2.3, 2.2, 2.5, 2.6, 2.4, 2.8, 3.0, 2.9, 3.2, 3.4, 3.6] },
], {
  height: 320, legend: 'bottom',
  apex: {
    colors: [cv('--ax-viz-cyan'), cv('--ax-accent')],
    stroke: { width: [0, 2.8], curve: 'smooth' },
    plotOptions: { bar: { columnWidth: '48%', borderRadius: 4 } },
    xaxis: { categories: months },
    yaxis: [
      { labels: { formatter: (v) => v + 'K' } },
      { opposite: true, labels: { formatter: (v) => v.toFixed(1) + '%' } },
    ],
  },
});

// ── Bubble ──
const bubble = document.getElementById('cj-bubble');
if (bubble) renderChart(bubble, 'bubble', [
  { name: 'Pulse', data: [[40, 28, 14]] },
  { name: 'Beacon', data: [[62, 44, 22]] },
  { name: 'Halo', data: [[78, 60, 9]] },
  { name: 'Drift', data: [[55, 36, 17]] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3'), cv('--ax-chart-4')],
    fill: { opacity: 0.7 },
    xaxis: { tickAmount: 5, labels: { formatter: (v) => '$' + Math.round(v) + 'K' } },
    yaxis: { max: 70, labels: { formatter: (v) => Math.round(v) + 'K' } },
  },
});
