/*
 * Vireo — nft dashboard page script (Laravel edition).
 * Faithful port of the inline chart module in src/html/dashboards/nft.html.
 * Uses the SHARED ApexCharts wrapper (relative import) so charts inherit the
 * Aurora palette, dark mode, and live re-theme on the ax:change event.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Volume (column) + Floor (line) mixed
const vf = document.getElementById('ax-vol-floor');
if (vf) {
  renderChart(vf, 'line', [
    { name: 'Volume (ETH)', type: 'column', data: [142, 168, 131, 196, 184, 221, 208, 245, 232, 268] },
    { name: 'Floor (ETH)', type: 'line', data: [1.8, 1.9, 1.85, 2.0, 2.1, 2.05, 2.2, 2.3, 2.35, 2.4] },
  ], {
    height: 300, legend: 'none', accent: true,
    apex: {
      colors: [cv('--ax-accent'), cv('--ax-viz-violet')],
      stroke: { width: [0, 3], curve: 'smooth' },
      plotOptions: { bar: { borderRadius: 4, columnWidth: '52%' } },
      yaxis: [
        { labels: { formatter: (v) => Math.round(v) } },
        { opposite: true, labels: { formatter: (v) => v.toFixed(1) } },
      ],
    },
  });
}

// Sales by category donut
const cat = document.getElementById('ax-cat-donut');
if (cat) {
  renderChart(cat, 'donut', [42, 26, 20, 12], {
    height: 220, legend: 'none',
    apex: {
      labels: ['Art', 'Collectibles', 'Gaming', 'Music'],
      colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
      stroke: { width: 0 },
      plotOptions: { pie: { donut: { size: '72%', labels: { show: true,
        name: { fontFamily: cv('--ax-font-sans') },
        value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
        total: { show: true, label: 'Sales', formatter: () => '1,284' } } } } },
    },
  });
}
