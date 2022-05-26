export let renderForm = () => {

    let formContainer = document.querySelector(".form");
    let storeButton = document.querySelector('.button-save-panel');
    let createButton = document.querySelector('.button-clean-panel');
    let forms = document.querySelectorAll('.admin-form');


    document.addEventListener("loadForm",( event =>{
        formContainer.innerHTML = event.detail.form;
    }), {once: true});

    document.addEventListener("renderFormModules",( event =>{
        renderForm();
    }), {once: true});
    
    if(createButton){

        createButton.addEventListener("click", () => {

            let url = createButton.dataset.url;

            /* 
                A continuación vamos a hacer una llamada de tipo fetch, utilizando el método GET. Una llamada fetch es una
                promesa, y una promesa es una llamada que puede estar en estado pendiente, cumplida o rechazada. Para ello estamos
                diciendo que sendCreateRequest que es una función será asincrona, y se quedará esperando la respuesta de la
                llamada. que es el fetch que tiene un await.
            */

            let sendCreateRequest = async () => {

                /*
                    Para hacer una llamada fetch tenemos que pasarle un objeto con la información de la llamada. En este caso
                    vamos a pasarle la url de la que queremos hacer la llamada, y el método que queremos hacer. En el headers
                    vamos a pasarle un objeto con el tipo de contenido que queremos que nos devuelva.
                    Una llamada fetch puede ser exitosa o fallida. 
                    
                    Si es fallida, podemos obtener un error con el método
                    catch. El error tiene una propiedad llamada status, que nos indica el tipo de error. El error 500 es un
                    error interno del servidor, el error 404 es un error de que no se encontró la página, si es un error 422
                    es un error de validación, y el error 400 es un error de que el usuario no tiene permisos para realizar
                    la llamada.
                    Si es exitosa, podemos obtener la respuesta con el método then. Si la respuesta ha ido bien y todo es ok 
                */
                let response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    method: 'GET', 
                })
                .then(response => {
                                
                    if (!response.ok) throw response;
                    // este return convierte la respuesta del servidor a un json que se usará en el proximo "then"
                    return response.json();
                })
                .then(json => {

                    formContainer.innerHTML = json.form;

                    /*
                        Cuando hacemos un innerHTML se pierden todos los eventos de javascript, por lo que tenemos que
                        volver a asignar los eventos a los elementos que hemos creado. Para ello vamos a hacer un evento 
                        personalizado, que será el evento que cargará todo el javascript que tenga el formulario. 
                        En la siguiente línea estamos declarando un evento personalizado que se llamará 'renderFormModules' que 
                        podrá ser escuchado por el resto de archivos. 
                    */
                    document.dispatchEvent(new CustomEvent('renderFormModules'));
                })
                .catch(error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    };
                });
            };
    
            sendCreateRequest();
        });
    }

    if(storeButton){

        storeButton.addEventListener("click", (event) => {
    
            forms.forEach(form => { 

                /*
                    En las siguientes líneas se obtiene el valor del formulario a través de un objeto FormData
                    y se captura la url que usaremos para enviar los datos al servidor.
                */
                
                let data = new FormData(form);
                let url = form.action;

                for (var pair of data.entries()) {
                    console.log(pair[0]+ ', ' + pair[1]); 
                }

                /*	
                    En el siguiente valor estamos capturando los datos del ckeditor y se los añadimos a los datos
                    del formData. 
                */
    
                if( ckeditors != 'null'){
    
                    Object.entries(ckeditors).forEach(([key, value]) => {
                        data.append(key, value.getData());
                    });
                }

                /*
                    A continuación vamos a hacer una llamada de tipo POST mediante fetch, esta vez vamos a 
                    añadir en los headers el token que nos ha dado Laravel el cual va a prevenir que se puedan 
                    hacer ataques de tipos cross-site scripting.
                */
    
                let sendPostRequest = async () => {
    
                    // document.dispatchEvent(new CustomEvent('startWait'));
                    
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

                        formContainer.innerHTML = json.form;

                        document.dispatchEvent(new CustomEvent('loadTable', {
                            detail: {
                                table: json.table,
                            }
                        }));

                        document.dispatchEvent(new CustomEvent('renderFormModules'));
                        document.dispatchEvent(new CustomEvent('renderTableModules'));
                    })
                    .catch ( error =>  {
    
                        // document.dispatchEvent(new CustomEvent('stopWait'));
    
                        if(error.status == '422'){
        
                            error.json().then(jsonError => {

                                let errors = jsonError.errors;      
                                let errorMessage = '';
            
                                Object.keys(errors).forEach(function(key) {
                                    errorMessage += '<li>' + errors[key] + '</li>';
                                })
                
                                document.dispatchEvent(new CustomEvent('message', {
                                    detail: {
                                        message: errorMessage,
                                        type: 'error'
                                    }
                                }));
                            })   
                        }
    
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