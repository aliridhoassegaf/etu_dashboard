/*
 * Vireo — podcast dashboard page script (Laravel edition).
 *
 * Faithful port of the inline chart module in the HTML reference
 * (src/html/dashboards/podcast.html). Uses the SHARED ApexCharts wrapper so charts
 * inherit the Aurora palette, dark mode & live re-theme on the `ax:change` event.
 * KPI sparklines and any data-attr charts auto-init via plugins/charts.js.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Plays (line) + net subscribers (column) — mixed
const plays = document.getElementById('ax-pod-plays');
if (plays) renderChart(plays, 'line', [
  { name: 'Plays', type: 'line', data: [128, 142, 136, 158, 150, 172, 166, 188, 180, 204, 196, 224] },
  { name: 'Net subs', type: 'column', data: [38, 44, 40, 52, 48, 58, 54, 64, 60, 72, 68, 82] },
], {
  height: 310, legend: 'none', accent: true,
  apex: {
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan')],
    stroke: { width: [3, 0], curve: 'smooth' },
    fill: { type: ['solid', 'solid'], opacity: [1, 0.85] },
    plotOptions: { bar: { columnWidth: '38%', borderRadius: 3 } },
    xaxis: { categories: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10', 'W11', 'W12'] },
    yaxis: { labels: { formatter: (v) => v + 'K' } },
  },
});

// Listens by platform donut
const platform = document.getElementById('ax-pod-platform');
if (platform) renderChart(platform, 'donut', [46, 31, 15, 8], {
  height: 220, legend: 'none',
  apex: {
    labels: ['Spotify', 'Apple Podcasts', 'YouTube', 'Web'],
    colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '72%', labels: { show: true, value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 }, total: { show: true, label: 'Plays', formatter: () => '1.82M' } } } } },
  },
});
