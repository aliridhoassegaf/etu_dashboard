@extends('layouts.app')

{{-- crm dashboard — faithful re-expression of the HTML reference
     src/html/dashboards/crm.html. Same DOM/classes/ARIA; charts via the
     shared ApexCharts wrapper (page module in @push('scripts')). --}}

@section('content')
        <!-- ════════════════ PAGE HEAD ════════════════ -->
        <div class="ax-page-head">
          <div class="ax-page-head__row">
            <div>
              <nav class="ax-breadcrumb" data-ax-breadcrumb aria-label="Breadcrumb"></nav>
              <h1 class="ax-page-head__title">CRM</h1>
              <p class="ax-page-head__subtitle">Pipeline health, leads &amp; rep performance — last 30 days.</p>
            </div>
            <div class="ax-page-head__actions">
              <button type="button" class="ax-btn ax-btn--secondary ax-btn--pill">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 11h16"/><path d="M11 15h1"/><path d="M12 15v3"/></svg>
                <span class="ax-btn__label">Last 30 days</span>
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6l6 -6"/></svg>
              </button>
              <button type="button" class="ax-btn ax-btn--ghost ax-btn--icon" aria-label="Refresh dashboard">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"/><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"/></svg>
              </button>
              <button type="button" class="ax-btn ax-btn--primary">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5l0 14"/><path d="M5 12l14 0"/></svg>
                <span class="ax-btn__label">New deal</span>
              </button>
            </div>
          </div>
        </div>

        <!-- ════════════════ DASHBOARD GRID ════════════════ -->
        <div class="ax-dash-grid">

          <!-- ───── OPENER (P5 · STRIP): pipeline band (12), then an asymmetric 7+5 ─────
               The band walks the pipeline left-to-right, so the shape of the page
               matches the shape of the process. No KPI tiles on this dashboard. -->
          <section class="ax-card ax-card--filled ax-col--12" role="region" aria-label="Deal pipeline by stage">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Q2 · 312 open deals</span>
                <h2 class="ax-card__title">Pipeline</h2>
              </div>
              <div class="ax-card__actions">
                <a class="ax-btn ax-btn--link" href="#">Forecast detail</a>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div class="ax-statgroup">
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16v3l-6 6v6l-4 2v-8l-6 -6z"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Prospecting</span>
                    <span class="ax-statgroup__value ax-num">$412K</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">98</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path d="M9 12l2 2l4 -4"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Qualified</span>
                    <span class="ax-statgroup__value ax-num">$338K</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">74</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c3">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2"/><path d="M9 17h6"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Proposal</span>
                    <span class="ax-statgroup__value ax-num">$286K</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">61</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c4">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 9h8"/><path d="M8 13h6"/><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3z"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Negotiation</span>
                    <span class="ax-statgroup__value ax-num">$154K</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--down">48</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c5">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1 -10 0z"/><path d="M17 5h2a2 2 0 0 1 0 4h-.5"/><path d="M7 5h-2a2 2 0 0 0 0 4h.5"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Won this quarter</span>
                    <span class="ax-statgroup__value ax-num">$248K</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">31</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c6">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 17l6 -6l4 4l8 -8"/><path d="M14 7l7 0l0 7"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Win rate</span>
                    <span class="ax-statgroup__value ax-num">24.6%</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+1.9%</span>
                </div>
              </div>
            </div>
          </section>

          <!-- ───── HERO: Deals by Stage (7) + Lead Source (5) ───── -->
          <section class="ax-card ax-card--chart ax-col--7" role="region" aria-label="Deals pipeline by stage">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Pipeline</span>
                <h2 class="ax-card__title">Deals by Stage</h2>
                <p class="ax-card__subtitle">Deal value moving through the pipeline</p>
              </div>
              <div class="ax-card__actions">
                <div class="ax-btn-group ax-btn-group--segmented" role="radiogroup" aria-label="Team">
                  <button type="button" class="ax-btn ax-btn--sm is-selected" role="radio" aria-checked="true">All teams</button>
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">Enterprise</button>
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">SMB</button>
                </div>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div class="ax-cluster" style="gap:var(--ax-space-5);margin-block-end:var(--ax-space-3);">
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-accent);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Won</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-cyan);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Open</small></span>
              </div>
              <div id="ax-pipeline-bar" aria-label="Horizontal funnel bar of pipeline stages: lead, qualified, proposal, negotiation, won"></div>
            </div>
          </section>

          <section class="ax-card ax-col--5" role="region" aria-label="Lead source">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Lead Source</h2></div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-source-donut" aria-label="Donut chart of lead source: inbound 38%, referral 24%, outbound 20%, events 11%, partner 7%"></div>
              <ul class="ax-list ax-list--compact" style="margin-top:var(--ax-space-2);">
                <li class="ax-list__row" style="border:0;padding-inline:0;">
                  <span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-accent);display:inline-block;"></i></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Inbound</span></span>
                  <span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">38%</span>
                </li>
                <li class="ax-list__row" style="border:0;padding-inline:0;">
                  <span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-cyan);display:inline-block;"></i></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Referral</span></span>
                  <span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">24%</span>
                </li>
                <li class="ax-list__row" style="border:0;padding-inline:0;">
                  <span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-violet);display:inline-block;"></i></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Outbound</span></span>
                  <span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">20%</span>
                </li>
                <li class="ax-list__row" style="border:0;padding-inline:0;">
                  <span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-pink);display:inline-block;"></i></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Events</span></span>
                  <span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">11%</span>
                </li>
                <li class="ax-list__row" style="border:0;padding-inline:0;">
                  <span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-amber);display:inline-block;"></i></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Partner</span></span>
                  <span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">7%</span>
                </li>
              </ul>
            </div>
          </section>

          <!-- ───── NICHE: Forecast / Sales Target / Activities Due ───── -->
          <!-- Revenue Forecast (range area) -->
          <section class="ax-card ax-card--chart ax-col--4" role="region" aria-label="Revenue forecast">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Revenue Forecast</h2><p class="ax-card__subtitle">Committed vs. best-case</p></div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div class="ax-cluster" style="gap:var(--ax-space-5);margin-block-end:var(--ax-space-3);">
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-accent);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Committed</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-cyan);opacity:.5;"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Best-case range</small></span>
              </div>
              <div id="ax-forecast-range" aria-label="Range area chart of committed revenue versus best-case forecast over six months"></div>
            </div>
          </section>

          <!-- Sales Target radial -->
          <section class="ax-card ax-col--4" role="region" aria-label="Sales target attainment">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Sales Target</h2><p class="ax-card__subtitle">Q2 quota attainment</p></div>
            </div>
            <div class="ax-card__body" style="padding-top:0;text-align:center;">
              <div id="ax-target-radial" aria-label="Radial gauge showing 78 percent of quarterly quota attained"></div>
              <div class="ax-cluster" style="justify-content:center;gap:var(--ax-space-6);margin-top:var(--ax-space-3);">
                <div><small style="display:block;color:var(--ax-text-subtle);font-size:var(--ax-text-xs);">Closed</small><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-md);">$936K</b></div>
                <div><small style="display:block;color:var(--ax-text-subtle);font-size:var(--ax-text-xs);">Quota</small><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-md);">$1.20M</b></div>
                <div><small style="display:block;color:var(--ax-text-subtle);font-size:var(--ax-text-xs);">Gap</small><b class="ax-num" style="color:var(--ax-viz-amber);font-size:var(--ax-text-md);">$264K</b></div>
              </div>
            </div>
          </section>

          <!-- Activities Due (agenda mini) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Activities due">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Activities Due</h2></div>
              <a class="ax-btn ax-btn--link" href="#">Calendar</a>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <ul class="ax-list ax-list--compact">
                <li class="ax-list__row" style="padding-inline:0;">
                  <span class="ax-list__leading"><span class="ax-num" style="font-family:var(--ax-font-mono);font-size:var(--ax-text-sm);color:var(--ax-accent);">09:30</span></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Call — Northwind Ltd</span><span style="display:block;font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Discovery · Priya Nair</span></span>
                  <span class="ax-list__trailing"><span class="ax-badge ax-badge--soft ax-badge--info">Call</span></span>
                </li>
                <li class="ax-list__row" style="padding-inline:0;">
                  <span class="ax-list__leading"><span class="ax-num" style="font-family:var(--ax-font-mono);font-size:var(--ax-text-sm);color:var(--ax-accent);">11:00</span></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Demo — Vertex Group</span><span style="display:block;font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Proposal · Tomás Herrera</span></span>
                  <span class="ax-list__trailing"><span class="ax-badge ax-badge--soft ax-badge--success">Demo</span></span>
                </li>
                <li class="ax-list__row" style="padding-inline:0;">
                  <span class="ax-list__leading"><span class="ax-num" style="font-family:var(--ax-font-mono);font-size:var(--ax-text-sm);color:var(--ax-accent);">14:15</span></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Follow-up — Acme Co</span><span style="display:block;font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Negotiation · Devon Okafor</span></span>
                  <span class="ax-list__trailing"><span class="ax-badge ax-badge--soft ax-badge--warning">Email</span></span>
                </li>
                <li class="ax-list__row" style="padding-inline:0;">
                  <span class="ax-list__leading"><span class="ax-num" style="font-family:var(--ax-font-mono);font-size:var(--ax-text-sm);color:var(--ax-accent);">16:45</span></span>
                  <span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Contract — Helix Media</span><span style="display:block;font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Closing · Lena Brandt</span></span>
                  <span class="ax-list__trailing"><span class="ax-badge ax-badge--soft ax-badge--info">Sign</span></span>
                </li>
              </ul>
            </div>
          </section>

          <!-- ───── RECENT DEALS table (8) + Top Reps (4) ───── -->
          <section class="ax-card ax-col--8" role="region" aria-label="Recent deals">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Recent Deals</h2><p class="ax-card__subtitle">Latest pipeline movement</p></div>
              <a class="ax-btn ax-btn--link" href="#">All deals</a>
            </div>
            <div class="ax-table-wrap">
              <table class="ax-table ax-table--hover">
                <thead class="ax-table__head">
                  <tr>
                    <th class="ax-table__th" scope="col">Deal</th>
                    <th class="ax-table__th" scope="col">Stage</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Value</th>
                    <th class="ax-table__th" scope="col">Owner</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Close</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Platform rollout</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Vertex Group</div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Negotiation</span></td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-strong);">$184,000</td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Tomás Herrera</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jul 02</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Annual license</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Northwind Ltd</div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--info ax-badge--pill"><span class="ax-badge__dot"></span>Proposal</span></td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-strong);">$96,500</td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Priya Nair</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jul 09</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Seat expansion</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Acme Co</div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill"><span class="ax-badge__dot"></span>Qualified</span></td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-strong);">$42,800</td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Devon Okafor</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jul 18</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Enterprise tier</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Helix Media</div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Won</span></td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-strong);">$128,000</td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Lena Brandt</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 11</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Pilot program</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Lumen Labs</div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--pill"><span class="ax-badge__dot"></span>Lead</span></td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-strong);">$18,200</td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Ava Sutton</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Aug 01</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <!-- Top Reps -->
          <section class="ax-card ax-col--4" role="region" aria-label="Top sales reps">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Top Sales Reps</h2></div>
              <a class="ax-btn ax-btn--link" href="#">Leaderboard</a>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-4);">
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <span class="ax-avatar ax-avatar--sm" style="background:color-mix(in oklab,var(--ax-accent) 22%,transparent);color:var(--ax-accent);font-weight:600;">TH</span>
                <div style="flex:1 1 auto;min-width:0;"><div class="ax-text-truncate" style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Tomás Herrera</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">14 won · 31% win</div></div>
                <div style="text-align:right;"><b class="ax-num" style="color:var(--ax-text-strong);">$412K</b><span class="ax-kpi__delta ax-kpi__delta--up" style="display:flex;justify-content:flex-end;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 15l6 -6l6 6"/></svg>9%</span></div>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <span class="ax-avatar ax-avatar--sm" style="background:color-mix(in oklab,var(--ax-viz-cyan) 22%,transparent);color:var(--ax-viz-cyan);font-weight:600;">PN</span>
                <div style="flex:1 1 auto;min-width:0;"><div class="ax-text-truncate" style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Priya Nair</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">11 won · 28% win</div></div>
                <div style="text-align:right;"><b class="ax-num" style="color:var(--ax-text-strong);">$338K</b><span class="ax-kpi__delta ax-kpi__delta--up" style="display:flex;justify-content:flex-end;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 15l6 -6l6 6"/></svg>6%</span></div>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <span class="ax-avatar ax-avatar--sm" style="background:color-mix(in oklab,var(--ax-viz-violet) 22%,transparent);color:var(--ax-viz-violet);font-weight:600;">DO</span>
                <div style="flex:1 1 auto;min-width:0;"><div class="ax-text-truncate" style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Devon Okafor</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">9 won · 24% win</div></div>
                <div style="text-align:right;"><b class="ax-num" style="color:var(--ax-text-strong);">$276K</b><span class="ax-kpi__delta ax-kpi__delta--down" style="display:flex;justify-content:flex-end;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6l6 -6"/></svg>3%</span></div>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <span class="ax-avatar ax-avatar--sm" style="background:color-mix(in oklab,var(--ax-viz-amber) 22%,transparent);color:var(--ax-viz-amber);font-weight:600;">LB</span>
                <div style="flex:1 1 auto;min-width:0;"><div class="ax-text-truncate" style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Lena Brandt</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">8 won · 22% win</div></div>
                <div style="text-align:right;"><b class="ax-num" style="color:var(--ax-text-strong);">$214K</b><span class="ax-kpi__delta ax-kpi__delta--up" style="display:flex;justify-content:flex-end;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 15l6 -6l6 6"/></svg>4%</span></div>
              </div>
            </div>
          </section>

          <!-- ───── Recent Activity (12) ───── -->
          <section class="ax-card ax-col--12" role="region" aria-label="Recent activity">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Recent Activity</h2></div>
              <a class="ax-btn ax-btn--link" href="#">View all</a>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <ul class="ax-timeline">
                <li class="ax-timeline__item ax-timeline__item--success">
                  <span class="ax-timeline__marker"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></span>
                  <div class="ax-timeline__content"><p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Lena Brandt</b> closed <span style="color:var(--ax-accent);">Helix Media</span> — $128,000</p><span class="ax-timeline__time">22m ago</span></div>
                </li>
                <li class="ax-timeline__item">
                  <span class="ax-timeline__marker" style="color:var(--ax-viz-violet);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 21l18 0"/><path d="M4 18l10 -10l3 3l-10 10l-3 0l0 -3"/></svg></span>
                  <div class="ax-timeline__content"><p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Tomás Herrera</b> moved <span style="color:var(--ax-text);">Vertex Group</span> to Negotiation</p><span class="ax-timeline__time">48m ago</span></div>
                </li>
                <li class="ax-timeline__item">
                  <span class="ax-timeline__marker" style="color:var(--ax-viz-cyan);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"/><path d="M3 7l9 6l9 -6"/></svg></span>
                  <div class="ax-timeline__content"><p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Priya Nair</b> emailed proposal to <span style="color:var(--ax-text);">Northwind Ltd</span></p><span class="ax-timeline__time">1h ago</span></div>
                </li>
                <li class="ax-timeline__item">
                  <span class="ax-timeline__marker" style="color:var(--ax-viz-amber);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/><path d="M16 11h6m-3 -3v6"/></svg></span>
                  <div class="ax-timeline__content"><p class="ax-timeline__title"><b style="color:var(--ax-text-strong);">Ava Sutton</b> added 24 leads from <span style="color:var(--ax-text);">SaaStr</span> event</p><span class="ax-timeline__time">3h ago</span></div>
                </li>
              </ul>
            </div>
          </section>

        </div>
@endsection

@push('scripts')
  @vite(['resources/js/pages/dashboards-crm.js'])
@endpush
