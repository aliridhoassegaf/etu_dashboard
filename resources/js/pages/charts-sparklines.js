/*
 * Vireo — Sparklines page (charts/sparklines).
 * Faithful port of the inline module in src/html/charts/sparklines.html.
 * All sparklines render via the shared wrapper in sparkline mode (no axes/grid/
 * legend). Colors come from --ax-* tokens so every spark re-themes on ax:change.
 */
import { renderChart } from '../vireo/plugins/charts.js';
const cv = (n) => getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const spark = (id, type, data, color, h = 56, fillOpacity) => {
  const el = document.getElementById(id);
  if (!el) return;
  const apex = { colors: [color], stroke: { width: type === 'bar' ? 0 : 2, curve: 'smooth', lineCap: 'round' } };
  if (type === 'area') apex.fill = { type: 'gradient', gradient: { opacityFrom: fillOpacity ?? 0.35, opacityTo: 0.02 } };
  if (type === 'bar') apex.plotOptions = { bar: { columnWidth: '60%', borderRadius: 1 } };
  renderChart(el, type, [{ name: 'v', data }], { height: h, sparkline: true, legend: 'none', apex });
};

// ── Hero KPI tiles (area, h64) ──
spark('sp-rev', 'area', [42, 48, 45, 53, 57, 55, 62, 60, 68, 72, 70, 76], cv('--ax-accent'), 64);
spark('sp-ord', 'area', [80, 92, 88, 101, 96, 110, 118, 124], cv('--ax-viz-cyan'), 64);
spark('sp-cus', 'area', [60, 58, 55, 57, 54, 52, 50, 49], cv('--ax-danger-500'), 64);
spark('sp-aov', 'area', [54, 55, 56, 55, 57, 58, 59, 60], cv('--ax-success-500'), 64);

// ── Compact metric tiles (line, h40) ──
spark('sp-sess', 'line', [38, 42, 40, 46, 48, 52, 54], cv('--ax-viz-cyan'), 40);
spark('sp-bounce', 'line', [44, 42, 43, 41, 40, 39, 38], cv('--ax-success-500'), 40);
spark('sp-signup', 'line', [18, 22, 20, 26, 28, 30, 31], cv('--ax-viz-violet'), 40);
spark('sp-tickets', 'line', [62, 58, 55, 51, 49, 48, 47], cv('--ax-success-500'), 40);
spark('sp-refund', 'line', [2.1, 1.9, 2.0, 1.6, 1.4, 1.3, 1.2], cv('--ax-success-500'), 40);
spark('sp-uptime', 'line', [99.6, 99.7, 99.5, 99.8, 99.9, 99.9, 99.9], cv('--ax-viz-emerald'), 40);

// ── Variant showcase ──
spark('sp-var-line', 'line', [48, 55, 51, 60, 58, 65, 62, 70, 66, 72], cv('--ax-accent'), 56);
spark('sp-var-area', 'area', [5.2, 5.8, 6.1, 5.9, 6.6, 7.0, 6.8, 7.2, 7.1, 7.4], cv('--ax-viz-violet'), 56);
spark('sp-var-bar', 'bar', [6, 9, 7, 11, 8, 12, 10, 14, 9, 13, 11, 15, 12, 16], cv('--ax-viz-cyan'), 56);

// ── Win / loss (diverging bar: +1 win = success, −1 loss = danger) ──
const wl = [1, 1, -1, 1, 1, 1, -1, 1, 1, -1, 1, 1, 1, 1, -1, 1];
const wlEl = document.getElementById('sp-var-winloss');
if (wlEl) {
  renderChart(wlEl, 'bar', [{ name: 'SLA', data: wl }], {
    height: 56, sparkline: true, legend: 'none',
    apex: {
      plotOptions: { bar: { columnWidth: '52%', borderRadius: 1, colors: { ranges: [
        { from: -1, to: 0, color: cv('--ax-danger-500') },
        { from: 0.0001, to: 1, color: cv('--ax-success-500') },
      ] } } },
      yaxis: { show: false },
    },
  });
}

// ── Currency balance strips (area, h36) ──
spark('sp-cur-usd', 'area', [40, 42, 41, 44, 46, 45, 47, 48], cv('--ax-success-500'), 36, 0.3);
spark('sp-cur-gbp', 'area', [24, 23, 22, 23, 22, 21.8, 21.6, 21.5], cv('--ax-danger-500'), 36, 0.3);
spark('sp-cur-eur', 'area', [28, 30, 29, 31, 32, 32.5, 33, 33.1], cv('--ax-viz-cyan'), 36, 0.3);
spark('sp-cur-aud', 'area', [14, 14.5, 15, 14.8, 15.4, 15.7, 15.9, 16.0], cv('--ax-viz-violet'), 36, 0.3);

// ── Table-cell sparklines (line, h32) ──
spark('sp-cell-1', 'line', [30, 34, 32, 38, 41, 39, 44, 46, 43, 48, 52, 54], cv('--ax-success-500'), 32);
spark('sp-cell-2', 'line', [24, 26, 25, 28, 27, 30, 29, 31, 30, 32, 33, 33], cv('--ax-success-500'), 32);
spark('sp-cell-3', 'line', [26, 25, 24, 23, 24, 22, 23, 21, 22, 21, 21, 21], cv('--ax-danger-500'), 32);
spark('sp-cell-4', 'line', [8, 9, 8, 9, 10, 9, 10, 9, 10, 9, 9.5, 9.7], cv('--ax-success-500'), 32);
spark('sp-cell-5', 'line', [11, 12, 13, 12, 13, 14, 13, 15, 14, 15, 15.5, 15.6], cv('--ax-success-500'), 32);
