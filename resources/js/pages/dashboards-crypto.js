/*
 * Vireo — crypto dashboard page script (Laravel edition).
 * Faithful port of the inline chart module in src/html/dashboards/crypto.html.
 * Uses the SHARED ApexCharts wrapper (relative import) so charts inherit the
 * Aurora palette, dark mode, and live re-theme on the ax:change event.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Asset allocation donut
const donut = document.getElementById('ax-alloc-donut');
if (donut) {
  renderChart(donut, 'donut', [46, 28, 16, 10], {
    height: 220, legend: 'none',
    apex: {
      labels: ['Bitcoin', 'Ethereum', 'Solana', 'Tether'],
      colors: [cv('--ax-viz-amber'), cv('--ax-viz-violet'), cv('--ax-viz-emerald'), cv('--ax-viz-cyan')],
      stroke: { width: 0 },
      plotOptions: { pie: { donut: { size: '72%', labels: { show: true,
        name: { fontFamily: cv('--ax-font-sans') },
        value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
        total: { show: true, label: 'Total', formatter: () => '$86.4K' } } } } },
    },
  });
}

// BTC candlestick
const candle = document.getElementById('ax-btc-candle');
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
    height: 320, legend: 'none',
    apex: {
      plotOptions: { candlestick: { colors: { upward: cv('--ax-success-500'), downward: cv('--ax-danger-500') } } },
      xaxis: { type: 'datetime' },
      yaxis: { tooltip: { enabled: true }, labels: { formatter: (v) => '$' + (v / 1000).toFixed(1) + 'K' } },
    },
  });
}

// Fear & Greed semi-gauge
const fg = document.getElementById('ax-feargreed');
if (fg) {
  renderChart(fg, 'radialBar', [68], {
    height: 230, legend: 'none',
    apex: {
      colors: [cv('--ax-warning-500')],
      plotOptions: { radialBar: {
        startAngle: -110, endAngle: 110, hollow: { size: '62%' },
        track: { background: cv('--ax-fill-hover'), strokeWidth: '100%' },
        dataLabels: {
          name: { show: true, offsetY: 22, color: cv('--ax-text-muted'), fontSize: '13px', fontFamily: cv('--ax-font-sans') },
          value: { show: true, offsetY: -16, color: cv('--ax-text-strong'), fontSize: '34px', fontFamily: cv('--ax-font-mono'), fontWeight: 700, formatter: (v) => v },
        },
      } },
      labels: ['Greed'],
      fill: { type: 'solid' },
    },
  });
}
