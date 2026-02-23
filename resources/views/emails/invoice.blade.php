<html>
<head>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; margin: 0; padding: 20px; }
        
        /* Header Section */
        .header-banner { background-color: #4b5563; color: white; padding: 40px; display: flex; justify-content: space-between; align-items: flex-start; }
        .header-left h1 { margin: 0; font-size: 28px; font-weight: 500; }
        .header-right { text-align: right; }
        .header-right h2 { margin: 0; font-size: 20px; text-transform: uppercase; }
        .header-right p { margin: 5px 0 0; font-size: 12px; opacity: 0.9; }

        /* Meta Info Bar */
        .meta-bar { background-color: #374151; color: white; padding: 10px 40px; display: flex; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; }
        .meta-item { margin-right: 50px; }
        .meta-label { opacity: 0.8; margin-bottom: 3px; }

        /* Addresses Section */
        .address-section { padding: 30px 40px; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; border-bottom: 1px solid #eee; }
        .address-box strong { display: block; margin-bottom: 8px; font-size: 12px; text-transform: uppercase; color: #666; }
        .address-text { font-size: 13px; line-height: 1.4; }
        .total-due-box { text-align: right; }
        .total-due-box .amount { font-size: 24px; font-weight: bold; margin-top: 5px; }

        /* Table Section */
        .invoice-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .invoice-table th { border-bottom: 2px solid #eee; padding: 15px 40px; text-align: left; font-size: 11px; text-transform: uppercase; color: #666; }
        .invoice-table td { padding: 15px 40px; border-bottom: 1px solid #eee; font-size: 13px; }
        .text-right { text-align: right; }

        /* Totals Section */
        .totals-area { padding: 20px 40px; text-align: right; }
        .total-row { display: flex; justify-content: flex-end; margin-bottom: 10px; }
        .total-label { width: 150px; font-size: 14px; }
        .total-value { width: 150px; font-size: 14px; }
        .grand-total { font-size: 18px; font-weight: bold; margin-top: 10px; border-top: 1px solid #ddd; padding-top: 10px; }

        /* Signature */
        .signature-section { margin-top: 40px; padding-right: 40px; text-align: right; }
        .signature-img { width: 150px; margin-bottom: 5px; }
        .signature-label { font-size: 11px; font-weight: bold; border-top: 1px solid #ccc; display: inline-block; padding-top: 5px; }
    </style>
</head>
<body>

    <div class="header-banner">
        <div class="header-left">
            <h1>{{ $business_name ?? 'Your Business Name' }}</h1>
        </div>
        <div class="header-right">
            <h2>Invoice</h2>
            <p>Tax Invoice</p>
            <p>{{ $contact_phone ?? '+91 0000000000' }}</p>
            <p>{{ $contact_email ?? 'email@yourbusiness.com' }}</p>
        </div>
    </div>

    <div class="meta-bar">
        <div class="meta-item">
            <div class="meta-label">Invoice No.</div>
            <div>{{ $invoice_no }}</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Issue Date</div>
            <div>{{ $date }}</div>
        </div>
    </div>

    <div class="address-section">
        <div class="address-box">
            <strong>From</strong>
            <div class="address-text">{!! nl2br(e($from_address)) !!}</div>
        </div>
        <div class="address-box">
            <strong>To</strong>
            <div class="address-text">{!! nl2br(e($to_address)) !!}</div>
        </div>
        <div class="total-due-box">
            <strong>Total due</strong>
            <div class="amount">₹{{ number_format($amount, 2) }}</div>
        </div>
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>Description</th>
                <th class="text-right">Amount (₹)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>{{ $plan_name }}</strong><br>
                    <span style="color: #666; font-size: 12px;">{{ $description }}</span>
                </td>
                <td class="text-right">₹{{ number_format($amount, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="totals-area">
        <div class="total-row">
            <div class="total-label">Subtotal:</div>
            <div class="total-value">₹{{ number_format($amount, 2) }}</div>
        </div>
        <div class="total-row grand-total">
            <div class="total-label">Total (INR):</div>
            <div class="total-value">₹{{ number_format($amount, 2) }}</div>
        </div>
    </div>

    <div class="signature-section">
        <p class="signature-label">Issued by, signature:</p>
    </div>

</body>
</html>