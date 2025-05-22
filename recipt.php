<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            width: 80mm; /* Standard receipt printer width */
            margin: 0 auto;
            padding: 5mm;
        }
        .receipt {
            width: 100%;
            margin: auto;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 16px;
            margin: 5px 0;
            font-weight: bold;
        }
        .header p {
            margin: 3px 0;
            font-size: 10px;
        }
        .divider {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
        .transaction-info {
            margin-bottom: 10px;
        }
        .transaction-info p {
            margin: 3px 0;
        }
        .items {
            width: 100%;
            margin-bottom: 10px;
        }
        .items th {
            text-align: left;
            padding: 2px 0;
            border-bottom: 1px solid #000;
        }
        .items td {
            padding: 3px 0;
        }
        .items .qty {
            width: 15%;
        }
        .items .desc {
            width: 55%;
        }
        .items .price {
            width: 30%;
            text-align: right;
        }
        .totals {
            width: 100%;
            margin-top: 10px;
        }
        .totals td {
            padding: 3px 0;
        }
        .totals .label {
            text-align: right;
            padding-right: 10px;
        }
        .totals .value {
            text-align: right;
            font-weight: bold;
        }
        .footer {
            margin-top: 15px;
            text-align: center;
            font-size: 10px;
        }
        .barcode {
            text-align: center;
            margin: 10px 0;
            font-family: 'Libre Barcode 128', cursive;
            font-size: 24px;
        }
        @media print {
            body {
                width: 80mm;
                margin: 0;
                padding: 5mm;
            }
            .no-print {
                display: none;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap" rel="stylesheet">
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h1>CARSHOP</h1>
            <p>234 Jekadafari Gombe, Gombe State</p>
            <p>Phone: 9122190440 | Email: info@carshop.com</p>
            <p>VAT Reg No: CS123456789</p>
        </div>
        
        <div class="divider"></div>
        
        <div class="transaction-info">
            <p><strong>Receipt No:</strong> CS-<span id="receiptNo">82456</span></p>
            <p><strong>Date:</strong> <span id="receiptDate">12/05/2025 14:30</span></p>
            <p><strong>Cashier:</strong> <span id="cashier">Admin</span></p>
            <p><strong>Customer:</strong> <span id="customer">Guest Customer</span></p>
        </div>
        
        <div class="divider"></div>
        
        <table class="items">
            <thead>
                <tr>
                    <th class="qty">QTY</th>
                    <th class="desc">DESCRIPTION</th>
                    <th class="price">AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>BMW 7 Series (2023)</td>
                    <td class="price">₦68,900.00</td>
                </tr>
                <tr>
                    <td colspan="3">VIN: WBA7E2C00JG287541</td>
                </tr>
                <tr>
                    <td colspan="3">Color: Black | Mileage: 12,000</td>
                </tr>
            </tbody>
        </table>
        
        <div class="divider"></div>
        
        <table class="totals">
            <tr>
                <td class="label">Subtotal:</td>
                <td class="value">₦68,900.00</td>
            </tr>
            <tr>
                <td class="label">Tax (5%):</td>
                <td class="value">₦3,445.00</td>
            </tr>
            <tr>
                <td class="label">Documentation Fee:</td>
                <td class="value">₦5,000.00</td>
            </tr>
            <tr>
                <td class="label">Total:</td>
                <td class="value">₦77,345.00</td>
            </tr>
            <tr>
                <td class="label">Payment Method:</td>
                <td class="value">Credit Card</td>
            </tr>
            <tr>
                <td class="label">Amount Paid:</td>
                <td class="value">₦77,345.00</td>
            </tr>
            <tr>
                <td class="label">Change:</td>
                <td class="value">₦0.00</td>
            </tr>
        </table>
        
        <div class="divider"></div>
        
        <div class="barcode">*CS82456*</div>
        
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>Items can be exchanged within 7 days with original receipt</p>
            <p>All sales are final after 30 days</p>
            <p>www.carshop.com</p>
        </div>
    </div>
    
    <div class="no-print" style="margin-top: 20px; text-align: center;">
        <button onclick="window.print()">Print Receipt</button>
    </div>
    
    <script>
        // Generate random receipt number and set current date/time
        document.addEventListener('DOMContentLoaded', function() {
            // Generate a random 5-digit receipt number
            const receiptNo = Math.floor(10000 + Math.random() * 90000);
            document.getElementById('receiptNo').textContent = receiptNo;
            document.querySelector('.barcode').textContent = `*CS${receiptNo}*`;
            
            // Set current date and time
            const now = new Date();
            const dateStr = `${now.getDate().toString().padStart(2, '0')}/${
                (now.getMonth()+1).toString().padStart(2, '0')}/${
                now.getFullYear()} ${
                now.getHours().toString().padStart(2, '0')}:${
                now.getMinutes().toString().padStart(2, '0')}`;
            document.getElementById('receiptDate').textContent = dateStr;
            
            // Try to get car details from URL
            const urlParams = new URLSearchParams(window.location.search);
            const carModel = urlParams.get('car');
            if (carModel) {
                // In a real app, you would fetch the car details from your database
                const carDetails = {
                    'bmw-7-series': { name: 'BMW 7 Series (2023)', price: '₦68,900.00' },
                    'porsche-911': { name: 'Porsche 911 (2022)', price: '₦112,500.00' }
                };
                
                if (carDetails[carModel]) {
                    document.querySelector('.items tbody td:nth-child(2)').textContent = carDetails[carModel].name;
                    document.querySelector('.items tbody .price').textContent = carDetails[carModel].price;
                    
                    // Update subtotal and total
                    const price = parseFloat(carDetails[carModel].price.replace(/[^\d.]/g, ''));
                    const tax = price * 0.05;
                    const total = price + tax + 5000;
                    
                    document.querySelector('.totals tr:nth-child(1) .value').textContent = carDetails[carModel].price;
                    document.querySelector('.totals tr:nth-child(2) .value').textContent = `₦${tax.toFixed(2)}`;
                    document.querySelector('.totals tr:nth-child(4) .value').textContent = `₦${total.toFixed(2)}`;
                    document.querySelector('.totals tr:nth-child(6) .value').textContent = `₦${total.toFixed(2)}`;
                }
            }
        });
    </script>
</body>
</html>