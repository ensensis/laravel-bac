<?php

return [
    /*
     * Corresponde al valor de "Id. de clave"
     *
     * - Ubicación: Inicio / Opciones del Portal / Claves de seguridad
     * - Ejemplo: 13845656
     */
    'key' => '',

    /*
     * Corresponde al valor de "Clave"
     *
     * - Ubicación: Inicio / Opciones del Portal / Claves de seguridad
     * - Ejemplo: ZV75YyRUBNUds432307Cx666e
     */
    'key_id' => '',

    /*
     * Para solicitar una autorización de compra, el comercio debe realizar una petición web a través del método POST
     * utilizando variables específicas como parte del formulario. Así mismo el formulario debe ser direccionado a la
     * siguiente URL
     */
    'gateway' => 'https://credomatic.compassmerchantsolutions.com/api/transact.php',

    /*
     * URL hacia el cual el Sistema de Pagos de Credomatic enviará respuesta al Afiliado. Debe ser una página capaz de
     * procesar peticiones por GET.
     *
     * - Dejar vacío o null para retornar respuesta como un array
     * - Definir una URL para redirigir a los usuarios después del pago
     */
    'redirect' => null,
];