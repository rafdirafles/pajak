function loadDocument() {
var link = $("#alamat").val();
console.log(link);

$.ajax({
url: link,
method: "GET",
async: true,
crossDomain: true,
dataType: 'json',
success: function() {
$xmlObject = <?= simplexml_load_file($link); ?>
$jsonData = json_encode($xmlObject, JSON_PRETTY_PRINT);
print_r($jsonData);
}
});
return false;