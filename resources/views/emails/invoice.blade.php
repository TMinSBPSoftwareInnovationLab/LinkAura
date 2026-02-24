<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Linkaura-Invoice</title>
    <style>
        /* Use DejaVu Sans for better character support (like Rupee symbol) */
        body { font-family: 'DejaVu Sans', 'Helvetica', sans-serif; color: #333; margin: 0; padding: 0; font-size: 13px; }
        .container { padding: 30px; }
        
        /* Header Section */
        .header-table { width: 100%; border-collapse: collapse; border: 1px solid #681c6a; }
        .header-left { width: 70%; padding: 20px; vertical-align: top; }
        .header-right { width: 30%; background-color: #681c6a; color: white; padding: 20px; vertical-align: middle; }
        
        .logo { width: 120px; height: auto; margin-bottom: 10px; }
        .company-name { color: #681c6a; font-size: 20px; font-weight: bold; margin: 0; }
        .product-of { color: #000b58; font-size: 14px; font-weight: normal; margin-top: 5px; }
        
        .header-right h1 { font-size: 24px; margin: 0 0 10px 0; text-transform: uppercase; }
        .header-right p { font-size: 11px; margin: 3px 0; }

        /* Address Section */
        .address-table { width: 100%; border-collapse: collapse; border-left: 1px solid #681c6a; border-right: 1px solid #681c6a; border-bottom: 1px solid #681c6a; }
        .address-col { width: 35%; padding: 15px; border-right: 1px solid #681c6a; vertical-align: top; }
        .meta-col { width: 30%; padding: 15px; background-color: #f9f9f9; vertical-align: top; }
        
        .label { color: #681c6a; font-weight: bold; font-size: 10px; text-transform: uppercase; margin-bottom: 5px; display: block; }
        .address-text { font-size: 11px; line-height: 1.4; color: #444; }
        
        /* Fixed Meta Rows (No more overlapping) */
        .meta-table { width: 100%; border-collapse: collapse; }
        .meta-table td { font-size: 11px; padding-bottom: 5px; }
        .meta-label { font-weight: bold; color: #681c6a; text-align: left; }
        .meta-value { text-align: right; color: #333; }
        
        .total-due-box { margin-top: 15px; padding-top: 10px; border-top: 1px dashed #ccc; }
        .total-due-label { font-size: 9px; text-transform: uppercase; color: #666; font-weight: bold; }
        .total-due-amount { font-size: 18px; font-weight: bold; color: #681c6a; margin-top: 5px; }

        /* Items Table */
        .items-table { width: 100%; border-collapse: collapse; margin-top: 20px; border: 1px solid #681c6a; }
        .items-table thead { background-color: #681c6a; color: white; }
        .items-table th { padding: 10px 15px; text-align: left; text-transform: uppercase; font-size: 11px; }
        .items-table td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .description-sub { font-size: 10px; color: #777; margin-top: 4px; }

        /* Totals Area */
        .totals-row td { padding: 8px 15px; font-size: 12px; }
        .grand-total { background-color: #f9f9f9; color: #681c6a; font-size: 16px; font-weight: bold; }

        /* Currency fix */
        .rupee { font-family: 'DejaVu Sans', Arial; }

        /* Footer Note */
        .footer-note { margin-top: 30px; padding: 15px; border-left: 4px solid #681c6a; background-color: #fcfcfc; font-style: italic; font-size: 11px; color: #666; }
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
                    <p>Mob: {{ $contact_phone ?? '+91 98423 06487' }}</p>
                    <p>Email: {{ $contact_email ?? 'thirumurugan@gmail.com' }}</p>
                    <p>Web: www.linkaura.co.in</p>
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
                        Namakkal(DT), Pin - 638183
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
                    <table class="meta-table">
                        <tr>
                            <td class="meta-label">Invoice No:</td>
                            <td class="meta-value">#{{ $invoice_no }}</td>
                        </tr>
                        <tr>
                            <td class="meta-label">Date:</td>
                            <td class="meta-value">{{ $date }}</td>
                        </tr>
                    </table>
                    
                    <div class="total-due-box">
                        <div class="total-due-label">Total Amount Due</div>
                        <div class="total-due-amount"><span class="rupee">₹</span>{{ number_format($amount, 2) }}</div>
                    </div>
                </td>
            </tr>
        </table>

        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 70%;">Description</th>
                    <th style="width: 30%; text-align: right;">Amount (<span class="rupee">₹</span>)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="font-bold" style="font-size: 14px;">{{ $plan_name }}</div>
                        <div class="description-sub">{{ $description }}</div>
                    </td>
                    <td class="text-right font-bold" style="font-size: 14px;">
                       <span class="rupee">₹</span>{{ number_format($amount, 2) }}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="totals-row">
                    <td class="text-right font-bold">Subtotal:</td>
                    <td class="text-right font-bold"><span class="rupee">₹</span>{{ number_format($amount, 2) }}</td>
                </tr>
                <tr class="totals-row grand-total">
                    <td class="text-right">TOTAL (INR):</td>
                    <td class="text-right"><span class="rupee">₹</span>{{ number_format($amount, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="footer-note">
            This is a digitally generated invoice and a valid digital certificate issued by 
            <strong>{{ $business_name ?? 'TMinSBP Software Innovation Lab' }}</strong>. 
            No physical signature is required.
        </div>

    </div>
</body>
</html>