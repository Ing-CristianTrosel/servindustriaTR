<?php
namespace app\enrutador;

class Router {
    private array $routes = [];

    public function agregar(string $path,string $clase , string $metodo): void {
        $this->routes[$path] = [$clase,$metodo];
    }

    public function dispatch(string $path): void {
        if (array_key_exists($path, $this->routes)) {
            $handler = $this->routes[$path];

            if (is_array($handler)) {
                [$clase, $metodo] = $handler;
                    $clase = 'app\controlador\\'.$clase;
                if (class_exists($clase)) {
                    $instancia = new $clase();

                    if (method_exists($instancia, $metodo)) {
                        call_user_func([$instancia, $metodo]);
                    } else {
                        echo "El método '{$metodo}' no existe en la clase '{$clase}'.";
                    }
                } else {
                    echo "La clase '{$clase}' no fue encontrada. Asegúrate de usar el namespace correcto o revisar el autoload.<br>";
                }
            } 
        } else {
            http_response_code(404);
            echo "Página no encontrada";
        }
    }
}