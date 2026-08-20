/*
 * Vireo — Crypto Exchange page script (Laravel edition).
 *
 * Faithful port of the inline candlestick module in the HTML reference
 * (src/html/crypto/exchange.html). Renders the BTC/USDT daily candlestick chart
 * via the SHARED ApexCharts wrapper so it inherits the Aurora palette, dark mode,
 * and live re-theme on the `ax:change` event. Relative import instead of the
 * reference's absolute /src/js path.
 */
import { renderChart } from '../vireo/plugins/charts.js';

const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();
const candle = document.getElementById('ax-ex-candle');
if (candle) {
  const ohlc = [
    [1718150400000, 64200, 65100, 63800, 64900],
    [1718236800000, 64900, 66200, 64500, 65800],
    [1718323200000, 65800, 66100, 64200, 64600],
    [1718409600000, 64600, 65900, 64100, 65500],
    [1718496000000, 65500, 67200, 65300, 66900],
    [1718582400000, 66900, 67100, 65800, 66100],
    [1718668800000, 66100, 66800, 64900, 65200],
    [1718755200000, 65200, 67400, 65000, 67100],
    [1718841600000, 67100, 68200, 66800, 67900],
    [1718928000000, 67900, 68100, 66400, 66700],
    [1719014400000, 66700, 68400, 66500, 68200],
    [1719100800000, 68200, 68900, 67200, 67840],
  ].map((c) => ({ x: c[0], y: [c[1], c[2], c[3], c[4]] }));
  renderChart(candle, 'candlestick', [{ data: ohlc }], {
    height: 360, legend: 'none',
    apex: {
      plotOptions: { candlestick: { colors: { upward: cv('--ax-success-500'), downward: cv('--ax-danger-500') } } },
      xaxis: { type: 'datetime' },
      yaxis: { tooltip: { enabled: true }, labels: { formatter: (v) => '$' + (v / 1000).toFixed(1) + 'K' } },
    },
  });
}
