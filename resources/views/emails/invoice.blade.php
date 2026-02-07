<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .header { text-align: center; margin-bottom: 20px; }
        .invoice-box { width: 100%; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f2f2f2; text-align: left; }
        td, th { padding: 10px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ $logo }}" width="150">
        <h2>Invoice</h2>
    </div>

    <table style="border: none;">
        <tr>
            <td>
                <strong>From:</strong><br>{!! nl2br(e($from_address)) !!}
            </td>
            <td style="text-align: right;">
                <strong>To:</strong><br>{!! nl2br(e($to_address)) !!}
            </td>
        </tr>
    </table>

    <p><strong>Invoice No:</strong> {{ $invoice_no }}<br>
    <strong>Date:</strong> {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th style="text-align: right;">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>{{ $plan_name }}</strong><br>
                    <small>{{ $description }}</small>
                </td>
                <td style="text-align: right;">₹{{ number_format($amount, 2) }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td style="text-align: right;"><strong>Total:</strong></td>
                <td style="text-align: right;"><strong>₹{{ number_format($amount, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>