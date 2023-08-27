
var bkash_otp_hidden =  $('.bkash-otp').hide();

$('.bkash-confirm .second-confirm').hide();

$('.bkash-confirm .third-confirm').hide();



$('.bkash-confirm .fist-submit').on('click', function(){

    
    var bkashWalletNo = document.getElementById('bkash_phone').value;
    var bkashPinNo = document.getElementById('bkash-pin').value;

    
        if(bkashWalletNo == '0'+1619777283 && bkashPinNo == 12121 ){

            
            // $('.bkash-confirm a').text('CONFIRM');
            $('.bkash-error-message').hide();
            $('.bkash-otp').show();
            
            // hide first submit button and active confirm button
            $('.bkash-confirm .fist-submit').hide();
            $('.bkash-confirm .second-confirm').show();

            //now check the otp
            $('.bkash-confirm .second-confirm').on('click', function(event){

                var bkashOTP = document.getElementById('bkash-otp').value;
                
                if(bkashOTP != 123456){

                    $('.bkash-error-message').text('Bkash SandBox OTP ERROR!');
                    $('.bkash-error-message').show();
                    
                    $('#bkash-otp').val('');
                    
                }else{
                    
                    $('#bkash-payment-form').submit();
                    
                }
                
            });

            
        }else{
            $('.bkash-error-message').text('Bkash SandBox Wallet and Pin ERROR!');
            $('.bkash-error-message').show();
        
        }

    

})

// printing a div after successful donation (Raw JS)
document.getElementById('print-button').addEventListener('click', function() {
    var contentToPrint = document.getElementById('invoice-box').innerHTML;
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Print</title></head><body>');
    printWindow.document.write(contentToPrint);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print(); 
});
