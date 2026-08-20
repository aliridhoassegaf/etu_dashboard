/*
 * Vireo — NFT Details page script (Laravel edition).
 *
 * Faithful port of the inline price-history module in the HTML reference
 * (src/html/nft/nft-details.html). Renders the 30-day price-history area chart
 * via the SHARED ApexCharts wrapper so it inherits the Aurora palette, dark mode,
 * and live re-theme on the `ax:change` event. Relative import instead of the
 * reference's absolute /src/js path.
 */
import { renderChart } from '../vireo/plugins/charts.js';

const el = document.getElementById('ax-price-history');
if (el) {
  renderChart(el, 'area', [{ name: 'Price (ETH)', data: [1.65, 1.7, 1.62, 1.78, 1.85, 1.8, 1.95, 2.05, 2.0, 2.2, 2.3, 2.4] }], {
    height: 150, legend: 'none', accent: true,
    apex: {
      stroke: { width: 2.5, curve: 'smooth' },
      xaxis: { labels: { show: false }, axisTicks: { show: false }, axisBorder: { show: false } },
      yaxis: { show: false },
      grid: { show: false, padding: { left: 0, right: 0, top: 0, bottom: 0 } },
      tooltip: { y: { formatter: (v) => v.toFixed(2) + ' ETH' } },
    },
  });
}
