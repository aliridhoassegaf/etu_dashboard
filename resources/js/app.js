/*
 * Vireo — Laravel edition · JS entry (Vite input `resources/js/app.js`).
 *
 * Delegates to the SHARED Alpine runtime copied verbatim from the HTML
 * reference (`resources/js/vireo/vireo.js`). That module boots Alpine +
 * @alpinejs/collapse + @alpinejs/focus, registers the shell components
 * (axSidebar / axHeader / axDropdown / axCustomizer …), runs the core behaviour
 * modules (theme-restore, nav, topnav, command-palette), inits the ApexCharts
 * auto-scanner, and hides the loader. Nothing edition-specific is added here so
 * behaviour stays byte-for-byte identical to the reference.
 */
import './vireo/vireo.js';
