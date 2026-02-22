<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>VM Embed</title>
  <script>
    window.__GEODIT__ = {
      desktopStage: @json($stage),
      desktopProfile: {
        iconview: false,
        widgetsEnabled: false,
        notificationsPanel: false,
        showDesktopEntries: false,
        autoLaunch: []
      },
      desktopEntries: [],
      appRegistry: [],
      widgetRegistry: [],
      baseUrl: @json($baseUrl),
      vmRole: 'guest'
    };
  </script>
  <base href="{{ $osjsBaseUrl }}/" />
  <link rel="shortcut icon" href="{{ $osjsBaseUrl }}/favicon.png?v={{ $osjsJsV }}" />
  <link href="{{ $osjsBaseUrl }}/vendors~osjs.css?v={{ $vendorsCssV }}" rel="stylesheet" />
  <link href="{{ $osjsBaseUrl }}/osjs.css?v={{ $osjsCssV }}" rel="stylesheet" />
</head>
<body>
  <script src="{{ $osjsBaseUrl }}/vendors~osjs.js?v={{ $vendorsJsV }}"></script>
  <script src="{{ $osjsBaseUrl }}/osjs.js?v={{ $osjsJsV }}"></script>
</body>
</html>
