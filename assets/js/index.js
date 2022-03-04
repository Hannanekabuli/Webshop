
window.onload = getProducts;

function getProducts(){
    const url = "api/receiver/productReceiver.php";
    fetch(url, {   
        method: "GET",
}).then((response) => {
    console.log(response)
    return response.json()
}).then((result) => {
    console.log(result)
    getAll(result)
}).catch((err) => {
  console.log(err)
})
}


function getAll(result){
const section = document.getElementsByTagName("section")[0];
for(var i=0; result.length>i; i++){

    let productCard = document.createElement("div");
    productCard.classList.add("card")
    section.append(productCard)

 // Representing the title of a productCard
 let productName = document.createElement("div");
 productName.classList.add("productName")
 let header = document.createElement("h2");
 header.innerText = result[i].name
 productName.appendChild(header)   
 section.append(productName)

 // Representing the description of a productCar
 let productDescription = document.createElement("div");
 productDescription.classList.add("desdiv")
 let paragrahOne = document.createElement("p");
 paragrahOne.innerText = result[i].description
 productDescription.appendChild(paragrahOne)   
 section.append(productDescription)

 // Representing the image of a productCa 
/*  let productImage = document.createElement("div");
 productImage.classList.add("imgdiv")
 let img = document.createElement("img")
 img.src = "./Product Image/.jpg"
 productImage.appendChild(img)
 section.append(productImage)  */

 // Representing the price of a productCard
 let productPrice = document.createElement("div");
 productPrice.classList.add("pricediv")
 let price = document.createElement("p");
 price.classList.add('price')
 price.innerText = result[i].price+" kr"
 productPrice.appendChild(price)
 section.append(productPrice)

 // Representing the btnContainer of a productCard 
 let btnContainer = document.createElement("div");
 let button=document.createElement("button");
 button.classList.add("btndiv")
/*  let cartPic = document.createElement('img')
 cartPic.classList.add('cartImageInMain')
 cartPic.src = './images/cart-arrow.png'  */
 let addToCartText = document.createElement("text")
 addToCartText.classList.add('text')
 addToCartText.innerText =`Add to cart`
 button.append(addToCartText)
 btnContainer.appendChild(button)
 section.append(btnContainer)

 productCard.append(productName, productDescription, productPrice, btnContainer)

/* let productImage = document.createElement('div')
    productImage.classList.add("productImage")
    productImage.src= './Category Image'
let productName = document.createElement('div')
    productName.classList.add('productName')
    productName = result[i].name
    div.appendChild(productImage, productName)
    section.append(div) */
/* 
    section.innerHTML +=
        `<div class="col" id="actionCameraContainer1">
         <div class="card" style="width: 35rem;">
            <div class="imgContainer">
            <img class="card-img-top" src="${result[i].image}" alt="Card image cap">
            </div>
            <div class="card-body">
              <h5 class="card-title">${result[i].name}</h5>
              <p class="card-text">${result[i].description}</p>
              <a href="#" class="btn btn-primary">${result[i].price}</a>
            </div>
          </div>  
        </div>` */
}
} 
