<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href={{asset('css/app.css')}}>  
        <title>{{config('app.name','MPTemu')}}</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://demo.pisyek.com/room-booking-pro/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://demo.pisyek.com/room-booking-pro/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://demo.pisyek.com/room-booking-pro/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://demo.pisyek.com/room-booking-pro/adminlte/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="https://demo.pisyek.com/room-booking-pro/adminlte/css/skins/_all-skins.min.css">
        <link rel="shortcut icon" href="https://demo.pisyek.com/room-booking-pro/img/favicon.png" type="image/x-icon">
        <link rel="icon" href="https://demo.pisyek.com/room-booking-pro/img/favicon.png" type="image/x-icon">

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        {{-- Js punya barang utk amount --}}
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

        <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
            <style>form{width:70%; margin: 100px auto;}</style>
            <script>
                // $(document).ready(function(){
                //     var minDate = new Date();
                //     var checkDate = new Date();
                //     $("#check_in").datepicker({
                //         showAnim:'drop',
                //         numberOfMonth: 1,
                //         minDate: minDate,
                //         dateFormat:'dd/mm/yy',
                        
                //         onClose: function(selectedDate){
                //             $('#check_out').datepicker("option", "minDate", "selectedDate");
                //             checkDate = selectedDate;
                //         }
                //     });

                //     $("#check_out").datepicker({
                //         showAnim:'drop',
                //         numberOfMonth: 1,
                //         minDate: ,
                        
                //         dateFormat:'dd/mm/yy',
                        
                //         onClose: function(selectedDate){
                //             $('#check_in').datepicker("option", "minDate", "selectedDate");
                //         }
                //     });
                // });
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
                    }),
                check_out = $( "#check_out" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    minDate: minDate,
                    numberOfMonths: 2
                })
                .on( "change", function() {
                    check_in.datepicker( "option", "maxDate", getDate( this ) );
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
function computeLoan(){
    var amount = document.getElementById('amount').value;
    var interest_rate = document.getElementById('interest_rate').value;
    var months = document.getElementById('months').value;
    var interest = (amount * (interest_rate * .01)) / months;
    var payment = ((amount / months) + interest).toFixed(2);
    payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById('payment').innerHTML = "Monthly Payment = $"+payment;
}
</script>

    </head>
    <body>
        @include('inc.navbar')
        
        <div class ="container">
            @include('sidebar')         <!-- utk success or error messages -->
            @yield('content')
        </div>

        <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script> 
        
        <script>
            $("#check_in").datepicker({
                timepicker:false,
                dateFormat: "mm/dd/yy"
            });

            $("#check_out").datepicker({
                timepicker:false,
                dateFormat: "mm/dd/yy"
            });

            function calcDiff(){
                var check_in =  new Date($("#check_in").val());
                var check_out = new Date($("#check_out").val());

                var timeDifference = check_out.getTime() - check_in.getTime();
                
                var milliSecondsInOneSecond = 1000;
                var secondInOneHour = 3600;
                var hoursInOneDay = 24;
 
                var daysDiff = timeDifference / (milliSecondsInOneSecond * secondInOneHour * hoursInOneDay);
                
                var Price = daysDiff * 200;
                if (confirm("RM" + Price)) {
                    txt = Price;
                } else {
                    txt = Price;
                }
                // document.getElementById("demo").innerHTML = txt;    

            }
        </script>





    </body>
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------- -->
<script type="text/javascript">
    $(function(){
        $('.amount').mask('#,###.##',{reverse : true}); 
    
        //function that get the total amount by each class
        var total_amount = function(){
            var sum = 0;
            $('.amount').each(function(){
                var num = $(this).val().replace(',','');
    
                if(num !=0){
                    sum += parseFloat(num);
                }
            });
            $('#total_amount').val(sum);
        }
    
        //keyup handler
        $('.amount').keyup(function(){
             total_amount();
        });
    
    });
</script>           
    
</html>


