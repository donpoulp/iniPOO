
<html>
<head>
  <title>Warrior Project</title>
  <!-- Fonts -->
  <link href="simple.css" rel="stylesheet" type="text/css">
  <script language="JavaScript" type="text/javascript" src="jquery.min.js"></script>
  <script>
    function HTMLentities (texte) {

      //texte = texte.replace(/#/g,'&#35;'); // 160 A0
      //texte = texte.replace(/\n/g,'&#92;n'); // 160 A0
      //texte = texte.replace(/\r/g,'&#92;r'); // 160 A0

      texte = texte.replace(/&/g,'&amp;'); // 38 26
      texte = texte.replace(/"/g,'&quot;'); // 34 22
      texte = texte.replace(/</g,'&lt;'); // 60 3C
      texte = texte.replace(/>/g,'&gt;'); // 62 3E

      texte = texte.replace(/\242/g,'&cent;');
      texte = texte.replace(/\243/g,'&pound;');
      texte = texte.replace(/\€/g,'&euro;');
      texte = texte.replace(/\245/g,'&yen;');
      texte = texte.replace(/\260/g,'&deg;');
      //texte = texte.replace(/\274/g,'&frac14;');
      texte = texte.replace(/\274/g,'&OElig;');
      //texte = texte.replace(/\275/g,'&frac12;');
      texte = texte.replace(/\275/g,'&oelig;');
      //texte = texte.replace(/\276/g,'&frac34;');
      texte = texte.replace(/\276/g,'&Yuml;');
      texte = texte.replace(/\241/g,'&iexcl;');
      texte = texte.replace(/\253/g,'&laquo;');
      texte = texte.replace(/\273/g,'&raquo;');
      texte = texte.replace(/\277/g,'&iquest;');
      texte = texte.replace(/\300/g,'&Agrave;');
      texte = texte.replace(/\301/g,'&Aacute;');
      texte = texte.replace(/\302/g,'&Acirc;');
      texte = texte.replace(/\303/g,'&Atilde;');
      texte = texte.replace(/\304/g,'&Auml;');
      texte = texte.replace(/\305/g,'&Aring;');
      texte = texte.replace(/\306/g,'&AElig;');
      texte = texte.replace(/\307/g,'&Ccedil;');
      texte = texte.replace(/\310/g,'&Egrave;');
      texte = texte.replace(/\311/g,'&Eacute;');
      texte = texte.replace(/\312/g,'&Ecirc;');
      texte = texte.replace(/\313/g,'&Euml;');
      texte = texte.replace(/\314/g,'&Igrave;');
      texte = texte.replace(/\315/g,'&Iacute;');
      texte = texte.replace(/\316/g,'&Icirc;');
      texte = texte.replace(/\317/g,'&Iuml;');
      texte = texte.replace(/\320/g,'&ETH;');
      texte = texte.replace(/\321/g,'&Ntilde;');
      texte = texte.replace(/\322/g,'&Ograve;');
      texte = texte.replace(/\323/g,'&Oacute;');
      texte = texte.replace(/\324/g,'&Ocirc;');
      texte = texte.replace(/\325/g,'&Otilde;');
      texte = texte.replace(/\326/g,'&Ouml;');
      texte = texte.replace(/\330/g,'&Oslash;');
      texte = texte.replace(/\331/g,'&Ugrave;');
      texte = texte.replace(/\332/g,'&Uacute;');
      texte = texte.replace(/\333/g,'&Ucirc;');
      texte = texte.replace(/\334/g,'&Uuml;');
      texte = texte.replace(/\335/g,'&Yacute;');
      texte = texte.replace(/\336/g,'&THORN;');
      texte = texte.replace(/\337/g,'&szlig;');
      texte = texte.replace(/\340/g,'&agrave;');
      texte = texte.replace(/\341/g,'&aacute;');
      texte = texte.replace(/\342/g,'&acirc;');
      texte = texte.replace(/\343/g,'&atilde;');
      texte = texte.replace(/\344/g,'&auml;');
      texte = texte.replace(/\345/g,'&aring;');
      texte = texte.replace(/\346/g,'&aelig;');
      texte = texte.replace(/\347/g,'&ccedil;');
      texte = texte.replace(/\350/g,'&egrave;');
      texte = texte.replace(/\351/g,'&eacute;');
      texte = texte.replace(/\352/g,'&ecirc;');
      texte = texte.replace(/\353/g,'&euml;');
      texte = texte.replace(/\354/g,'&igrave;');
      texte = texte.replace(/\355/g,'&iacute;');
      texte = texte.replace(/\356/g,'&icirc;');
      texte = texte.replace(/\357/g,'&iuml;');
      texte = texte.replace(/\360/g,'&eth;');
      texte = texte.replace(/\361/g,'&ntilde;');
      texte = texte.replace(/\362/g,'&ograve;');
      texte = texte.replace(/\363/g,'&oacute;');
      texte = texte.replace(/\364/g,'&ocirc;');
      texte = texte.replace(/\365/g,'&otilde;');
      texte = texte.replace(/\366/g,'&ouml;');
      texte = texte.replace(/\370/g,'&oslash;');
      texte = texte.replace(/\371/g,'&ugrave; ');
      texte = texte.replace(/\372/g,'&uacute;');
      texte = texte.replace(/\373/g,'&ucirc;');
      texte = texte.replace(/\374/g,'&uuml;');
      texte = texte.replace(/\375/g,'&yacute;');
      texte = texte.replace(/\376/g,'&thorn;');
      texte = texte.replace(/\377/g,'&yuml;');
      return texte;
      }


      function HTMLentitiesdecode (texte) {

      //texte = texte.replace(/#/g,'&#35;'); // 160 A0
      //texte = texte.replace(/\n/g,'&#92;n'); // 160 A0
      //texte = texte.replace(/\r/g,'&#92;r'); // 160 A0

      texte = texte.replace(/&amp;/g,'&'); // 38 26
      texte = texte.replace(/&quot;/g,'"'); // 34 22
      texte = texte.replace(/&lt;/g,'<'); // 60 3C
      texte = texte.replace(/&gt;/g,'>'); // 62 3E

      texte = texte.replace(/&cent;/g,'\242');
      texte = texte.replace(/&pound;/g,'\243');
      texte = texte.replace(/&euro;/g,'\€');
      texte = texte.replace(/&yen;/g,'\245');
      texte = texte.replace(/&deg;/g,'\260');
      //texte = texte.replace(/\274/g,'&frac14;');
      texte = texte.replace(/&OElig;/g,'\274');
      //texte = texte.replace(/\275/g,'&frac12;');
      texte = texte.replace(/&oelig;/g,'\275');
      //texte = texte.replace(/\276/g,'&frac34;');
      texte = texte.replace(/&Yuml;/g,'\276');
      texte = texte.replace(/&iexcl;/g,'\241');
      texte = texte.replace(/&laquo;/g,'\253');
      texte = texte.replace(/&raquo;/g,'\273');
      texte = texte.replace(/&iquest;/g,'\277');
      texte = texte.replace(/&Agrave;/g,'\300');
      texte = texte.replace(/&Aacute;/g,'\301');
      texte = texte.replace(/&Acirc;/g,'\302');
      texte = texte.replace(/&Atilde;/g,'\303');
      texte = texte.replace(/&Auml;/g,'\304');
      texte = texte.replace(/&Aring;/g,'\305');
      texte = texte.replace(/&AElig;/g,'\306');
      texte = texte.replace(/&Ccedil;/g,'\307');
      texte = texte.replace(/&Egrave;/g,'\310');
      texte = texte.replace(/&Eacute;/g,'\311');
      texte = texte.replace(/&Ecirc;/g,'\312');
      texte = texte.replace(/&Euml;/g,'\313');
      texte = texte.replace(/&Igrave;/g,'\314');
      texte = texte.replace(/&Iacute;/g,'\315');
      texte = texte.replace(/&Icirc;/g,'\316');
      texte = texte.replace(/&Iuml;/g,'\317');
      texte = texte.replace(/&ETH;/g,'\320');
      texte = texte.replace(/&Ntilde;/g,'\321');
      texte = texte.replace(/&Ograve;/g,'\322');
      texte = texte.replace(/&Oacute;/g,'\323');
      texte = texte.replace(/&Ocirc;/g,'\324');
      texte = texte.replace(/&Otilde;/g,'\325');
      texte = texte.replace(/&Ouml;/g,'\326');
      texte = texte.replace(/&Oslash;/g,'\330');
      texte = texte.replace(/&Ugrave;/g,'\331');
      texte = texte.replace(/&Uacute;/g,'\332');
      texte = texte.replace(/&Ucirc;/g,'\333');
      texte = texte.replace(/&Uuml;/g,'\334');
      texte = texte.replace(/&Yacute;/g,'\335');
      texte = texte.replace(/&THORN;/g,'\336');
      texte = texte.replace(/&szlig;/g,'\337');
      texte = texte.replace(/&agrave;/g,'\340');
      texte = texte.replace(/&aacute;/g,'\341');
      texte = texte.replace(/&acirc;/g,'\342');
      texte = texte.replace(/&atilde;/g,'\343');
      texte = texte.replace(/&auml;/g,'\344');
      texte = texte.replace(/&aring;/g,'\345');
      texte = texte.replace(/&aelig;/g,'\346');
      texte = texte.replace(/&ccedil;/g,'\347');
      texte = texte.replace(/&egrave;/g,'\350');
      texte = texte.replace(/&eacute;/g,'\351');
      texte = texte.replace(/&ecirc;/g,'\352');
      texte = texte.replace(/&euml;/g,'\353');
      texte = texte.replace(/&igrave;/g,'\354');
      texte = texte.replace(/&iacute;/g,'\355');
      texte = texte.replace(/&icirc;/g,'\356');
      texte = texte.replace(/&iuml;/g,'\357');
      texte = texte.replace(/&eth;/g,'\360');
      texte = texte.replace(/&ntilde;/g,'\361');
      texte = texte.replace(/&ograve;/g,'\362');
      texte = texte.replace(/&oacute;/g,'\363');
      texte = texte.replace(/&ocirc;/g,'\364');
      texte = texte.replace(/&otilde;/g,'\365');
      texte = texte.replace(/&ouml;/g,'\366');
      texte = texte.replace(/&oslash;/g,'\370');
      texte = texte.replace(/&ugrave;/g,'\371');
      texte = texte.replace(/&uacute;/g,'\372');
      texte = texte.replace(/&ucirc;/g,'\373');
      texte = texte.replace(/&uuml;/g,'\374');
      texte = texte.replace(/&yacute;/g,'\375');
      texte = texte.replace(/&thorn;/g,'\376');
      texte = texte.replace(/&yuml;/g,'\377');
      return texte;
      }


  </script>

</head>
<body>
  <h1>Warrior Project > Cookies</h1>

  <textarea rows="40" cols="200">
    <?php
      if (isset($_COOKIE["Warriors"]))
        echo $_COOKIE["Warriors"];
    ?>
  </textarea>

</body>
</html>
