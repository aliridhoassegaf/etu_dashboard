@extends('layouts.app')

{{-- Sales dashboard — faithful re-expression of the HTML reference
     src/html/dashboards/sales.html (default route "/"). KPIs, ApexCharts
     via the shared wrapper, tables & timeline. Same DOM/classes/ARIA. --}}

@section('content')
        <!-- ════════════════ PAGE HEAD ════════════════ -->
        <div class="ax-page-head">
          <div class="ax-page-head__row">
            <div>
              <nav class="ax-breadcrumb" data-ax-breadcrumb aria-label="Breadcrumb"></nav>
              <h1 class="ax-page-head__title">Sales</h1>
              <p class="ax-page-head__subtitle">Here's how revenue is tracking — Jul 2025 to Jun 2026.</p>
            </div>
            <div class="ax-page-head__actions">
              <button type="button" class="ax-btn ax-btn--secondary ax-btn--pill">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 11h16"/><path d="M11 15h1"/><path d="M12 15v3"/></svg>
                <span class="ax-btn__label">Last 30 days</span>
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6l6 -6"/></svg>
              </button>
              <button type="button" class="ax-btn ax-btn--ghost">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"/><path d="M7 11l5 5l5 -5"/><path d="M12 4l0 12"/></svg>
                <span class="ax-btn__label">Export</span>
              </button>
              <button type="button" class="ax-btn ax-btn--primary">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5l0 14"/><path d="M5 12l14 0"/></svg>
                <span class="ax-btn__label">New report</span>
              </button>
            </div>
          </div>
        </div>

        <!-- ════════════════ DASHBOARD GRID ════════════════ -->
        <div class="ax-dash-grid">

          <!-- ───── OPENER (P2 · WELCOME): band (8) + revenue spotlight (4) ───── -->
          <section class="ax-card ax-welcome ax-col--8" role="region" aria-label="Welcome">
            <div class="ax-welcome__body">
              <div class="ax-welcome__text">
                <p class="ax-welcome__eyebrow">Sales overview</p>
                <h2 class="ax-welcome__title">Welcome back, Jacob</h2>
                <p class="ax-welcome__lede">Revenue closed the month 12.4% ahead of the same period last year, carried by Lighting and Desk. Two invoices are still awaiting settlement.</p>
                <div class="ax-welcome__actions">
                  <button type="button" class="ax-btn ax-btn--primary ax-btn--sm">
                    <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2"/><path d="M9 17h6"/><path d="M9 13h6"/></svg>
                    <span class="ax-btn__label">Create invoice</span>
                  </button>
                  <button type="button" class="ax-btn ax-btn--secondary ax-btn--sm">
                    <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6m-6 0h6"/><path d="M14 19v-10a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v10m-6 0h6"/><path d="M3 19h18"/></svg>
                    <span class="ax-btn__label">View pipeline</span>
                  </button>
                </div>
              </div>
              <dl class="ax-welcome__stats">
                <div class="ax-welcome__stat"><dt>Target hit</dt><dd class="ax-num">86%</dd></div>
                <div class="ax-welcome__stat"><dt>Deals won</dt><dd class="ax-num">142</dd></div>
                <div class="ax-welcome__stat"><dt>Still open</dt><dd class="ax-num">37</dd></div>
              </dl>
            </div>
          </section>

          <!-- Revenue spotlight — the one figure this page is about (W-STAT · spotlight) -->
          <section class="ax-card ax-card--gradient ax-col--4" role="region" aria-label="Total Revenue $748.2K, up 12.4% versus the previous year">
            <div class="ax-card__body" style="display:flex;flex-direction:column;justify-content:space-between;gap:var(--ax-space-4);">
              <div class="ax-spotlight">
                <span class="ax-spotlight__label">Total revenue</span>
                <span class="ax-spotlight__value">$748.2K</span>
                <span class="ax-spotlight__foot">
                  <span class="ax-spotlight__chip">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 15l6 -6l6 6"/></svg>12.4%
                  </span>
                  vs. previous year
                </span>
              </div>
              <div data-ax-chart="apex" data-ax-chart-type="area" data-ax-chart-sparkline="true" data-ax-chart-tooltip="false" data-ax-chart-height="72" data-ax-chart-color="--ax-on-accent" data-ax-chart-series='[{"name":"Revenue","data":[42,48,45,53,57,55,62,60,68,72,70,74]}]' style="min-height:72px" aria-hidden="true"></div>
            </div>
          </section>

          <!-- ───── SUPPORTING METRICS — one card, not four (W-BREAKDOWN) ───── -->
          <section class="ax-card ax-card--flat ax-col--12" role="region" aria-label="Supporting sales metrics">
            <div class="ax-card__body">
              <div class="ax-statgroup">
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/><path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Customers</span>
                    <span class="ax-statgroup__value ax-num">3,920</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--down">−3.1%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c3">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"/><path d="M12 12l8 -4.5"/><path d="M12 12l0 9"/><path d="M12 12l-8 -4.5"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Products</span>
                    <span class="ax-statgroup__value ax-num">1,204</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+2.0%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c4">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Transactions</span>
                    <span class="ax-statgroup__value ax-num">9,812</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--down">−3.2%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c5">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 6h15l-1.5 9h-13z"/><path d="M6 6l-2 -2"/><path d="M9 20a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M16 20a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Avg. order value</span>
                    <span class="ax-statgroup__value ax-num">$76.24</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+5.8%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c6">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 14l-4 -4l4 -4"/><path d="M5 10h11a4 4 0 1 1 0 8h-1"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Refund rate</span>
                    <span class="ax-statgroup__value ax-num">1.8%</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">−0.4%</span>
                </div>
              </div>
            </div>
          </section>

          <!-- ───── HERO ROW: Sales Statistics (8) + Total Balance (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Sales Statistics">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Performance</span>
                <h2 class="ax-card__title">Sales Statistics</h2>
                <p class="ax-card__subtitle">Monthly revenue vs. previous period</p>
              </div>
              <div class="ax-card__actions">
                <div class="ax-btn-group ax-btn-group--segmented" role="radiogroup" aria-label="Date range">
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">Week</button>
                  <button type="button" class="ax-btn ax-btn--sm is-selected" role="radio" aria-checked="true">Month</button>
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">Year</button>
                </div>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div class="ax-cluster" style="gap:var(--ax-space-5);margin-block-end:var(--ax-space-3);">
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-accent);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">This period</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-cyan);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Previous period</small></span>
              </div>
              <div
                data-ax-chart="apex"
                data-ax-chart-type="area"
                data-ax-chart-height="320"
                data-ax-chart-legend="none"
                data-ax-chart-accent="true"
                data-ax-chart-series='[{"name":"This period","data":[42100,48300,45200,53400,57100,55600,62400,60200,68900,72300,70100,74820]},{"name":"Previous period","data":[38400,41200,43800,47100,50600,53200,54900,58300,61400,64800,67200,69500]}]'
                aria-label="Area chart of monthly revenue versus the previous period">
              </div>
            </div>
          </section>

          <!-- Total Balance — gradient plate (W-BALANCE) -->
          <section class="ax-card ax-card--balance ax-col--4" role="region" aria-label="Total Balance">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Total Balance</h2>
              </div>
              <div class="ax-card__actions">
                <div class="ax-btn-group ax-btn-group--segmented" role="radiogroup" aria-label="Currency">
                  <button type="button" class="ax-btn ax-btn--sm is-selected" role="radio" aria-checked="true">USD</button>
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">GBP</button>
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">EUR</button>
                </div>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-5);">
              <!-- gradient plate -->
              <div style="position:relative;overflow:hidden;border-radius:var(--ax-radius-lg);padding:var(--ax-space-5);background:var(--ax-gradient-plate);box-shadow:var(--ax-shadow-md);color:#fff;min-height:172px;display:flex;flex-direction:column;">
                <span aria-hidden="true" style="position:absolute;top:-40px;right:-30px;width:140px;height:140px;border-radius:50%;background:rgba(255,255,255,.18);filter:blur(6px);"></span>
                <span aria-hidden="true" style="position:absolute;bottom:-50px;left:-20px;width:120px;height:120px;border-radius:50%;background:rgba(255,255,255,.12);"></span>
                <div class="ax-cluster" style="justify-content:space-between;position:relative;">
                  <b style="font-family:var(--ax-font-display);letter-spacing:.02em;color:inherit;">Vireo</b>
                  <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="opacity:.9;"><path d="M3 10h18"/><path d="M7 15h.01"/><path d="M11 15h2"/><path d="M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2"/></svg>
                </div>
                <div style="margin-top:auto;position:relative;">
                  <div style="font-size:var(--ax-text-xs);opacity:.85;">Available balance</div>
                  <div class="ax-num" style="font-family:var(--ax-font-display);font-size:var(--ax-text-2xl);font-weight:700;line-height:1.1;letter-spacing:-.01em;">$48,210.00</div>
                  <div class="ax-num" style="font-family:var(--ax-font-mono);font-size:var(--ax-text-sm);letter-spacing:.12em;opacity:.92;margin-top:var(--ax-space-3);">4921&nbsp;&nbsp;••••&nbsp;&nbsp;••••&nbsp;&nbsp;7045</div>
                </div>
              </div>
              <!-- send / request -->
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-3);">
                <button type="button" class="ax-btn ax-btn--solid ax-btn--block">
                  <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 14l11 -11"/><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"/></svg>
                  <span class="ax-btn__label">Send</span>
                </button>
                <button type="button" class="ax-btn ax-btn--secondary ax-btn--block">
                  <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5l0 14"/><path d="M18 13l-6 6"/><path d="M6 13l6 6"/></svg>
                  <span class="ax-btn__label">Request</span>
                </button>
              </div>
              <!-- income / profit / saved split -->
              <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--ax-space-3);text-align:center;">
                <div><small style="display:block;color:var(--ax-text-subtle);font-size:var(--ax-text-xs);margin-bottom:2px;">Income</small><b class="ax-num" style="color:var(--ax-viz-emerald);font-size:var(--ax-text-md);">+$12,480</b></div>
                <div><small style="display:block;color:var(--ax-text-subtle);font-size:var(--ax-text-xs);margin-bottom:2px;">Spend</small><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-md);">$5,210</b></div>
                <div><small style="display:block;color:var(--ax-text-subtle);font-size:var(--ax-text-xs);margin-bottom:2px;">Saved</small><b class="ax-num" style="color:var(--ax-viz-cyan);font-size:var(--ax-text-md);">$7,270</b></div>
              </div>
            </div>
          </section>

          <!-- ───── SECONDARY ROW: Device donut (4) + Top Products (4) + Traffic (4) ───── -->
          <!-- Session By Device — W-DONUT -->
          <section class="ax-card ax-col--4" role="region" aria-label="Session by device">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Session By Device</h2>
              </div>
              <button type="button" class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="Device session options">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M18 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/></svg>
              </button>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-device-donut" aria-label="Donut chart of sessions by device: desktop 58%, mobile 34%, tablet 8%"></div>
              <ul class="ax-list ax-list--compact" style="margin-top:var(--ax-space-2);">
                <li class="ax-list__row" style="border:0;padding-inline:0;">
                  <span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#38BDF8;display:inline-block;"></i></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Desktop</span></span>
                  <span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">58%</span>
                </li>
                <li class="ax-list__row" style="border:0;padding-inline:0;">
                  <span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#A78BFA;display:inline-block;"></i></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Mobile</span></span>
                  <span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">34%</span>
                </li>
                <li class="ax-list__row" style="border:0;padding-inline:0;">
                  <span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#F472B6;display:inline-block;"></i></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Tablet</span></span>
                  <span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">8%</span>
                </li>
              </ul>
            </div>
          </section>

          <!-- Top Selling Products — W-TOPLIST (ranked, each row carries its own share bar) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Top selling products">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Top Selling Products</h2>
                <p class="ax-card__subtitle">By units sold this month</p>
              </div>
              <a class="ax-btn ax-btn--link" href="#">View all</a>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <ol class="ax-ranklist">
                <li class="ax-ranklist__item">
                  <span class="ax-ranklist__rank">1</span>
                  <span class="ax-ranklist__label">Brass Task Light<span class="ax-ranklist__meta">Lighting · 412 sold</span></span>
                  <span class="ax-ranklist__value">$182</span>
                  <span class="ax-ranklist__bar"><i style="width:92%"></i></span>
                </li>
                <li class="ax-ranklist__item">
                  <span class="ax-ranklist__rank">2</span>
                  <span class="ax-ranklist__label">Aperture Desk Lamp<span class="ax-ranklist__meta">Lighting · 356 sold</span></span>
                  <span class="ax-ranklist__value">$129</span>
                  <span class="ax-ranklist__bar"><i style="width:78%"></i></span>
                </li>
                <li class="ax-ranklist__item">
                  <span class="ax-ranklist__rank">3</span>
                  <span class="ax-ranklist__label">Matte Ceramic Mug<span class="ax-ranklist__meta">Drinkware · 298 sold</span></span>
                  <span class="ax-ranklist__value">$24</span>
                  <span class="ax-ranklist__bar"><i style="width:64%"></i></span>
                </li>
                <li class="ax-ranklist__item">
                  <span class="ax-ranklist__rank">4</span>
                  <span class="ax-ranklist__label">Walnut Monitor Riser<span class="ax-ranklist__meta">Desk · 241 sold</span></span>
                  <span class="ax-ranklist__value">$96</span>
                  <span class="ax-ranklist__bar"><i style="width:52%"></i></span>
                </li>
                <li class="ax-ranklist__item">
                  <span class="ax-ranklist__rank">5</span>
                  <span class="ax-ranklist__label">Linen Cable Sleeve<span class="ax-ranklist__meta">Desk · 187 sold</span></span>
                  <span class="ax-ranklist__value">$18</span>
                  <span class="ax-ranklist__bar"><i style="width:41%"></i></span>
                </li>
              </ol>
            </div>
          </section>

          <!-- Traffic Source — bar list (W-BREAKDOWN) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Traffic source">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Traffic Source</h2>
              </div>
              <a class="ax-btn ax-btn--link" href="#">Report</a>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-4);">
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Direct</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">38%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:38%;background:var(--ax-accent);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Organic search</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">27%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:27%;background:var(--ax-viz-cyan);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Referral</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">14%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:14%;background:var(--ax-viz-violet);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Social</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">9%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:9%;background:var(--ax-viz-pink);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Email</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">7%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:7%;background:var(--ax-viz-amber);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Paid</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">5%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:5%;background:var(--ax-viz-emerald);"></div></div></div>
              </div>
            </div>
          </section>

          <!-- ───── BOTTOM ROW: Recent Transactions (8) + Recent Activity (4) ───── -->
          <!-- Recent Transactions — W-TABLE -->
          <section class="ax-card ax-col--8" role="region" aria-label="Recent transactions">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Recent Transactions</h2>
                <p class="ax-card__subtitle">Latest payments &amp; payouts</p>
              </div>
              <a class="ax-btn ax-btn--link" href="#">View all</a>
            </div>
            <div class="ax-table-wrap">
              <table class="ax-table ax-table--hover">
                <thead class="ax-table__head">
                  <tr>
                    <th class="ax-table__th" scope="col">Merchant</th>
                    <th class="ax-table__th" scope="col">Category</th>
                    <th class="ax-table__th" scope="col">Date</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Amount</th>
                    <th class="ax-table__th" scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="ax-table__row">
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#34D399 18%,transparent);color:#34D399;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"/><path d="M12 3v3m0 12v3"/></svg></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Camila Rossi</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Stripe</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Order payment</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 12</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">+$312.00</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Completed</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#A78BFA 18%,transparent);color:#A78BFA;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path d="M12 8v8"/><path d="M8 12h8"/></svg></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Linear</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Subscription</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Software</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 11</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text);">−$84.00</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Completed</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#34D399 18%,transparent);color:#34D399;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"/><path d="M12 3v3m0 12v3"/></svg></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Henry Whitlock</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Stripe</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Order payment</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 12</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">+$129.00</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Completed</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#FB7185 18%,transparent);color:#FB7185;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3"/><path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4"/><path d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0s3 -1.526 3 -2.598s-1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0s-3 1.526 -3 2.598"/><path d="M3 6v10c0 .888 .772 1.45 2 2"/><path d="M3 11c0 .888 .772 1.45 2 2"/></svg></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Payroll — June</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Gusto</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Payroll</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 10</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text);">−$18,400.00</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Completed</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#FBBF24 18%,transparent);color:#FBBF24;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5"/><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5"/></svg></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Pulse Ads</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Google Ads</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Marketing</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 12</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text);">−$640.00</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill"><span class="ax-badge__dot"></span>Pending</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#FB7185 18%,transparent);color:#FB7185;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/></svg></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Daniel Cho</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Stripe</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Order payment</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 9</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text);">+$24.00</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--danger ax-badge--pill"><span class="ax-badge__dot"></span>Failed</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <!-- Recent Activity — W-FEED (timeline) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Recent activity">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Recent Activity</h2>
              </div>
              <a class="ax-btn ax-btn--link" href="#">View all</a>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <ul class="ax-timeline">
                <li class="ax-timeline__item ax-timeline__item--success">
                  <span class="ax-timeline__marker"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></span>
                  <div class="ax-timeline__content">
                    <p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Devon Okafor</b> closed task <span style="color:var(--ax-accent);">TSK-241</span></p>
                    <span class="ax-timeline__time">8m ago</span>
                  </div>
                </li>
                <li class="ax-timeline__item">
                  <span class="ax-timeline__marker" style="color:var(--ax-viz-violet);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"/><path d="M7 9l5 -5l5 5"/><path d="M12 4l0 12"/></svg></span>
                  <div class="ax-timeline__content">
                    <p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Lena Brandt</b> uploaded empty-state illustrations</p>
                    <span class="ax-timeline__time">18m ago</span>
                  </div>
                </li>
                <li class="ax-timeline__item">
                  <span class="ax-timeline__marker" style="color:var(--ax-viz-amber);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 21l18 0"/><path d="M4 18l10 -10l3 3l-10 10l-3 0l0 -3"/></svg></span>
                  <div class="ax-timeline__content">
                    <p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Tomás Herrera</b> moved deal to <span style="color:var(--ax-text);">Negotiation</span></p>
                    <span class="ax-timeline__time">12m ago</span>
                  </div>
                </li>
                <li class="ax-timeline__item">
                  <span class="ax-timeline__marker" style="color:var(--ax-viz-cyan);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M5 21v-16a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><path d="M9 13l2 2l4 -4"/></svg></span>
                  <div class="ax-timeline__content">
                    <p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Priya Nair</b> exported the weekly report</p>
                    <span class="ax-timeline__time">1h ago</span>
                  </div>
                </li>
                <li class="ax-timeline__item">
                  <span class="ax-timeline__marker" style="color:var(--ax-viz-pink);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 14l1 0a2 2 0 0 1 2 2a1 1 0 0 0 1 1h1a2 2 0 0 0 2 -2v-1a2 2 0 0 1 2 -2h1"/><path d="M5 8a4 4 0 0 1 4 -4h6a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-6a4 4 0 0 1 -4 -4z"/></svg></span>
                  <div class="ax-timeline__content">
                    <p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Ava Sutton</b> created invoice <span style="color:var(--ax-accent);">INV-2025-0118</span></p>
                    <span class="ax-timeline__time">1d ago</span>
                  </div>
                </li>
              </ul>
            </div>
          </section>

        </div>
@endsection

@push('scripts')
  {{-- Device donut needs richer options than the data-attr auto-scanner
       (donut labels + center total); bundled page module via Vite so it
       shares the Aurora palette, dark mode & live ax:change re-theme. --}}
  @vite(['resources/js/pages/dashboards-sales.js'])
@endpush
