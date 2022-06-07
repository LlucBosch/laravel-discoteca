export let renderMenu = () => {

    let mainContainer = document.querySelector("main");
    let menuButtons = document.querySelectorAll(".buttons-menu");

    if(menuButtons){

        menuButtons.forEach(menuButton => {

            menuButton.addEventListener("click", () => {
    
                let url = menuButton.dataset.url;

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