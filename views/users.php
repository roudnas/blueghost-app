<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Blueghost app</title>
    <meta name="description" content="This is an example of a meta description.">
    <link rel="stylesheet" type="text/css" href="theme.css">
  </head>
  <body>
      <table>
        <thead>
          <tr>
            <td>Jmeno</td>
            <td>Prijmeni</td>
            <td>Email</td>
            <td>Poznamka</td>
            <td>Akce</td>
          </tr>
        </thead>
        <tbody>
    <?php foreach($_users as $user): ?>	
          <tr>
            <td><?= $user->name() ?></td>
            <td><?= $user->surname() ?></td>
            <td><?= $user->email() ?></td>
            <td><?= $user->note() ?></td>
            <td>
              <form method="POST">
              <button type="submit">
                <a href="/<?= $user->url()?>">Upravit</a>
              </button>    
              <button type="submit">
                <a href="/delete/<?=$user->url()?>">Smazat</a>
              </button>
              </form>
            </td>
          </tr>
    <?php endforeach; ?>
        </tbody>
      </table>
      <p>Pridani uzivatele</p>
      <form method="POST">
      <input type='hidden' name="add-user">
      <div>
      <label>Jmeno</label>
        <input name="name" type='text' value="">
      </div>
      <div>
      <label>Prijmeni</label>
        <input name="surname" type='text' value="">
      </div>
      <div>
      <label>Email</label>
        <input name="email" type='text' value="">
      </div>
      <div>
      <label>Note</label>
        <textarea name="note">
        </textarea>
      </div>
      <button type="submit">Pridat</button>
      </form>
  </body>
</html>
