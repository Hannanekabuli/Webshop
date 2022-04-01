async function addToCart(id , quantity = 1) {
    const action = "addToCart";
    let result = await makeRequest(`api/receiver/cartReceiver.php?action=${action}&id=${id}&quantity=${quantity}`, "GET")
    console.log(result)

    getCart()
}
async function deleteCart(id) {
    const action = "deleteCart";
    let result = await makeRequest(`api/receiver/cartReceiver.php?action=${action}&id=${id}`, "GET")
    console.log(result)
    if (result == 'decreased' ){
        getCart();
    } else {
        document.getElementById(`row${id}`).remove();
        // Shortcut
        location.reload();
        // getCart();
    }
}
async function getCart() {
    const action = "getCart";
    let result = await makeRequest(`api/receiver/cartReceiver.php?action=${action}`, "GET")
    if (result){
        let products_quantity = 0;
        for (const x in result.products){
            let product = result.products[x];
            products_quantity += product.quantity;
        }
        // document.getElementById('cartCount').innerText = Object.keys(result.products).length;
        document.getElementById('cartCount').innerText = products_quantity;

    }
    let checkout = document.getElementById('tbody');
    if (checkout){
        //checkLogin()
        if (Object.keys(result['products']).length == 0){
            alert('You cart is empty!')
            window.location.replace("index.php");
        } else {
            let total_price = 0;
            checkout.innerHTML = '';
            for (const x in result.products){
                total_price += parseFloat(result.products[x].price);
                console.log(total_price)
                checkout.innerHTML +=
                    `<tr id="row${result.products[x].product_id}">
                        <td>${result.products[x].product_id}</td>
                        <td>${result.products[x].name}</td>
                        <td>
                            <span style="cursor:pointer" onclick="addOrRemove(${result.products[x].product_id},1,'decrease')">-</span>
                            ${result.products[x].quantity}
                            <span style="cursor:pointer" onclick="addOrRemove(${result.products[x].product_id},1,'increase')">+</span>

                        </td>
                        <td>${result.products[x].price}</td>
                        <td><button onclick="deleteCart(${result.products[x].product_id})" class="btn btn-danger btn-sm">Del</button></td>
                    </tr>`;
            }
            document.getElementById('total_price').innerText = total_price;
        }
    }
}
getCart()
async function checkLogin() {
    const action = "checkLogin";
    let result = await makeRequest(`api/receiver/customerReceiver.php?action=${action}`, "GET");
    if (result.terms != 0){
        document.getElementById("terms").checked = true;
    } else {
        document.getElementById("terms").checked = false;
    }
    if(!result){
        alert('Please Login to your account');
        window.location.replace("customer/login.php");
    }
}
async function addOrRemove(id,quantity,action) {
    if (action === 'increase'){
       addToCart(id,1);
       document.getElementById(`quantity${id}`).innerText = quantity+1;
    }
    if (action === 'decrease'){
        deleteCart(id);

    }
    // const action = "checkLogin";
    // let result = await makeRequest(`api/receiver/customerReceiver.php?action=${action}`, "GET");
    //
}
