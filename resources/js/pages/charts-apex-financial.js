/*
 * Vireo — Financial Charts page (charts/apex-financial).
 * Faithful port of the inline module in src/html/charts/apex-financial.html.
 * Candlestick + volume brush, OHLC bars, range area band, brush navigator and
 * boxplot render via the shared wrapper so they inherit the Aurora palette,
 * dark mode + live re-theme on ax:change. The KPI-row sparklines auto-init from
 * their data-ax-chart attributes.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// ── Candlestick OHLC series (Jun 2025 trading days) ──
const candles = [
  { x: 'Jun 02', y: [412, 420, 408, 418] },
  { x: 'Jun 03', y: [418, 426, 414, 415] },
  { x: 'Jun 04', y: [415, 430, 412, 428] },
  { x: 'Jun 05', y: [428, 432, 420, 424] },
  { x: 'Jun 06', y: [424, 440, 422, 438] },
  { x: 'Jun 09', y: [438, 445, 430, 433] },
  { x: 'Jun 10', y: [433, 442, 429, 440] },
  { x: 'Jun 11', y: [440, 448, 436, 437] },
  { x: 'Jun 12', y: [437, 450, 433, 446] },
  { x: 'Jun 13', y: [446, 452, 438, 441] },
  { x: 'Jun 16', y: [441, 449, 435, 448] },
  { x: 'Jun 17', y: [448, 458, 444, 455] },
];
const volume = candles.map((c, i) => ({ x: c.x, y: [1190, 1280, 1550, 1410, 1620, 1840, 1720, 1490, 1980, 1610, 1530, 2010][i] }));
const candleColors = {
  upward: cv('--ax-success-500') || '#34D399',
  downward: cv('--ax-danger-500') || '#FB7185',
};

const candleMain = document.getElementById('ax-candle-main');
if (candleMain) {
  renderChart(candleMain, 'candlestick', [{ name: 'APG', data: candles }], {
    height: 320, legend: 'none',
    apex: {
      chart: { id: 'ax-candle', toolbar: { show: false } },
      plotOptions: { candlestick: { colors: { upward: candleColors.upward, downward: candleColors.downward }, wick: { useFillColor: true } } },
      xaxis: { type: 'category', tooltip: { enabled: false } },
      yaxis: { tooltip: { enabled: true }, labels: { formatter: (v) => '$' + Math.round(v) } },
    },
  });
}

const candleBrush = document.getElementById('ax-candle-brush');
if (candleBrush) {
  renderChart(candleBrush, 'bar', [{ name: 'Volume', data: volume.map((v) => ({ x: v.x, y: v.y })) }], {
    height: 96, legend: 'none',
    apex: {
      chart: {
        id: 'ax-candle-vol', brush: { enabled: true, target: 'ax-candle' },
        selection: { enabled: true, xaxis: { min: 4, max: 11 } },
      },
      plotOptions: { bar: { columnWidth: '60%', borderRadius: 2 } },
      colors: [cv('--ax-accent')],
      xaxis: { type: 'category', labels: { show: false }, axisBorder: { show: false } },
      yaxis: { labels: { show: false } },
      grid: { yaxis: { lines: { show: false } } },
    },
  });
}

// ── OHLC bar chart ──
const ohlcBar = document.getElementById('ax-ohlc-bar');
if (ohlcBar) {
  renderChart(ohlcBar, 'candlestick', [{ name: 'APG', data: candles.slice(2) }], {
    height: 300, legend: 'none',
    apex: {
      chart: { type: 'candlestick' },
      plotOptions: { candlestick: { colors: { upward: candleColors.upward, downward: candleColors.downward } } },
      stroke: { width: 1 },
      xaxis: { type: 'category' },
      yaxis: { labels: { formatter: (v) => '$' + Math.round(v) } },
    },
  });
}

// ── Range area (forecast band) ──
const rangeArea = document.getElementById('ax-range-area');
if (rangeArea) {
  const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'];
  renderChart(rangeArea, 'rangeArea', [
    {
      type: 'rangeArea', name: 'Confidence band',
      data: months.map((m, i) => ({ x: m, y: [[620, 660, 700, 690, 760, 800, 870, 940][i], [720, 760, 820, 810, 900, 960, 1060, 1180][i]] })),
    },
    {
      type: 'line', name: 'Projection',
      data: months.map((m, i) => ({ x: m, y: [670, 710, 760, 750, 830, 880, 965, 1060][i] })),
    },
  ], {
    height: 300, legend: 'none',
    apex: {
      colors: [cv('--ax-accent'), cv('--ax-accent')],
      fill: { opacity: [0.16, 1] },
      stroke: { width: [0, 2.5], curve: 'smooth' },
      yaxis: { labels: { formatter: (v) => '$' + Math.round(v) + 'K' } },
    },
  });
}

// ── Brush navigator (detail + nav) ──
const days = Array.from({ length: 40 }, (_, i) => {
  const d = new Date(2025, 4, 1 + i);
  return d.getTime();
});
const sessionsData = [9.2, 9.8, 10.4, 10.1, 11.2, 12.6, 11.9, 12.4, 13.1, 12.8, 13.6, 14.2, 13.9, 14.8, 15.4, 15.1, 16.0, 16.6, 16.2, 17.1, 17.6, 17.2, 18.0, 18.5, 18.1, 19.0, 19.4, 19.0, 20.1, 20.6, 20.2, 21.0, 21.4, 21.1, 22.0, 22.6, 22.1, 23.0, 23.5, 24.1].map((v, i) => [days[i], Math.round(v * 1000)]);

const brushDetail = document.getElementById('ax-brush-detail');
if (brushDetail) {
  renderChart(brushDetail, 'area', [{ name: 'Sessions', data: sessionsData }], {
    height: 260, legend: 'none', accent: true,
    apex: {
      chart: { id: 'ax-brush-target', toolbar: { autoSelected: 'pan', show: false } },
      xaxis: { type: 'datetime' },
      yaxis: { labels: { formatter: (v) => (v / 1000).toFixed(1) + 'K' } },
    },
  });
}
const brushNav = document.getElementById('ax-brush-nav');
if (brushNav) {
  renderChart(brushNav, 'area', [{ name: 'Sessions', data: sessionsData }], {
    height: 90, legend: 'none',
    apex: {
      chart: {
        id: 'ax-brush-nav-chart', brush: { target: 'ax-brush-target', enabled: true },
        selection: { enabled: true, xaxis: { min: days[18], max: days[34] } },
      },
      colors: [cv('--ax-viz-cyan')],
      fill: { type: 'gradient', gradient: { opacityFrom: 0.32, opacityTo: 0.05 } },
      xaxis: { type: 'datetime', tooltip: { enabled: false } },
      yaxis: { tickAmount: 2, labels: { show: false } },
      grid: { yaxis: { lines: { show: false } } },
    },
  });
}

// ── Boxplot (quarterly price spread) ──
const boxplot = document.getElementById('ax-boxplot');
if (boxplot) {
  renderChart(boxplot, 'boxPlot', [{
    type: 'boxPlot',
    data: [
      { x: 'Q1', y: [388, 402, 414, 426, 438] },
      { x: 'Q2', y: [408, 418, 430, 442, 458] },
      { x: 'Q3', y: [420, 432, 444, 456, 472] },
      { x: 'Q4', y: [435, 448, 460, 474, 492] },
    ],
  }], {
    height: 300, legend: 'none',
    apex: {
      plotOptions: {
        boxPlot: { colors: { upper: cv('--ax-viz-cyan'), lower: cv('--ax-accent') } },
      },
      stroke: { colors: [cv('--ax-text-subtle')], width: 1 },
      yaxis: { labels: { formatter: (v) => '$' + Math.round(v) } },
    },
  });
}
