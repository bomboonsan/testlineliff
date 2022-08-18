<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
        }
        .text-print {
            color: #6a6a6a;
        }
        @media print {
            #app {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
        }
        @page {
            /* size: 20cm 10cm; */
            /* size: 20cm 5cm; */
            size: 100% auto;
            /* margin: 5mm 5mm 0mm 5mm; */
            margin: 0mm 0mm 0mm 0mm;
            
            /* size: auto; */
        }
    </style>
</head> 
<body onload="window.print()">    
    <main id="app" class="w-100 bg-white text-print py-2 px-2">
        <h2 class="fw-bold text-center mb-3">
            ชื่อร้าน
        </h2>
        <table class="table w-100">
            <thead class="fs-5">
              <tr>
                <th scope="col">ชื่อลูกค้า</th>
                <th scope="col" class="text-center">เมนู</th>
                <th scope="col" class="text-end">เวลา</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-0">{{ $order[0]->name }}</td>
                    <td class="border-0 text-center">{{ $order[0]->order_name }} [{{ $order[0]->sweet_level }}]</td>
                    <td class="border-0 text-end">{{ $order[0]->created_at }}</td>
                </tr>
                {{-- <tr>
                    {{ $order[0]->order_note }}
                </tr> --}}
            </tbody>
        </table>
        <small class="w-100 px-1">
            <p>
                <strong class="">เพิ่มเติม</strong> : {{ $order[0]->order_note }}
            </p>
        </small>
    </main>
    <div class="d-print-none">
        <div class="text-center">
            <a class="btn btn-primary" href="{{url('/order/show')}}" role="button">กลับไปที่หน้ารายการ</a>
        </div>        
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>