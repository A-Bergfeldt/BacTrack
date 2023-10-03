document.addEventListener('DOMContentLoaded', function () {
    var xmlhttp = new XMLHttpRequest()

    xmlhttp.open('GET', 'get_data.php', true);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            // Handle the response here
            var responseData = xmlhttp.responseText;
            // Do something with the response data
        }
    };
    xmlhttp.send();
});
xmlhttp.open("GET", "getuser.php?q=" + str, true);
var jsondata = parse.JSON('<?php echo $resultJSON ?>');
console.log(jsondata);