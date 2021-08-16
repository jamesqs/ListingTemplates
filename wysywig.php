<?
#logo: https://storage.googleapis.com/saas-shopiago-staticstorage/assets/listing-templates/Supporting_text_only_black_CMYK_print_70.jpg
#ebayurl: https://www.ebay.co.uk/str/britishredcross
#ee2a24

?>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
  <div class="container mx-auto border-2 h-full">
    <div class="border-2 h-10 w-20" draggable=true>a</div>
  </div>


  <script>
  $(document).ready(function(){
    $(".layout").click(function(e){
      $(".layout").removeClass("bg-gray-100");
      $(this).addClass("bg-gray-100");
    });

    $("#getpreview").click(function(e){
      e.preventDefault();

      $.ajax({
        method: "POST",
        url: "http://apps.shopiago.git/preview.php",
        data: $("form").serialize()
      })
      .done(function( msg ) {
        $("#preview").html(msg);

      });

    });

    $("#selectall").click(function(e){
      e.preventDefault();

      $("input[type='checkbox']").attr('checked', 'checked');
    });

    $("input[name='primarycolor']").blur(function(){
      var $color = $(this).val();
      $("#pmc").attr('style', 'background: '+ $color +';');
    });

    $("input[name='ebayurl']").blur(function(){
      var ebayurl = $("input[name='ebayurl']").val();

      $.ajax({
        method: "POST",
        url: "http://apps.shopiago.git/categories.php",
        data: { ebayurl: ebayurl }
      })
      .done(function( msg ) {
        $("div#categories").html("");

        $.each( msg, function( key, value ) {
          //alert( key + ": " + value.label );
          $("div#categories").append('<div class="px-3 py-2 bg-gray-100 rounded-xl mr-3 mb-3"><input type="checkbox" name="category[' + value.label + ']" value="' + value.href + '" class="mr-1">' + value.label + '</div>');
        });
      });
    });




  });
  </script>
</body>
</html>
