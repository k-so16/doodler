<?php header("Content-Type: text/css"); ?>
@charset utf-8;

body {
  margin:  0px;
  padding: 0px;
}

header {
  display: flex;
  margin:     0px;
  padding:    10px 10px;
  background: #4d4d4d;
  color:      #f9f9f9;
}

header h1 {
  margin:  0px;
  font-size: 20pt;
}

header h1 a {
  color: inherit;
  text-decoration: none;
}

header div.draw {
  display: flex;
  justify-content: flex-end;
  flex-grow: 1;
}

header div.draw a {
  padding: 3px 5px;
  border: outset 3px;
  border-radius: 15px;
  color: inherit;
  font-weight: bold;
  text-decoration: none;
}

header div.draw a:hover {
  background: #282828;
  border: inset 3px;
  text-decoration: underline;
}

table.doodles {
  margin: 20px auto;
  border: solid 1px;
  border-collapse: collapse;
}

table.doodles th, table.doodles td {
  padding: 3px 5px;
  border: solid 1px;
  border-collapse: collapse;
}

table.doodles td:first-child img {
  width: 60px;
  height: 60px;
}

<?php $config = require_once(__DIR__ . '/../../config/css.php'); ?>
div#content {
  display: flex;
  margin-top: 20px;
  margin-bottom: 20px;
  justify-content: center;
}

.doodleSet {
  /* display: table; */
  /* margin:   20px auto; */
}

canvas {
  width:  <?= $config['width'] ?>px;
  height: <?= $config['height'] ?>px;
  border: inset 3px;
  background: url('../img/bg_white.png');
}

<?php foreach($config['colors'] as $color): ?>
td.<?= $color ?> {
  background: <?= $color ?>;
  width: 20px;
  height: 20px;
  border: inset 2px;
}
<?php endforeach; ?>

table.bg_palette td {
  padding: 2px 4px;
}

table.bg_palette td label {
  display: flex;
}

table.bg_palette td img {
  border: inset 2px;
}

div.doodleSet button {
  color: #f9f9f9;
  background: #4d4d4d;
  border-radius: 10px;
  font-size: 14pt;
}

table.form {
  border: solid 1px;
  border-collapse: collapse;
}

table.form td {
  border: solid 1px;
  padding: 3px 5px;
  font-size: 13pt;
  border-collapse: collapse;
}

table.form td.submit {
  text-align: center;
}

td.submit button {
  /* font-size: 13pt; */
}

footer .copyright {
  margin-right: 15px;

  color:       #0000ff;
  font-size:   10pt;
  font-weight: bold;
  font-family: "Courier New", monospace;
  text-align:  right;
}
