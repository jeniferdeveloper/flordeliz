 $(document).ready(function() {

     $('#btn-code').click(function(e) {
         e.preventDefault();
         var dataString = $('form').serialize();

         var formAction = $('form').attr('action');
         var token = $("input[name=_token]").val();
         var code = $("input[name=code]").val();
         //  $.ajaxSetup({
         //      headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
         //  });
         console.log("form action: " + formAction);
         console.log("value code: " + code);
         $.ajax({
             type: "get",
             url: 'create',
             //  data: dataString,
             cache: false,
             success: function(data) {
                 //  console.log(data);
                 console.log(data.result.code);
                 $("input[name=code]").val(data.result.code);
             },
             error: function(data) {
                 console.log(data);
                 console.log("error");
             }
         }, "json");
     });
 });