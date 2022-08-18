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
        .text-line {
            color: #00b900;
        }
    </style>
</head> 
<body>    
    <main id="app" class="w-100 py-3">
        <div class="container">
            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-none">
                    <input type="text" id="displayName_original" name="line_displayName" class="form-control mb-2" placeholder="" value="Line_name">
                    <input type="text" id="userId" name="line_userId" class="form-control mb-2" placeholder="" value="Line_userID">
                    <input type="text" id="pictureUrl" name="line_thumbnailUrl" class="form-control mb-2" placeholder="" value="Line_image">
                </div>
                <div id="main-order">
                    <div class="mb-4">
                        <select id="orderMenu" class="form-select" name="order_name" aria-label="Default select example">
                            <option selected>โปรดเลือกเมนูเครื่องดื่ม</option>
                            <option value="กาแฟ">กาแฟ</option>
                            <option value="มัชฉะ">มัชฉะ</option>
                            <option value="ช้อคโกแลต">ช้อคโกแลต</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <select id="sweet" class="form-select" name="sweet_level" aria-label="Default select example">
                            <option selected>โปรดเลือกระดับความหวาน</option>
                            <option value="ไม่หวาน">ไม่หวาน</option>
                            <option value="หวานน้อย">หวานน้อย</option>
                            <option value="ปกติ">ปกติ</option>
                            <option value="เพิ่มหวาน">เพิ่มหวาน</option>
                        </select>
                    </div>
                </div><!--#main-order-->
                <div id="order-detail" class="d-none">
                    <div class="mb-2">
                        <label for="displayName" class="form-label mb-0 pb-0 mt-1 text-center d-block text-black-50">
                            ชื่อ
                            <small><br>*สามารถเปลี่ยนแปลงได้</small>
                        </label>
                        <input type="text" name="name" class="form-control text-line text-center" id="displayName" placeholder="ระบุชื่อ" value="Line_name">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label mb-0 pb-0 mt-1 text-center d-block text-black-50">
                            <small>หมายเหตุ (หากมี)</small>
                        </label>
                        <input class="form-control" name="order_note" rows="2" placeholder="หมายเหตุ" value=" ">
                    </div>                
                    <div class="mb-2 text-center">
                        <button id="submit" type="submit" class="btn btn-primary px-4">สั่ง</button>
                    </div>    
                </div><!--#order-detail-->          
            </form>
        </div><!--cointainer-->
    </main>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var selectDetect1 = 0;
        var selectDetect2 = 0;
        $('#orderMenu').change(function () {
        // var job =  $('#orderMenu').val();
        // alert(job);
        selectDetect1 = 1;
        if ( selectDetect1 ==1 && selectDetect2 ==1 ) {
            $( "#main-order" ).addClass( '');
            $( "#main-order" ).addClass( 'd-none');
            $( "#order-detail" ).removeClass( 'd-none');
            
        }
        })
        $('#sweet').change(function () {
        selectDetect2 = 1;
        if ( selectDetect1 ==1 && selectDetect2 ==1 ) {
            $( "#main-order" ).addClass( '');
            $( "#main-order" ).addClass( 'd-none');
            $( "#order-detail" ).removeClass( 'd-none');
        }
        })


        $( "#submit" ).click(function() {
            setTimeout(
            function() 
            {
                closed();
            }, 3000);
        });
        
    </script>

    {{-- <script>
        $('#username').val('new value');
    </script> --}}

<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<script>
  function createUniversalLink() {
    const link1 = liff.permanentLink.createUrl()
    document.getElementById("universalLink1").append(link1)

    liff.permanentLink.setExtraQueryParam('param=9')
    const link2 = liff.permanentLink.createUrl()
    document.getElementById("universalLink2").append(link2)
  }

  async function shareMsg() {
    await liff.shareTargetPicker([
      {
        type: "text",
        text: "This message was sent by ShareTargetPicker"
      }
    ])
  }

  function logOut() {
    liff.logout()
    window.location.reload()
  }

  function closed() {
    liff.closeWindow()
  }

  async function scanCode() {
    const result = await liff.scanCode()
    document.getElementById("scanCode").append(result.value)
  }
  
  function openWindow() {
    liff.openWindow({
      url: "https://line.me",
      external: true
    })
  }

  async function getFriendship() {
    // const friend = await liff.getFriendship()
    // document.getElementById("friendship").append(friend.friendFlag)
    // if (!friend.friendFlag) {
    //   if (confirm("คุณยังไม่ได้เพิ่ม Bot เป็นเพื่อน จะเพิ่มเลยไหม?")) {
    //     window.location = "https://line.me/R/ti/p/@YOUR-BOT-ID"
    //   }
    // }
  }

  async function sendMsg() {
    if (liff.getContext().type !== "none") {
      await liff.sendMessages([
        {
          "type": "sticker",
          "stickerId": 1,
          "packageId": 1
        }
      ])
      alert("Message sent")
    }
  }

  function getContext() {
    if (liff.getContext() != null) {
    //   document.getElementById("type").append(liff.getContext().type)
    //   document.getElementById("viewType").append(liff.getContext().viewType)
    //   document.getElementById("utouId").append(liff.getContext().utouId)
    //   document.getElementById("roomId").append(liff.getContext().roomId)
    //   document.getElementById("groupId").append(liff.getContext().groupId)
    }
  }

  async function getUserProfile() {
    const profile = await liff.getProfile()
    // document.getElementById("pictureUrl").src = profile.pictureUrl
    $('#pictureUrl').val(profile.pictureUrl);
    // document.getElementById("userId").append(profile.userId)
    $('#userId').val(profile.userId);
    // document.getElementById("statusMessage").append(profile.statusMessage)
    // document.getElementById("displayName").append(profile.displayName)
    $('#displayName_original').val(profile.displayName);
    $('#displayName').val(profile.displayName);
    // document.getElementById("decodedIDToken").append(liff.getDecodedIDToken().email)
  }
  
  function getEnvironment() {
    // document.getElementById("os").append(liff.getOS())
    // document.getElementById("language").append(liff.getLanguage())
    // document.getElementById("version").append(liff.getVersion())
    // document.getElementById("accessToken").append(liff.getAccessToken())
    // document.getElementById("isInClient").append(liff.isInClient())
    // if (liff.isInClient()) {
    //   document.getElementById("btnLogOut").style.display = "none"
    // } else {
    //   document.getElementById("btnMsg").style.display = "none"
    //   document.getElementById("btnScanCode").style.display = "none"
    //   document.getElementById("btnClose").style.display = "none"
    // }
  }

  async function main() {
    liff.ready.then(() => {
      document.getElementById("isLoggedIn").append(liff.isLoggedIn())
      if (liff.isLoggedIn()) {
        getEnvironment()
        getUserProfile()
        getContext()
        getFriendship()
        createUniversalLink()
      } else {
        liff.login()
      }
    })
    await liff.init({ liffId: "1657397616-LAZ2BoVP" })
  }
  main()
</script>
</body>
</html>