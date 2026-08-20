/*
 * Vireo — Pie & Donut Charts page (charts/apex-pie).
 * Faithful port of the inline module in src/html/charts/apex-pie.html.
 * Renders through the shared ApexCharts wrapper (Aurora palette, dark mode,
 * live re-theme on ax:change).
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();
const SERIES = [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber'), cv('--ax-viz-emerald')];

// Donut with centre total
const donut = document.getElementById('ax-pie-donut');
if (donut) renderChart(donut, 'donut', [386, 290, 218, 133, 109, 72], {
  height: 300, legend: 'none',
  apex: {
    labels: ['Lighting','Desk','Drinkware','Storage','Stationery','Tech'],
    colors: SERIES,
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '70%', labels: {
      show: true,
      name: { fontFamily: cv('--ax-font-sans') },
      value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600, formatter: (v) => '$' + v + 'K' },
      total: { show: true, label: 'Total', fontFamily: cv('--ax-font-sans'), formatter: () => '$1.21M' },
    } } } },
    tooltip: { y: { formatter: (v) => '$' + v + 'K' } },
  },
});

// Basic pie — traffic sources
const pie = document.getElementById('ax-pie-basic');
if (pie) renderChart(pie, 'pie', [38, 27, 14, 9, 7, 5], {
  height: 300, legend: 'none',
  apex: {
    labels: ['Direct','Organic','Referral','Social','Email','Paid'],
    colors: SERIES,
    stroke: { width: 0 },
    tooltip: { y: { formatter: (v) => v + '%' } },
  },
});

// Semi-circle gradient donut — storage
const semi = document.getElementById('ax-pie-semi');
if (semi) renderChart(semi, 'donut', [196, 92, 60, 164], {
  height: 240, legend: 'none',
  apex: {
    labels: ['Media','Documents','Backups','Free'],
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-border')],
    stroke: { width: 0 },
    fill: { type: 'gradient', gradient: { shade: 'dark', shadeIntensity: 0.4, opacityFrom: 1, opacityTo: 0.9 } },
    plotOptions: { pie: {
      startAngle: -90, endAngle: 90, offsetY: 10,
      donut: { size: '68%', labels: {
        show: true,
        name: { offsetY: -8, fontFamily: cv('--ax-font-sans') },
        value: { offsetY: -2, fontFamily: cv('--ax-font-mono'), fontWeight: 600, formatter: (v) => v + ' GB' },
        total: { show: true, label: 'Used', fontFamily: cv('--ax-font-sans'), formatter: () => '348 GB' },
      } },
    } },
    tooltip: { y: { formatter: (v) => v + ' GB' } },
  },
});

// Gradient pie — plan mix
const grad = document.getElementById('ax-pie-gradient');
if (grad) renderChart(grad, 'pie', [1840, 980, 540, 220], {
  height: 300, legend: 'none',
  apex: {
    labels: ['Starter','Pro','Team','Enterprise'],
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink')],
    stroke: { width: 0 },
    fill: { type: 'gradient', gradient: { shade: 'dark', shadeIntensity: 0.45, opacityFrom: 1, opacityTo: 0.88 } },
    tooltip: { y: { formatter: (v) => v.toLocaleString() + ' accounts' } },
  },
});

// Monochrome donut — device, single-hue accent ramp
const mono = document.getElementById('ax-pie-mono');
if (mono) renderChart(mono, 'donut', [58, 34, 8], {
  height: 230, legend: 'none',
  apex: {
    labels: ['Desktop','Mobile','Tablet'],
    colors: [
      cv('--ax-accent'),
      'color-mix(in oklab, ' + cv('--ax-accent') + ' 62%, transparent)',
      'color-mix(in oklab, ' + cv('--ax-accent') + ' 32%, transparent)',
    ],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '72%', labels: {
      show: true,
      name: { fontFamily: cv('--ax-font-sans') },
      value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600, formatter: (v) => v + '%' },
      total: { show: true, label: 'Sessions', fontFamily: cv('--ax-font-sans'), formatter: () => '54.2K' },
    } } } },
    tooltip: { y: { formatter: (v) => v + '%' } },
  },
});
