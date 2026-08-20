/*
 * Vireo — stocks dashboard page script (Laravel edition).
 *
 * Faithful port of the inline chart module in the HTML reference
 * (src/html/dashboards/stocks.html). Uses the SHARED ApexCharts wrapper so charts
 * inherit the Aurora palette, dark mode & live re-theme on the `ax:change` event.
 * KPI sparklines and any data-attr charts auto-init via plugins/charts.js.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Sector donut
const sec = document.getElementById('ax-sector-donut');
if (sec) {
  renderChart(sec, 'donut', [38, 22, 18, 12, 10], {
    height: 220, legend: 'none',
    apex: {
      labels: ['Technology', 'Healthcare', 'Financials', 'Energy', 'Consumer'],
      colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber'), cv('--ax-viz-emerald')],
      stroke: { width: 0 },
      plotOptions: { pie: { donut: { size: '72%', labels: { show: true,
        name: { fontFamily: cv('--ax-font-sans') },
        value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
        total: { show: true, label: 'Sectors', formatter: () => '5' } } } } },
    },
  });
}

// AAPL candlestick + volume
const candle = document.getElementById('ax-stock-candle');
const vol = document.getElementById('ax-stock-vol');
const ohlc = [
  [1718150400000, 196.2, 198.4, 195.1, 197.8],
  [1718236800000, 197.8, 200.1, 197.0, 199.6],
  [1718323200000, 199.6, 201.2, 198.2, 198.9],
  [1718409600000, 198.9, 202.6, 198.5, 202.1],
  [1718496000000, 202.1, 204.8, 201.3, 204.2],
  [1718582400000, 204.2, 205.1, 202.4, 203.0],
  [1718668800000, 203.0, 206.7, 202.6, 206.2],
  [1718755200000, 206.2, 209.4, 205.8, 208.9],
  [1718841600000, 208.9, 210.2, 206.1, 207.3],
  [1718928000000, 207.3, 211.8, 207.0, 211.2],
  [1719014400000, 211.2, 213.4, 209.6, 213.1],
  [1719100800000, 213.1, 215.6, 211.9, 214.3],
];
if (candle) {
  renderChart(candle, 'candlestick', [{ data: ohlc.map((c) => ({ x: c[0], y: [c[1], c[2], c[3], c[4]] })) }], {
    height: 260, legend: 'none',
    apex: {
      plotOptions: { candlestick: { colors: { upward: cv('--ax-success-500'), downward: cv('--ax-danger-500') } } },
      xaxis: { type: 'datetime', labels: { show: false } },
      yaxis: { tooltip: { enabled: true }, labels: { formatter: (v) => '$' + v.toFixed(0) } },
    },
  });
}
if (vol) {
  const volData = [22, 28, 19, 34, 31, 24, 38, 42, 29, 45, 40, 36];
  renderChart(vol, 'bar', [{ name: 'Volume', data: ohlc.map((c, i) => ({ x: c[0], y: volData[i] })) }], {
    height: 110, legend: 'none',
    apex: {
      colors: [cv('--ax-viz-cyan')],
      plotOptions: { bar: { columnWidth: '60%', borderRadius: 2 } },
      fill: { opacity: 0.55 },
      xaxis: { type: 'datetime' },
      yaxis: { labels: { formatter: (v) => v + 'M' } },
      grid: { yaxis: { lines: { show: false } } },
    },
  });
}
