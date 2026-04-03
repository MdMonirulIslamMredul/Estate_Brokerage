@extends('frontend.layout')

@section('title', 'ROI Calculator')

@section('content')
    <style>
        :root {
            --roi-primary: #b20101;
            --roi-primary-dark: #7f0000;
            --roi-text: #0f172a;
            --roi-muted: #64748b;
            --roi-bg: #f8fafc;
        }

        .roi-hero {
            position: relative;
            overflow: hidden;
            padding: 100px 0 70px;
            background: radial-gradient(circle at top left, rgba(178, 1, 1, 0.22), transparent 30%),
                linear-gradient(135deg, #0f172a 0%, #111827 48%, #1f2937 100%);
            color: #ffffff;
            text-align: center;
        }

        .roi-hero h1 {
            font-size: clamp(2.2rem, 4.5vw, 3.8rem);
            font-weight: 800;
            margin-bottom: 0.8rem;
            color: var(--roi-primary);
        }

        .roi-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.84);
            margin-bottom: 0;
        }

        .roi-card {
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 1rem;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .roi-card-title {
            font-weight: 800;
            color: var(--roi-text);
        }

        .roi-stat-card {
            background: #ffffff;
            border-radius: 1rem;
            padding: 1rem;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
            text-align: center;
        }

        .roi-stat-value {
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--roi-primary);
        }

        .roi-stat-label {
            margin-top: 0.35rem;
            color: var(--roi-muted);
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .roi-hero {
                padding: 70px 0 50px;
            }
        }
    </style>

    <section class="roi-hero">
        <div class="container">
            <h1>ROI Calculator</h1>
            <p>Estimate your investment returns on property faster with reliable data-backed projections.</p>
        </div>
    </section>

    <section class="py-6" style="background: var(--roi-bg);">
        <div class="container">
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="roi-stat-card">
                        <div class="roi-stat-value">12.4%</div>
                        <div class="roi-stat-label">Avg. Annual ROI</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="roi-stat-card">
                        <div class="roi-stat-value">৳ 7.2 Cr</div>
                        <div class="roi-stat-label">Market Value Potential</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="roi-stat-card">
                        <div class="roi-stat-value">85%</div>
                        <div class="roi-stat-label">Projected Occupancy</div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="roi-card p-4 p-md-5">
                        <h3 class="roi-card-title mb-3">Calculate ROI</h3>
                        <form id="roiForm" autocomplete="off">
                            <div class="mb-3">
                                <label class="form-label" for="investmentAmount">Investment Amount (BDT)</label>
                                <input id="investmentAmount" type="number" min="0" value="5000000"
                                    class="form-control form-control-lg" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="annualReturn">Expected Annual Return (%)</label>
                                <input id="annualReturn" type="number" step="0.01" min="0" value="12.4"
                                    class="form-control form-control-lg" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="holdingPeriod">Holding Period (Years)</label>
                                <input id="holdingPeriod" type="number" min="1" value="5"
                                    class="form-control form-control-lg" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Estimate ROI</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="roi-card p-4 p-md-5">
                        <h3 class="roi-card-title mb-3">ROI Result</h3>
                        <div class="list-group">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                Estimated Profit
                                <span id="roiProfit" class="fw-bold">BDT 0.00</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                Total Value
                                <span id="roiTotal" class="fw-bold">BDT 0.00</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                Annualisation
                                <span id="roiYearly" class="fw-bold">BDT 0.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('all.builders') }}" class="btn btn-outline-dark me-2">Explore Builders</a>
                <a href="{{ route('contact.us') }}" class="btn btn-primary">Talk to Expert</a>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('roiForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const investment = Number(document.getElementById('investmentAmount').value);
            const annualRate = Number(document.getElementById('annualReturn').value);
            const period = Number(document.getElementById('holdingPeriod').value);

            if (!investment || !annualRate || !period) {
                return;
            }

            const profit = investment * (Math.pow(1 + annualRate / 100, period) - 1);
            const total = investment + profit;
            const yearly = profit / period;

            const formatBR = (val) => val.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            document.getElementById('roiProfit').innerText = 'BDT ' + formatBR(profit);
            document.getElementById('roiTotal').innerText = 'BDT ' + formatBR(total);
            document.getElementById('roiYearly').innerText = 'BDT ' + formatBR(yearly);
        });
    </script>
@endsection
