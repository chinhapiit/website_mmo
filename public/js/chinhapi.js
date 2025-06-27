document.addEventListener("DOMContentLoaded", function () {
    let filterButtons = document.querySelectorAll('.small-widget button'); 
    let productItems = document.querySelectorAll('[dadata-filter]'); 
    let loading = document.getElementById("loading"); 
    filterButtons.forEach(button => {
        button.addEventListener("click", function () {
            let filterType = this.innerText.trim(); 
            loading.style.display = "block"; 
            productItems.forEach(item => item.style.display = "none");
            setTimeout(() => { 
                loading.style.display = "none"; 
                let productsArray = Array.from(productItems); 
                if (filterType === "Giá giảm") {
                    productsArray.sort((a, b) => {
                        let priceA = parseFloat(a.querySelector('.product-price').innerText.replace(/\D/g, ''));
                        let priceB = parseFloat(b.querySelector('.product-price').innerText.replace(/\D/g, ''));
                        return priceB - priceA; 
                    });
                } else if (filterType === "Giá tăng") {
                    productsArray.sort((a, b) => {
                        let priceA = parseFloat(a.querySelector('.product-price').innerText.replace(/\D/g, ''));
                        let priceB = parseFloat(b.querySelector('.product-price').innerText.replace(/\D/g, ''));
                        return priceA - priceB; 
                    });
                }
                let container = productItems[0].parentNode; 
                productsArray.forEach(product => {
                    product.style.display = "block"; 
                    container.appendChild(product); 
                });
            }, 1000);
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
let filterButtons = document.querySelectorAll('.small-widget .card-body'); 
let productItems = document.querySelectorAll('[dadata-filter]'); 
let loading = document.getElementById("loading"); 
filterButtons.forEach(button => {
    button.addEventListener("click", function () {
        let filterType = this.closest('[data-id]').getAttribute("data-id"); 
        loading.style.display = "block"; 
        productItems.forEach(item => item.style.display = "none"); 
        setTimeout(() => { 
            loading.style.display = "none"; 
            
            if (filterType === "0") {
                productItems.forEach(item => item.style.display = "block"); 
            } else {
                let hasProduct = false; 
                productItems.forEach(item => {
                    if (item.getAttribute("dadata-filter") === filterType) {
                        item.style.display = "block"; 
                        hasProduct = true;
                    }
                });
                if (!hasProduct) {
                    Swal.fire({
                        title: "Thành công",
                        icon: "success",
                        text: data.msg,
                        customClass: {
                                confirmButton: "btn btn-primary"
                        }
                    });
                }
            }
        }, 1000); 
    });
});
});