/*
 * Vireo — ecommerce dashboard page script (Laravel edition).
 * Faithful port of the inline chart module in src/html/dashboards/ecommerce.html.
 * Uses the SHARED ApexCharts wrapper (relative import) so charts inherit the
 * Aurora palette, dark mode, and live re-theme on the ax:change event.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Monthly revenue target — radial gauge (opener, P4)
const target = document.getElementById('ax-ecom-target');
if (target) renderChart(target, 'radialBar', [68], {
  height: 220, legend: 'none', accent: true,
  apex: {
    plotOptions: { radialBar: {
      hollow: { size: '64%' },
      track: { background: cv('--ax-border') },
      dataLabels: {
        name: { show: true, fontFamily: cv('--ax-font-sans'), color: cv('--ax-text-muted'), offsetY: 22, fontSize: '12px' },
        value: { show: true, fontFamily: cv('--ax-font-mono'), color: cv('--ax-text-strong'), fontSize: '28px', fontWeight: 700, offsetY: -12, formatter: (v) => v + '%' },
      },
    } },
    labels: ['of target'],
  },
});

const mixed = document.getElementById('ax-revenue-mixed');
if (mixed) renderChart(mixed, 'line', [
  { name: 'Revenue', type: 'line', data: [82000,91000,88000,99000,108000,104000,118000,124000,121000,132000,138000,142800] },
  { name: 'Orders', type: 'column', data: [2900,3200,3100,3500,3800,3700,4100,4300,4200,4500,4600,4612] },
], {
  height: 320, legend: 'none',
  apex: {
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan')],
    stroke: { width: [2.5, 0], curve: 'smooth' },
    fill: { type: ['solid','solid'], opacity: [1, 1] },
    plotOptions: { bar: { borderRadius: 4, columnWidth: '46%' } },
    yaxis: [
      { labels: { formatter: (v) => '$' + (v/1000).toFixed(0) + 'K' } },
      { opposite: true, labels: { formatter: (v) => (v/1000).toFixed(1) + 'K' } },
    ],
    xaxis: { categories: ['Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May','Jun'] },
  },
});

const el = document.getElementById('ax-category-donut');
if (el) renderChart(el, 'donut', [34,27,21,12,6], {
  height: 230, legend: 'none',
  apex: {
    labels: ['Apparel','Electronics','Home','Beauty','Other'],
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '72%', labels: {
      show: true, name: { fontFamily: cv('--ax-font-sans') },
      value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
      total: { show: true, label: 'Net sales', formatter: () => '$142.8K' } } } } },
  },
});
