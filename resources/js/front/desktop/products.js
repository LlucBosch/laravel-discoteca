export let renderfrontProducts = () => {

    let mainContainer = document.querySelector("main");
    let productButtons = document.querySelectorAll(".service-button-tickets");
    let categoryButtons = document.querySelectorAll(".buttons-category");
    let orderSelects = document.querySelectorAll(".filter-price");
    let forms = document.querySelectorAll('.front-form');
    let addToCartButton = document.querySelector('.add-cart');

    document.addEventListener("tickets",( event =>{
        
        renderfrontProducts();
        
    }),{once: true});

    if(productButtons){

        productButtons.forEach(productButton => {

            productButton.addEventListener("click", () => {
    
                let url = productButton.dataset.url;

                let sendNewRequest = async () => {
                    
                    let response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        method: 'GET', 
                    })
                    .then(response => {
                                  
                        if (!response.ok) throw response;

                        return response.json();
                    })
                    .then(json => {

                        mainContainer.innerHTML = json.content;

                        document.dispatchEvent(new CustomEvent('tickets'));
                    })
                    .catch(error =>  {
        
                        if(error.status == '500'){
                            console.log(error);
                        };
                    });
                };
    
                sendNewRequest();

            });
        });
    }

    if(categoryButtons){

        categoryButtons.forEach(categoryButton => {

            categoryButton.addEventListener("click", () => {
    
                let url = categoryButton.dataset.url;
                console.log(url);
                let sendNewRequest = async () => {
                    
                    let response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        method: 'GET', 
                    })
                    .then(response => {
                                  
                        if (!response.ok) throw response;

                        return response.json();
                    })
                    .then(json => {

                        mainContainer.innerHTML = json.content;

                        document.dispatchEvent(new CustomEvent('tickets'));

                    })
                    .catch(error =>  {
        
                        if(error.status == '500'){
                            console.log(error);
                        };
                    });
                };
    
                sendNewRequest();

            });
        });
    }

    if(orderSelects){

        orderSelects.forEach(orderSelect => {

            orderSelect.addEventListener("change", (option) => {
    
                let url = option.target.value;
                console.log(url);
                let sendNewRequest = async () => {
                    
                    let response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        method: 'GET', 
                    })
                    .then(response => {
                                  
                        if (!response.ok) throw response;

                        return response.json();
                    })
                    .then(json => {

                        mainContainer.innerHTML = json.content;

                        document.dispatchEvent(new CustomEvent('tickets'));

                    })
                    .catch(error =>  {
        
                        if(error.status == '500'){
                            console.log(error);
                        };
                    });
                };
    
                sendNewRequest();

            });
        });
    }
      
    if(addToCartButton){

        addToCartButton.addEventListener("click", (event) => {
    
            event.preventDefault();
            
            forms.forEach(form => { 

                let data = new FormData(form);
                let url = form.action;

                for (var pair of data.entries()) {
                    console.log(pair[0]+ ', ' + pair[1]); 
                }
    
                let sendPostRequest = async () => {
                        
                    let response = await fetch(url, {
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                        },
                        method: 'POST',
                        body: data
                    })
                    .then(response => {
                    
                        if (!response.ok) throw response;

                        return response.json();
                    })
                    .then(json => {

                        mainContainer.innerHTML = json.content;
                        document.dispatchEvent(new CustomEvent('purchase'));

                    })
                    .catch ( error =>  {
    
                        if(error.status == '500'){
                            console.log(error);
                        };
                    });
                };
        
                sendPostRequest();
            });
        });
    }

}