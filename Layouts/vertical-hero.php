<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

  <style>
    .bg-primary{
      background: <?= $_POST['primarycolor'] ?>;
    }
    a.bg-primary:hover{
      background: <?= $_POST['secondarycolor'] ?>;
    }

    div.content p{
      display: none;
    }
    div.content p.visible{
      display: block;
    }
    a{ cursor: pointer; }
    a.watch:before{
      content: "\203A";
      color: #fff;
      font-weight: 800;
      margin-right: 5px;
    }


    /* The normal operation on the mobile phone is hidden by default and displayed when you click the menu */
    .changingContent{
      display: none;
    }
    /* Show the sibling element div when the radio button is selected */

    #btnA:checked ~ #a {
      display: block;
    }
    #btnB:checked ~ #b {
      display: block;
    }
    #btnC:checked ~ #c {
      display: block;
    }
    /* Set the radio button to hide */
    .btn {
      display: none;
    }

    #templateBody ul li{
      list-style-type: disc !important;
    }
    #templateBody ol li{
      list-style-type: decimal !important;
    }
  </style>
</head>
<body>

<div class="container mx-auto">
  <div class="mt-4 flex h-24">
    <a href="<?= $_POST['ebayurl'] ?>" title="Shop Home" target="_blank" class="flex-0">
      <img src="<?= $_POST['logourl'] ?>" class="h-24 ml-8 mb-2" style="height: 96px;" />
    </a>

    <span class="text-sm flex-1 text-center align-middle mt-5 font-bold"><?= $_POST['slogan'] ?></span>


    <div class="mt-5 text-sm text-gray-600">
      <div class="inline-block text-md">
        <a href="http://my.ebay.co.uk/ws/eBayISAPI.dll?AcceptSavedSeller&amp;sellerid=<?= $_POST['sellerid'] ?>" target="_blank" style="line-height: 24px;">
          <svg xmlns="http://www.w3.org/2000/svg" class="inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"  style="height: 16px; width: 16px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
          Add Us To Favourites
        </a>
      </div>

      <br />

      <div class="inline-block text-md mr-8">
        <a href="http://my.ebay.co.uk/ws/eBayISAPI.dll?AcceptSavedSeller&amp;linkname=includenewsletter&amp;sellerid=<?= $_POST['sellerid'] ?>" target="_blank" style="line-height: 24px;">
          <svg xmlns="http://www.w3.org/2000/svg" class="inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="height: 16px; width: 16px;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          Sign Up To Newsletter
        </a>
      </div>
    </div>
  </div>

  <img src="<?= $_POST['herourl'] ?>" class="w-full bg-gray-100 mt-3 border-t-2 pt-2" />

  <div class="flex border-t-2 mt-3 pt-8">
    <? if(isset($_POST['category'])){ ?>
    <div class="bg-gray-100 rounded-xl mb-5 px-5 py-4 text-sm w-1/3 ml-8">
      <nav class="text-gray-700">
        <h2 class="font-black mb-3">Category</h2>
        <ul class="space-y-2">
          <? foreach($_POST['category'] AS $index => $category){ ?>
          <li class="">
            <a href="<?= $category ?>" target="_blank" class="hover:underline"><?= $index ?></a>
          </li>
          <? } ?>
        </ul>
      </nav>
    </div>
    <? } ?>

    <div class="flex-auto ml-8 mr-8"  id="templateBody">
      <div class="">
        <h2 class="ptitle text-xl font-black">{{item-name}}</h2>
        <h3 class="pprice">from £{{item-price}}</h3>

        <div class="p-3 border rounded-xl border-gray-100 my-6">{{item-image}}</div>

        <div id="idesc" class="mt-5 p-5 bg-gray-100 border">{{item-description}}</div>

        <p class="mt-4 text-xs text-gray-700">
          <?= nl2br($_POST['listing']) ?>
        </p>

        <a href="http://my.ebay.co.uk/ws/eBayISAPI.dll?AcceptSavedSeller&amp;sellerid=<?= $_POST['sellerid'] ?> o" class="px-5 py-2 text-white bg-primary inline-block mt-4 text-sm watch">Add us to favourites</a>
      </div>
    </div>
  </div>

  <!-- info bar -->
  <div>
    <div class="grid grid-cols-3 mt-8 text-center bg-primary text-white">
      <div class="py-4 border">
        <label for="btnA" class="cursor-pointer">About Us</label>
      </div>
      <div class="py-4 border">
        <label for="btnB" class="cursor-pointer">Delivery</label>
      </div>
      <div class="py-4 border">
        <label for="btnC" class="cursor-pointer">Returns</label>
      </div>
    </div>

    <div class=" ml-8 mr-8">
      <input id="btnA" class="btn" type="radio" value="aboutus" name="selector" checked />
      <input id="btnB" class="btn" type="radio" value="delivery" name="selector" />
      <input id="btnC" class="btn" type="radio" value="shipping" name="selector" />


      <div class="mt-4 text-xs text-gray-700 changingContent" id="a">
        <?= nl2br($_POST['aboutus']) ?>
      </div>
      <div class="mt-4 text-xs text-gray-700 changingContent" id="b">
        <?= nl2br($_POST['shipping']) ?>
      </div>
      <div class="mt-4 text-xs text-gray-700 changingContent" id="c">
        <?= nl2br($_POST['returns']) ?>
      </div>
    </div>
  </div>
  <!-- info bar -->

  <!-- footer -->
  <? if(isset($_POST['footertitle'])){ ?>
  <div class="bg-primary text-white mt-10 h-20 text-sm ">
    <div class="flex space-x-4 mx-auto pt-8 ml-8">
      <? foreach($_POST['footertitle'] AS $index => $linktitle){ ?>
        <a href="<?= $_POST['footerlink'][$index] ?>" target="_blank"><?= $linktitle ?></a>
      <? } ?>
    </div>
  </div>
  <!-- footer -->
  <? } ?>

  <div class="text-center text-sm mt-5 mb-5 "><img src="https://www.shopiago.com/_nuxt/img/shopiago.695c14b.png" class="h-8 m-auto mb-2" />This listing is created with Shopiago.</div>
</div>

</body>
</html>
