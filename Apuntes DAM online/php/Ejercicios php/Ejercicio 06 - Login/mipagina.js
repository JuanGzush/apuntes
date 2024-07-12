addEventListener('DOMContentLoaded', () => {

    const productsContainer = document.getElementById('products_container'),
        message = document.getElementById('message');
    let products = [];

    if (productsContainer && message) {
        form.custom_button.addEventListener('click', addProduct);
        form.custom_button.addEventListener('mouseenter', showAddProductMessage);

        function addProduct() {
            if (form.custom_button.textContent !== 'Edit' && form.producto.value !== '') {
                let p = document.createElement('p'),
                    buttons = [],
                    editButton = document.createElement('button'),
                    removeButton = document.createElement('button');

                p.textContent = form.producto.value;

                p.style.textAlign = 'start';
                p.style.width = '29rem';
                p.style.margin = '1rem auto';
                p.style.borderRadius = '.5rem';
                p.style.padding = '.5rem';
                p.style.color = 'dodgerblue';
                p.style.backgroundColor = 'skyblue';

                productsContainer.appendChild(p);

                buttons.push(editButton);
                buttons.push(removeButton);

                buttons.forEach(button => button.setAttribute('type', 'button'));
                buttons.forEach(button => button.style.width = '1rem');
                buttons.forEach(button => button.style.marginRight = '.5rem');
                buttons.forEach(button => button.style.borderRadius = '.3rem');
                buttons.forEach(button => button.style.float = 'right');

                editButton.style.background = 'url(imagenes_estilo/02.png) center / contain no-repeat green';
                removeButton.style.background = 'url(imagenes_estilo/03.png) center / contain no-repeat red';

                p.appendChild(removeButton);
                p.appendChild(editButton);

                products.push(p);

                if (products.length > 0) {
                    form.remove_button.style.visibility = 'visible';
                }

                form.custom_button.textContent = 'Submit';

                message.textContent = 'elemento añadido a la lista';

                message.style.visibility = 'visible';
                message.style.color = 'lightblue';
                message.style.backgroundColor = 'transparent';

                setTimeout(() => {
                    message.style.visibility = 'hidden';
                }, 1500);

                form.producto.value = '';

                editButton.addEventListener('click', event => {
                    changeButtonText(event);
                });

                function changeButtonText() {
                    if (form.custom_button.textContent !== 'Edit') {
                        form.custom_button.textContent = 'Edit';
                    }

                    form.producto.value = p.textContent;

                    form.custom_button.addEventListener('click', editProduct);
                }

                function editProduct() {
                    if (form.custom_button.textContent === 'Edit') {
                        p.textContent = form.producto.value;

                        form.custom_button.textContent = 'Submit';

                        message.textContent = 'valor cambiado';

                        message.style.visibility = 'visible';
                        message.style.color = 'lightblue';
                        message.style.backgroundColor = 'transparent';

                        setTimeout(() => {
                            message.style.visibility = 'hidden';
                        }, 1500);

                        p.appendChild(removeButton);
                        p.appendChild(editButton);

                        form.producto.value = '';

                        form.custom_button.removeEventListener('click', editProduct);
                    }
                }

                removeButton.addEventListener('click', removeProduct);

                function removeProduct() {
                    productsContainer.removeChild(p);

                    products.splice(products.indexOf(p), 1);

                    if (products.length === 0) {
                        form.remove_button.style.visibility = 'hidden';
                    }

                    message.textContent = 'elemento eliminado';

                    message.style.width = '29rem';
                    message.style.margin = '0 auto';
                    message.style.borderRadius = '.5rem';
                    message.style.padding = '.5rem';
                    message.style.visibility = 'visible';
                    message.style.color = 'royalblue';
                    message.style.backgroundColor = 'lightcoral';

                    setTimeout(() => {
                        message.style.visibility = 'hidden';
                    }, 1500);

                }

                form.remove_button.addEventListener('click', removeAllProducts);

                function removeAllProducts() {
                    for (let product of products) {
                        productsContainer.removeChild(product);
                    }

                    while (products.length > 0) {
                        products.pop();
                    }

                    if (products.length === 0) {
                        form.remove_button.style.visibility = 'hidden';
                    }

                    message.textContent = 'lista vacía';

                    message.style.width = '29rem';
                    message.style.margin = '0 auto';
                    message.style.borderRadius = '.5rem';
                    message.style.padding = '.5rem';
                    message.style.visibility = 'visible';
                    message.style.color = 'royalblue';
                    message.style.backgroundColor = 'lightcoral';

                    setTimeout(() => {
                        message.style.visibility = 'hidden';
                    }, 1500);
                }
            }
        }
    }

    function showAddProductMessage() {
        if (form.custom_button.textContent !== 'Edit') {
            message.textContent = 'por favor añada algún elemento';
            message.style.visibility = 'visible';
            message.style.color = 'lightblue';
            message.style.backgroundColor = 'transparent';

            setTimeout(() => {
                message.style.visibility = 'hidden';
            }, 1500);
        }
    }

})
