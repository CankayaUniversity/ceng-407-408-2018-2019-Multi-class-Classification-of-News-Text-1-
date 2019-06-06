<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Mutlilabel Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site Description Here">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="dist/style.css" rel="stylesheet">
        <script src="dist/index.var.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>-->
        <script type="text/javascript">

function timedMsg()
{
var t=setTimeout("document.getElementById('msg').style.display='none';",3000);
}

</script>
        <script>
            let globalOptions =  {
                maxNotifications: 10,
animationDuration: 300,
position: "top-left",
labels: {
  tip: "Tip",
  info: "Info",
  success: "Success",
  warning: "Attention",
  alert: "Error",
  async: "Loading",
  confirm: "Confirmation required",
  confirmOk: "OK",
  confirmCancel: "Cancel"
},
icons: {
  tip: "question-circle",
  info: "info-circle",
  success: "check-circle",
  warning: "exclamation-circle",
  alert: "exclamation-triangle",
  async: "cog fa-spin",
  confirm: "exclamation-triangle",
  prefix: "<i class='fa fas fa-fw fa-",
  suffix: "'></i>",
  enabled: true
},
messages: {
  tip: "",
  info: "",
  success: "Action has been succeeded",
  warning: "",
  alert: "Action has been failed",
  confirm: "This action can't be undone. Continue?",
  async: "Please, wait...",
  "async-block": "Loading"
},
formatError(err) {
  if (err.response) {
    if (!err.response.data) return '500 API Server Error'
    if (err.response.data.errors) {
      return err.response.data.errors.map(o => o.detail).join('<br>')
    }
    if (err.response.statusText) {
      return `${err.response.status} ${err.response.statusText}: ${err.response.data}`
    }
  }
  if (err.message) return err.message
  return err
},
durations: {
  global: 5000,
  success: null,
  info: null,
  tip: null,
  warning: null,
  alert: null
},
minDurations: {
  async: 1000,
  "async-block": 1000
}
        }
  var notifier = new AWN(globalOptions);
</script>
    </head>
    <body class="dropdowns--hover">
