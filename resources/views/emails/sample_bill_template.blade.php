<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; margin: 0; padding: 0; font-size: 14px; }
        .container { padding: 30px; }
        
        /* Header Section */
        .header-table { width: 100%; border-collapse: collapse; border: 1px solid #681c6a; }
        .header-left { width: 70%; padding: 20px; vertical-align: top; }
        .header-right { width: 30%; background-color: #681c6a; color: white; padding: 20px; vertical-align: middle; }
        
        .logo { width: 120px; height: auto; margin-bottom: 10px; }
        .company-name { color: #681c6a; font-size: 22px; font-weight: bold; margin: 0; }
        .product-of { color: #000b58; font-size: 16px; font-weight: normal; margin-top: 5px; }
        
        .header-right h1 { font-size: 28px; margin: 0 0 10px 0; text-transform: uppercase; }
        .header-right p { font-size: 12px; margin: 3px 0; font-weight: bold; }

        /* Address Section */
        .address-table { width: 100%; border-collapse: collapse; border-left: 1px solid #681c6a; border-right: 1px solid #681c6a; border-bottom: 1px solid #681c6a; }
        .address-col { width: 35%; padding: 15px; border-right: 1px solid #681c6a; vertical-align: top; }
        .meta-col { width: 30%; padding: 15px; background-color: #f9f9f9; vertical-align: top; }
        
        .label { color: #681c6a; font-weight: bold; font-size: 11px; text-transform: uppercase; margin-bottom: 5px; display: block; }
        .address-text { font-size: 12px; line-height: 1.5; color: #444; }
        
        .meta-row { width: 100%; margin-bottom: 8px; font-size: 13px; }
        .meta-label { font-weight: bold; color: #681c6a; }
        .meta-value { float: right; color: #333; }
        
        .total-due-box { margin-top: 20px; padding-top: 15px; border-top: 1px dashed #ccc; }
        .total-due-label { font-size: 10px; text-transform: uppercase; color: #666; font-weight: bold; }
        .total-due-amount { font-size: 22px; font-weight: 900; color: #681c6a; margin-top: 5px; }

        /* Items Table */
        .items-table { width: 100%; border-collapse: collapse; margin-top: 20px; border: 1px solid #681c6a; }
        .items-table thead { background-color: #681c6a; color: white; }
        .items-table th { padding: 12px 15px; text-align: left; text-transform: uppercase; font-size: 12px; }
        .items-table td { padding: 15px; border-bottom: 1px solid #eee; }
        
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .description-sub { font-size: 11px; color: #777; margin-top: 4px; }

        /* Totals Area */
        .totals-row td { padding: 10px 15px; font-size: 13px; }
        .grand-total { background-color: #f9f9f9; color: #681c6a; font-size: 18px; font-weight: 900; }

        /* Footer Note */
        .footer-note { margin-top: 40px; padding: 15px; border-left: 4px solid #681c6a; background-color: #fcfcfc; font-style: italic; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        
        <table class="header-table">
            <tr>
                <td class="header-left">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/linkAuraLogo300.png'))) }}" class="logo">
                    <div class="company-name">{{ $business_name ?? 'TMinSBP Software Innovation Lab' }}</div>
                    <div class="product-of">A Product of LinkAura</div>
                </td>
                <td class="header-right">
                    <h1>Invoice</h1>
                    <p>Mobile: {{ $contact_phone ?? '+91 98423 06487' }}</p>
                    <p>Email: {{ $contact_email ?? 'thirumurugan8892@gmail.com' }}</p>
                    <p>Website: www.linkaura.co.in</p>
                </td>
            </tr>
        </table>

        <table class="address-table">
            <tr>
                <td class="address-col">
                    <span class="label">From:</span>
                    <div class="address-text">
                        <strong>TMinSBP Software Innovation Lab</strong><br>
                        No 288, Smart Bazar Near,<br>
                        Anangur Corner, B.Komarapalayam,<br>
                        Namakkal(DT), Pincode - 638183<br>
                        India
                    </div>
                </td>
                <td class="address-col">
                    <span class="label">To:</span>
                    <div class="address-text">
                        <strong>{{ $company_name ?? 'Client Company Name' }}</strong><br>
                        {!! nl2br(e($to_address ?? "Client Address Details\nCity, State")) !!}
                    </div>
                </td>
                <td class="meta-col">
                    <div class="meta-row">
                        <span class="meta-label">Invoice No:</span>
                        <span class="meta-value">#{{ $invoice_no }}</span>
                    </div>
                    <div class="meta-row">
                        <span class="meta-label">Issue Date:</span>
                        <span class="meta-value">{{ $date }}</span>
                    </div>
                    
                    <div class="total-due-box">
                        <div class="total-due-label">Total Amount Due</div>
                        <div class="total-due-amount">₹{{ number_format($amount, 2) }}</div>
                    </div>
                </td>
            </tr>
        </table>

        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 70%;">Description</th>
                    <th style="width: 30%; text-align: right;">Amount (₹)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="font-bold" style="font-size: 16px;">{{ $plan_name }}</div>
                        <div class="description-sub">{{ $description }}</div>
                    </td>
                    <td class="text-right font-bold" style="font-size: 16px;">
                        ₹{{ number_format($amount, 2) }}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="totals-row">
                    <td class="text-right font-bold">Subtotal:</td>
                    <td class="text-right font-bold">₹{{ number_format($amount, 2) }}</td>
                </tr>
                <tr class="totals-row grand-total">
                    <td class="text-right">TOTAL (INR):</td>
                    <td class="text-right">₹{{ number_format($amount, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="footer-note">
            This is a digitally generated invoice and a valid digital certificate issued by 
            <span style="font-bold; color: #681c6a;">{{ $business_name ?? 'TMinSBP Software Innovation Lab' }}</span>. 
            No physical signature is required.
        </div>

    </div>
</body>
</html>