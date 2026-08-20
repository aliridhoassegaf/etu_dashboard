/*
 * Vireo — Widgets page script (Laravel edition).
 *
 * Faithful port of the inline module in the HTML reference (src/html/widgets.html).
 * Renders the "By device" donut (labels + centre total) and the "Monthly target"
 * radial gauge via the SHARED ApexCharts wrapper so both inherit the Aurora
 * palette, dark mode, and live re-theme on the `ax:change` event. The KPI
 * sparklines and the area/column chart widgets are auto-initialised by the
 * data-attr scanner in plugins/charts.js (booted by resources/js/app.js) — only
 * these two richer charts need explicit options, exactly like the reference.
 */
import { renderChart } from '../vireo/plugins/charts.js';

const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const donut = document.getElementById('wg-donut');
if (donut) renderChart(donut, 'donut', [58, 34, 8], {
  height: 200, legend: 'none',
  apex: {
    labels: ['Desktop', 'Mobile', 'Tablet'],
    colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink')],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '70%', labels: {
      show: true,
      name: { fontFamily: cv('--ax-font-sans') },
      value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
      total: { show: true, label: 'Sessions', formatter: () => '54.2K' },
    } } } },
  },
});

const radial = document.getElementById('wg-radial');
if (radial) renderChart(radial, 'radialBar', [72], {
  height: 220, legend: 'none', accent: true,
  apex: {
    plotOptions: { radialBar: {
      hollow: { size: '62%' },
      track: { background: cv('--ax-border') },
      dataLabels: {
        name: { show: true, fontFamily: cv('--ax-font-sans'), color: cv('--ax-text-muted'), offsetY: 22, fontSize: '12px' },
        value: { show: true, fontFamily: cv('--ax-font-mono'), color: cv('--ax-text-strong'), fontSize: '26px', fontWeight: 700, offsetY: -12, formatter: (v) => v + '%' },
      },
    } },
    labels: ['Reached'],
  },
});
