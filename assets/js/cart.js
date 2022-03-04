async function addToCart(id , quantity = 1) {
    const action = "addToCart";
    let result = await makeRequest(`api/receiver/cartReceiver.php?action=${action}&id=${id}&quantity=${quantity}`, "GET")
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
    // console.log(result);
    // console.log('quantity');
    // console.log(result.products[0].quantity);
    document.getElementById('cartCount').innerText = Object.keys(result.products).length;
    let checkout = document.getElementById('tbody');
    let cart_page = document.getElementById('cart_table');
        if (checkout){
            // checkLogin()
            getShippers()
            if (Object.keys(result['products']).length == 0){
                alert('You cart is empty!')
                window.location.replace("category.php");
            } else {
                for (const x in result.products){
                    checkout.innerHTML +=
                        `<tr id="row${result.products[x].product_id}">
                        <td>${result.products[x].product_id}</td>
                        <td>${result.products[x].name}</td>
                        <td>${result.products[x].quantity}</td>
                        <td>${result.products[x].price}</td>
                        <td><button onclick="deleteCart(${result.products[x].product_id})" class="btn btn-danger btn-sm">Del</button></td>
                    </tr>`;
                }
            }

        }

        if (cart_page){
            if (Object.keys(result['products']).length == 0){
                alert('You cart is empty!')
                window.location.replace("category.php");
            } else {
                cart_page.innerHTML = '';
                for (const x in result.products){
                    console.log(result.products)
                    cart_page.innerHTML +=
        `<tr id="row${result.products[x].product_id}">
                        <td>${result.products[x].product_id}</td>

                        <td>${result.products[x].name}</td>
                        <td>
                            <button class="btn btn-secondary btn-sm" onclick="addOrRemove(${result.products[x].product_id},${result.products[x].quantity},'decrease')">-</button>
                            <span id="quantity${result.products[x].product_id}">${result.products[x].quantity}</span>
                            <button class="btn btn-secondary btn-sm" onclick="addOrRemove(${result.products[x].product_id},${result.products[x].quantity},'increase')">+</button>
                        </td>
                        <td>${result.products[x].price}</td>
                        <td><button onclick="deleteCart(${result.products[x].product_id})" class="btn btn-danger btn-sm">Del</button></td>
                    </tr>`;
                }
            }
        }
}
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
