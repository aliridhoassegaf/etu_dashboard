@extends('layouts.app')

{{-- Financial Charts — faithful re-expression of src/html/charts/apex-financial.html.
     Same DOM/classes/ARIA. KPI-row sparklines auto-init from data-ax-chart;
     candlestick/brush/range/boxplot render via the bundled page module. --}}

@section('content')

        <!-- ════════════════ PAGE HEAD ════════════════ -->
        <div class="ax-page-head">
          <div class="ax-page-head__row">
            <div>
              <nav class="ax-breadcrumb" data-ax-breadcrumb aria-label="Breadcrumb"></nav>
              <h1 class="ax-page-head__title">Financial Charts</h1>
              <p class="ax-page-head__subtitle">Candlestick, OHLC, range area &amp; brush — Aperture Goods (APG) ticker, Jun 2025.</p>
            </div>
            <div class="ax-page-head__actions">
              <button type="button" class="ax-btn ax-btn--secondary ax-btn--pill">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 11h16"/><path d="M11 15h1"/><path d="M12 15v3"/></svg>
                <span class="ax-btn__label">Jun 2025</span>
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6l6 -6"/></svg>
              </button>
              <button type="button" class="ax-btn ax-btn--ghost">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"/><path d="M7 11l5 5l5 -5"/><path d="M12 4l0 12"/></svg>
                <span class="ax-btn__label">Export</span>
              </button>
              <button type="button" class="ax-btn ax-btn--primary">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1l0 -3"/><path d="M6 4l0 2"/><path d="M6 11l0 9"/><path d="M10 15a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1l0 -3"/><path d="M12 4l0 10"/><path d="M12 19l0 1"/><path d="M16 6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1l0 -4"/><path d="M18 4l0 1"/><path d="M18 11l0 9"/></svg>
                <span class="ax-btn__label">New chart</span>
              </button>
            </div>
          </div>
        </div>

        <!-- ════════════════ CONTENT GRID ════════════════ -->
        <div class="ax-dash-grid">

          <!-- ───── KPI ROW (4 × ticker stats) ───── -->
          <div class="ax-card ax-kpi ax-col--3" role="region" aria-label="Last price $438.40, up 3.1%">
            <div class="ax-card__body">
              <div class="ax-kpi__top">
                <span class="ax-kpi__icon ax-kpi__icon--c1">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"/><path d="M12 3v3m0 12v3"/></svg>
                </span>
                <span class="ax-kpi__delta ax-kpi__delta--up">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 15l6 -6l6 6"/></svg>3.1%
                </span>
              </div>
              <div class="ax-kpi__label">Last price (APG)</div>
              <div class="ax-kpi__meta" style="justify-content:space-between;width:100%;">
                <div class="ax-kpi__value ax-num">$438.40</div>
                <div class="ax-kpi__spark" data-ax-chart="apex" data-ax-chart-type="line" data-ax-chart-sparkline="true" data-ax-chart-tooltip="false" data-ax-chart-height="40" data-ax-chart-color="--ax-accent" data-ax-chart-series='[{"name":"Trend","data":[8,10,7,14,16,20,25,29]}]' style="min-height:40px" aria-hidden="true"></div>
              </div>
            </div>
          </div>

          <div class="ax-card ax-kpi ax-col--3" role="region" aria-label="Day range $430.20 to $445.00">
            <div class="ax-card__body">
              <div class="ax-kpi__top">
                <span class="ax-kpi__icon ax-kpi__icon--c2">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 18l5 -5l4 4l8 -8"/><path d="M16 9h5v5"/></svg>
                </span>
                <span class="ax-kpi__delta ax-kpi__delta--up">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 15l6 -6l6 6"/></svg>1.6%
                </span>
              </div>
              <div class="ax-kpi__label">Day range</div>
              <div class="ax-kpi__meta" style="justify-content:space-between;width:100%;">
                <div class="ax-kpi__value ax-num" style="font-size:var(--ax-text-xl);">430.20–445.00</div>
              </div>
            </div>
          </div>

          <div class="ax-card ax-kpi ax-col--3" role="region" aria-label="Volume 1.84M shares, up 12.0%">
            <div class="ax-card__body">
              <div class="ax-kpi__top">
                <span class="ax-kpi__icon ax-kpi__icon--c3">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12h4l3 8l4 -16l3 8h4"/></svg>
                </span>
                <span class="ax-kpi__delta ax-kpi__delta--up">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 15l6 -6l6 6"/></svg>12.0%
                </span>
              </div>
              <div class="ax-kpi__label">Volume</div>
              <div class="ax-kpi__meta" style="justify-content:space-between;width:100%;">
                <div class="ax-kpi__value ax-num">1.84M</div>
                <div class="ax-kpi__spark" data-ax-chart="apex" data-ax-chart-type="line" data-ax-chart-sparkline="true" data-ax-chart-tooltip="false" data-ax-chart-height="40" data-ax-chart-color="--ax-viz-violet" data-ax-chart-series='[{"name":"Trend","data":[14,12,18,15,22,17,24,26]}]' style="min-height:40px" aria-hidden="true"></div>
              </div>
            </div>
          </div>

          <div class="ax-card ax-kpi ax-col--3" role="region" aria-label="Market cap $3.71B, down 0.4%">
            <div class="ax-card__body">
              <div class="ax-kpi__top">
                <span class="ax-kpi__icon ax-kpi__icon--c4">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 21l18 0"/><path d="M5 21v-14l8 -4v18"/><path d="M19 21v-10l-6 -4"/><path d="M9 9l0 0"/><path d="M9 12l0 0"/><path d="M9 15l0 0"/></svg>
                </span>
                <span class="ax-kpi__delta ax-kpi__delta--down">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6l6 -6"/></svg>0.4%
                </span>
              </div>
              <div class="ax-kpi__label">Market cap</div>
              <div class="ax-kpi__meta" style="justify-content:space-between;width:100%;">
                <div class="ax-kpi__value ax-num">$3.71B</div>
                <div class="ax-kpi__spark" data-ax-chart="apex" data-ax-chart-type="line" data-ax-chart-sparkline="true" data-ax-chart-tooltip="false" data-ax-chart-height="40" data-ax-chart-color="--ax-viz-amber" data-ax-chart-series='[{"name":"Trend","data":[26,23,25,21,22,18,16,13]}]' style="min-height:40px" aria-hidden="true"></div>
              </div>
            </div>
          </div>

          <!-- ───── HERO: Candlestick + volume brush (12) ───── -->
          <section class="ax-card ax-card--chart ax-col--12" role="region" aria-label="APG daily candlestick chart with volume brush">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">OHLC · Daily</span>
                <h2 class="ax-card__title">APG — Candlestick</h2>
                <p class="ax-card__subtitle">Open / high / low / close · brush the volume strip below to zoom</p>
              </div>
              <div class="ax-card__actions">
                <div class="ax-cluster" style="gap:var(--ax-space-4);">
                  <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-success-500);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Bullish</small></span>
                  <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-danger-500);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Bearish</small></span>
                </div>
                <div class="ax-btn-group ax-btn-group--segmented" role="radiogroup" aria-label="Interval">
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">1D</button>
                  <button type="button" class="ax-btn ax-btn--sm is-selected" role="radio" aria-checked="true">1W</button>
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">1M</button>
                </div>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-candle-main" aria-label="Candlestick chart of APG daily OHLC prices, last close $438.40"></div>
              <div id="ax-candle-brush" style="margin-top:var(--ax-space-2);" aria-label="Volume brush selector for the candlestick chart"></div>
            </div>
          </section>

          <!-- ───── ROW: OHLC bar chart (6) + Range area band (6) ───── -->
          <section class="ax-card ax-card--chart ax-col--6" role="region" aria-label="APG OHLC bar chart">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Bar OHLC</span>
                <h2 class="ax-card__title">OHLC Bars</h2>
                <p class="ax-card__subtitle">Classic open-high-low-close bars</p>
              </div>
              <button type="button" class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="OHLC chart options">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M18 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/></svg>
              </button>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-ohlc-bar" aria-label="OHLC bar chart of APG daily prices"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--6" role="region" aria-label="Revenue forecast range area">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Range area</span>
                <h2 class="ax-card__title">Forecast Band</h2>
                <p class="ax-card__subtitle">Revenue projection — low / mid / high envelope</p>
              </div>
              <span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>On track</span>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-range-area" aria-label="Range area chart of revenue forecast with confidence band"></div>
            </div>
          </section>

          <!-- ───── ROW: Brush area (8) + Spread boxplot (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Sessions with brush navigator">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Brush + sync</span>
                <h2 class="ax-card__title">Brush Navigator</h2>
                <p class="ax-card__subtitle">Drag the lower strip to focus the detail chart above</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-brush-detail" aria-label="Detail area chart driven by the brush navigator below"></div>
              <div id="ax-brush-nav" style="margin-top:var(--ax-space-2);" aria-label="Brush navigator selector"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Quarterly price spread boxplot">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Distribution</span>
                <h2 class="ax-card__title">Price Spread</h2>
                <p class="ax-card__subtitle">Quarterly box &amp; whisker</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-boxplot" aria-label="Boxplot of quarterly APG price spread"></div>
            </div>
          </section>

          <!-- ───── FULL: tick table (12) ───── -->
          <section class="ax-card ax-col--12" role="region" aria-label="Recent OHLC session table">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Session Tape</h2>
                <p class="ax-card__subtitle">Last six trading sessions · OHLC &amp; volume</p>
              </div>
              <a class="ax-btn ax-btn--link" href="#">Full history</a>
            </div>
            <div class="ax-table-wrap">
              <table class="ax-table ax-table--hover">
                <thead class="ax-table__head">
                  <tr>
                    <th class="ax-table__th" scope="col">Date</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Open</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">High</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Low</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Close</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Volume</th>
                    <th class="ax-table__th" scope="col">Trend</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 09</td>
                    <td class="ax-table__td ax-table__td--num">438.00</td>
                    <td class="ax-table__td ax-table__td--num">445.00</td>
                    <td class="ax-table__td ax-table__td--num">430.20</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">433.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-muted);">1.84M</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--danger ax-badge--pill"><span class="ax-badge__dot"></span>−1.1%</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 06</td>
                    <td class="ax-table__td ax-table__td--num">424.00</td>
                    <td class="ax-table__td ax-table__td--num">440.00</td>
                    <td class="ax-table__td ax-table__td--num">422.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">438.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-muted);">1.62M</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>+3.3%</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 05</td>
                    <td class="ax-table__td ax-table__td--num">428.00</td>
                    <td class="ax-table__td ax-table__td--num">432.00</td>
                    <td class="ax-table__td ax-table__td--num">420.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text);">424.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-muted);">1.41M</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--danger ax-badge--pill"><span class="ax-badge__dot"></span>−0.9%</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 04</td>
                    <td class="ax-table__td ax-table__td--num">415.00</td>
                    <td class="ax-table__td ax-table__td--num">430.00</td>
                    <td class="ax-table__td ax-table__td--num">412.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">428.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-muted);">1.55M</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>+3.1%</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 03</td>
                    <td class="ax-table__td ax-table__td--num">418.00</td>
                    <td class="ax-table__td ax-table__td--num">426.00</td>
                    <td class="ax-table__td ax-table__td--num">414.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text);">415.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-muted);">1.28M</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--danger ax-badge--pill"><span class="ax-badge__dot"></span>−0.7%</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 02</td>
                    <td class="ax-table__td ax-table__td--num">412.00</td>
                    <td class="ax-table__td ax-table__td--num">420.00</td>
                    <td class="ax-table__td ax-table__td--num">408.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">418.00</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-muted);">1.19M</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>+1.5%</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

        </div>
@endsection

@push('scripts')
  @vite(['resources/js/pages/charts-apex-financial.js'])
@endpush
