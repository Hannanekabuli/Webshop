async function addNewsLetter() {
    var body = new FormData()
    
    body.append("action", "addNewsLetter")
    body.append("first_name", document.getElementById('first_name').value)
    body.append("last_name", document.getElementById('last_name').value)
    body.append("email", document.getElementById('email').value)

    if (checkForm('newsletter_form')){
        var result = await makeRequest(`api/receiver/newsletterReceiver.php`, "POST", body);
        console.log(result)
        if (result){
            alert("Your Email has been submitted :)");
            window.location.replace("category.php");
        }
    }

}