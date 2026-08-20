/*
 * Vireo — analytics dashboard page script (Laravel edition).
 * Faithful port of the inline chart module in src/html/dashboards/analytics.html.
 * Uses the SHARED ApexCharts wrapper (relative import) so charts inherit the
 * Aurora palette, dark mode, and live re-theme on the ax:change event.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const mixed = document.getElementById('ax-audience-mixed');
if (mixed) renderChart(mixed, 'line', [
{ name: 'Sessions', type: 'line', data: [9200,10400,9800,11200,12600,11900,13400,14100,13700,15200,16100,17400] },
{ name: 'New visitors', type: 'column', data: [4100,4600,4300,5000,5600,5200,5900,6300,6000,6700,7100,7600] },
{ name: 'Returning', type: 'column', data: [3200,3500,3400,3900,4100,4000,4400,4700,4500,4900,5200,5500] },
], {
height: 320, legend: 'none',
apex: {
colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet')],
stroke: { width: [2.5, 0, 0], curve: 'smooth' },
fill: { type: ['solid','solid','solid'], opacity: [1, 1, 1] },
plotOptions: { bar: { borderRadius: 4, columnWidth: '52%' } },
xaxis: { categories: ['Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May','Jun'] },
},
});

const donut = (id, vals, labels, colors, total, label) => {
const el = document.getElementById(id);
if (!el) return;
renderChart(el, 'donut', vals, {
height: 230, legend: 'none',
apex: {
labels, colors, stroke: { width: 0 },
plotOptions: { pie: { donut: { size: '72%', labels: {
  show: true, name: { fontFamily: cv('--ax-font-sans') },
  value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 },
  total: { show: true, label, formatter: () => total } } } } },
},
});
};
donut('ax-channels-donut', [42,24,16,11,7], ['Organic','Direct','Social','Referral','Paid'],
[cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')], '128.4K', 'Sessions');
donut('ax-device-donut', [56,37,7], ['Desktop','Mobile','Tablet'],
[cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink')], '128.4K', 'Sessions');
