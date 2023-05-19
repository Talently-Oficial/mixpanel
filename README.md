# Talently MixPanel

## Descripción

Paquete que permite enviar datos de las diferentes plataforma de Talently al servicio de análisis de MixPanel.

### Dependencias

```json
php: ^7.2|^8.1,
mixpanel/mixpanel-php: 2.*,
illuminate/support: ^6.0|^7.0|^8.0|^9.0
```

### Instalación via composer.json

```json

"require": {
    ...
    "talently/mixpanel": "*",
    ...
},

"repositories": [
    ...
    {
        "type": "vcs",
        "url": "https://github.com/Talently-Oficial/mixpanel.git"
    },
    ...
],
```

### Plataformas soportadas

- Business
- Web
- Everest
- Office

## Uso 

```php
# Envio para la plataforma de business
$mixpanel = MixPanel::driver('business');
$mixpanel->identify($userIdentify);
$mixpanel->track($eventName, $eventData);

# Envio para la plataforma de office
$mixpanel = MixPanel::driver('office');
$mixpanel->identify($userIdentify);
$mixpanel->track($eventName, $eventData);
```

## Autores

- Jhorman Tasayco - [jhormantasayco@gmail.com](jhormantasayco@gmail.com)
- Robert Paredes - [robert.paredes@outlook.com](robert.paredes@outlook.com)

## Versionamiento

- 0.0.1 (19/05/2023)
    - Implementación del proyecto base
