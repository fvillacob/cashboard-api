
<?php
    use util\Constantes;
?>


<html>
  <style>
     .wellcome{ font-family: "Bahnschrift"; color: #1C2833; font-size: 200%; }
     .by{ font-family: "Bahnschrift"; color: #cdcdcd; font-size: 160%; }
  </style>
<body>
   <br>
   <table width="100%">
      <tr><td align="center" class="wellcome"><?php echo  str_replace( '#SITENAME#',   Constantes::$SITE_NAME , Constantes::$MSJ_INDEX ); ?></td></tr>
      <tr height="20px"><td></td></tr>
      <tr><td align="center" class="by"      ><?php echo  Constantes::$SITE_AUTOR ?> </td></tr>
   </table>
</body>
</html>
