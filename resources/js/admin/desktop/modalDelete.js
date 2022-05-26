export let renderDeleteBox = () => {

    let deleteBox = document.querySelector(".delete-item");
    let deleteConfirm = document.querySelector('.delete-confirm');
    let deleteCancel = document.querySelector('.delete-cancel');

    document.addEventListener("openModalDelete",( event =>{
        
        deleteConfirm.dataset.url = event.detail.url;
        deleteBox.classList.add('active');
    }));

    deleteCancel.addEventListener("click", () => {
        deleteBox.classList.remove('active');
    });

    deleteConfirm.addEventListener("click", () => {

        let url = deleteConfirm.dataset.url;
    
        let sendDeleteRequest = async () => {

            let response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                },
                method: 'DELETE', 
            })
            .then(response => {
                          
                if (!response.ok) throw response;

                return response.json();
            })
            .then(json => {

                if(json.table){
                    document.dispatchEvent(new CustomEvent('loadTable', {
                        detail: {
                            table: json.table,
                        }
                    }));
                }

                document.dispatchEvent(new CustomEvent('loadForm', {
                    detail: {
                        form: json.form,
                    }
                }));

                deleteBox.classList.remove('active');

                document.dispatchEvent(new CustomEvent('renderFormModules'));
                document.dispatchEvent(new CustomEvent('renderTableModules'));
            })
            .catch(error =>  {

                document.dispatchEvent(new CustomEvent('stopWait'));

                if(error.status == '500'){
                    console.log(error);
                };
            });
        };

        sendDeleteRequest();
    });   
}

