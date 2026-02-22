<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>VM Embed</title>
  <script>
    window.__GEODIT__ = {
      desktopStage: @json($stage),
      desktopProfile: {iconview:false, widgetsEnabled:false, notificationsPanel:false, showDesktopEntries:false, autoLaunch:[]},
      desktopEntries: [],
      appRegistry: [],
      widgetRegistry: [],
      baseUrl: @json($baseUrl),
      vmRole: 'guest'
    };
  </script>
</head>
<body>
  <p style="font-family:Arial;padding:16px">VM package embed prêt. Branche le runtime OS.js ici.</p>
</body>
</html>
