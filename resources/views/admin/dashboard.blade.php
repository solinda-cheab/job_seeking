<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php($title = 'Admin Dashboard')
        @include('layouts.partials.head')
    </head>
    <body class="app-body admin-public-body">
        <nav class="navbar navbar-expand-lg public-navbar sticky-top admin-topbar shadow-sm">
            <div class="container py-3 align-items-center d-flex justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-4 flex-wrap">
                    <div class="brand-mark brand-mark--admin">
                        <span class="brand-mark__icon"><i class="bi bi-briefcase-fill"></i></span>
                        <div>
                            <strong>Job Seek</strong>
                            <small class="d-block text-muted">Admin Console</small>
                        </div>
                    </div>
                    <ul class="nav nav-pills admin-nav-links">
                        <li class="nav-item"><a class="nav-link active" href="#dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#inventory">Inventory</a></li>
                        <li class="nav-item"><a class="nav-link" href="#orders">Orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="#purchase">Purchase</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reporting">Reporting</a></li>
                    </ul>
                </div>
                <div class="admin-topbar-actions d-flex gap-3 align-items-center flex-wrap">
                    <div class="admin-user-badge px-3 py-2 rounded-4 bg-white shadow-sm d-flex align-items-center gap-3">
                        <span class="admin-user-badge__avatar">A</span>
                        <div>
                            <strong>{{ $name }}</strong>
                            <span class="text-muted small">Admin / English</span>
                        </div>
                    </div>
                    <a href="#support" class="btn btn-primary btn-sm">Support</a>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="container">
                <section id="dashboard" class="admin-hero-banner p-5 rounded-4 shadow-sm mb-5 bg-white">
                    <div class="row align-items-center gy-4">
                        <div class="col-lg-7">
                            <span class="eyebrow-badge mb-3">Welcome back</span>
                            <h1 class="display-5 fw-bold">Inventory Management</h1>
                            <p class="text-muted fs-5">A clean, professional admin experience designed for visibility, fast navigation, and effortless insights.</p>
                        </div>
                        <div class="col-lg-5 d-flex justify-content-lg-end">
                            <div class="hero-summary p-4 rounded-4 bg-light shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <small class="text-uppercase text-muted">Year</small>
                                    <strong>2024</strong>
                                </div>
                                <div class="d-flex gap-4 align-items-center flex-wrap">
                                    <div>
                                        <h4 class="mb-1">5483</h4>
                                        <small class="text-muted">Products</small>
                                    </div>
                                    <div>
                                        <h4 class="mb-1">2859</h4>
                                        <small class="text-muted">Orders</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row g-4 mb-5">
                    <div class="col-lg-3">
                        <div class="dashboard-card admin-panel-sidebar p-4 rounded-4 shadow-sm">
                            <h5 class="mb-4">Quick actions</h5>
                            <a href="#inventory" class="dashboard-link">Inventory overview</a>
                            <a href="#orders" class="dashboard-link">Order tracker</a>
                            <a href="#purchase" class="dashboard-link">Purchase history</a>
                            <a href="#reporting" class="dashboard-link">Reporting tools</a>
                            <a href="#support" class="dashboard-link">Support center</a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="dashboard-card p-4 rounded-4 shadow-sm mb-4">
                            <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-4">
                                <div>
                                    <span class="text-uppercase text-primary small fw-bold">Dashboard overview</span>
                                    <h2 class="mt-2">Monitor your business performance.</h2>
                                </div>
                                <form class="d-flex gap-2 admin-search" action="#">
                                    <input type="search" class="form-control form-control-lg" placeholder="Search items, orders, stores">
                                    <button type="submit" class="btn btn-primary btn-lg">Search</button>
                                </form>
                            </div>

                            <div class="admin-stats-grid mb-4">
                                <a href="#inventory" class="admin-card admin-card--accent">
                                    <span class="d-block text-muted">Total Products</span>
                                    <strong>5,483</strong>
                                </a>
                                <a href="#orders" class="admin-card admin-card--accent-light">
                                    <span class="d-block text-muted">Orders</span>
                                    <strong>2,859</strong>
                                </a>
                                <a href="#inventory" class="admin-card admin-card--accent">
                                    <span class="d-block text-muted">Total Stock</span>
                                    <strong>5,483</strong>
                                </a>
                                <a href="#inventory" class="admin-card admin-card--accent-light">
                                    <span class="d-block text-muted">Out of Stock</span>
                                    <strong>38</strong>
                                </a>
                            </div>

                            <div class="admin-chart-panel p-4 rounded-4 bg-white shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <small class="text-muted text-uppercase">Monthly trend</small>
                                        <h4 class="mb-0">Sales volume</h4>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-primary bg-opacity-10 text-primary">Revenue</span>
                                        <span class="badge bg-light text-muted">Units</span>
                                    </div>
                                </div>
                                <div class="admin-chart mb-3">
                                    <div class="chart-grid">
                                        @foreach([48, 62, 75, 68, 82, 71, 88, 94] as $value)
                                            <div class="chart-bar" style="height: {{ $value }}%"></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="chart-footer d-flex justify-content-between text-muted small">
                                    <span>Jan</span>
                                    <span>Feb</span>
                                    <span>Mar</span>
                                    <span>Apr</span>
                                    <span>May</span>
                                    <span>Jun</span>
                                    <span>Jul</span>
                                    <span>Aug</span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <a href="#orders" class="dashboard-tile p-4 rounded-4 shadow-sm d-block text-decoration-none text-dark">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h5 class="mb-1">Order status</h5>
                                            <p class="text-muted mb-0">Track new, shipped and pending orders.</p>
                                        </div>
                                        <i class="bi bi-arrow-right-circle fs-3 text-primary"></i>
                                    </div>
                                    <div class="d-flex gap-3 flex-wrap">
                                        <span class="badge bg-primary bg-opacity-10 text-primary">New</span>
                                        <span class="badge bg-success bg-opacity-10 text-success">Shipped</span>
                                        <span class="badge bg-warning bg-opacity-10 text-warning">Pending</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#reporting" class="dashboard-tile p-4 rounded-4 shadow-sm d-block text-decoration-none text-dark">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h5 class="mb-1">Reporting</h5>
                                            <p class="text-muted mb-0">Open sales, stock, and growth insights.</p>
                                        </div>
                                        <i class="bi bi-bar-chart-line fs-3 text-primary"></i>
                                    </div>
                                    <div class="d-flex gap-3 flex-wrap">
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary">Top stores</span>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary">Profit</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <section id="inventory" class="row g-4 mb-5">
                    <div class="col-lg-8">
                        <div class="dashboard-card p-4 rounded-4 shadow-sm">
                            <h5 class="mb-3">Inventory values</h5>
                            <p class="text-muted mb-4">Review inventory health, product availability, and restock priorities.</p>
                            <div class="d-flex gap-3 flex-wrap">
                                <div class="admin-summary-card p-3 rounded-4 bg-light">
                                    <span class="text-muted small">Current capacity</span>
                                    <strong class="d-block fs-4 mt-2">78%</strong>
                                </div>
                                <div class="admin-summary-card p-3 rounded-4 bg-light">
                                    <span class="text-muted small">Restock alerts</span>
                                    <strong class="d-block fs-4 mt-2">14</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dashboard-card p-4 rounded-4 shadow-sm">
                            <h5 class="mb-3">Top stores by sales</h5>
                            <div class="store-list">
                                @foreach(['Gateway str','The Rustic Fox','Velvet Vine','Blue Harbor','Nebula Novelties','Crimson Crafters','Tidal Treasures','Whimsy Wid','Mercantile','Emporium'] as $store)
                                    <div class="store-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                        <div>
                                            <strong>{{ $store }}</strong>
                                            <p class="mb-0 text-muted">{{ rand(120, 874) }}k</p>
                                        </div>
                                        <div class="store-bar" style="width: {{ rand(30, 100) }}%;"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

                <section id="orders" class="row g-4 mb-5">
                    <div class="col-lg-6">
                        <div class="dashboard-card p-4 rounded-4 shadow-sm">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Shipping progress</h5>
                                <span class="text-muted small">Updated now</span>
                            </div>
                            <div class="progress" style="height: 0.9rem;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="dashboard-card p-4 rounded-4 shadow-sm">
                            <h5 class="mb-3">Need attention</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="py-2 border-bottom"><strong>12 orders</strong> awaiting review</li>
                                <li class="py-2 border-bottom"><strong>5 products</strong> low in stock</li>
                                <li class="py-2"><strong>3 vendors</strong> pending confirmation</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section id="reporting" class="dashboard-card p-4 rounded-4 shadow-sm mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="mb-0">Expense vs Profit</h5>
                            <span class="text-muted small">Last 6 months</span>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary">Trend</span>
                    </div>
                    <div class="profit-chart">
                        <div class="profit-path">
                            <span class="profit-line"></span>
                            <span class="profit-point" style="left: 8%; bottom: 18%;"></span>
                            <span class="profit-point" style="left: 24%; bottom: 28%;"></span>
                            <span class="profit-point" style="left: 40%; bottom: 24%;"></span>
                            <span class="profit-point" style="left: 56%; bottom: 42%;"></span>
                            <span class="profit-point" style="left: 72%; bottom: 36%;"></span>
                            <span class="profit-point" style="left: 88%; bottom: 56%;"></span>
                        </div>
                    </div>
                </section>

                <section id="support" class="dashboard-card p-4 rounded-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="mb-0">Support & settings</h5>
                            <p class="text-muted mb-0">Access help, preferences, and quick support options.</p>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm">Open help</a>
                    </div>
                </section>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>
