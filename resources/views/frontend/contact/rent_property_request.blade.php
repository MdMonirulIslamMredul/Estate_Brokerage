@extends('frontend.layout')

@section('title')
    Rent Your Property
@endsection

@section('content')
    @php
        $links = App\Models\WebsiteLink::latest()->first();
    @endphp

    <style>
        :root {
            --rent-primary: #b20101;
            --rent-primary-dark: #7f0000;
            --rent-ink: #0f172a;
            --rent-muted: #64748b;
            --rent-bg: #f8fafc;
            --rent-surface: #ffffff;
        }

        .rent-hero {
            position: relative;
            overflow: hidden;
            padding: 118px 0 88px;
            background:
                radial-gradient(circle at top left, rgba(178, 1, 1, 0.28), transparent 30%),
                radial-gradient(circle at 90% 18%, rgba(245, 158, 11, 0.18), transparent 22%),
                linear-gradient(135deg, #0f172a 0%, #111827 45%, #1f2937 100%);
            color: #fff;
        }

        .rent-hero::after {
            content: '';
            position: absolute;
            inset: auto -80px -120px auto;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            filter: blur(10px);
            pointer-events: none;
        }

        .rent-hero-inner {
            position: relative;
            z-index: 1;
            max-width: 860px;
            margin: 0 auto;
            text-align: center;
        }

        .rent-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 1rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: rgba(255, 255, 255, 0.92);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 1.2rem;
        }

        .rent-hero h1 {
            margin: 0;
            font-size: clamp(2.35rem, 4.6vw, 4.5rem);
            line-height: 1.02;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .rent-hero p {
            max-width: 720px;
            margin: 1rem auto 0;
            color: rgba(255, 255, 255, 0.78);
            font-size: 1.04rem;
            line-height: 1.8;
        }

        .rent-benefits {
            margin-top: -30px;
            position: relative;
            z-index: 2;
        }

        .rent-benefit-card {
            height: 100%;
            background: var(--rent-surface);
            border-radius: 20px;
            padding: 18px 20px;
            border: 1px solid rgba(15, 23, 42, 0.06);
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.08);
        }

        .rent-benefit-card strong {
            display: block;
            margin-top: 0.45rem;
            color: var(--rent-ink);
            font-size: 0.98rem;
            font-weight: 700;
        }

        .rent-benefit-card span {
            color: var(--rent-muted);
            font-size: 0.9rem;
        }

        .rent-shell {
            padding: 56px 0 84px;
            background: linear-gradient(180deg, var(--rent-bg) 0%, #ffffff 100%);
        }

        .rent-panel {
            background: var(--rent-surface);
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 28px;
            box-shadow: 0 24px 56px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        .rent-info {
            height: 100%;
            padding: 34px;
            background: linear-gradient(160deg, #111827 0%, #1f2937 100%);
            color: #fff;
        }

        .rent-info h2,
        .rent-form h2 {
            margin: 0 0 0.75rem;
            font-size: 1.9rem;
            line-height: 1.15;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .rent-info p,
        .rent-form .lead-copy {
            margin: 0;
            color: var(--rent-muted);
            line-height: 1.8;
        }

        .rent-info p {
            color: rgba(255, 255, 255, 0.72);
        }

        .info-list {
            display: grid;
            gap: 14px;
            margin-top: 26px;
        }

        .info-chip {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            border-radius: 18px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .info-chip i {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--rent-primary), #f26b3a);
            flex-shrink: 0;
        }

        .info-chip strong {
            display: block;
            color: #fff;
            font-size: 0.96rem;
            margin-bottom: 0.2rem;
        }

        .info-chip span,
        .info-chip a {
            color: rgba(255, 255, 255, 0.72);
            text-decoration: none;
            word-break: break-word;
        }

        .rent-form {
            padding: 34px;
        }

        .rent-form .section-tag {
            display: inline-flex;
            align-items: center;
            padding: 0.44rem 0.86rem;
            border-radius: 999px;
            background: rgba(178, 1, 1, 0.08);
            color: var(--rent-primary);
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 0.9rem;
        }

        .rent-form label {
            color: var(--rent-ink);
            font-size: 0.92rem;
            font-weight: 700;
            margin-bottom: 0.45rem;
        }

        .rent-form .form-control,
        .rent-form .form-select,
        .rent-form textarea {
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            background: #fff;
            padding: 0.95rem 1rem;
            color: var(--rent-ink);
            box-shadow: none;
        }

        .rent-form .form-control:focus,
        .rent-form .form-select:focus,
        .rent-form textarea:focus {
            border-color: rgba(178, 1, 1, 0.45);
            box-shadow: 0 0 0 0.22rem rgba(178, 1, 1, 0.12);
        }

        .rent-form .submit-btn {
            width: 100%;
            border: 0;
            border-radius: 18px;
            padding: 1rem 1.25rem;
            font-weight: 800;
            color: #fff;
            background: linear-gradient(135deg, var(--rent-primary), var(--rent-primary-dark));
            box-shadow: 0 18px 28px rgba(178, 1, 1, 0.24);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .rent-form .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 34px rgba(178, 1, 1, 0.3);
        }

        .rent-note {
            margin-top: 18px;
            padding: 16px;
            border-radius: 18px;
            background: #fff8f3;
            border: 1px solid rgba(240, 129, 33, 0.16);
            color: #9a5a13;
            font-size: 0.92rem;
            line-height: 1.7;
        }

        .flash-box {
            border-radius: 16px;
        }

        @media (max-width: 991px) {
            .rent-hero {
                padding: 104px 0 76px;
            }

            .rent-info,
            .rent-form {
                padding: 24px;
            }

            .rent-shell {
                padding: 42px 0 72px;
            }
        }

        @media (max-width: 575px) {
            .rent-hero {
                padding: 96px 0 68px;
            }

            .rent-form,
            .rent-info {
                padding: 18px;
            }
        }
    </style>

    <section class="rent-hero">
        <div class="container">
            <div class="rent-hero-inner">
                <div class="rent-kicker">Rent Property Request</div>
                <h1>List Your Property for Rent</h1>
                <p>Share your property details with us and our team will review everything, connect with tenants, and guide
                    you through the next steps.</p>
            </div>
        </div>
    </section>

    <section class="rent-benefits">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-3 col-6">
                    <div class="rent-benefit-card">
                        <span>01</span>
                        <strong>Free listing</strong>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="rent-benefit-card">
                        <span>02</span>
                        <strong>Tenant screening</strong>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="rent-benefit-card">
                        <span>03</span>
                        <strong>Broker support</strong>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="rent-benefit-card">
                        <span>04</span>
                        <strong>Fast response</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rent-shell">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success flash-box mb-4">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger flash-box mb-4">
                    Please fix the highlighted fields and try again.
                </div>
            @endif

            <div class="rent-panel">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <aside class="rent-info">
                            <div class="section-tag" style="background: rgba(255,255,255,0.1); color: #fff;">Owner Support
                            </div>
                            <h2>Tell us about the property you want to rent out.</h2>
                            <p>We help property owners get visibility, verified tenants, and guided support from inquiry to
                                final agreement.</p>

                            <div class="info-list">
                                <div class="info-chip">
                                    <i class="bi bi-telephone-fill"></i>
                                    <div>
                                        <strong>Phone</strong>
                                        <span>{{ $links->phone ?? '+880 1XXXXXXXXX' }}</span>
                                    </div>
                                </div>
                                <div class="info-chip">
                                    <i class="bi bi-envelope-fill"></i>
                                    <div>
                                        <strong>Email</strong>
                                        <a
                                            href="mailto:{{ $links->email ?? 'info@estatebrokerage.net' }}">{{ $links->email ?? 'info@estatebrokerage.net' }}</a>
                                    </div>
                                </div>
                                <div class="info-chip">
                                    <i class="bi bi-clock-fill"></i>
                                    <div>
                                        <strong>Response Time</strong>
                                        <span>Usually within 24 hours</span>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>

                    <div class="col-lg-7">
                        <div class="rent-form">
                            <div class="section-tag">Property Form</div>
                            <h2>Request a Rent Listing</h2>
                            <p class="lead-copy mb-4">Fill in the details below and we will review your property for a rent
                                listing request.</p>

                            <form method="POST" action="{{ route('rent.property.submit') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name *</label>
                                        <input type="text" name="name_english" value="{{ old('name_english') }}"
                                            class="form-control @error('name_english') is-invalid @enderror"
                                            placeholder="Your full name">
                                        @error('name_english')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="+880 1XXXXXXXXX">
                                        @error('phone')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="your@email.com">
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Property Type *</label>
                                        <select name="property_type"
                                            class="form-select @error('property_type') is-invalid @enderror">
                                            <option value="">Select type</option>
                                            <option value="Residential Apartment" @selected(old('property_type') === 'Residential Apartment')>Residential
                                                Apartment</option>
                                            <option value="Furnished Apartment" @selected(old('property_type') === 'Furnished Apartment')>Furnished
                                                Apartment</option>
                                            <option value="Independent House" @selected(old('property_type') === 'Independent House')>Independent House
                                            </option>
                                            <option value="Office" @selected(old('property_type') === 'Office')>Office</option>
                                            <option value="Commercial Building" @selected(old('property_type') === 'Commercial Building')>Commercial
                                                Building</option>
                                            <option value="Shop" @selected(old('property_type') === 'Shop')>Shop</option>
                                            <option value="Warehouse" @selected(old('property_type') === 'Warehouse')>Warehouse</option>
                                            <option value="Single Room" @selected(old('property_type') === 'Single Room')>Single Room</option>
                                            <option value="Sublet (With Family)" @selected(old('property_type') === 'Sublet (With Family)')>Sublet (With
                                                Family)</option>
                                            <option value="Roommate" @selected(old('property_type') === 'Roommate')>Roommate</option>
                                        </select>
                                        @error('property_type')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Monthly Rent (BDT) *</label>
                                        <input type="number" name="monthly_rent" value="{{ old('monthly_rent') }}"
                                            class="form-control @error('monthly_rent') is-invalid @enderror"
                                            placeholder="25000">
                                        @error('monthly_rent')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Property Title *</label>
                                        <input type="text" name="property_title" value="{{ old('property_title') }}"
                                            class="form-control @error('property_title') is-invalid @enderror"
                                            placeholder="3-Bed Apartment in Gulshan 2">
                                        @error('property_title')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Location / Area *</label>
                                        <input type="text" name="location" value="{{ old('location') }}"
                                            class="form-control @error('location') is-invalid @enderror"
                                            placeholder="Gulshan, Dhaka">
                                        @error('location')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Area Size</label>
                                        <input type="text" name="area_size" value="{{ old('area_size') }}"
                                            class="form-control" placeholder="1400 sqft">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Bedrooms</label>
                                        <input type="number" name="bedrooms" value="{{ old('bedrooms') }}"
                                            class="form-control" placeholder="3">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Bathrooms</label>
                                        <input type="number" name="bathrooms" value="{{ old('bathrooms') }}"
                                            class="form-control" placeholder="2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Available From</label>
                                        <input type="date" name="available_from" value="{{ old('available_from') }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Full Address *</label>
                                        <input type="text" name="full_address" value="{{ old('full_address') }}"
                                            class="form-control @error('full_address') is-invalid @enderror"
                                            placeholder="House/Flat number, road, area, city">
                                        @error('full_address')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Describe the property, amenities, lease conditions, and anything tenants should know.">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 pt-2">
                                        <button type="submit" class="submit-btn">Submit Property Request</button>
                                    </div>
                                </div>
                            </form>

                            <div class="rent-note">
                                We will review the request and contact you after verification. If you need urgent help, use
                                the phone or email listed on the left.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
