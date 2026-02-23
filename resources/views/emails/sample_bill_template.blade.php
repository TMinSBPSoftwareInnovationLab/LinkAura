<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('assets/js/tailwind-browser@4.js') }}"></script>
  </head>
  <body>
    <main class="m-10">
        <!-- header section-->
        <div class="flex flex-col md:flex-row w-full gap-4 border-1 border-[#681c6a] ">

            <div class="w-full md:w-[70%] p-4">
                <img src="{{ asset('images/linkAuraLogo300.png') }}" class="w-35 h-35"/>
                <p class="text-[#681c6a] font-bold text-[24px]">
                    TMinSBP Software Innovation Lab
                    <br>
                    <span class="text-[18px] text-[#000b58]">A Product of LinkAura</span>
                </p>
            </div>

            <div class="w-full md:w-[30%] bg-[#681c6a] p-4 flex flex-col justify-center text-left">
                <h1 class="text-3xl font-bold text-white mb-2">INVOICE</h1>
                <p class="text-white font-semibold">Mobile : +91 98423 06487</p>
                <p class="text-white font-semibold">Email: thirumurugan8892@gmail.com</p>
                <p class="text-white font-semibold">website: www.linkaura.co.in</p>
            </div>

        </div>
        <!-- header section /.-->

        <!-- address -->
        <div class="flex flex-col md:flex-row w-full border-x-1 border-b-1 border-[#681c6a]">
    
            <div class="w-full md:w-[35%] p-4 border-b-1 md:border-b-0 md:border-r-1 border-[#681c6a]">
                <h3 class="text-[#681c6a] font-bold uppercase text-xs mb-2">From:</h3>
                <p class="font-bold text-gray-800">TMinSBP Software Innovation Lab</p>
                <p class="text-[#681c6a]">
                    <span class="text-[18px] text-[#000b58]">A Product of LinkAura</span>
                </p>
                <p class="text-sm text-gray-600 leading-relaxed">
                    No 288, Smart Bazar Near,<br>
                    Anangur Corner, B.Komarapalayam,<br>
                    B.Komarapalayam(Tk), Namakkal(DT), Pincode - 638183<br>
                    India
                </p>
            </div>

            <div class="w-full md:w-[35%] p-4 border-b-1 md:border-b-0 md:border-r-1 border-[#681c6a]">
                <h3 class="text-[#681c6a] font-bold uppercase text-xs mb-2">To:</h3>
                <p class="font-bold text-gray-800">{{ $company_name ?? 'Client Company Name' }}</p>
                <p class="text-sm text-gray-600 leading-relaxed">
                    {!! nl2br(e($from_address ?? "Client Address Details\nCity, State")) !!}
                </p>
            </div>

            <div class="w-full md:w-[30%] p-4 flex flex-col justify-between bg-gray-50">
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="font-bold text-[#681c6a]">Invoice No:</span>
                        <span class="text-gray-700">#{{ $invoice_no ?? '2026-001' }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="font-bold text-[#681c6a]">Issue Date:</span>
                        <span class="text-gray-700">{{ $date ?? '23/02/2026' }}</span>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-t border-dashed border-gray-300">
                    <p class="text-xs uppercase text-gray-500 font-bold">Total Amount due</p>
                    <p class="text-2xl font-black text-[#681c6a]">₹{{ number_format($amount ?? 0, 2) }}</p>
                </div>
            </div>

        </div>
        <!-- address /.-->

        <!-- Purchased details -->
        <div class="w-full mt-4 border-1 border-[#681c6a] overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#681c6a] text-white">
                        <th class="p-4 uppercase text-sm tracking-wider w-[70%]">Description</th>
                        <th class="p-4 uppercase text-sm tracking-wider text-right w-[30%]">Amount (₹)</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr class="border-b border-gray-200">
                        <td class="p-4">
                            <p class="font-bold text-gray-800">{{ $plan_name ?? 'Plan Name' }}</p>
                            <p class="text-xs text-gray-500">{{ $description ?? 'Service description details go here' }}</p>
                        </td>
                        <td class="p-4 text-right font-semibold">
                            ₹{{ number_format($amount ?? 0, 2) }}
                        </td>
                    </tr>
                    </tbody>
                <tfoot>
                    <tr class="text-gray-600">
                        <td class="p-4 text-right font-bold text-sm">Subtotal:</td>
                        <td class="p-4 text-right font-bold text-sm">₹{{ number_format($amount ?? 0, 2) }}</td>
                    </tr>
                    <tr class="bg-gray-50 text-[#681c6a]">
                        <td class="p-4 text-right font-black text-lg">Total (INR):</td>
                        <td class="p-4 text-right font-black text-lg">₹{{ number_format($amount ?? 0, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-10 p-4 border-l-4 border-[#681c6a] bg-gray-50">
            <p class="text-sm text-gray-600 italic">
                This is a digitally generated invoice and a valid digital certificate issued by 
                <span class="font-bold text-[#681c6a]">TMinSBP Software Innovation Lab</span>. 
                No physical signature is required.
            </p>
        </div>
        <!-- Purchased details /.-->

    </main>
  </body>
</html>