<?php require_once('layouts/header.php') ?>
    <form action="terminal.php" method="post">
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
          <input type="submit" name="submit" value="Jugar">
        </div>
    </form>
<?php require_once('layouts/footer.php') ?>
