<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Blueghost app</title>
    <meta name="description" content="This is an example of a meta description.">
    <link rel="stylesheet" type="text/css" href="theme.css">
  </head>
  <body>
      <form method="POST">
        <input type='hidden' name='edit-user'>
        <input type='hidden' name="id" value="<?=$_user->url()?>">
        <input type='text' name="name" value="<?= $_user->name() ?>">
        <input type='text' name="surname" value="<?= $_user->surname() ?>">
        <input type='text' name="email" value="<?= $_user->email() ?>">
        <input type='text' name="note" value="<?= $_user->note() ?>">
        <button type="submit">Ulozit</button>
      </form>
  </body>
</html>
