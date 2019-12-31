<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token         for security-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Calendar -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    {{-- <link rel="stylesheet" href="{{asset('air-datepicker\dist\css\datepicker.css')}}">
    <script src="{{(asset('air-datepicker\dist\js\datepicker.js'))}}"></script>
    <script src="{{(asset('air-datepicker\dist\js\i18n\datepicker.en.js'))}}"></script> --}}


    {{-- ////////////////////////////////////////////////////////////////// --}}

        <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <script>
        $( function() {
            var minDate = new Date();
            var dateFormat = "mm/dd/yy",
            
            check_in = $( "#check_in" )
                .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                minDate: minDate,
                numberOfMonths: 2,
                
                })
                .on( "change", function() {
                check_out.datepicker( "option", "minDate", getDate( this ) );
                calcDiff();
                }),
            check_out = $( "#check_out" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                minDate: minDate,
                numberOfMonths: 2
            })
            .on( "change", function() {
                check_in.datepicker( "option", "maxDate", getDate( this ) );
                calcDiff();
            });
        
            function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }
        
            return date;
            }
        } );
    </script>

    <script>
        $("#check_in").datepicker({
            timepicker:false,
            dateFormat: "mm/dd/yy"
        });

        $("#check_out").datepicker({
            timepicker:false,
            dateFormat: "mm/dd/yy",
            onSelect: function(dateText, inst) {
                alert(dateText);
            }
        });

        function calcDiff(){
            var check_in =  new Date($("#check_in").val());
            var check_out = new Date($("#check_out").val());
            // var check_in = document.getElementById('check_in').value;
            // var check_out = document.getElementById('check_out').value;

            var timeDifference = check_out.getTime() - check_in.getTime();
            
            var milliSecondsInOneSecond = 1000;
            var secondInOneHour = 3600;
            var hoursInOneDay = 24;

            var daysDiff = timeDifference / (milliSecondsInOneSecond * secondInOneHour * hoursInOneDay)+1;
            
            var final_price = daysDiff * 200;

            // if($houseInfo->id=1){
            //     var Price= daysDiff * 250;
            // }
            // else if ($houseInfo->id = 2) {
            //     var Price = daysDiff * 200;
            // } else {
            //     var Price = daysDiff * 250;
            // }

            // if (confirm("RM" + Price)) {
            //     txt = Price;
            // } else {
            //     txt = Price;
            // }

            // $('#final_price').text(Price);
            // alert("Price RM "+final_price);
            // document.getElementById('final_price').innerHTML = "Monthly Payment = $"+final_price;
            $('#final_price').val("RM " +final_price);
        
        }
    </script>

    {{-- ///////////////////////////////////////////// --}}

    {{-- <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

    <script>
        $(function() {
        var dates = $( "#check_in, #check_out" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onSelect: function( selectedDate ) {
                var option = this.id == "check_in" ? "minDate" : "maxDate",
                    instance = $( this ).data( "datepicker" ),
                    date = $.datepicker.parseDate(
                        instance.settings.dateFormat ||
                        $.datepicker._defaults.dateFormat,
                        selectedDate, instance.settings );
                dates.not( this ).datepicker( "option", option, date );
            }
        });
    });
    </script> --}}
    
    <style>
        * {
          box-sizing: border-box;
        }
        
        .zoom {
          padding: 1px;
          background-color: green;
          transition: transform .2s;
          
          margin: 0 auto;
        }
        
        .zoom:hover {
          -ms-transform: scale(2.5); /* IE 9 */
          -webkit-transform: scale(2.5); /* Safari 3-8 */
          transform: scale(2.5); 
        }
        </style>

{{-- ///////////////////// --}}
<style>
    *{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}
    
    /* Full-width input fields */
    /* input[type=file]{
        width: 90%;
        padding: 12px 20px;
        margin: 8px 26px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size:16px;
    } */
    
    /* Set a style for all buttons */
    /* button {
        background-color: #4CAF50;
        color: white;
        padding: 1px 2px;
        margin: 8px 2px;
        border: none;
        cursor: pointer;
        width: 20%;
        font-size:12px;
    } */

    
    button:hover {
        opacity: 0.8;
    }
    
    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }
    .avatar {
        width: 200px;
        height:200px;
        border-radius: 50%;
    }
    
    /* The Modal (background) */
    .modal {
        display:none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }
    
    /* Modal Content Box */
    .modal-content {
        background-color: #fefefe;
        margin: 4% auto 15% auto;
        border: 1px solid #888;
        width: 40%; 
        padding-bottom: 30px;
    }
    
    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }
    .close:hover,.close:focus {
        color: red;
        cursor: pointer;
    }
    
    /* Add Zoom Animation */
    .animate {
        animation: zoom 0.6s
    }
    @keyframes zoom {
        from {transform: scale(0)} 
        to {transform: scale(1)}
    }
</style>
<style>
    div.container2 {
      width:600px;
      margin: auto;
    }
</style>

</head>
<body>
    <div id="app">
        
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>
    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script> --}}
    
    {{-- <script>
        $('.form-group').on('input',function(){
            var totalSum = 0;
            $('.form-group').each(function(){
                var inputVal = $(this).val();

                var check_in =  new Date($("#check_in").val());
                var check_out = new Date($("#check_out").val());

                var timeDifference = check_out.getTime() - check_in.getTime();
                
                var milliSecondsInOneSecond = 1000;
                var secondInOneHour = 3600;
                var hoursInOneDay = 24;

                var daysDiff = timeDifference / (milliSecondsInOneSecond * secondInOneHour * hoursInOneDay)+1;
                var Price = daysDiff * 200;

                if($.isNumeric(daysDiff)){
                    // totalSum+=parseFloat(inputVal);
                    totalSum+=parseFloat(daysDiff);
                }
            });
            $('#final_price').text(totalSum);
        });
    </script> --}}
</body>

</html>
