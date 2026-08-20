@extends('layouts.app')

{{-- ECharts Gallery — faithful re-expression of src/html/charts/echarts.html.
     Same DOM/classes/ARIA. The heavyweight visualizations render via the shared
     ApexCharts wrapper (bundled page module) in the same Aurora chrome. --}}

@section('content')

        <!-- ════════════════ PAGE HEAD ════════════════ -->
        <div class="ax-page-head">
          <div class="ax-page-head__row">
            <div>
              <nav class="ax-breadcrumb" data-ax-breadcrumb aria-label="Breadcrumb"></nav>
              <h1 class="ax-page-head__title">ECharts Gallery</h1>
              <p class="ax-page-head__subtitle">Gauge, graph &amp; treemap — the heavyweight visualizations, rendered in the same Aurora chrome.</p>
            </div>
            <div class="ax-page-head__actions">
              <button type="button" class="ax-btn ax-btn--secondary ax-btn--pill">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path d="M3.6 9h16.8"/><path d="M3.6 15h16.8"/><path d="M11.5 3a17 17 0 0 0 0 18"/><path d="M12.5 3a17 17 0 0 1 0 18"/></svg>
                <span class="ax-btn__label">Docs</span>
              </button>
              <button type="button" class="ax-btn ax-btn--ghost">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"/><path d="M7 11l5 5l5 -5"/><path d="M12 4l0 12"/></svg>
                <span class="ax-btn__label">Export</span>
              </button>
              <button type="button" class="ax-btn ax-btn--primary">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5l0 14"/><path d="M5 12l14 0"/></svg>
                <span class="ax-btn__label">New chart</span>
              </button>
            </div>
          </div>
        </div>

        <!-- ════════════════ CONTENT GRID ════════════════ -->
        <div class="ax-dash-grid">

          <!-- ───── ROW: Three gauges (radialBar) ───── -->
          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Server health gauge">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Gauge</span>
                <h2 class="ax-card__title">Server Health</h2>
              </div>
              <span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Healthy</span>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ec-gauge-1" aria-label="Gauge showing server health at 82 percent"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="SLA attainment gauge">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Gauge</span>
                <h2 class="ax-card__title">SLA Attainment</h2>
              </div>
              <span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill"><span class="ax-badge__dot"></span>Watch</span>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ec-gauge-2" aria-label="Gauge showing SLA attainment at 67 percent"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Multi-metric radial gauge">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Multi gauge</span>
                <h2 class="ax-card__title">Capacity</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ec-gauge-3" aria-label="Radial gauge of CPU, memory and disk capacity"></div>
            </div>
          </section>

          <!-- ───── ROW: Graph-style network (8) + funnel (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Service dependency graph">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Graph · force</span>
                <h2 class="ax-card__title">Service Dependencies</h2>
                <p class="ax-card__subtitle">Node size = traffic · edges = calls between services</p>
              </div>
              <button type="button" class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="Graph options">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M18 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/></svg>
              </button>
            </div>
            <div class="ax-card__body" style="padding-top:0;position:relative;">
              <!-- edges drawn behind the bubble nodes -->
              <svg viewBox="0 0 100 60" preserveAspectRatio="none" aria-hidden="true" style="position:absolute;inset:var(--ax-space-5) var(--ax-space-5) 0;width:calc(100% - var(--ax-space-5) * 2);height:300px;pointer-events:none;opacity:.5;">
                <line x1="50" y1="30" x2="22" y2="14" stroke="var(--ax-border-strong)" stroke-width="0.5"/>
                <line x1="50" y1="30" x2="80" y2="16" stroke="var(--ax-border-strong)" stroke-width="0.5"/>
                <line x1="50" y1="30" x2="26" y2="48" stroke="var(--ax-border-strong)" stroke-width="0.5"/>
                <line x1="50" y1="30" x2="78" y2="46" stroke="var(--ax-border-strong)" stroke-width="0.5"/>
                <line x1="22" y1="14" x2="26" y2="48" stroke="var(--ax-border-strong)" stroke-width="0.5"/>
                <line x1="80" y1="16" x2="78" y2="46" stroke="var(--ax-border-strong)" stroke-width="0.5"/>
              </svg>
              <div id="ec-graph" style="position:relative;" aria-label="Network graph of service dependencies"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Conversion funnel">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Funnel</span>
                <h2 class="ax-card__title">Signup Funnel</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-4);">
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Visited</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">12,480</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:100%;background:var(--ax-chart-1);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Signed up</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">4,310</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:69%;background:var(--ax-chart-2);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Activated</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">2,640</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:51%;background:var(--ax-chart-3);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Subscribed</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">1,180</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:34%;background:var(--ax-chart-4);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Renewed</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">820</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:23%;background:var(--ax-chart-5);"></div></div></div>
              </div>
            </div>
          </section>

          <!-- ───── ROW: Treemap (8) + heatmap (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Revenue treemap by category and product">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Treemap</span>
                <h2 class="ax-card__title">Revenue by Product</h2>
                <p class="ax-card__subtitle">Tile area = revenue share · Aperture Goods catalogue</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ec-treemap" aria-label="Treemap of revenue by product"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Activity heatmap">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Heatmap</span>
                <h2 class="ax-card__title">Active Hours</h2>
                <p class="ax-card__subtitle">Sessions by weekday × slot</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ec-heatmap" aria-label="Heatmap of active hours by weekday and time slot"></div>
            </div>
          </section>

          <!-- ───── ROW: Sunburst-style nested radial (4) + scatter (8) ───── -->
          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Nested allocation radial">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Radial</span>
                <h2 class="ax-card__title">Spend Mix</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ec-radial" aria-label="Radial bar chart of spend allocation"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Cohort scatter chart">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Scatter</span>
                <h2 class="ax-card__title">Cohort Value</h2>
                <p class="ax-card__subtitle">Tenure (weeks) × lifetime value · by segment</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ec-scatter" aria-label="Scatter chart of customer cohorts by tenure and lifetime value"></div>
            </div>
          </section>

        </div>
@endsection

@push('scripts')
  @vite(['resources/js/pages/charts-echarts.js'])
@endpush
