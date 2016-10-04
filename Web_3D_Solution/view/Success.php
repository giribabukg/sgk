<html>
  <head>
    <meta http-equiv="refresh" content="5;phase.php" />
    <title>Countdown Sample</title>
  </head>
  <body>Upload success <span id="seconds">5</span>.
    <script>
      var seconds = 5;
      setInterval(
        function(){
          document.getElementById('seconds').innerHTML = --seconds;
        }, 1000
      );
    </script>
  </body>
</html>