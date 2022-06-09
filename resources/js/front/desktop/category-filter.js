export let renderFilterCategory = () => {

    let mainContainer = document.querySelector("main");
    let categoryButtons = document.querySelectorAll(".buttons-category");

    document.addEventListener("renderFormModules",( event =>{
        renderForm();
    }), {once: true});

    document.addEventListener("renderMenu",( event =>{
        renderMenu();
    }), {once: true});

    document.addEventListener("renderFilterCategory",( event =>{
        renderFilterCategory();
    }), {once: true});

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

                        document.dispatchEvent(new CustomEvent('renderFilterCategory'));

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