/*
 * Vireo — Bar & Column Charts page (charts/apex-bar).
 * Faithful port of the inline module in src/html/charts/apex-bar.html.
 * Renders through the shared ApexCharts wrapper so every chart inherits the
 * Aurora palette, dark mode + live re-theme on ax:change.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Basic column — accent series, 4px top radius
const basic = document.getElementById('ax-bar-basic');
if (basic) renderChart(basic, 'bar', [
  { name: 'Orders', data: [820, 910, 880, 1010, 1120, 1248] },
], {
  height: 330, legend: 'none', accent: true,
  apex: {
    plotOptions: { bar: { borderRadius: 4, borderRadiusApplication: 'end', columnWidth: '48%' } },
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun'] },
  },
});

// Horizontal bar — top products
const horiz = document.getElementById('ax-bar-horizontal');
if (horiz) renderChart(horiz, 'bar', [
  { name: 'Units', data: [540, 331, 298, 241, 212] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-cyan')],
    plotOptions: { bar: { horizontal: true, borderRadius: 4, borderRadiusApplication: 'end', barHeight: '58%', distributed: false } },
    xaxis: { categories: ['Matte Mug','Grid Notebook','Desk Lamp','Laptop Sleeve','Brass Light'] },
  },
});

// Grouped column — actual vs target
const grouped = document.getElementById('ax-bar-grouped');
if (grouped) renderChart(grouped, 'bar', [
  { name: 'Actual', data: [142, 168, 191, 214] },
  { name: 'Target', data: [150, 160, 185, 205] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan')],
    plotOptions: { bar: { borderRadius: 4, borderRadiusApplication: 'end', columnWidth: '62%' } },
    xaxis: { categories: ['Q1','Q2','Q3','Q4'] },
    yaxis: { labels: { formatter: (v) => '$' + v + 'K' } },
  },
});

// Stacked column — order status
const stacked = document.getElementById('ax-bar-stacked');
if (stacked) renderChart(stacked, 'bar', [
  { name: 'Delivered',  data: [320, 360, 340, 410, 460, 520] },
  { name: 'Shipped',    data: [140, 160, 150, 180, 210, 240] },
  { name: 'Processing', data: [80, 90, 100, 110, 130, 150] },
], {
  height: 300, legend: 'none', stacked: true,
  apex: {
    colors: [cv('--ax-viz-emerald'), cv('--ax-viz-cyan'), cv('--ax-viz-amber')],
    plotOptions: { bar: { borderRadius: 4, borderRadiusApplication: 'end', borderRadiusWhenStacked: 'last', columnWidth: '52%' } },
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun'] },
  },
});

// Column with data labels — revenue by category
const labels = document.getElementById('ax-bar-labels');
if (labels) renderChart(labels, 'bar', [
  { name: 'Revenue', data: [238, 184, 142, 96, 71, 48] },
], {
  height: 320, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-violet')],
    plotOptions: { bar: { borderRadius: 4, borderRadiusApplication: 'end', columnWidth: '50%', distributed: false, dataLabels: { position: 'top' } } },
    dataLabels: {
      enabled: true,
      formatter: (v) => '$' + v + 'K',
      offsetY: -18,
      style: { fontSize: '11px', fontFamily: cv('--ax-font-mono'), colors: [cv('--ax-text-muted')] },
    },
    xaxis: { categories: ['Lighting','Desk','Drinkware','Storage','Stationery','Tech'] },
    yaxis: { labels: { formatter: (v) => '$' + v + 'K' } },
  },
});

// Negative column — budget variance
const neg = document.getElementById('ax-bar-negative');
if (neg) renderChart(neg, 'bar', [
  { name: 'Variance', data: [4.2, -1.8, 2.6, -3.1, 1.4, -0.9] },
], {
  height: 280, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-cyan')],
    plotOptions: {
      bar: {
        borderRadius: 4, borderRadiusApplication: 'end', columnWidth: '54%',
        colors: { ranges: [{ from: -100, to: 0, color: cv('--ax-danger-500') }, { from: 0, to: 100, color: cv('--ax-success-500') }] },
      },
    },
    xaxis: { categories: ['Eng','Sales','Ops','Mktg','CS','Fin'] },
    yaxis: { labels: { formatter: (v) => (v > 0 ? '+' : '') + v + 'K' } },
    annotations: { yaxis: [{ y: 0, borderColor: cv('--ax-border-strong'), strokeDashArray: 4 }] },
    tooltip: { y: { formatter: (v) => (v >= 0 ? '+' : '−') + '$' + Math.abs(v).toFixed(1) + 'K' } },
  },
});
