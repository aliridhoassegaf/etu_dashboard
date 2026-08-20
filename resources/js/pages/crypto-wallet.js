/*
 * Vireo — Crypto Wallet page script (Laravel edition).
 *
 * Faithful port of the inline allocation-donut module in the HTML reference
 * (src/html/crypto/wallet.html). Renders the wallet allocation donut via the
 * SHARED ApexCharts wrapper so it inherits the Aurora palette, dark mode, and
 * live re-theme on the `ax:change` event. Relative import instead of the
 * reference's absolute /src/js path.
 */
import { renderChart } from '../vireo/plugins/charts.js';

const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();
const donut = document.getElementById('ax-wallet-donut');
if (donut) {
  renderChart(donut, 'donut', [46, 28, 16, 7, 3], {
    height: 220, legend: 'none',
    apex: {
      labels: ['Bitcoin', 'Ethereum', 'Solana', 'Tether', 'Avalanche'],
      colors: [cv('--ax-viz-amber'), cv('--ax-viz-violet'), cv('--ax-viz-emerald'), cv('--ax-viz-cyan'), cv('--ax-viz-pink')],
      stroke: { width: 0 },
      plotOptions: { pie: { donut: { size: '72%', labels: { show: true,
        name: { fontFamily: cv('--ax-font-sans') },
        value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
        total: { show: true, label: 'Total', formatter: () => '$86.4K' } } } } },
    },
  });
}
