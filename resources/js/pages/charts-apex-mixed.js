/*
 * Vireo — Mixed Charts page (charts/apex-mixed).
 * Faithful port of the inline module in src/html/charts/apex-mixed.html.
 * Renders through the shared ApexCharts wrapper (Aurora palette, dark mode,
 * live re-theme on ax:change).
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Line + column — revenue columns, conversion line on a second axis
const lineCol = document.getElementById('ax-mix-linecol');
if (lineCol) renderChart(lineCol, 'line', [
  { name: 'Revenue',      type: 'column', data: [62, 60, 69, 72, 70, 75] },
  { name: 'Conversion %', type: 'line',   data: [2.4, 2.5, 2.7, 2.9, 3.0, 3.2] },
], {
  height: 330, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-cyan'), cv('--ax-accent')],
    stroke: { width: [0, 3], curve: 'smooth' },
    plotOptions: { bar: { borderRadius: 4, borderRadiusApplication: 'end', columnWidth: '46%' } },
    markers: { size: 0, hover: { size: 6 } },
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun'] },
    yaxis: [
      { labels: { formatter: (v) => '$' + v + 'K' } },
      { opposite: true, labels: { formatter: (v) => v.toFixed(1) + '%' } },
    ],
  },
});

// Area + line — sessions area, signups line
const areaLine = document.getElementById('ax-mix-arealine');
if (areaLine) renderChart(areaLine, 'line', [
  { name: 'Sessions', type: 'area', data: [92, 104, 98, 112, 126, 119, 134] },
  { name: 'Signups',  type: 'line', data: [18, 21, 19, 24, 28, 26, 31] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-cyan'), cv('--ax-accent')],
    stroke: { width: [2, 3], curve: 'smooth' },
    fill: { type: ['gradient', 'solid'], gradient: { opacityFrom: 0.3, opacityTo: 0.02, stops: [0, 95] } },
    markers: { size: 0, hover: { size: 6 } },
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul'] },
    yaxis: { labels: { formatter: (v) => v + 'K' } },
  },
});

// Multi-axis — spend columns (left), ROAS line (right)
const multiAxis = document.getElementById('ax-mix-multiaxis');
if (multiAxis) renderChart(multiAxis, 'line', [
  { name: 'Spend', type: 'column', data: [12.4, 14.1, 13.2, 16.8, 18.2, 17.6] },
  { name: 'ROAS',  type: 'line',   data: [3.1, 3.4, 3.0, 3.8, 4.2, 4.6] },
], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-violet'), cv('--ax-accent')],
    stroke: { width: [0, 3], curve: 'smooth' },
    plotOptions: { bar: { borderRadius: 4, borderRadiusApplication: 'end', columnWidth: '46%' } },
    markers: { size: 0, hover: { size: 6 } },
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun'] },
    yaxis: [
      { title: { text: 'Spend ($K)', style: { color: cv('--ax-text-subtle'), fontFamily: cv('--ax-font-sans') } }, labels: { formatter: (v) => '$' + v + 'K' } },
      { opposite: true, title: { text: 'ROAS', style: { color: cv('--ax-text-subtle'), fontFamily: cv('--ax-font-sans') } }, labels: { formatter: (v) => v.toFixed(1) + '×' } },
    ],
  },
});

// Triple combo — received + sold columns, sell-through line
const triple = document.getElementById('ax-mix-triple');
if (triple) renderChart(triple, 'line', [
  { name: 'Received',       type: 'column', data: [420, 380, 460, 510, 480, 540, 500, 560, 590, 620, 600, 640] },
  { name: 'Sold',           type: 'column', data: [360, 340, 410, 470, 440, 500, 470, 520, 560, 590, 580, 610] },
  { name: 'Sell-through %', type: 'line',   data: [86, 89, 89, 92, 92, 93, 94, 93, 95, 95, 97, 95] },
], {
  height: 340, legend: 'none',
  apex: {
    colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-accent')],
    stroke: { width: [0, 0, 3], curve: 'smooth' },
    plotOptions: { bar: { borderRadius: 4, borderRadiusApplication: 'end', columnWidth: '60%' } },
    markers: { size: 0, hover: { size: 6 } },
    xaxis: { categories: ['Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May','Jun'] },
    yaxis: [
      { labels: { formatter: (v) => v + '' } },
      { show: false },
      { opposite: true, min: 80, max: 100, labels: { formatter: (v) => v + '%' } },
    ],
  },
});
