@extends('frontend.layout')

@section('title', 'EMI Calculator')

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
            <h1>EMI Calculator</h1>
            <p>Estimate monthly EMI and total loan cost for your property purchases quickly and accurately.</p>
        </div>
    </section>

    <section class="py-6" style="background: var(--emi-bg);">
        <div class="container">

            <div class="row g-4">


                <div class="col-lg-7">
                    <div class="emi-card p-4 p-md-5">
                        <h4 class="text-emi-text mb-3">Loan Details</h4>
                        <form id="emiForm" autocomplete="off">
                            <div class="mb-3">
                                <label for="loanAmount" class="form-label">Loan Amount (BDT)</label>
                                <input id="loanAmount" type="number" class="form-control form-control-lg" min="0"
                                    value="5000000" required>
                            </div>
                            <div class="mb-3">
                                <label for="interestRate" class="form-label">Interest Rate (% p.a.)</label>
                                <input id="interestRate" type="number" step="0.01" class="form-control form-control-lg"
                                    min="0" value="8.5" required>
                            </div>
                            <div class="mb-3">
                                <label for="tenure" class="form-label">Loan Tenure (Years)</label>
                                <input id="tenure" type="number" class="form-control form-control-lg" min="1"
                                    value="15" required>
                            </div>
                            <button type="submit" class="btn calc-btn btn-lg w-100">Calculate</button>
                        </form>

                        <div class="mt-5">
                            <h4 class="text-emi-text mb-3">Quick Tips</h4>
                            <ul>
                                <li>Lower rates reduce monthly EMI significantly.</li>
                                <li>Longer tenure means lower EMI, but higher total interest.</li>
                                <li>Pay extra principal if possible to shorten loan and save interest.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="emi-card p-4 p-md-5">
                        <h4 class="text-emi-text mb-3">EMI Summary</h4>
                        <div class="emi-stat-card mb-3">
                            <div class="emi-stat-value" id="emiMonthlyView">BDT 0.00</div>
                            <div class="emi-stat-label">Monthly EMI</div>
                        </div>
                        <div class="emi-stat-card mb-3">
                            <div class="emi-stat-value" id="emiTotalView">BDT 0.00</div>
                            <div class="emi-stat-label">Total Payment</div>
                        </div>
                        <div class="emi-stat-card mb-3">
                            <div class="emi-stat-value" id="emiInterestView">BDT 0.00</div>
                            <div class="emi-stat-label">Total Interest</div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('all.builders') }}" class="btn btn-outline-dark me-2">Find Builders</a>
                            <a href="{{ route('contact.us') }}" class="btn btn-outline-primary">Consult Expert</a>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>

    <script>
        document.getElementById('emiForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const loanAmount = Number(document.getElementById('loanAmount').value);
            const annualRate = Number(document.getElementById('interestRate').value);
            const tenureYears = Number(document.getElementById('tenure').value);

            if (!loanAmount || !annualRate || !tenureYears) {
                return;
            }

            const monthlyRate = annualRate / 100 / 12;
            const totalMonths = tenureYears * 12;
            const emi = (loanAmount * monthlyRate * Math.pow(1 + monthlyRate, totalMonths)) / (Math.pow(1 +
                monthlyRate, totalMonths) - 1);
            const totalPayment = emi * totalMonths;
            const totalInterest = totalPayment - loanAmount;

            const formatMoney = (value) => value.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            document.getElementById('emiMonthlyView').innerText = 'BDT ' + formatMoney(emi);
            document.getElementById('emiTotalView').innerText = 'BDT ' + formatMoney(totalPayment);
            document.getElementById('emiInterestView').innerText = 'BDT ' + formatMoney(totalInterest);
        });
    </script>
@endsection
