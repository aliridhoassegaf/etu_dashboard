/*
 * Vireo — Sales dashboard page script (Laravel edition).
 *
 * Faithful port of the inline donut module in the HTML reference
 * (src/html/dashboards/sales.html). Renders the "Session By Device" donut with
 * labels + a centre total via the SHARED ApexCharts wrapper so it inherits the
 * Aurora palette, dark mode, and live re-theme on the `ax:change` event. The KPI
 * sparklines and the big area chart are auto-initialised by the data-attr
 * scanner in plugins/charts.js (booted by resources/js/app.js) — only this richer
 * donut needs explicit options, exactly like the reference.
 */
import { renderChart } from '../vireo/plugins/charts.js';

const el = document.getElementById('ax-device-donut');
if (el) {
  const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();
  renderChart(el, 'donut', [58, 34, 8], {
    height: 230,
    legend: 'none',
    apex: {
      labels: ['Desktop', 'Mobile', 'Tablet'],
      colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink')],
      stroke: { width: 0 },
      plotOptions: {
        pie: {
          donut: {
            size: '72%',
            labels: {
              show: true,
              name: { fontFamily: cv('--ax-font-sans') },
              value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
              total: { show: true, label: 'Sessions', formatter: () => '54.2K' },
            },
          },
        },
      },
    },
  });
}
