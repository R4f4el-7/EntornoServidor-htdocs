<?php
/**| Nombre      | Tipo de dato               | Contiene                           | Clasificación           |
| ----------- | -------------------------- | ---------------------------------- | ----------------------- |
| `$_SERVER`  | Array asociativo           | Información del servidor y entorno | 🔹 Variable superglobal |
| `$_GET`     | Array asociativo           | Datos enviados por método GET      | 🔹 Variable superglobal |
| `$_POST`    | Array asociativo           | Datos enviados por método POST     | 🔹 Variable superglobal |
| `$_FILES`   | Array **multidimensional** | Información de archivos subidos    | 🔹 Variable superglobal |
| `$_COOKIE`  | Array asociativo           | Cookies recibidas                  | 🔹 Variable superglobal |
| `$_SESSION` | Array asociativo           | Datos de sesión del usuario        | 🔹 Variable superglobal |
| `$_REQUEST` | Array asociativo           | Combinación de GET, POST y COOKIE  | 🔹 Variable superglobal |
| `$_ENV`     | Array asociativo           | Variables de entorno               | 🔹 Variable superglobal |

En PHP existen ciertas variables especiales llamadas superglobales.

Son variables predefinidas por PHP, disponibles en todo el ámbito del script (sin necesidad de global o use).

Cada una de esas variables contiene datos específicos y su tipo de dato principal es un array.*/