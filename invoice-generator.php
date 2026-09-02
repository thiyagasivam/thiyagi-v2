<?php include 'header.php';?>

<?php
// Invoice Generator PHP Backend
session_start();

// Initialize invoice data
if (!isset($_SESSION['invoice'])) {
    $_SESSION['invoice'] = [
        'invoice_number' => 'INV-' . strtoupper(uniqid()),
        'date' => date('Y-m-d'),
        'due_date' => date('Y-m-d', strtotime('+7 days')),
        'from' => [
            'name' => 'Your Company Name',
            'address' => '123 Business Street',
            'city' => 'Cityville',
            'state' => 'ST',
            'zip' => '12345',
            'email' => 'contact@yourcompany.com',
            'phone' => '(123) 456-7890'
        ],
        'to' => [
            'name' => 'Client Name',
            'address' => '456 Client Avenue',
            'city' => 'Client City',
            'state' => 'CC',
            'zip' => '67890',
            'email' => 'client@example.com'
        ],
        'items' => [
            [
                'description' => 'Website Design',
                'quantity' => 1,
                'rate' => 1200.00,
                'tax' => 0
            ],
            [
                'description' => 'Hosting (1 year)',
                'quantity' => 1,
                'rate' => 300.00,
                'tax' => 0
            ]
        ],
        'tax_rate' => 10,
        'notes' => 'Thank you for your business!',
        'terms' => 'Payment due within 7 days'
    ];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_invoice'])) {
        // Save invoice details
        $_SESSION['invoice'] = array_merge($_SESSION['invoice'], $_POST['invoice']);
    } elseif (isset($_POST['add_item'])) {
        // Add new item
        $_SESSION['invoice']['items'][] = [
            'description' => '',
            'quantity' => 1,
            'rate' => 0,
            'tax' => 0
        ];
    } elseif (isset($_POST['remove_item'])) {
        // Remove item
        $index = $_POST['remove_item'];
        if (isset($_SESSION['invoice']['items'][$index])) {
            array_splice($_SESSION['invoice']['items'], $index, 1);
        }
    } elseif (isset($_POST['generate_pdf'])) {
        // Generate PDF (placeholder - would use a library like TCPDF or Dompdf)
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="invoice_'.$_SESSION['invoice']['invoice_number'].'.pdf"');
        // In a real implementation, you would generate the PDF here
        exit;
    } elseif (isset($_POST['reset_invoice'])) {
        // Reset invoice
        unset($_SESSION['invoice']);
        header('Location: '.$_SERVER['PHP_SELF']);
        exit;
    }
}

// Calculate totals
$subtotal = 0;
foreach ($_SESSION['invoice']['items'] as $item) {
    $subtotal += $item['quantity'] * $item['rate'];
}
$tax = $subtotal * ($_SESSION['invoice']['tax_rate'] / 100);
$total = $subtotal + $tax;
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Invoice Generator 2026 - Create Professional Bills in Minutes</title>
<meta name="description" content="Generate customizable invoices with taxes, discounts, and payment terms (2026). Download as PDF/Excel or send directly to clients - No accounting skills needed!">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: white !important;
                color: black !important;
            }
            .container {
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .invoice-container {
                box-shadow: none !important;
                border: none !important;
            }
        }
        .invoice-container {
            min-height: 29.7cm;
        }
        .item-row:hover .remove-item {
            opacity: 1;
        }
    </style>


<body class="bg-gray-100">
    <div class="container mx-auto p-4 max-w-6xl">
        <h1 class="text-3xl font-bold text-center mb-6 text-blue-600">Invoice Generator</h1>
        
        <form method="POST" class="no-print">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Invoice Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Invoice Number</label>
                        <input type="text" name="invoice[invoice_number]" value="<?= htmlspecialchars($_SESSION['invoice']['invoice_number']) ?>" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Date</label>
                        <input type="date" name="invoice[date]" value="<?= htmlspecialchars($_SESSION['invoice']['date']) ?>" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Due Date</label>
                        <input type="date" name="invoice[due_date]" value="<?= htmlspecialchars($_SESSION['invoice']['due_date']) ?>" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Tax Rate (%)</label>
                        <input type="number" name="invoice[tax_rate]" value="<?= htmlspecialchars($_SESSION['invoice']['tax_rate']) ?>" 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800">From (Seller)</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Name</label>
                            <input type="text" name="invoice[from][name]" value="<?= htmlspecialchars($_SESSION['invoice']['from']['name']) ?>" 
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Address</label>
                            <input type="text" name="invoice[from][address]" value="<?= htmlspecialchars($_SESSION['invoice']['from']['address']) ?>" 
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2">City</label>
                                <input type="text" name="invoice[from][city]" value="<?= htmlspecialchars($_SESSION['invoice']['from']['city']) ?>" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">State</label>
                                <input type="text" name="invoice[from][state]" value="<?= htmlspecialchars($_SESSION['invoice']['from']['state']) ?>" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">ZIP</label>
                                <input type="text" name="invoice[from][zip]" value="<?= htmlspecialchars($_SESSION['invoice']['from']['zip']) ?>" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Email</label>
                                <input type="email" name="invoice[from][email]" value="<?= htmlspecialchars($_SESSION['invoice']['from']['email']) ?>" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Phone</label>
                                <input type="tel" name="invoice[from][phone]" value="<?= htmlspecialchars($_SESSION['invoice']['from']['phone']) ?>" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800">To (Client)</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Name</label>
                            <input type="text" name="invoice[to][name]" value="<?= htmlspecialchars($_SESSION['invoice']['to']['name']) ?>" 
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Address</label>
                            <input type="text" name="invoice[to][address]" value="<?= htmlspecialchars($_SESSION['invoice']['to']['address']) ?>" 
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2">City</label>
                                <input type="text" name="invoice[to][city]" value="<?= htmlspecialchars($_SESSION['invoice']['to']['city']) ?>" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">State</label>
                                <input type="text" name="invoice[to][state]" value="<?= htmlspecialchars($_SESSION['invoice']['to']['state']) ?>" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">ZIP</label>
                                <input type="text" name="invoice[to][zip]" value="<?= htmlspecialchars($_SESSION['invoice']['to']['zip']) ?>" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Email</label>
                            <input type="email" name="invoice[to][email]" value="<?= htmlspecialchars($_SESSION['invoice']['to']['email']) ?>" 
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Items</h2>
                    <button type="submit" name="add_item" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                        <i class="fas fa-plus mr-2"></i>Add Item
                    </button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2 px-4">Description</th>
                                <th class="text-right py-2 px-4">Qty</th>
                                <th class="text-right py-2 px-4">Rate</th>
                                <th class="text-right py-2 px-4">Tax</th>
                                <th class="text-right py-2 px-4">Amount</th>
                                <th class="text-right py-2 px-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['invoice']['items'] as $index => $item): ?>
                            <tr class="border-b item-row hover:bg-gray-50">
                                <td class="py-2 px-4">
                                    <input type="text" name="invoice[items][<?= $index ?>][description]" 
                                           value="<?= htmlspecialchars($item['description']) ?>" 
                                           class="w-full px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </td>
                                <td class="py-2 px-4">
                                    <input type="number" name="invoice[items][<?= $index ?>][quantity]" 
                                           value="<?= htmlspecialchars($item['quantity']) ?>" min="1" step="1"
                                           class="w-20 px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500 text-right">
                                </td>
                                <td class="py-2 px-4">
                                    <input type="number" name="invoice[items][<?= $index ?>][rate]" 
                                           value="<?= htmlspecialchars($item['rate']) ?>" min="0" step="0.01"
                                           class="w-24 px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500 text-right">
                                </td>
                                <td class="py-2 px-4">
                                    <select name="invoice[items][<?= $index ?>][tax]" 
                                            class="w-20 px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">
                                        <option value="0" <?= $item['tax'] == 0 ? 'selected' : '' ?>>No</option>
                                        <option value="1" <?= $item['tax'] == 1 ? 'selected' : '' ?>>Yes</option>
                                    </select>
                                </td>
                                <td class="py-2 px-4 text-right">
                                    $<?= number_format($item['quantity'] * $item['rate'], 2) ?>
                                </td>
                                <td class="py-2 px-4 text-right">
                                    <button type="submit" name="remove_item" value="<?= $index ?>" 
                                            class="remove-item opacity-0 text-red-500 hover:text-red-700 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Notes & Terms</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Notes</label>
                        <textarea name="invoice[notes]" rows="3" 
                                  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($_SESSION['invoice']['notes']) ?></textarea>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Terms</label>
                        <textarea name="invoice[terms]" rows="3" 
                                  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($_SESSION['invoice']['terms']) ?></textarea>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap justify-between gap-4 mb-6 no-print">
                <button type="submit" name="save_invoice" 
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition flex-1">
                    <i class="fas fa-save mr-2"></i>Save Invoice
                </button>
                <button type="submit" name="generate_pdf" 
                        class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition flex-1">
                    <i class="fas fa-file-pdf mr-2"></i>Generate PDF
                </button>
                <button type="submit" name="reset_invoice" 
                        class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition flex-1">
                    <i class="fas fa-trash-alt mr-2"></i>Reset Invoice
                </button>
            </div>
        </form>

        <!-- Invoice Preview -->
        <div class="invoice-container bg-white rounded-lg shadow-md p-8 mb-6">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($_SESSION['invoice']['from']['name']) ?></h2>
                    <p class="text-gray-600"><?= htmlspecialchars($_SESSION['invoice']['from']['address']) ?></p>
                    <p class="text-gray-600"><?= htmlspecialchars($_SESSION['invoice']['from']['city']) ?>, <?= htmlspecialchars($_SESSION['invoice']['from']['state']) ?> <?= htmlspecialchars($_SESSION['invoice']['from']['zip']) ?></p>
                    <p class="text-gray-600"><?= htmlspecialchars($_SESSION['invoice']['from']['email']) ?></p>
                    <p class="text-gray-600"><?= htmlspecialchars($_SESSION['invoice']['from']['phone']) ?></p>
                </div>
                <div class="text-right">
                    <h1 class="text-3xl font-bold text-blue-600 mb-2">INVOICE</h1>
                    <p class="text-gray-600"><span class="font-semibold">Invoice #:</span> <?= htmlspecialchars($_SESSION['invoice']['invoice_number']) ?></p>
                    <p class="text-gray-600"><span class="font-semibold">Date:</span> <?= date('F j, Y', strtotime($_SESSION['invoice']['date'])) ?></p>
                    <p class="text-gray-600"><span class="font-semibold">Due Date:</span> <?= date('F j, Y', strtotime($_SESSION['invoice']['due_date'])) ?></p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Bill To:</h3>
                    <p class="text-gray-600 font-semibold"><?= htmlspecialchars($_SESSION['invoice']['to']['name']) ?></p>
                    <p class="text-gray-600"><?= htmlspecialchars($_SESSION['invoice']['to']['address']) ?></p>
                    <p class="text-gray-600"><?= htmlspecialchars($_SESSION['invoice']['to']['city']) ?>, <?= htmlspecialchars($_SESSION['invoice']['to']['state']) ?> <?= htmlspecialchars($_SESSION['invoice']['to']['zip']) ?></p>
                    <p class="text-gray-600"><?= htmlspecialchars($_SESSION['invoice']['to']['email']) ?></p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Payment Method:</h3>
                    <p class="text-gray-600">Bank Transfer</p>
                    <p class="text-gray-600">Account Name: <?= htmlspecialchars($_SESSION['invoice']['from']['name']) ?></p>
                    <p class="text-gray-600">Account Number: XXXX-XXXX-XXXX</p>
                    <p class="text-gray-600">Bank Name: Example Bank</p>
                </div>
            </div>

            <div class="mb-8">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="text-left py-3 px-4 border">Description</th>
                            <th class="text-right py-3 px-4 border">Qty</th>
                            <th class="text-right py-3 px-4 border">Rate</th>
                            <th class="text-right py-3 px-4 border">Tax</th>
                            <th class="text-right py-3 px-4 border">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['invoice']['items'] as $item): ?>
                        <tr class="border-b">
                            <td class="py-3 px-4 border"><?= htmlspecialchars($item['description']) ?></td>
                            <td class="py-3 px-4 border text-right"><?= htmlspecialchars($item['quantity']) ?></td>
                            <td class="py-3 px-4 border text-right">$<?= number_format($item['rate'], 2) ?></td>
                            <td class="py-3 px-4 border text-right"><?= $item['tax'] ? 'Yes' : 'No' ?></td>
                            <td class="py-3 px-4 border text-right">$<?= number_format($item['quantity'] * $item['rate'], 2) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end">
                <div class="w-full md:w-1/3">
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="font-semibold">Subtotal:</span>
                            <span>$<?= number_format($subtotal, 2) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Tax (<?= $_SESSION['invoice']['tax_rate'] ?>%):</span>
                            <span>$<?= number_format($tax, 2) ?></span>
                        </div>
                        <div class="flex justify-between border-t pt-2">
                            <span class="font-bold">Total:</span>
                            <span class="font-bold">$<?= number_format($total, 2) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Notes</h3>
                    <p class="text-gray-600"><?= nl2br(htmlspecialchars($_SESSION['invoice']['notes'])) ?></p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Terms</h3>
                    <p class="text-gray-600"><?= nl2br(htmlspecialchars($_SESSION['invoice']['terms'])) ?></p>
                </div>
            </div>
        </div>

        <div class="text-center no-print">
            <button onclick="window.print()" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-print mr-2"></i>Print Invoice
            </button>
        </div>
    </div>

<?php include 'footer.php';?>



