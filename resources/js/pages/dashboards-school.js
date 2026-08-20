/*
 * Vireo — school dashboard page script (Laravel edition).
 *
 * Faithful port of the inline chart module in the HTML reference
 * (src/html/dashboards/school.html). Uses the SHARED ApexCharts wrapper so charts
 * inherit the Aurora palette, dark mode & live re-theme on the `ax:change` event.
 * KPI sparklines and any data-attr charts auto-init via plugins/charts.js.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

// Attendance — stacked column present/late/absent
const att = document.getElementById('ax-school-attendance');
if (att) renderChart(att, 'bar', [
  { name: 'Present', data: [2180, 2210, 2150, 2240, 2120] },
  { name: 'Late', data: [92, 78, 110, 64, 102] },
  { name: 'Absent', data: [68, 52, 80, 36, 118] },
], {
  height: 310, legend: 'none', stacked: true, accent: true,
  apex: {
    colors: [cv('--ax-accent'), cv('--ax-viz-amber'), cv('--ax-viz-pink')],
    plotOptions: { bar: { columnWidth: '46%', borderRadius: 4 } },
    xaxis: { categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
  },
});

// Students by grade donut
const grade = document.getElementById('ax-school-grade');
if (grade) renderChart(grade, 'donut', [648, 612, 558, 522], {
  height: 220, legend: 'none',
  apex: {
    labels: ['Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'],
    colors: [cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber')],
    stroke: { width: 0 },
    plotOptions: { pie: { donut: { size: '72%', labels: { show: true, value: { fontFamily: cv('--ax-font-mono'), fontWeight: 600 }, total: { show: true, label: 'Students', formatter: () => '2,340' } } } } },
  },
});

// Exam scores by subject column
const exams = document.getElementById('ax-school-exams');
if (exams) renderChart(exams, 'bar', [{ name: 'Avg score', data: [82, 76, 88, 71, 79, 85, 68] }], {
  height: 290, legend: 'none', accent: true,
  apex: {
    plotOptions: { bar: { columnWidth: '52%', borderRadius: 5, distributed: true } },
    colors: [cv('--ax-accent'), cv('--ax-viz-cyan'), cv('--ax-viz-violet'), cv('--ax-viz-pink'), cv('--ax-viz-amber'), cv('--ax-viz-emerald'), cv('--ax-accent')],
    xaxis: { categories: ['Math', 'Physics', 'English', 'Chem', 'Biology', 'History', 'Geo'] },
    yaxis: { max: 100 },
    tooltip: { y: { formatter: (v) => v + ' / 100' } },
  },
});
