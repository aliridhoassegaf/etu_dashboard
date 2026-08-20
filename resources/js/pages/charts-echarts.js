/*
 * Vireo — ECharts gallery page (charts/echarts).
 * Faithful port of the inline module in src/html/charts/echarts.html.
 * The ECharts-style visualizations are re-expressed through the shared
 * ApexCharts wrapper so every one inherits the Aurora palette, dark mode + live
 * re-theme on ax:change.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// ── Gauges (radialBar) ──
const gauge = (id, val, color, label) => {
  const el = document.getElementById(id);
  if (!el) return;
  renderChart(el, 'radialBar', [val], {
    height: 300, legend: 'none',
    apex: {
      colors: [color],
      plotOptions: { radialBar: {
        startAngle: -135, endAngle: 135, hollow: { size: '60%' },
        track: { background: cv('--ax-surface-subtle'), strokeWidth: '100%' },
        dataLabels: {
          name: { offsetY: 26, color: cv('--ax-text-muted'), fontFamily: cv('--ax-font-sans'), fontSize: '13px' },
          value: { offsetY: -8, color: cv('--ax-text-strong'), fontFamily: cv('--ax-font-mono'), fontSize: '28px', fontWeight: 700, formatter: (v) => v + '%' },
        },
      } },
      labels: [label],
      stroke: { lineCap: 'round' },
    },
  });
};
gauge('ec-gauge-1', 82, cv('--ax-success-500'), 'Healthy');
gauge('ec-gauge-2', 67, cv('--ax-warning-500'), 'SLA met');

// Multi-metric radial
const g3 = document.getElementById('ec-gauge-3');
if (g3) renderChart(g3, 'radialBar', [78, 64, 41], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3')],
    labels: ['CPU', 'Memory', 'Disk'],
    plotOptions: { radialBar: {
      hollow: { size: '40%' },
      track: { background: cv('--ax-surface-subtle') },
      dataLabels: {
        name: { fontFamily: cv('--ax-font-sans'), color: cv('--ax-text-muted') },
        value: { fontFamily: cv('--ax-font-mono'), color: cv('--ax-text-strong'), fontWeight: 600 },
        total: { show: true, label: 'Avg', formatter: () => '61%' },
      },
    } },
    stroke: { lineCap: 'round' },
  },
});

// ── Graph (force) — emulated with a labelled bubble layout (nodes sized by traffic) ──
const graph = document.getElementById('ec-graph');
if (graph) renderChart(graph, 'bubble', [
  { name: 'Gateway', data: [[50, 30, 40]] },
  { name: 'Auth', data: [[22, 46, 22]] },
  { name: 'Orders', data: [[80, 44, 28]] },
  { name: 'Catalog', data: [[26, 12, 24]] },
  { name: 'Payments', data: [[78, 14, 26]] },
], {
  height: 300, legend: 'bottom',
  apex: {
    colors: [cv('--ax-accent'), cv('--ax-chart-2'), cv('--ax-chart-1'), cv('--ax-chart-4'), cv('--ax-chart-3')],
    fill: { opacity: 0.82 },
    dataLabels: { enabled: false },
    xaxis: { min: 0, max: 100, tickAmount: 5, labels: { show: false }, axisBorder: { show: false } },
    yaxis: { min: 0, max: 60, labels: { show: false } },
    grid: { xaxis: { lines: { show: false } }, yaxis: { lines: { show: false } } },
  },
});

// ── Treemap ──
const treemap = document.getElementById('ec-treemap');
if (treemap) renderChart(treemap, 'treemap', [{ data: [
  { x: 'Brass Task Light', y: 284 },
  { x: 'Aperture Desk Lamp', y: 246 },
  { x: 'Matte Ceramic Mug', y: 188 },
  { x: 'Walnut Monitor Riser', y: 164 },
  { x: 'Stoneware Carafe', y: 132 },
  { x: 'Felt Laptop Sleeve', y: 118 },
  { x: 'Grid Notebook A5', y: 96 },
  { x: 'Oak Pen Tray', y: 74 },
  { x: 'Linen Pinboard', y: 58 },
  { x: 'Cork Desk Mat', y: 44 },
] }], {
  height: 320, legend: 'none',
  apex: {
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3'), cv('--ax-chart-4'), cv('--ax-chart-5'), cv('--ax-chart-6')],
    plotOptions: { treemap: { distributed: true, enableShades: false } },
    dataLabels: { enabled: true, style: { fontFamily: cv('--ax-font-sans'), fontSize: '12px' } },
    stroke: { width: 2, colors: [cv('--ax-surface-solid')] },
  },
});

// ── Heatmap ──
const heatmap = document.getElementById('ec-heatmap');
if (heatmap) {
  const slots = ['00–06', '06–12', '12–18', '18–24'];
  const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
  const grid = [
    [8, 42, 56, 30], [10, 46, 60, 34], [9, 44, 58, 32],
    [12, 50, 64, 38], [14, 52, 62, 40], [20, 30, 36, 28], [18, 24, 30, 22],
  ];
  const series = slots.map((s, si) => ({ name: s, data: days.map((d, di) => ({ x: d, y: grid[di][si] })) }));
  renderChart(heatmap, 'heatmap', series, {
    height: 320, legend: 'none',
    apex: {
      colors: [cv('--ax-accent')],
      plotOptions: { heatmap: { radius: 4, enableShades: true, shadeIntensity: 0.6 } },
      stroke: { width: 2, colors: [cv('--ax-surface-solid')] },
      dataLabels: { enabled: false },
    },
  });
}

// ── Spend mix radial ──
const radial = document.getElementById('ec-radial');
if (radial) renderChart(radial, 'radialBar', [62, 48, 33, 21], {
  height: 300, legend: 'none',
  apex: {
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3'), cv('--ax-chart-4')],
    labels: ['Product', 'Ads', 'Ops', 'R&D'],
    plotOptions: { radialBar: {
      hollow: { size: '34%' },
      track: { background: cv('--ax-surface-subtle') },
      dataLabels: {
        name: { fontFamily: cv('--ax-font-sans'), color: cv('--ax-text-muted'), fontSize: '12px' },
        value: { fontFamily: cv('--ax-font-mono'), color: cv('--ax-text-strong'), fontWeight: 600 },
        total: { show: true, label: 'Mix', formatter: () => '100%' },
      },
    } },
    stroke: { lineCap: 'round' },
  },
});

// ── Scatter ──
const scatter = document.getElementById('ec-scatter');
if (scatter) renderChart(scatter, 'scatter', [
  { name: 'VIP', data: [[42, 6180], [38, 5980], [44, 4720], [40, 5240]] },
  { name: 'Returning', data: [[18, 1840], [22, 2110], [16, 1490], [26, 2870], [20, 1640]] },
  { name: 'New', data: [[2, 80], [3, 24], [4, 210], [1, 60], [5, 320]] },
], {
  height: 320, legend: 'bottom',
  apex: {
    colors: [cv('--ax-chart-1'), cv('--ax-chart-2'), cv('--ax-chart-3')],
    markers: { size: 6 },
    xaxis: { tickAmount: 6, title: { text: 'Tenure (weeks)', style: { color: cv('--ax-text-subtle'), fontFamily: cv('--ax-font-sans') } }, labels: { formatter: (v) => Math.round(v) } },
    yaxis: { labels: { formatter: (v) => '$' + (v / 1000).toFixed(1) + 'K' } },
  },
});
