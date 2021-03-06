<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <table class="table table-striped">
        <thead class="">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>


</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<script src="../assets/js/main.js"></script>
<script>
    async function getCustomers() {
        const action = "getCustomers";
        let customers = await makeRequest(`../api/receiver/customerReceiver.php?action=${action}`, "GET")
        let html = '';
        for (const x in customers){
            let customer = customers[x]
            html += `<tr>
                        <td>${customer['id']}</td>
                        <td>${customer['first_name']}</td>
                        <td>${customer['last_name']}</td>
                        <td>${customer['created_at']}</td>
                    </tr>`;
        }
        document.getElementById('tbody').innerHTML = html;

    }
    getCustomers()
</script>
</body>
</html>