<script type="text/javascript">

    $(document).on("change keyup","#Amount", function(){

        var fee = $('#Fee').val();
        var amt = $('#Amount').val();
        var paid = $('#Paid').val($('#Amount').val());
        var dis = 0;

        if(paid!=='' && amt!==''){
            paid = parseFloat($('#Amount').val())
            var dis = (((parseFloat(fee)-parseFloat(paid)*100))/fee);
            $('#Lack').val(parseFloat(amt)-parseFloat(paid));

        }
        if(paid=='' && amt==''){
            $('#Paid').val();
            $('#Discount').val();
        }
        if(parseFloat(amt)>parseFloat(fee)){
            $('#Discount').css("color","red");
        }
        else{
            $('#Discount').css({"color":"black"})
        }
        $('#Discount').val(parseInt(dis))
    });

    $(document).on("change keyup","#Discount", function(){
        var fee = parseFloat($('#Fee').val());
        var dis = 0;
        dis = ((fee*parseFloat($(this).val()))) / 100;
        var amt = fee - dis;

        $('#Paid').val(parseInt(amt))
        $('#Amount').val(parseInt(amt))
    });

    $(document).on("change keyup","#Paid", function(){
        b = $('#Amount').val();
        var pay =$('#Paid').val();

        if(pay==''){$('#Lack').val(0)};
        if(pay!=''){
            paid = parseFloat($('#Paid').val());
        }

        if(pay!='' && b!=''){
            var lack = parseFloat(b) - parseFloat(paid)
            $('#Lack').val(parseInt(lack))
        }
        if ($('#Lack').val()<0){
            $('#Lack').css("color","red");
        }
        else{
            $('#Lack').css("color","black");
        }
    });

    $(document).on("change keyup","#Pay", function(){
        b = $('#b').val()
        var pay = $('#Pay').val();
        if(pay==''){
            $('#Lack').val(0)
        }
        if(pay!=''){
            paid = parseFloat($('#Pay').val());
        }
        if(pay!='' && b !='')
        {
            var lack = parseFloat(b) - parseFloat(paid);
            $('#Lack').val(parseInt(lack));
        }
        if($('#Lack').val()<0)
        {
            $('#Lack').css("color","red");
        }
        else{
            $('#Lack').css("color","black");
        }
    });

</script>