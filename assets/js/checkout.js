async function addOrder() {
    let terms_status = document.getElementById('terms').checked;
    var body = new FormData()

    body.append("action", "addOrder")
    body.append("first_name", document.getElementById('first_name').value)
    body.append("last_name", document.getElementById('last_name').value)
    body.append("email", document.getElementById('email').value)
    body.append("mobile", document.getElementById('mobile').value)
    body.append("country", document.getElementById('country').value)
    body.append("city", document.getElementById('city').value)
    body.append("full_address", document.getElementById('full_address').value)
    body.append("shipping_id", document.getElementById('shipping_id').value)
    
   if (checkForm('checkoutForm') == true){
        if (terms_status){
            var result = await makeRequest(`api/receiver/orderReceiver.php`, "POST", body);
            console.log(result);
            if (result){
                alert("Your order has been submitted :)");
                window.location.replace("category.php");
            }

        } else {
            alert('Please Accept Our terms & conditions!!!');
        }
        console.log(result);
   }


    // if (status){
    //     window.location.href = "dashboard.php";
    // } else {
    //     Swal.fire({
    //         title: 'Error!',
    //         text: `Email or Password is invalid!`,
    //         icon: 'error',
    //         confirmButtonText: 'OK'
    //     })
    // }
}



async function getShippers() {
    const action = "getShippers";
    let shippers = await makeRequest(`api/receiver/checkoutReceiver.php?action=${action}`, "GET")
    if (shippers.length != 0){
        for (const x in shippers){
            document.getElementById('shipping_id').innerHTML += `<option value="${shippers[x]['ID']}">${shippers[x]['name']}</option>`;
        }
    }
}
