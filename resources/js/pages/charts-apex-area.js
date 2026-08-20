/*
 * Vireo — Area Charts page (charts/apex-area).
 * Faithful port of the inline module in src/html/charts/apex-area.html.
 * The gradient / spline / negative area charts need richer Apex options than
 * the data-attr scanner provides, so they render through the shared wrapper
 * (Aurora palette, dark mode, live re-theme on ax:change). The basic + stacked
 * area charts on the page auto-init from their data-ax-chart attributes.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Gradient area — accent → transparent vertical fade
const grad = document.getElementById('ax-area-gradient');
if (grad) renderChart(grad, 'area', [
  { name: 'Payouts', data: [9.8, 11.2, 10.4, 13.1, 12.6, 15.4, 14.8, 17.2, 16.9, 19.4] },
], {
  height: 300, legend: 'none', accent: true,
  apex: {
    stroke: { width: 2.5, curve: 'smooth' },
    fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.42, opacityTo: 0.02, stops: [0, 92, 100] } },
    xaxis: { categories: ['W1','W2','W3','W4','W5','W6','W7','W8','W9','W10'] },
    yaxis: { labels: { formatter: (v) => '$' + v.toFixed(1) + 'K' } },
    tooltip: { y: { formatter: (v) => '$' + v.toFixed(1) + 'K' } },
  },
});

// Spline area — two smoothed series
const spline = document.getElementById('ax-area-spline');
if (spline) renderChart(spline, 'area', [
  { name: 'Pro',  data: [1240, 1310, 1280, 1420, 1510, 1480, 1620, 1710] },
  { name: 'Team', data: [620, 680, 710, 760, 840, 880, 960, 1040] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet')],
    stroke: { width: 2.5, curve: 'smooth' },
    fill: { type: 'solid', opacity: 0.1 },
    xaxis: { categories: ['Nov','Dec','Jan','Feb','Mar','Apr','May','Jun'] },
  },
});

// Negative area — values crossing the zero baseline
const neg = document.getElementById('ax-area-negative');
if (neg) renderChart(neg, 'area', [
  { name: 'Net flow', data: [4.2, -2.1, 6.4, 3.8, -1.6, 5.1, -3.2, 7.4, 4.6] },
], {
  height: 260, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-emerald')],
    stroke: { width: 2.5, curve: 'straight' },
    fill: { type: 'solid', opacity: 0.14 },
    xaxis: { categories: ['Wk1','Wk2','Wk3','Wk4','Wk5','Wk6','Wk7','Wk8','Wk9'] },
    yaxis: { labels: { formatter: (v) => (v > 0 ? '+' : '') + '$' + v.toFixed(0) + 'K' } },
    annotations: { yaxis: [{ y: 0, borderColor: cv('--ax-border-strong'), strokeDashArray: 4 }] },
    tooltip: { y: { formatter: (v) => (v >= 0 ? '+' : '−') + '$' + Math.abs(v).toFixed(1) + 'K' } },
  },
});
