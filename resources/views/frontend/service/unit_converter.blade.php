@extends('frontend.layout')

@section('title', 'Unit Converter')

@section('content')
    <style>
        :root {
            --emi-primary: #b20101;
            --emi-primary-dark: #7f0000;
            --emi-bg: #f8fafc;
            --emi-text: #0f172a;
            --emi-muted: #64748b;
        }

        .emi-hero {
            padding: 90px 0 65px;
            background: radial-gradient(circle at top left, rgba(178, 1, 1, 0.24), transparent 30%),
                radial-gradient(circle at 88% 20%, rgba(245, 158, 11, 0.16), transparent 22%),
                linear-gradient(135deg, #0f172a 0%, #111827 48%, #1f2937 100%);
            color: #fff;
            text-align: center;
        }

        .emi-hero h1 {
            font-size: clamp(2.4rem, 5vw, 3.8rem);
            font-weight: 800;
            margin-bottom: 0.8rem;
            color: var(--emi-primary);
        }

        .emi-hero p {
            color: rgba(255, 255, 255, 0.85);
            max-width: 740px;
            margin: 0 auto;
            font-size: 1.05rem;
        }

        .emi-card {
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 1rem;
            background: #ffffff;
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.08);
        }

        .emi-stat-card {
            background: #ffffff;
            border-radius: 1rem;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
            text-align: center;
            padding: 1rem;
        }

        .emi-stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--emi-primary);
        }

        .emi-stat-label {
            color: var(--emi-muted);
            margin-top: 0.35rem;
            font-weight: 700;
        }

        .calc-btn {
            background: linear-gradient(135deg, var(--emi-primary), var(--emi-primary-dark));
            border-color: var(--emi-primary);
            color: #ffffff;
        }

        .calc-btn:hover {
            background: linear-gradient(135deg, var(--emi-primary-dark), #590000);
        }
    </style>

    <section class="emi-hero">
        <div class="container">
            <h1>Unit Converter</h1>
            <p>Convert between all common Bangladeshi land area units</p>
        </div>
    </section>

    <section class="py-6" style="background: var(--emi-bg);">
        <div class="container">
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="emi-stat-card">
                        <div class="emi-stat-value" id="emiMonthlyView">BDT 0.00</div>
                        <div class="emi-stat-label">converted value</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="emi-stat-card">
                        <div class="emi-stat-value" id="emiTotalView">BDT 0.00</div>
                        <div class="emi-stat-label">converted unit</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="emi-stat-card">
                        <div class="emi-stat-value" id="emiInterestView">BDT 0.00</div>
                        <div class="emi-stat-label">conversion info</div>
                    </div>
                </div>
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7">
                    <div class="emi-card p-4 p-md-5 h-100">
                        <h4 class="text-emi-text mb-3">Conversion Input</h4>
                        <form id="converterForm" autocomplete="off">
                            <div class="mb-3">
                                <label for="convertValue" class="form-label">Value</label>
                                <input id="convertValue" type="number" min="0" step="any" value="1"
                                    class="form-control form-control-lg" required>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="fromUnit" class="form-label">From Unit</label>
                                    <select id="fromUnit" class="form-select form-select-lg">
                                        <option value="sqft">Square Feet (sqft)</option>
                                        <option value="sqm">Square Meter (sqm)</option>
                                        <option value="katha">Katha</option>
                                        <option value="bigha">Bigha</option>
                                        <option value="decimal">Decimal</option>
                                        <option value="satak">Satak</option>
                                        <option value="acre">Acre</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="toUnit" class="form-label">To Unit</label>
                                    <select id="toUnit" class="form-select form-select-lg">
                                        <option value="sqft">Square Feet (sqft)</option>
                                        <option value="sqm">Square Meter (sqm)</option>
                                        <option value="katha">Katha</option>
                                        <option value="bigha">Bigha</option>
                                        <option value="decimal">Decimal</option>
                                        <option value="satak">Satak</option>
                                        <option value="acre">Acre</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn calc-btn btn-lg w-100">Convert</button>
                        </form>

                        <div class="mt-5">
                            <h4 class="text-emi-text mb-3">All Unit Results</h4>
                            <div class="row row-cols-2 row-cols-md-3 g-3" id="outputCards"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="emi-card p-4 p-md-5 h-100">
                        <h4 class="text-emi-text mb-3">Quick Reference</h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item">1 Katha = 720 sqft</li>
                            <li class="list-group-item">1 Bigha = 20 Katha / 14,400 sqft</li>
                            <li class="list-group-item">1 Decimal = 1 Satak = 435.6 sqft</li>
                            <li class="list-group-item">1 Acre = 100 Decimal / 43,560 sqft</li>
                            <li class="list-group-item">1 Sq Meter = 10.764 sqft</li>
                        </ul>
                        <div>
                            <a href="{{ route('all.builders') }}" class="btn btn-outline-dark me-2">Find Builders</a>
                            <a href="{{ route('contact.us') }}" class="btn btn-outline-primary">Consult Expert</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        const conversions = {
            sqft: 1,
            sqm: 10.7639104,
            katha: 720,
            bigha: 14400,
            decimal: 435.6,
            satak: 435.6,
            acre: 43560
        };

        const unitLabels = {
            sqft: 'Square Feet (sqft)',
            sqm: 'Square Meter (sqm)',
            katha: 'Katha',
            bigha: 'Bigha',
            decimal: 'Decimal',
            satak: 'Satak',
            acre: 'Acre'
        };

        const fromEl = document.getElementById('fromUnit');
        const toEl = document.getElementById('toUnit');
        const valueEl = document.getElementById('convertValue');
        const emiMonthlyView = document.getElementById('emiMonthlyView');
        const emiTotalView = document.getElementById('emiTotalView');
        const emiInterestView = document.getElementById('emiInterestView');
        const outputCards = document.getElementById('outputCards');

        const formatValue = (num) => Number(num).toLocaleString('en-US', {
            maximumFractionDigits: 4
        });

        const updateConverter = () => {
            const value = parseFloat(valueEl.value) || 0;
            const from = fromEl.value;
            const to = toEl.value;

            const sqFt = value * conversions[from];
            const target = sqFt / conversions[to];

            emiMonthlyView.innerText = formatValue(target);
            emiTotalView.innerText = unitLabels[to];
            emiInterestView.innerText =
                `${formatValue(value)} ${unitLabels[from]} → ${formatValue(target)} ${unitLabels[to]}`;

            outputCards.innerHTML = Object.keys(unitLabels).map((key) => {
                return `
                    <div class="col-sm-6 col-lg-4">
                        <div class="emi-stat-card">
                            <div class="emi-stat-value">${formatValue(sqFt / conversions[key])}</div>
                            <div class="emi-stat-label">${unitLabels[key]}</div>
                        </div>
                    </div>
                `;
            }).join('');
        };

        document.getElementById('converterForm').addEventListener('submit', (event) => {
            event.preventDefault();
            updateConverter();
        });

        fromEl.addEventListener('change', updateConverter);
        toEl.addEventListener('change', updateConverter);
        valueEl.addEventListener('input', updateConverter);

        updateConverter();
    </script>
@endsection
