<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()"> Pay </button> 
</form>
<!-- place below the html form -->
<script>
 /*  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'paste your key here',
      email: 'customer@email.com',
      amount: 10000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  } */
</script>
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
       //key: 'pk_test_8aac5554eab54672d05a091992ba18918bdf7b36', //tesdt key
	   key: 'pk_live_ff9da0378cea58ecfafbfa2d6befd3da90e64255', //tesdt key
	   //key: 'sk_live_74136133d991099e7d09fda975479ae7e42b991b',
      email: 'c.k.roy90@email.com',
      amount: 100,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: 'Stephen',
      lastname: 'King',
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "roy",
                variable_name: "9716799201",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  } 
  </script>