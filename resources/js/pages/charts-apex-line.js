/*
 * Vireo — Line Charts page (charts/apex-line).
 * Faithful port of the inline module in src/html/charts/apex-line.html.
 * Renders through the shared ApexCharts wrapper (Aurora palette, dark mode,
 * live re-theme on ax:change).
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Basic line with markers
const basic = document.getElementById('ax-line-basic');
if (basic) renderChart(basic, 'line', [
  { name: 'Active users', data: [8420, 9180, 8940, 10260, 11540, 9820, 8610] },
], {
  height: 330, legend: 'none', accent: true,
  apex: {
    stroke: { width: 2.5, curve: 'smooth' },
    markers: { size: 0, hover: { size: 6 } },
    xaxis: { categories: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] },
  },
});

// Stepline
const step = document.getElementById('ax-line-step');
if (step) renderChart(step, 'line', [
  { name: 'Seats', data: [40, 40, 55, 55, 55, 80, 80, 110] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-violet')],
    stroke: { width: 2.5, curve: 'stepline' },
    xaxis: { categories: ['Wk1','Wk2','Wk3','Wk4','Wk5','Wk6','Wk7','Wk8'] },
  },
});

// Multi-series line
const multi = document.getElementById('ax-line-multi');
if (multi) renderChart(multi, 'line', [
  { name: 'Americas', data: [62, 68, 65, 74, 80, 78, 86] },
  { name: 'EMEA',     data: [41, 44, 46, 50, 54, 56, 61] },
  { name: 'APAC',     data: [22, 26, 28, 31, 34, 38, 43] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet')],
    stroke: { width: 2.5, curve: 'smooth' },
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul'] },
    yaxis: { labels: { formatter: (v) => '$' + v + 'K' } },
  },
});

// Dashed comparison line
const dashed = document.getElementById('ax-line-dashed');
if (dashed) renderChart(dashed, 'line', [
  { name: '2025', data: [42, 48, 45, 53, 57, 55, 62] },
  { name: '2024', data: [38, 41, 43, 47, 50, 53, 54] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan')],
    stroke: { width: [2.5, 2], curve: 'smooth', dashArray: [0, 6] },
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul'] },
    yaxis: { labels: { formatter: (v) => '$' + v + 'K' } },
  },
});

// Annotated line — SLA threshold + deploy marker
const annot = document.getElementById('ax-line-annot');
if (annot) renderChart(annot, 'line', [
  { name: 'p95 (ms)', data: [182, 176, 190, 168, 240, 198, 174, 162, 158, 166, 154, 149] },
], {
  height: 320, legend: 'none', accent: true,
  apex: {
    stroke: { width: 2.5, curve: 'smooth' },
    markers: { size: 0, hover: { size: 6 } },
    xaxis: { categories: ['Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May','Jun'] },
    yaxis: { labels: { formatter: (v) => v + 'ms' } },
    annotations: {
      yaxis: [{
        y: 200,
        borderColor: cv('--ax-danger-500'),
        strokeDashArray: 5,
        label: {
          text: 'SLA 200ms',
          style: { color: cv('--ax-on-accent'), background: cv('--ax-danger-500'), fontFamily: cv('--ax-font-sans'), fontSize: '11px' },
        },
      }],
      xaxis: [{
        x: 'Nov',
        borderColor: cv('--ax-border-strong'),
        strokeDashArray: 4,
        label: {
          text: 'v4.2 deploy',
          orientation: 'horizontal',
          style: { color: cv('--ax-text'), background: cv('--ax-surface-overlay'), fontFamily: cv('--ax-font-sans'), fontSize: '11px' },
        },
      }],
    },
    tooltip: { y: { formatter: (v) => v + ' ms' } },
  },
});
