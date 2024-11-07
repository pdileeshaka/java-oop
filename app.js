$(document).ready(function () {
    // Fetch data from your PHP script
    $.get("app.php", function (data) {
        if (data.error) {
            console.error(data.error);
            return;
        }

        // Loop through the provinces and display their data
        data.forEach(function (province) {
            $("#provinceData").append(
                `<tr>
                    <td>${province.province}</td>
                    <td>${province.lat}</td>
                    <td>${province.long}</td>
                </tr>`
            );
        });
    });
});
