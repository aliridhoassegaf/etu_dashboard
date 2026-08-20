/*
 * Vireo — jobs dashboard page script (Laravel edition).
 * Faithful port of the inline chart module in src/html/dashboards/jobs.html.
 * Uses the SHARED ApexCharts wrapper (relative import) so charts inherit the
 * Aurora palette, dark mode, and live re-theme on the ax:change event.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Hiring funnel — emulated via horizontal bar, descending stages
const funnel = document.getElementById('ax-jobs-funnel');
if (funnel) renderChart(funnel, 'bar', [{ name: 'Candidates', data: [2940, 1180, 460, 96, 72] }], {
height: 330, legend: 'none', accent: true,
apex: {
plotOptions: { bar: { horizontal: true, borderRadius: 6, barHeight: '62%', distributed: true } },
colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-amber'), cv('--ax-viz-emerald')],
xaxis: { categories: ['Applied', 'Screened', 'Interview', 'Offer', 'Hired'] },
dataLabels: { enabled: true, textAnchor: 'start', offsetX: 4, style: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 }, formatter: (v) => v.toLocaleString() },
tooltip: { y: { formatter: (v) => v.toLocaleString() + ' candidates' } },
},
});

// Source of hire donut
const source = document.getElementById('ax-jobs-source');
if (source) renderChart(source, 'donut', [42, 28, 18, 12], {
height: 220, legend: 'none',
apex: {
labels: ['Job boards', 'Referrals', 'Agency', 'Direct'],
colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
stroke: { width: 0 },
plotOptions: { pie: { donut: { size: '72%', labels: { show: true, value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 }, total: { show: true, label: 'Hires', formatter: () => '72' } } } } },
},
});

// Openings by department — horizontal bar
const dept = document.getElementById('ax-jobs-dept');
if (dept) renderChart(dept, 'bar', [{ name: 'Openings', data: [18, 12, 9, 8, 6, 5] }], {
height: 230, legend: 'none', accent: true,
apex: {
plotOptions: { bar: { horizontal: true, borderRadius: 4, barHeight: '56%' } },
xaxis: { categories: ['Engineering', 'Sales', 'Design', 'Marketing', 'Support', 'Ops'] },
dataLabels: { enabled: true, offsetX: 14, style: { fontFamily: cv('--ax-font-mono'), fontWeight: 600, colors: [cv('--ax-on-accent')] } },
},
});

// Hiring target — radial gauge
const target = document.getElementById('ax-jobs-target');
if (target) renderChart(target, 'radialBar', [80], {
height: 230, accent: true,
apex: {
labels: ['Target'],
plotOptions: { radialBar: { hollow: { size: '62%' }, track: { background: cv('--ax-surface-subtle') }, dataLabels: { name: { offsetY: 22, color: cv('--ax-text-muted'), fontSize: '13px' }, value: { offsetY: -14, fontFamily: cv('--ax-font-display'), fontWeight: 700, fontSize: '28px', color: cv('--ax-text-strong') } } } },
},
});
