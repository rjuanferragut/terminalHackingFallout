<?php require_once('layouts/header.php') ?>
    <form action="terminal.php" method="post" style="margin:20%;">
        <div style="margin: 0 auto; margin-bottom: 15px; width: 50%; padding: 10px; background: #00F501; color: #000; text-transform: uppercase">
          <input type="radio" name="difficult" value="1" checked> Easy
        </div>
        <div style="margin: 0 auto; margin-bottom: 15px; width: 50%; padding: 10px; background: #00F501; color: #000; text-transform: uppercase">
          <input type="radio" name="difficult" value="2"> Normal
        </div>
        <div style="margin: 0 auto; margin-bottom: 15px; width: 50%; padding: 10px; background: #00F501; color: #000; text-transform: uppercase">
          <input type="radio" name="difficult" value="3"> Hard
        </div>
        <div style="margin: 0 auto; margin-bottom: 15px; width: 50%;">
          <input style="padding: 10px 15px; float: right; text-transform: uppercase; font-family: 'Share Tech Mono', monospace; background: #00F501; border: 0" type="submit" name="submit" value="Jugar">
        </div>
    </form>
<?php require_once('layouts/footer.php') ?>
