<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <!--[if mso]>
    <xml>
    <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        <o:AllowPNG/>
    </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<![endif]-->

</head>
<body>
    <div class="container">
       <div class="row mt-5">
           <div class="col-md-12">
               <h4 class="text-info text-center"> You Have Been Registered in {{ config('settings.app_name') }}</h4>
               <h5 class="text-center">Please Use Below Credentials to Login</h5>
           </div>
       </div>
        <div class="row">
            <div class="col-md-4 offset-4 mt-4">
                <h6>Email : - {{ $data['user']['email'] }}</h6>
                <h6>Password : - 123456789 </h6>
                <a href="{{ asset('') }}" target="_blank">Login</a>
            </div>
        </div>
    </div>
</body>
</html>
