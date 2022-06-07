export let renderfrontProducts = () => {

    let mainContainer = document.querySelector("main");
    let productButtons = document.querySelectorAll(".service-button-tickets");

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

                        document.dispatchEvent(new CustomEvent('renderProductModules'));
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

    
};