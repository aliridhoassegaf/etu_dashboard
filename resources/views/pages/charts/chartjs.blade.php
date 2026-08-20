@extends('layouts.app')

{{-- Chart.js Gallery — faithful re-expression of src/html/charts/chartjs.html.
     Same DOM/classes/ARIA. The chart families render via the shared ApexCharts
     wrapper (bundled page module) to prove cross-library palette parity. --}}

@section('content')

        <!-- ════════════════ PAGE HEAD ════════════════ -->
        <div class="ax-page-head">
          <div class="ax-page-head__row">
            <div>
              <nav class="ax-breadcrumb" data-ax-breadcrumb aria-label="Breadcrumb"></nav>
              <h1 class="ax-page-head__title">Chart.js Gallery</h1>
              <p class="ax-page-head__subtitle">Line, bar, radar &amp; doughnut — the same Aurora palette &amp; chrome, proving cross-library parity.</p>
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
        <div class="ax-dash-grid"
             x-data="{ tab: 'all' }">

          <!-- Filter segmented control (full width chip row) -->
          <div class="ax-col--12">
            <div class="ax-tabs ax-tabs--pill ax-tabs--scrollable" role="tablist" aria-label="Filter chart types">
              <div class="ax-tabs__list">
                <button type="button" class="ax-tabs__tab" :class="{ 'is-active': tab==='all' }" :aria-selected="tab==='all'" @click="tab='all'" role="tab">All</button>
                <button type="button" class="ax-tabs__tab" :class="{ 'is-active': tab==='cartesian' }" :aria-selected="tab==='cartesian'" @click="tab='cartesian'" role="tab">Cartesian</button>
                <button type="button" class="ax-tabs__tab" :class="{ 'is-active': tab==='radial' }" :aria-selected="tab==='radial'" @click="tab='radial'" role="tab">Radial</button>
                <button type="button" class="ax-tabs__tab" :class="{ 'is-active': tab==='mixed' }" :aria-selected="tab==='mixed'" @click="tab='mixed'" role="tab">Mixed</button>
              </div>
            </div>
          </div>

          <!-- ───── Line (8) + Doughnut (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Revenue line chart" x-show="['all','cartesian'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Line</span>
                <h2 class="ax-card__title">Revenue vs. Target</h2>
                <p class="ax-card__subtitle">Monthly · Jul 2025 – Jun 2026</p>
              </div>
              <div class="ax-card__actions">
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-accent);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Revenue</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-cyan);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Target</small></span>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-line" aria-label="Line chart of monthly revenue versus target"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Category doughnut chart" x-show="['all','radial'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Doughnut</span>
                <h2 class="ax-card__title">Category Split</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-doughnut" aria-label="Doughnut chart of revenue by product category"></div>
            </div>
          </section>

          <!-- ───── Bar (6) + Column stacked (6) ───── -->
          <section class="ax-card ax-card--chart ax-col--6" role="region" aria-label="Horizontal bar chart" x-show="['all','cartesian'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Bar</span>
                <h2 class="ax-card__title">Orders by Channel</h2>
                <p class="ax-card__subtitle">Last quarter</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-bar" aria-label="Horizontal bar chart of orders by channel"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--6" role="region" aria-label="Stacked column chart" x-show="['all','cartesian'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Stacked column</span>
                <h2 class="ax-card__title">New vs. Returning</h2>
                <p class="ax-card__subtitle">Visitors per month</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-column" aria-label="Stacked column chart of new versus returning visitors"></div>
            </div>
          </section>

          <!-- ───── Radar (4) + Polar (4) + Pie (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Radar chart" x-show="['all','radial'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Radar</span>
                <h2 class="ax-card__title">Team Skills</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-radar" aria-label="Radar chart comparing two team members across six skills"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Polar area chart" x-show="['all','radial'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Polar area</span>
                <h2 class="ax-card__title">Support Load</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-polar" aria-label="Polar area chart of support load by team"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Pie chart" x-show="['all','radial'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Pie</span>
                <h2 class="ax-card__title">Traffic Sources</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-pie" aria-label="Pie chart of traffic sources"></div>
            </div>
          </section>

          <!-- ───── Mixed (8) + scatter (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Mixed bar and line chart" x-show="['all','mixed'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Mixed</span>
                <h2 class="ax-card__title">Sessions &amp; Conversion</h2>
                <p class="ax-card__subtitle">Columns = sessions · line = conversion %</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-mixed" aria-label="Mixed chart of sessions columns and conversion-rate line"></div>
            </div>
          </section>

          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Bubble chart" x-show="['all','mixed'].includes(tab)" x-transition>
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Bubble</span>
                <h2 class="ax-card__title">Campaigns</h2>
                <p class="ax-card__subtitle">Spend × reach × ROAS</p>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="cj-bubble" aria-label="Bubble chart of campaign spend, reach and ROAS"></div>
            </div>
          </section>

        </div>
@endsection

@push('scripts')
  @vite(['resources/js/pages/charts-chartjs.js'])
@endpush
