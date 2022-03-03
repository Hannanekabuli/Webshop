async function makeRequest(url, method, body) {
    try {
        let response = await fetch(url, {
            method,
            body
        })
        console.log(response)
        let result = await response.json();
        return result
    } catch(err) {
        console.error(err)
    }
}

async function logout() {
    const action = "logout";
    let status = await makeRequest(`api/receiver/customerReceiver.php?action=${action}`, "GET")
    if (status){
        window.location.href = "/ReflexMania/";
    } else {
        Swal.fire({
            title: 'Error!',
            text: `Something's Wrong!`,
            icon: 'error',
            confirmButtonText: 'OK'
        })
    }
}
function checkForm(form_id){
    var elements = document.getElementById(form_id).elements;
        console.log(elements.length)

    var status = true;
    for (const x in elements) {
        console.log(elements[x].name)
        if (elements[x].required == true && elements[x].value == ''){
            alert(`${elements[x].name} is required !`);
            status = false;
        }
    }
    return status;
}