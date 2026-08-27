<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminActivityController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleSupplierController;
use App\Http\Controllers\VehicleBrandController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\CompanyPoolController;

/*
|--------------------------------------------------------------------------
| Vireo routes (Phase B — all pages wired)
|--------------------------------------------------------------------------
| One server route per page. "/" = Sales dashboard (reference index).
| Each view receives title (<title>) + route (nav-manifest slug for the
| active-trail + breadcrumb). See CONVENTIONS.md.
*/

Route::get('/', [AdminController::class, 'login'])
    ->name('admin.login');
Route::post('/admin-login', [AdminController::class, 'loginProcess'])
    ->name('admin.login.process');

Route::get('/admin', [AdminController::class, 'read'])
    ->name('admin.read');
Route::get('/admin/{id}', [AdminController::class, 'view'])
    ->name('admin.view');
Route::get('/admin-profile', [AdminController::class, 'profile'])
    ->name('admin.profile');

Route::get('/admin-role', [AdminRoleController::class, 'read'])
    ->name('admin_role.read');
Route::get('/admin-role/{id}', [AdminRoleController::class, 'view'])
    ->name('admin_role.view');

Route::get('/admin-activity', [AdminActivityController::class, 'read'])
    ->name('admin_activity.read');
Route::get('/admin-activity/{id}', [AdminActivityController::class, 'view'])
    ->name('admin_activity.view');

Route::get('/user', [UserController::class, 'read'])
    ->name('user.read');
Route::get('/user/{id}', [UserController::class, 'view'])
    ->name('user.view');

Route::get('/vehicle', [VehicleController::class, 'read'])
    ->name('vehicle.read');
Route::get('/vehicle/{id}', [VehicleController::class, 'view'])
    ->name('vehicle.view');

Route::get('/vehicle-supplier', [VehicleSupplierController::class, 'read'])
    ->name('vehicle_supplier.read');
Route::get('/vehicle-supplier/{id}', [VehicleSupplierController::class, 'view'])
    ->name('vehicle_supplier.view');
    
Route::get('/vehicle-brand', [VehicleBrandController::class, 'read'])
    ->name('vehicle_brand.read');
Route::get('/vehicle-brand/{id}', [VehicleBrandController::class, 'view'])
    ->name('vehicle_brand.view');

Route::get('/vehicle-model', [VehicleModelController::class, 'read'])
    ->name('vehicle_model.read');
Route::get('/vehicle-model/{id}', [VehicleModelController::class, 'view'])
    ->name('vehicle_model.view');

Route::get('/company-pool', [CompanyPoolController::class, 'read'])
    ->name('company_pool.read');
Route::get('/company-pool/{id}', [CompanyPoolController::class, 'view'])
    ->name('company_pool.view');

// Default route — Sales dashboard (index)
// Route::get('/', fn () => view('pages.dashboards.sales', [
//     'title' => 'Sales',
//     'route' => 'dashboards/sales',
// ]))->name('dashboards.sales');

Route::get('/apps/calendar', fn () => view('pages.apps.calendar', ['title' => 'Calendar', 'route' => 'apps/calendar']))->name('apps.calendar');
Route::get('/apps/chat', fn () => view('pages.apps.chat', ['title' => 'Chat', 'route' => 'apps/chat']))->name('apps.chat');
Route::get('/apps/contacts', fn () => view('pages.apps.contacts', ['title' => 'Contacts', 'route' => 'apps/contacts']))->name('apps.contacts');
Route::get('/apps/email', fn () => view('pages.apps.email', ['title' => 'Email', 'route' => 'apps/email']))->name('apps.email');
Route::get('/apps/email-compose', fn () => view('pages.apps.email-compose', ['title' => 'Email — Compose', 'route' => 'apps/email-compose']))->name('apps.email-compose');
Route::get('/apps/email-settings', fn () => view('pages.apps.email-settings', ['title' => 'Email — Settings', 'route' => 'apps/email-settings']))->name('apps.email-settings');
Route::get('/apps/file-manager', fn () => view('pages.apps.file-manager', ['title' => 'File Manager', 'route' => 'apps/file-manager']))->name('apps.file-manager');
Route::get('/apps/gallery', fn () => view('pages.apps.gallery', ['title' => 'Gallery', 'route' => 'apps/gallery']))->name('apps.gallery');
Route::get('/apps/kanban', fn () => view('pages.apps.kanban', ['title' => 'Kanban Board', 'route' => 'apps/kanban']))->name('apps.kanban');
Route::get('/apps/media-player', fn () => view('pages.apps.media-player', ['title' => 'Media Player', 'route' => 'apps/media-player']))->name('apps.media-player');
Route::get('/apps/notes', fn () => view('pages.apps.notes', ['title' => 'Notes', 'route' => 'apps/notes']))->name('apps.notes');
Route::get('/apps/tasks', fn () => view('pages.apps.tasks', ['title' => 'Task List View', 'route' => 'apps/tasks']))->name('apps.tasks');
Route::get('/apps/todo', fn () => view('pages.apps.todo', ['title' => 'To-Do', 'route' => 'apps/todo']))->name('apps.todo');
Route::get('/auth/coming-soon', fn () => view('pages.auth.coming-soon', ['title' => 'Coming Soon', 'route' => 'auth/coming-soon']))->name('auth.coming-soon');
Route::get('/auth/create-password-basic', fn () => view('pages.auth.create-password-basic', ['title' => 'Create Password — Basic', 'route' => 'auth/create-password-basic']))->name('auth.create-password-basic');
Route::get('/auth/create-password-cover', fn () => view('pages.auth.create-password-cover', ['title' => 'Create Password — Cover', 'route' => 'auth/create-password-cover']))->name('auth.create-password-cover');
Route::get('/auth/lock-screen-basic', fn () => view('pages.auth.lock-screen-basic', ['title' => 'Lock Screen — Basic', 'route' => 'auth/lock-screen-basic']))->name('auth.lock-screen-basic');
Route::get('/auth/lock-screen-cover', fn () => view('pages.auth.lock-screen-cover', ['title' => 'Lock Screen — Cover', 'route' => 'auth/lock-screen-cover']))->name('auth.lock-screen-cover');
Route::get('/auth/maintenance', fn () => view('pages.auth.maintenance', ['title' => 'Under Maintenance', 'route' => 'auth/maintenance']))->name('auth.maintenance');
Route::get('/auth/reset-password-basic', fn () => view('pages.auth.reset-password-basic', ['title' => 'Reset Password — Basic', 'route' => 'auth/reset-password-basic']))->name('auth.reset-password-basic');
Route::get('/auth/reset-password-cover', fn () => view('pages.auth.reset-password-cover', ['title' => 'Reset Password — Cover', 'route' => 'auth/reset-password-cover']))->name('auth.reset-password-cover');
Route::get('/auth/sign-in-basic', fn () => view('pages.auth.sign-in-basic', ['title' => 'Sign In — Basic', 'route' => 'auth/sign-in-basic']))->name('auth.sign-in-basic');
Route::get('/auth/sign-in-cover', fn () => view('pages.auth.sign-in-cover', ['title' => 'Sign In — Cover', 'route' => 'auth/sign-in-cover']))->name('auth.sign-in-cover');
Route::get('/auth/sign-up-basic', fn () => view('pages.auth.sign-up-basic', ['title' => 'Sign Up — Basic', 'route' => 'auth/sign-up-basic']))->name('auth.sign-up-basic');
Route::get('/auth/sign-up-cover', fn () => view('pages.auth.sign-up-cover', ['title' => 'Sign Up — Cover', 'route' => 'auth/sign-up-cover']))->name('auth.sign-up-cover');
Route::get('/auth/two-step-basic', fn () => view('pages.auth.two-step-basic', ['title' => 'Two-Step Verification — Basic', 'route' => 'auth/two-step-basic']))->name('auth.two-step-basic');
Route::get('/auth/two-step-cover', fn () => view('pages.auth.two-step-cover', ['title' => 'Two-Step Verification — Cover', 'route' => 'auth/two-step-cover']))->name('auth.two-step-cover');
Route::get('/blog/blog-details', fn () => view('pages.blog.blog-details', ['title' => 'Blog Details', 'route' => 'blog/blog-details']))->name('blog.blog-details');
Route::get('/blog/create', fn () => view('pages.blog.create', ['title' => 'Create Blog', 'route' => 'blog/create']))->name('blog.create');
Route::get('/blog/list', fn () => view('pages.blog.list', ['title' => 'Blog List', 'route' => 'blog/list']))->name('blog.list');
Route::get('/charts/apex-area', fn () => view('pages.charts.apex-area', ['title' => 'ApexCharts — Area', 'route' => 'charts/apex-area']))->name('charts.apex-area');
Route::get('/charts/apex-bar', fn () => view('pages.charts.apex-bar', ['title' => 'ApexCharts — Bar & Column', 'route' => 'charts/apex-bar']))->name('charts.apex-bar');
Route::get('/charts/apex-financial', fn () => view('pages.charts.apex-financial', ['title' => 'ApexCharts — Financial', 'route' => 'charts/apex-financial']))->name('charts.apex-financial');
Route::get('/charts/apex-line', fn () => view('pages.charts.apex-line', ['title' => 'ApexCharts — Line', 'route' => 'charts/apex-line']))->name('charts.apex-line');
Route::get('/charts/apex-mixed', fn () => view('pages.charts.apex-mixed', ['title' => 'ApexCharts — Mixed & Advanced', 'route' => 'charts/apex-mixed']))->name('charts.apex-mixed');
Route::get('/charts/apex-pie', fn () => view('pages.charts.apex-pie', ['title' => 'ApexCharts — Pie & Donut', 'route' => 'charts/apex-pie']))->name('charts.apex-pie');
Route::get('/charts/chartjs', fn () => view('pages.charts.chartjs', ['title' => 'Chart.js', 'route' => 'charts/chartjs']))->name('charts.chartjs');
Route::get('/charts/echarts', fn () => view('pages.charts.echarts', ['title' => 'ECharts', 'route' => 'charts/echarts']))->name('charts.echarts');
Route::get('/charts/sparklines', fn () => view('pages.charts.sparklines', ['title' => 'Sparklines & KPI Charts', 'route' => 'charts/sparklines']))->name('charts.sparklines');
Route::get('/crm/companies', fn () => view('pages.crm.companies', ['title' => 'Companies', 'route' => 'crm/companies']))->name('crm.companies');
Route::get('/crm/contacts', fn () => view('pages.crm.contacts', ['title' => 'Contacts', 'route' => 'crm/contacts']))->name('crm.contacts');
Route::get('/crm/deals', fn () => view('pages.crm.deals', ['title' => 'Deals', 'route' => 'crm/deals']))->name('crm.deals');
Route::get('/crm/leads', fn () => view('pages.crm.leads', ['title' => 'Leads', 'route' => 'crm/leads']))->name('crm.leads');
Route::get('/crypto/buy-sell', fn () => view('pages.crypto.buy-sell', ['title' => 'Buy & Sell', 'route' => 'crypto/buy-sell']))->name('crypto.buy-sell');
Route::get('/crypto/exchange', fn () => view('pages.crypto.exchange', ['title' => 'Currency Exchange', 'route' => 'crypto/exchange']))->name('crypto.exchange');
Route::get('/crypto/marketcap', fn () => view('pages.crypto.marketcap', ['title' => 'Marketcap', 'route' => 'crypto/marketcap']))->name('crypto.marketcap');
Route::get('/crypto/transactions', fn () => view('pages.crypto.transactions', ['title' => 'Transactions', 'route' => 'crypto/transactions']))->name('crypto.transactions');
Route::get('/crypto/wallet', fn () => view('pages.crypto.wallet', ['title' => 'Wallet', 'route' => 'crypto/wallet']))->name('crypto.wallet');
Route::get('/dashboards/analytics', fn () => view('pages.dashboards.analytics', ['title' => 'Analytics', 'route' => 'dashboards/analytics']))->name('dashboards.analytics');
Route::get('/dashboards/crm', fn () => view('pages.dashboards.crm', ['title' => 'CRM', 'route' => 'dashboards/crm']))->name('dashboards.crm');
Route::get('/dashboards/crypto', fn () => view('pages.dashboards.crypto', ['title' => 'Crypto', 'route' => 'dashboards/crypto']))->name('dashboards.crypto');
Route::get('/dashboards/ecommerce', fn () => view('pages.dashboards.ecommerce', ['title' => 'eCommerce', 'route' => 'dashboards/ecommerce']))->name('dashboards.ecommerce');
Route::get('/dashboards/finance', fn () => view('pages.dashboards.finance', ['title' => 'Finance & Banking', 'route' => 'dashboards/finance']))->name('dashboards.finance');
Route::get('/dashboards/healthcare', fn () => view('pages.dashboards.healthcare', ['title' => 'Healthcare', 'route' => 'dashboards/healthcare']))->name('dashboards.healthcare');
Route::get('/dashboards/hr', fn () => view('pages.dashboards.hr', ['title' => 'HR & Payroll', 'route' => 'dashboards/hr']))->name('dashboards.hr');
Route::get('/dashboards/jobs', fn () => view('pages.dashboards.jobs', ['title' => 'Jobs & Recruitment', 'route' => 'dashboards/jobs']))->name('dashboards.jobs');
Route::get('/dashboards/lms', fn () => view('pages.dashboards.lms', ['title' => 'LMS / Courses', 'route' => 'dashboards/lms']))->name('dashboards.lms');
Route::get('/dashboards/nft', fn () => view('pages.dashboards.nft', ['title' => 'NFT Marketplace', 'route' => 'dashboards/nft']))->name('dashboards.nft');
Route::get('/dashboards/podcast', fn () => view('pages.dashboards.podcast', ['title' => 'Podcast & Media', 'route' => 'dashboards/podcast']))->name('dashboards.podcast');
Route::get('/dashboards/pos', fn () => view('pages.dashboards.pos', ['title' => 'POS & Retail', 'route' => 'dashboards/pos']))->name('dashboards.pos');
Route::get('/dashboards/projects', fn () => view('pages.dashboards.projects', ['title' => 'Projects', 'route' => 'dashboards/projects']))->name('dashboards.projects');
Route::get('/dashboards/sales', fn () => view('pages.dashboards.sales', ['title' => 'Sales', 'route' => 'dashboards/sales']))->name('dashboards.sales.alias'); // alias → existing Sales view
Route::get('/dashboards/school', fn () => view('pages.dashboards.school', ['title' => 'School', 'route' => 'dashboards/school']))->name('dashboards.school');
Route::get('/dashboards/social', fn () => view('pages.dashboards.social', ['title' => 'Social Media', 'route' => 'dashboards/social']))->name('dashboards.social');
Route::get('/dashboards/stocks', fn () => view('pages.dashboards.stocks', ['title' => 'Stocks & Trading', 'route' => 'dashboards/stocks']))->name('dashboards.stocks');
Route::get('/docs/index', fn () => view('pages.docs.index', ['title' => 'Documentation', 'route' => 'docs/index']))->name('docs.index');
Route::get('/ecommerce/add-product', fn () => view('pages.ecommerce.add-product', ['title' => 'Add Product', 'route' => 'ecommerce/add-product']))->name('ecommerce.add-product');
Route::get('/ecommerce/cart', fn () => view('pages.ecommerce.cart', ['title' => 'Cart', 'route' => 'ecommerce/cart']))->name('ecommerce.cart');
Route::get('/ecommerce/checkout', fn () => view('pages.ecommerce.checkout', ['title' => 'Checkout', 'route' => 'ecommerce/checkout']))->name('ecommerce.checkout');
Route::get('/ecommerce/create-invoice', fn () => view('pages.ecommerce.create-invoice', ['title' => 'Create Invoice', 'route' => 'ecommerce/create-invoice']))->name('ecommerce.create-invoice');
Route::get('/ecommerce/customer-details', fn () => view('pages.ecommerce.customer-details', ['title' => 'Customer Details', 'route' => 'ecommerce/customer-details']))->name('ecommerce.customer-details');
Route::get('/ecommerce/customers', fn () => view('pages.ecommerce.customers', ['title' => 'Customers', 'route' => 'ecommerce/customers']))->name('ecommerce.customers');
Route::get('/ecommerce/edit-product', fn () => view('pages.ecommerce.edit-product', ['title' => 'Edit Product', 'route' => 'ecommerce/edit-product']))->name('ecommerce.edit-product');
Route::get('/ecommerce/invoice-details', fn () => view('pages.ecommerce.invoice-details', ['title' => 'Invoice Details', 'route' => 'ecommerce/invoice-details']))->name('ecommerce.invoice-details');
Route::get('/ecommerce/invoices', fn () => view('pages.ecommerce.invoices', ['title' => 'Invoices', 'route' => 'ecommerce/invoices']))->name('ecommerce.invoices');
Route::get('/ecommerce/order-details', fn () => view('pages.ecommerce.order-details', ['title' => 'Order Details', 'route' => 'ecommerce/order-details']))->name('ecommerce.order-details');
Route::get('/ecommerce/order-success', fn () => view('pages.ecommerce.order-success', ['title' => 'Order Success', 'route' => 'ecommerce/order-success']))->name('ecommerce.order-success');
Route::get('/ecommerce/orders', fn () => view('pages.ecommerce.orders', ['title' => 'Orders', 'route' => 'ecommerce/orders']))->name('ecommerce.orders');
Route::get('/ecommerce/product-details', fn () => view('pages.ecommerce.product-details', ['title' => 'Product Details', 'route' => 'ecommerce/product-details']))->name('ecommerce.product-details');
Route::get('/ecommerce/products', fn () => view('pages.ecommerce.products', ['title' => 'Products', 'route' => 'ecommerce/products']))->name('ecommerce.products');
Route::get('/ecommerce/sellers', fn () => view('pages.ecommerce.sellers', ['title' => 'Sellers / Vendors', 'route' => 'ecommerce/sellers']))->name('ecommerce.sellers');
Route::get('/error/401', fn () => view('pages.error.401', ['title' => '401 Unauthorized', 'route' => 'error/401']))->name('error.401');
Route::get('/error/403', fn () => view('pages.error.403', ['title' => '403 Forbidden', 'route' => 'error/403']))->name('error.403');
Route::get('/error/404', fn () => view('pages.error.404', ['title' => '404 Not Found', 'route' => 'error/404']))->name('error.404');
Route::get('/error/500', fn () => view('pages.error.500', ['title' => '500 Server Error', 'route' => 'error/500']))->name('error.500');
Route::get('/error/503', fn () => view('pages.error.503', ['title' => '503 Service Unavailable', 'route' => 'error/503']))->name('error.503');
Route::get('/forms/advanced', fn () => view('pages.forms.advanced', ['title' => 'Form Advanced', 'route' => 'forms/advanced']))->name('forms.advanced');
Route::get('/forms/editor', fn () => view('pages.forms.editor', ['title' => 'Editor', 'route' => 'forms/editor']))->name('forms.editor');
Route::get('/forms/elements', fn () => view('pages.forms.elements', ['title' => 'Form Elements', 'route' => 'forms/elements']))->name('forms.elements');
Route::get('/forms/file-upload', fn () => view('pages.forms.file-upload', ['title' => 'File Uploads', 'route' => 'forms/file-upload']))->name('forms.file-upload');
Route::get('/forms/floating-labels', fn () => view('pages.forms.floating-labels', ['title' => 'Floating Labels', 'route' => 'forms/floating-labels']))->name('forms.floating-labels');
Route::get('/forms/input-masks', fn () => view('pages.forms.input-masks', ['title' => 'Input Masks', 'route' => 'forms/input-masks']))->name('forms.input-masks');
Route::get('/forms/layouts', fn () => view('pages.forms.layouts', ['title' => 'Form Layouts', 'route' => 'forms/layouts']))->name('forms.layouts');
Route::get('/forms/pickers', fn () => view('pages.forms.pickers', ['title' => 'Date & Time Pickers', 'route' => 'forms/pickers']))->name('forms.pickers');
Route::get('/forms/select', fn () => view('pages.forms.select', ['title' => 'Form Select', 'route' => 'forms/select']))->name('forms.select');
Route::get('/forms/validation', fn () => view('pages.forms.validation', ['title' => 'Form Validation', 'route' => 'forms/validation']))->name('forms.validation');
Route::get('/forms/wizard', fn () => view('pages.forms.wizard', ['title' => 'Form Wizard', 'route' => 'forms/wizard']))->name('forms.wizard');
Route::get('/icons/brands', fn () => view('pages.icons.brands', ['title' => 'Brand / Social Icons', 'route' => 'icons/brands']))->name('icons.brands');
Route::get('/icons/line', fn () => view('pages.icons.line', ['title' => 'Line / Feather Icons', 'route' => 'icons/line']))->name('icons.line');
Route::get('/icons/solid', fn () => view('pages.icons.solid', ['title' => 'Solid Icons', 'route' => 'icons/solid']))->name('icons.solid');
Route::get('/icons/tabler', fn () => view('pages.icons.tabler', ['title' => 'Tabler Icons', 'route' => 'icons/tabler']))->name('icons.tabler');
Route::get('/jobs/candidate-details', fn () => view('pages.jobs.candidate-details', ['title' => 'Candidate Details', 'route' => 'jobs/candidate-details']))->name('jobs.candidate-details');
Route::get('/jobs/job-details', fn () => view('pages.jobs.job-details', ['title' => 'Job Details', 'route' => 'jobs/job-details']))->name('jobs.job-details');
Route::get('/jobs/job-post', fn () => view('pages.jobs.job-post', ['title' => 'Job Post', 'route' => 'jobs/job-post']))->name('jobs.job-post');
Route::get('/jobs/list', fn () => view('pages.jobs.list', ['title' => 'Jobs List', 'route' => 'jobs/list']))->name('jobs.list');
Route::get('/jobs/search-candidate', fn () => view('pages.jobs.search-candidate', ['title' => 'Search Candidate', 'route' => 'jobs/search-candidate']))->name('jobs.search-candidate');
Route::get('/jobs/search-company', fn () => view('pages.jobs.search-company', ['title' => 'Search Company', 'route' => 'jobs/search-company']))->name('jobs.search-company');
Route::get('/jobs/search-jobs', fn () => view('pages.jobs.search-jobs', ['title' => 'Search Jobs', 'route' => 'jobs/search-jobs']))->name('jobs.search-jobs');
Route::get('/maps/google', fn () => view('pages.maps.google', ['title' => 'Google Maps', 'route' => 'maps/google']))->name('maps.google');
Route::get('/maps/leaflet', fn () => view('pages.maps.leaflet', ['title' => 'Leaflet Maps', 'route' => 'maps/leaflet']))->name('maps.leaflet');
Route::get('/nft/create-nft', fn () => view('pages.nft.create-nft', ['title' => 'Create NFT', 'route' => 'nft/create-nft']))->name('nft.create-nft');
Route::get('/nft/live-auction', fn () => view('pages.nft.live-auction', ['title' => 'Live Auction', 'route' => 'nft/live-auction']))->name('nft.live-auction');
Route::get('/nft/marketplace', fn () => view('pages.nft.marketplace', ['title' => 'Marketplace', 'route' => 'nft/marketplace']))->name('nft.marketplace');
Route::get('/nft/nft-details', fn () => view('pages.nft.nft-details', ['title' => 'NFT Details', 'route' => 'nft/nft-details']))->name('nft.nft-details');
Route::get('/nft/wallet', fn () => view('pages.nft.wallet', ['title' => 'Wallet Integration', 'route' => 'nft/wallet']))->name('nft.wallet');
Route::get('/pages/activity-log', fn () => view('pages.pages.activity-log', ['title' => 'Activity Log', 'route' => 'pages/activity-log']))->name('pages.activity-log');
Route::get('/pages/billing', fn () => view('pages.pages.billing', ['title' => 'Account / Billing', 'route' => 'pages/billing']))->name('pages.billing');
Route::get('/pages/coming-soon', fn () => view('pages.pages.coming-soon', ['title' => 'Coming Soon', 'route' => 'pages/coming-soon']))->name('pages.coming-soon');
Route::get('/pages/events', fn () => view('pages.pages.events', ['title' => 'Events', 'route' => 'pages/events']))->name('pages.events');
Route::get('/pages/faq', fn () => view('pages.pages.faq', ['title' => 'FAQ', 'route' => 'pages/faq']))->name('pages.faq');
Route::get('/pages/landing', fn () => view('pages.pages.landing', ['title' => 'Landing Page', 'route' => 'pages/landing']))->name('pages.landing');
Route::get('/pages/logout', fn () => view('pages.pages.logout', ['title' => 'Logout', 'route' => 'pages/logout']))->name('pages.logout');
Route::get('/pages/nested-menu', fn () => view('pages.pages.nested-menu', ['title' => 'Nested Menu', 'route' => 'pages/nested-menu']))->name('pages.nested-menu');
Route::get('/pages/notifications', fn () => view('pages.pages.notifications', ['title' => 'Notifications', 'route' => 'pages/notifications']))->name('pages.notifications');
Route::get('/pages/pricing', fn () => view('pages.pages.pricing', ['title' => 'Pricing', 'route' => 'pages/pricing']))->name('pages.pricing');
Route::get('/pages/privacy', fn () => view('pages.pages.privacy', ['title' => 'Privacy Policy', 'route' => 'pages/privacy']))->name('pages.privacy');
Route::get('/pages/profile', fn () => view('pages.pages.profile', ['title' => 'Profile', 'route' => 'pages/profile']))->name('pages.profile');
Route::get('/pages/profile-settings', fn () => view('pages.pages.profile-settings', ['title' => 'Profile Settings', 'route' => 'pages/profile-settings']))->name('pages.profile-settings');
Route::get('/pages/search-results', fn () => view('pages.pages.search-results', ['title' => 'Search Results', 'route' => 'pages/search-results']))->name('pages.search-results');
Route::get('/pages/starter', fn () => view('pages.pages.starter', ['title' => 'Empty (Starter) Page', 'route' => 'pages/starter']))->name('pages.starter');
Route::get('/pages/support', fn () => view('pages.pages.support', ['title' => 'Support / Help Center', 'route' => 'pages/support']))->name('pages.support');
Route::get('/pages/sweet-alerts', fn () => view('pages.pages.sweet-alerts', ['title' => 'Sweet Alerts', 'route' => 'pages/sweet-alerts']))->name('pages.sweet-alerts');
Route::get('/pages/team', fn () => view('pages.pages.team', ['title' => 'Team', 'route' => 'pages/team']))->name('pages.team');
Route::get('/pages/terms', fn () => view('pages.pages.terms', ['title' => 'Terms & Conditions', 'route' => 'pages/terms']))->name('pages.terms');
Route::get('/pages/testimonials', fn () => view('pages.pages.testimonials', ['title' => 'Testimonials', 'route' => 'pages/testimonials']))->name('pages.testimonials');
Route::get('/pages/timeline', fn () => view('pages.pages.timeline', ['title' => 'Timeline', 'route' => 'pages/timeline']))->name('pages.timeline');
Route::get('/pages/tour', fn () => view('pages.pages.tour', ['title' => 'Tour / Onboarding', 'route' => 'pages/tour']))->name('pages.tour');
Route::get('/projects/create', fn () => view('pages.projects.create', ['title' => 'Create Project', 'route' => 'projects/create']))->name('projects.create');
Route::get('/projects/list', fn () => view('pages.projects.list', ['title' => 'Projects List', 'route' => 'projects/list']))->name('projects.list');
Route::get('/projects/overview', fn () => view('pages.projects.overview', ['title' => 'Project Overview', 'route' => 'projects/overview']))->name('projects.overview');
Route::get('/tables/basic', fn () => view('pages.tables.basic', ['title' => 'Basic Tables', 'route' => 'tables/basic']))->name('tables.basic');
Route::get('/tables/data-tables', fn () => view('pages.tables.data-tables', ['title' => 'Data Tables', 'route' => 'tables/data-tables']))->name('tables.data-tables');
Route::get('/tables/editable', fn () => view('pages.tables.editable', ['title' => 'Editable Tables', 'route' => 'tables/editable']))->name('tables.editable');
Route::get('/tables/gridjs', fn () => view('pages.tables.gridjs', ['title' => 'Grid.js Tables', 'route' => 'tables/gridjs']))->name('tables.gridjs');
Route::get('/ui/accordions', fn () => view('pages.ui.accordions', ['title' => 'Accordions & Collapse', 'route' => 'ui/accordions']))->name('ui.accordions');
Route::get('/ui/alerts', fn () => view('pages.ui.alerts', ['title' => 'Alerts', 'route' => 'ui/alerts']))->name('ui.alerts');
Route::get('/ui/avatars', fn () => view('pages.ui.avatars', ['title' => 'Avatars', 'route' => 'ui/avatars']))->name('ui.avatars');
Route::get('/ui/badges', fn () => view('pages.ui.badges', ['title' => 'Badges', 'route' => 'ui/badges']))->name('ui.badges');
Route::get('/ui/breadcrumb', fn () => view('pages.ui.breadcrumb', ['title' => 'Breadcrumb', 'route' => 'ui/breadcrumb']))->name('ui.breadcrumb');
Route::get('/ui/button-group', fn () => view('pages.ui.button-group', ['title' => 'Button Group', 'route' => 'ui/button-group']))->name('ui.button-group');
Route::get('/ui/buttons', fn () => view('pages.ui.buttons', ['title' => 'Buttons', 'route' => 'ui/buttons']))->name('ui.buttons');
Route::get('/ui/cards', fn () => view('pages.ui.cards', ['title' => 'Cards', 'route' => 'ui/cards']))->name('ui.cards');
Route::get('/ui/carousel', fn () => view('pages.ui.carousel', ['title' => 'Carousel', 'route' => 'ui/carousel']))->name('ui.carousel');
Route::get('/ui/draggable-cards', fn () => view('pages.ui.draggable-cards', ['title' => 'Draggable Cards', 'route' => 'ui/draggable-cards']))->name('ui.draggable-cards');
Route::get('/ui/dropdowns', fn () => view('pages.ui.dropdowns', ['title' => 'Dropdowns', 'route' => 'ui/dropdowns']))->name('ui.dropdowns');
Route::get('/ui/images', fn () => view('pages.ui.images', ['title' => 'Images & Figures', 'route' => 'ui/images']))->name('ui.images');
Route::get('/ui/links', fn () => view('pages.ui.links', ['title' => 'Links & Interactions', 'route' => 'ui/links']))->name('ui.links');
Route::get('/ui/list-group', fn () => view('pages.ui.list-group', ['title' => 'List Group', 'route' => 'ui/list-group']))->name('ui.list-group');
Route::get('/ui/modals', fn () => view('pages.ui.modals', ['title' => 'Modals', 'route' => 'ui/modals']))->name('ui.modals');
Route::get('/ui/navbar', fn () => view('pages.ui.navbar', ['title' => 'Navbar', 'route' => 'ui/navbar']))->name('ui.navbar');
Route::get('/ui/notifications', fn () => view('pages.ui.notifications', ['title' => 'Notifications', 'route' => 'ui/notifications']))->name('ui.notifications');
Route::get('/ui/offcanvas', fn () => view('pages.ui.offcanvas', ['title' => 'Offcanvas', 'route' => 'ui/offcanvas']))->name('ui.offcanvas');
Route::get('/ui/pagination', fn () => view('pages.ui.pagination', ['title' => 'Pagination', 'route' => 'ui/pagination']))->name('ui.pagination');
Route::get('/ui/popovers', fn () => view('pages.ui.popovers', ['title' => 'Popovers', 'route' => 'ui/popovers']))->name('ui.popovers');
Route::get('/ui/progress', fn () => view('pages.ui.progress', ['title' => 'Progress', 'route' => 'ui/progress']))->name('ui.progress');
Route::get('/ui/ratings', fn () => view('pages.ui.ratings', ['title' => 'Ratings', 'route' => 'ui/ratings']))->name('ui.ratings');
Route::get('/ui/ribbons', fn () => view('pages.ui.ribbons', ['title' => 'Ribbons', 'route' => 'ui/ribbons']))->name('ui.ribbons');
Route::get('/ui/scrollspy', fn () => view('pages.ui.scrollspy', ['title' => 'Scrollspy', 'route' => 'ui/scrollspy']))->name('ui.scrollspy');
Route::get('/ui/skeletons', fn () => view('pages.ui.skeletons', ['title' => 'Placeholders / Skeletons', 'route' => 'ui/skeletons']))->name('ui.skeletons');
Route::get('/ui/sortable', fn () => view('pages.ui.sortable', ['title' => 'Sortable Lists', 'route' => 'ui/sortable']))->name('ui.sortable');
Route::get('/ui/spinners', fn () => view('pages.ui.spinners', ['title' => 'Spinners / Loaders', 'route' => 'ui/spinners']))->name('ui.spinners');
Route::get('/ui/swiper', fn () => view('pages.ui.swiper', ['title' => 'Swiper / Sliders', 'route' => 'ui/swiper']))->name('ui.swiper');
Route::get('/ui/tabs', fn () => view('pages.ui.tabs', ['title' => 'Navs & Tabs', 'route' => 'ui/tabs']))->name('ui.tabs');
Route::get('/ui/toasts', fn () => view('pages.ui.toasts', ['title' => 'Toasts', 'route' => 'ui/toasts']))->name('ui.toasts');
Route::get('/ui/tooltips', fn () => view('pages.ui.tooltips', ['title' => 'Tooltips', 'route' => 'ui/tooltips']))->name('ui.tooltips');
Route::get('/ui/tour', fn () => view('pages.ui.tour', ['title' => 'Tour', 'route' => 'ui/tour']))->name('ui.tour');
Route::get('/ui/typography', fn () => view('pages.ui.typography', ['title' => 'Typography', 'route' => 'ui/typography']))->name('ui.typography');
Route::get('/utilities/borders', fn () => view('pages.utilities.borders', ['title' => 'Borders & Radius', 'route' => 'utilities/borders']))->name('utilities.borders');
Route::get('/utilities/breakpoints', fn () => view('pages.utilities.breakpoints', ['title' => 'Breakpoints', 'route' => 'utilities/breakpoints']))->name('utilities.breakpoints');
Route::get('/utilities/colors', fn () => view('pages.utilities.colors', ['title' => 'Colors', 'route' => 'utilities/colors']))->name('utilities.colors');
Route::get('/utilities/flex-grid', fn () => view('pages.utilities.flex-grid', ['title' => 'Flex & Grid', 'route' => 'utilities/flex-grid']))->name('utilities.flex-grid');
Route::get('/utilities/helpers', fn () => view('pages.utilities.helpers', ['title' => 'Helpers', 'route' => 'utilities/helpers']))->name('utilities.helpers');
Route::get('/utilities/position', fn () => view('pages.utilities.position', ['title' => 'Position & Object Fit', 'route' => 'utilities/position']))->name('utilities.position');
Route::get('/utilities/spacing', fn () => view('pages.utilities.spacing', ['title' => 'Spacing & Gutters', 'route' => 'utilities/spacing']))->name('utilities.spacing');
Route::get('/widgets', fn () => view('pages.widgets', ['title' => 'Widgets', 'route' => 'widgets']))->name('widgets');

// Unknown paths → 404 view
Route::fallback(fn () => response()->view('pages.error.404', ['title' => '404 Not Found', 'route' => 'error/404'], 404));
