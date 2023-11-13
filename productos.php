<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="../kkk/legion1997/css/est.css">
    <style>
        /* Estilos CSS aquí si es necesario */
      
    </style>
</head>
<body>

    <div class="card">
        <div class="imgBox">
            <img src="s1.jpeg" alt="shoe" width="50" heigh="50">
        </div>
        <div class="details">
            <h3>Walk Over <br> <span>Charol</span></h3>
            <h4>Detalles</h4>
            <p>Realizados con punta pvc, cuero de chivo, antideslizante, ligero y reforzado con cáñamo</p>
            <h4>Talla</h4>
            <ul class="size">
                <li onclick="selectSize(this)">34</li>
                <li onclick="selectSize(this)">35</li>
                <li onclick="selectSize(this)">40</li>
                <li onclick="selectSize(this)">41</li>
                <li onclick="selectSize(this)">44</li>
            </ul>
            <div class="group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" min="1" value="1">
                <h2> <sup>Bs.</sup>210 <small>.00</small></h2>
                <button class="add-to-cart" onclick="addToCart('Walk Over Charol', 210.00, selectedSize, document.getElementById('cantidad').value)">Agregar al Carrito</button>
            </div>
        </div>
    </div>

    <!-- Repite la estructura para otros productos -->

    <h1>Carrito de Compras</h1>

    <ul id="lista-carrito">
        <!-- Aquí se mostrarán los productos agregados al carrito -->
    </ul>

    <p>Total: $<span id="total">0.00</span></p>

    <button class="add-to-cart" onclick="eliminarCarrito()">Eliminar Carrito</button>
    <button class="add-to-cart" onclick="enviarPedido()">Enviar Pedido</button>

    <script>
        let selectedSize = null;
        let carrito = [];
        let total = 0;

        function selectSize(element) {
            // Resetea estilos para todas las tallas
            const sizeList = document.querySelectorAll('.size li');
            sizeList.forEach(item => item.classList.remove('selected'));

            // Marca como seleccionada la talla clicada
            element.classList.add('selected');
            selectedSize = element.textContent;
        }

        function addToCart(nombre, precio, talla, cantidad) {
            if (selectedSize) {
                const producto = {
                    nombre: nombre,
                    precio: precio,
                    talla: talla,
                    cantidad: parseInt(cantidad)
                };

                carrito.push(producto);
                total += precio * producto.cantidad;

                actualizarCarrito();
            } else {
                alert('Por favor, selecciona una talla antes de agregar al carrito.');
            }
        }

        function eliminarCarrito() {
            carrito = [];
            total = 0;

            actualizarCarrito();
        }

        function enviarPedido() {
            if (carrito.length === 0) {
                alert('El carrito está vacío. Agrega productos antes de enviar el pedido.');
                return;
            }

            let mensaje = 'Pedido:\n';
            carrito.forEach(producto => {
                mensaje += `${producto.nombre} - $${producto.precio.toFixed(2)} - Talla: ${producto.talla} - Cantidad: ${producto.cantidad}\n`;
            });
            mensaje += `\nTotal: $${total.toFixed(2)}`;

            // Reemplaza con tu número de WhatsApp
            const numeroWhatsApp = '59170634901';
            const enlaceWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensaje)}`;

            // Redirige a WhatsApp
            window.location.href = enlaceWhatsApp;
        }

        function actualizarCarrito() {
            const listaCarrito = document.getElementById('lista-carrito');
            const totalElemento = document.getElementById('total');

            // Limpiar el carrito previo
            listaCarrito.innerHTML = '';

            // Actualizar la lista del carrito
            carrito.forEach((producto, index) => {
                const li = document.createElement('li');
                li.textContent = `${producto.nombre} - $${producto.precio.toFixed(2)} - Talla: ${producto.talla} - Cantidad: ${producto.cantidad}`;
                listaCarrito.appendChild(li);
            });

            // Actualizar el total
            totalElemento.textContent = total.toFixed(2);
        }
    </script>
</body>
</html>
