// class cartItem {
//     constructor(img, name, price) {
//       this.img = img;
//       this.name = name;
//       this.price = price;
//       this.qty = 1;
//     }
//   }
  
//   class LocalCart {
//     static key = "cartItems";
    
//     static getLocalCartItems() {
//       let cartMap = new Map();
//       const cart = localStorage.getItem(LocalCart.key);
//       if (cart === null || cart.length === 0) return cartMap;
//       return new Map(Object.entries(JSON.parse(cart)));
//     }
  
//     static addItemToLocalCart(id, item) {
//       var cart = LocalCart.getLocalCartItems();
//       if (cart.has(id)) {
//         var mapItem = cart.get(id);
//         mapItem.qty += 1;
//         cart.set(id, mapItem);
//       } else {
//         cart.set(id, item);
//       }
//       localStorage.setItem(LocalCart.key, JSON.stringify(Object.fromEntries(cart)));
//       updateCartUI()
//     }
  
//     static removeItemFromCart(id) {
//       let cart = LocalCart.getLocalCartItems();
  
//       if (cart.has(id)) {
//         var mapItem = cart.get(id);
//         if (mapItem.qty > 1) {
//           mapItem.qty -= 1;
//           cart.set(id, mapItem);
//         } else {
//           cart.delete(id);
//         }
//       }
//       if (cart.length === 0) {
//         localStorage.clear();
//       } else {
//         localStorage.setItem(LocalCart.key, JSON.stringify(Object.fromEntries(cart)));
//         updateCartUI()
//       }
//     }
//   }
  
//   const addToCartBtns = document.querySelectorAll(".add-to-cart");
  
//   addToCartBtns.forEach((btn) => {
//     btn.addEventListener("click", addItemFunction);
//   });
  
//   function addItemFunction(e) {
//     const id = e.target.parentElement.parentElement.getAttribute('data-id');
//     if( id === null){
//         const idp = e.target.parentElement.parentElement.parentElement.parentElement.getAttribute('data-id');
//         const img = e.target.parentElement.parentElement.parentElement.previousElementSibling.children[0].src;
//         const name = e.target.parentElement.parentElement.parentElement.children[0].textContent;
//         let price = e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.children[0].textContent;
//         const qty = e.target.parentElement.previousElementSibling.value;
//         price = price.replace("$", '')

//         const item = new cartItem(img, name, price);
//         LocalCart.addItemToLocalCart(idp, item);

//         // console.log(price)
//     }else{
//         const img = e.target.parentElement.previousElementSibling.previousElementSibling.children[0].src;
//         const name = e.target.parentElement.previousElementSibling.textContent;
//         let price = e.target.nextElementSibling.textContent;
//         price = price.replace("$", '')
//         console.log(id);
//         const qty = 1

//         const item = new cartItem(img, name, price);
//         LocalCart.addItemToLocalCart(id, item);
//         // console.log(price)
//     }
//   }


// function updateCartUI(){
//     const cartPage =  document.querySelector('.cart-page');
//     cartPage.innerHTML = "";
//     const cartCount =  document.querySelector('.cart-count');
//     cartCount.innerHTML = "";
//     const items = LocalCart.getLocalCartItems('cartItems');

//     if(items === null ) return;
//     let count = 0;
//     let total = 0;
//     let grandTotal = 0;
//     for(const [key, value] of items.entries()){
//         const cartItem = document.createElement('tr');
//         cartItem.classList.add('cart-item');
//         total = parseFloat(value.price)*value.qty;
//         count +=1;
//         grandTotal += total
//         cartItem.innerHTML = `
//             <td class="dis"><img src="${value.img}"></td>
//             <td>${value.name}</td>
//             <td>$${value.price}</td>
//             <td>${value.qty}</td>
//             <td>$${total}</td>
//             <td><i class="uil uil-trash"></i></td>
//         `
//         cartItem.lastElementChild.addEventListener('click', ()=>{
//             LocalCart.removeItemFromCart(key)
//         })
//         cartPage.append(cartItem)
//     }
//     if(count > 0){
//       let num = document.querySelector(':root')
//       num.style.setProperty('--product-count', `"${count}"`)
//       let gt = document.querySelector('.grand-total')
//       gt.innerHTML = `$${grandTotal}`
//     }else{
//       grandTotal = 0
//     }
// }

// document.addEventListener('DOMContentLoaded', ()=>{
//   updateCartUI()
// })