
const sideNav = document.getElementById('side-nav');
const arrow = document.getElementById('arrow');

arrow.addEventListener('click', ()=>{
  const categoryShow = sideNav.getAttribute('data-category')

  if(categoryShow === 'false'){
      sideNav.setAttribute('data-category', true)
      arrow.setAttribute('data-category', true)
  }else{
      sideNav.setAttribute('data-category', false)
      arrow.setAttribute('data-category', false)
  }
})

const search = document.querySelector('#Search')

search.addEventListener('input', ()=>{
    const filter = search.value.toLowerCase();
    const cardProduct = document.querySelectorAll('.product-list')

    cardProduct.forEach((item) => {
        let productName = item.children[1].innerHTML
        console.log(productName);

        if(productName.toLowerCase().includes(filter.toLowerCase())){
            item.style.display = '';
        }else{
            item.style.display = 'none';
        }
    })

    })