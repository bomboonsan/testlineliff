<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
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
<body>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width: 5%" class="text-center">ลำดับ</th>
                <th scope="col" class="text-center">เมนู</th>
                <th scope="col" class="text-center">ชื่อลูกค้า</th>
                <th scope="col" class="text-center">ความหวาน</th>
                <th scope="col" class="text-center">เพิ่มเติม</th>
                <th scope="col" class="text-center">เวลา</th>
                <th scope="col" class="text-center"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($orders as $key=>$item)
                <tr>
                    <th scope="row" class="text-center">{{ ++$key }}</th>
                    <td class="text-center">
                        {{-- <span title="{{ $item->id }}">{{ $item->order_name }}</span> --}}
                        {{-- <a href="{{url('/print/'.$item->id)}}">{{ $item->order_name }}</a> --}}
                        {{ $item->order_name }}
                    </td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">{{ $item->sweet_level }}</td>
                    <td class="text-center">{{ $item->order_note }}</td>
                    <td class="text-center">{{ $item->created_at }}</td>
                    <td class="d-print-none">       
                        <a class="text-black-50" href="{{url('/print/'.$item->id)}}"><i class="fa-solid fa-print fs-4"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div><!--cotnainer-->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>