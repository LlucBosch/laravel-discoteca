export let renderCart = () => {

    let mainContainer = document.querySelector("main");
    let forms = document.querySelectorAll('.front-form');
    let plusButtons = document.querySelectorAll(".plus");
    let minusButtons = document.querySelectorAll(".minus");
    let goCheckout = document.querySelector('.go-checkout');
    let goSaled = document.querySelector('.go-saled');

    document.addEventListener("purchase",( event =>{

            renderCart();
        
    }),{once: true});

    

    if(plusButtons){

        plusButtons.forEach(plusButton => {

            plusButton.addEventListener("click", () => {
    
                let url = plusButton.dataset.url;

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

                        document.dispatchEvent(new CustomEvent('purchase'));
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

    if(minusButtons){

        minusButtons.forEach(minusButton => {

            minusButton.addEventListener("click", () => {
    
                let url = minusButton.dataset.url;

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

                        document.dispatchEvent(new CustomEvent('purchase'));
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

    if(goCheckout){

        goCheckout.addEventListener("click", () => {
    
                let url = goCheckout.dataset.url;

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

                        document.dispatchEvent(new CustomEvent('checkout'));
                    })
                    .catch(error =>  {
        
                        if(error.status == '500'){
                            console.log(error);
                        };
                    });
                };
    
                sendNewRequest();

            });
     
    }

}