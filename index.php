<?
#logo: https://storage.googleapis.com/saas-shopiago-staticstorage/assets/listing-templates/Supporting_text_only_black_CMYK_print_70.jpg
#ebayurl: https://www.ebay.co.uk/str/britishredcross
#ee2a24

$generatorUrl="http://shopiago.application.triplajam.com";
//$generatorUrl="http://apps.shopiago.git";

?>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body class="">
  <!-- modal for code & preview -->
  <div id="modal" class="fixed w-full h-full z-40 hidden">
    <div id="hover" class="w-full h-full bg-black bg-opacity-50 fixed top-0 z-30"></div>
    <div id="content" class="w-11/12 m-auto mt-2 bottom-auto h-5/6 border-2 bg-white z-40 absolute left-0 right-0 overflow-y-auto"></div>
    <div id="close" class="bg-red-700 text-white text-md absolute top-2 font-black right-2 z-50 w-10 h-10 text-center rounded-full leading-10 cursor-pointer">x</div>
  </div>

  <div class="container mx-auto mb-16">
    <form>
      <img src="https://app.shopiago.com/assets/app-images/main-logo.png" class="mt-5 ml-1 w-32" />

      <div class=" p-6">
        <h1 class="font-black text-3xl mb-5">Template Generator</h1>

        <!-- input: kategóriák, cég url, elsődleges, másodlagos szín, template elrendezés, custom textek, description alá text, slogan, logo url-->

        <h2 class="border-b-2 border-blue-400 inline pb-1 font-black text-xl">Basic data</h2>
        <div class="gap-x-6 gap-y-3 grid grid-cols-2 mt-5">
          <div class="flex">
            <label class="h-10 leading-10">eBay site URL</label><input name="ebayurl" type="text" class="rounded-xl bg-gray-100 ml-3 h-10 flex-auto" />
          </div>
          <div class="flex">
            <label class="h-10 leading-10">SellerId</label><input name="sellerid" type="text" class="rounded-xl bg-gray-100 ml-3 h-10 flex-auto"/>
          </div>
          <div class="flex">
            <label class="h-10 leading-10">Logo URL</label><input name="logourl" type="text" class="rounded-xl bg-gray-100 ml-3 h-10 flex-auto"/>
          </div>
          <div class="flex">
            <label class="h-10 leading-10">Slogan</label><input name="slogan" type="text" class="rounded-xl bg-gray-100 ml-3 h-10 flex-auto"/>
          </div>

          <div class="flex">
            <label class="h-10 leading-10">Primary Color</label><input name="primarycolor" type="text" class="rounded-xl bg-gray-100 ml-3 h-10 flex-auto" value="#"/> <div class="h-10 w-10 rounded-xl ml-2" id="pmc"></div>
          </div>
          <div class="flex">
            <label class="h-10 leading-10">Secondary Color</label><input name="secondarycolor" type="text" class="rounded-xl bg-gray-100 ml-3 h-10 flex-auto"/value="#"> <div class="h-10 w-10 rounded-xl ml-2" id="scc"></div>
          </div>
        </div>
      </div>

      <div class=" p-6 mt-4">
        <h2 class="border-b-2 border-blue-400 inline pb-1 font-black text-xl">Layout</h2>

        <div class="flex mt-6 justify-center space-x-2">
          <div class="rounded-xl">
            <img src="/horizontal.png" class="h-72 layout p-3 rounded-2xl cursor-pointer" data-type="horizontal" />
          </div>

          <div class="rounded-xl">
            <img src="/horizontal-hero.png" class="h-72 layout p-3 rounded-2xl cursor-pointer" data-type="horizontal-hero" data-hero="true" />
          </div>

          <div class="rounded-xl">
            <img src="/vertical.png" class="h-72  layout p-3 rounded-2xl cursor-pointer" data-type="vertical" />
          </div>

          <div class="rounded-xl">
            <img src="/vertical-hero.png" class="h-72  layout p-3 rounded-2xl cursor-pointer" data-type="vertical-hero" data-hero="true" />
          </div>

        </div>
      </div>

      <div class="p-6 mt-4 hidden" id="layoutspec">
        <h2 class="border-b-2 border-blue-400 inline pb-1 font-black text-xl">Layout Specific Data</h2>

        <div id="specifics" class="grid grid-cols-2 mt-8 gap-y-2 gap-x-3"></div>
      </div>

      <div class="p-6 mt-4">
        <h2 class="border-b-2 border-blue-400 inline pb-1 font-black text-xl">Categories</h2><br />
        <button id="selectall" class="inline-block clear-left bg-gray-100 mt-5 p-3 rounded-xl">Select all</button>
        <div class="flex flex-wrap mt-5" id="categories"></div>
      </div>

      <div class="p-6 mt-4">
        <h2 class="border-b-2 border-blue-400 inline pb-1 font-black text-xl">Texts</h2>
        <div class="grid grid-cols-2 mt-5 gap-x-4 gap-y-4">
          <div>
            <label>Lisitng information</label><textarea name="listing" text="" class="rounded-xl bg-gray-100 h-32 w-full"></textarea>
          </div>

          <div>
            <label>About Us</label><textarea name="aboutus" text="" class="rounded-xl bg-gray-100 h-32 w-full"></textarea>
          </div>
          <div>
            <label>Shipping</label><textarea name="shipping" text="" class="rounded-xl bg-gray-100 h-32 w-full"></textarea>
          </div>
          <div>
            <label>Returns</label><textarea name="returns" text="" class="rounded-xl bg-gray-100 h-32 w-full"></textarea>
          </div>
        </div>
      </div>

      <div class="p-6 mt-4">
        <h2 class="border-b-2 border-blue-400 inline pb-1 font-black text-xl">Footer Links</h2>

        <div id="links"></div>
        <button id="addLink">Add more link</button>
      </div>

      <input type="hidden" name="layout" value="" />

      <div class="justify-center mt-8 text-center bg-white fixed bottom-0 justify-center w-full py-3 z-50">
        <button id="getPreview" class="uppercase bg-blue-500 rounded-xl p-3 text-white font-black ml-6 hover:bg-blue-700">preview</button>
        <button id="getCode" class="uppercase bg-green-500 rounded-xl p-3 text-white font-black ml-6 hover:bg-green-700">get code</button>
      </div>

    </form>
  </div>


  <script>
  $(document).ready(function(){

    $(".layout").click(function(e){
      //alert(  );
      $("#specifics").html("");

      if( $(this).attr("data-hero") == "true" ){
        $("#layoutspec").removeClass("hidden");
        var $content = '<div class="flex"><label class="h-10 leading-10">Hero Image URL</label><input name="herourl" type="text" class="rounded-xl bg-gray-100 ml-3 h-10 flex-auto mr-3" /></div>';
        $("#specifics").append($content);
      }

      $("input[name='layout']").val( $(this).attr("data-type") );

      $(".layout").removeClass("bg-gray-100");
      $(this).addClass("bg-gray-100");
    });

    $("#getCode").click(function(e){
      e.preventDefault();

      $("#modal").toggleClass("hidden");
      $("body").toggleClass("overflow-hidden");

      $.ajax({
        method: "POST",
        url: "<?= $generatorUrl ?>/preview.php?mode=code",
        data: $("form").serialize()
      })
      .done(function( msg ) {
        $("#content").html(msg);
      });
    });

    $("#getPreview").click(function(e){
      e.preventDefault();

      $("#modal").toggleClass("hidden");
      $("body").toggleClass("overflow-hidden");

      $.ajax({
        method: "POST",
        url: "<?= $generatorUrl ?>/preview.php?mode=preview",
        data: $("form").serialize()
      })
      .done(function( msg ) {
        $("#content").html(msg);
      });
    });

    $("#close").click(function(){
      $("#modal").toggleClass("hidden");
      $("body").toggleClass("overflow-hidden");
    });

    $("#addLink").click(function(e){
      e.preventDefault();

      var $link = '<div class="link"><div class="grid grid-cols-2 mt-5 gap-x-4 gap-y-4"><div class="flex"><label class="flex-none mr-3 leading-10">Link Title</label><input name="footertitle[]" text="" class="rounded-xl bg-gray-100 h-10 w-full" /></div><div class="flex"><label class="flex-none mr-3 leading-10">Link URL</label><input name="footerlink[]" text="" class="rounded-xl bg-gray-100 h-10 w-full" /></div></div></div>';

      $("#links").append($link);
    });

    $("#selectall").click(function(e){
      e.preventDefault();
      $("input[type='checkbox']").attr('checked', 'checked');
    });

    // set colors
    $("input[name='primarycolor']").blur(function(){
      var $color = $(this).val();
      $("#pmc").attr('style', 'background: '+ $color +';');
    });
    $("input[name='secondarycolor']").blur(function(){
      var $color = $(this).val();
      $("#scc").attr('style', 'background: '+ $color +';');
    });

    $("input[name='ebayurl']").blur(function(){
      var ebayurl = $("input[name='ebayurl']").val();
      var urlparts = ebayurl.split("/").pop();
      $("input[name='sellerid']").val(urlparts);

      $.ajax({
        method: "POST",
        //url: "<?= $generatorUrl ?>/categories.php",
        url: "<?= $generatorUrl ?>/simpledom/test.php",
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
