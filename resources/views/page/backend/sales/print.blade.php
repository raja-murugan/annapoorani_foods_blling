<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <!-- Site Title -->
    <title>Internet Bill Invoice</title>
    <link rel="stylesheet" href="{{ asset('assets/backend/bill/css/style.css') }}">
</head>

<body>
    <div class="cs-container">
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in" id="download_section">
                <div class="cs-invoice_head cs-type1 cs-mb25">
                    <div class="cs-invoice_left">
                        <p class="cs-invoice_number cs-primary_color cs-mb0 cs-f16"><b class="cs-primary_color">Bill No:</b> # {{ $billno }}</p>
                        <p class="cs-invoice_number cs-primary_color cs-mb0 cs-f16"><b class="cs-primary_color">Bill Type:</b> {{ $sales_type }}</p>
                                <p class="cs-invoice_number cs-primary_color cs-mb0 cs-f16"><b class="cs-primary_color">Date:</b> {{ $date }}</p>
                    </div>
                    <div class="cs-invoice_right cs-text_right">
                        <div class="cs-logo cs-mb5"><img src="{{ asset('assets/backend/img/logo.png') }}" alt="Logo" style="width: 100px"></div>
                        <b class="cs-primary_color">ANNAPORANI FOODS</b>
                        <p>
                            39 3rd cross west, Puthur, Bharthi Nagar, Tiruchirappalli, Tamil Nadu 620017
                        </p>
                    </div>
                </div>
                <div class="cs-table cs-style2">
                    <div class="">
                        <div class="cs-table_responsive">
                            <table>
                                <thead>
                                    <tr class="cs-focus_bg">
                                        <th class="cs-width_5 cs-semi_bold cs-primary_color">Description</th>
                                        <th class="cs-width_5 cs-semi_bold cs-primary_color">Count</th>
                                        <th class="cs-width_2 cs-semi_bold cs-primary_color cs-text_right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($output as $output_arr)
                                    <tr>
                                        <td class="cs-width_5">{{$output_arr['productname'] }}</td>
                                        <td class="cs-width_5">{{$output_arr['quantity'] }} Qty</td>
                                        <td class="cs-width_2 cs-text_right cs-primary_color">Rs. {{$output_arr['price'] }}</td>
                                    </tr>
                                @endforeach
                                    <tr class="cs-focus_bg cs-no_border">
                                        <td class="cs-width_5 cs-text_right cs-primary_color cs-semi_bold"
                                            colspan="2">Total charges:</td>
                                        <td class="cs-width_2 cs-text_right cs-primary_color cs-semi_bold">Rs. ₹ {{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="cs-note">
                    <div class="cs-note_right">
                        <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note:</b></p>
                        <p class="cs-m0">Here we can write a additional notes for the client to get a better
                            understanding of this invoice.</p>
                    </div>
                </div><!-- .cs-note -->
            </div>
            <div class="cs-invoice_btns cs-hide_print">
                <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <path
                            d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                            fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <rect x="128" y="240" width="256" height="208" rx="24.32"
                            ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round"
                            stroke-width="32" />
                        <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                            stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <circle cx="392" cy="184" r="24" />
                    </svg>
                    <span>Print</span>
                </a>
                <button id="download_btn" class="cs-invoice_btn cs-color2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <title>Download</title>
                        <path
                            d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="32" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="32" d="M176 272l80 80 80-80M256 48v288" />
                    </svg>
                    <span>Download</span>
                </button>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/backend/bill/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/bill/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('assets/backend/bill/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('assets/backend/bill/js/main.js') }}"></script>

    
    <script>
        //setTimeout(window.close, 7000);
        window.onload=function(){self.print();} 
        window.onafterprint = function() {
            history.go(-1);
        };
    </script>
</body>

</html>


