/*
 * Vireo — social dashboard page script (Laravel edition).
 *
 * Faithful port of the inline chart module in the HTML reference
 * (src/html/dashboards/social.html). Uses the SHARED ApexCharts wrapper so charts
 * inherit the Aurora palette, dark mode & live re-theme on the `ax:change` event.
 * KPI sparklines and any data-attr charts auto-init via plugins/charts.js.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const engage = document.getElementById('ax-social-engage');
if (engage) renderChart(engage, 'donut', [684, 142, 96, 58], {
  height: 220, legend: 'none',
  apex: {
    labels: ['Likes', 'Comments', 'Shares', 'Saves'],
    colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '72%', labels: { show: true, value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600, formatter: (v) => (v / 1000).toFixed(0) + 'K' }, total: { show: true, label: 'Total', formatter: () => '980K' } } } } },
  },
});

// Sentiment — semi gauge
const sentiment = document.getElementById('ax-social-sentiment');
if (sentiment) renderChart(sentiment, 'radialBar', [72], {
  height: 230, accent: false,
  apex: {
    labels: ['Positive'],
    colors: [cv('--ax-viz-emerald')],
    plotOptions: { radialBar: { startAngle: -90, endAngle: 90, hollow: { size: '58%' }, track: { background: cv('--ax-surface-subtle'), startAngle: -90, endAngle: 90 }, dataLabels: { name: { offsetY: -6, color: cv('--ax-text-muted'), fontSize: '13px' }, value: { offsetY: -38, fontFamily: cv('--ax-font-display'), fontWeight: 700, fontSize: '28px', color: cv('--ax-text-strong') } } } },
  },
});
