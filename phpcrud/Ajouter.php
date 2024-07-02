<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login php</title>
    <link rel="stylesheet" href="Ajouter.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="#" autocomplete="off" class="sign-in-form"enctype="multipart/form-data" >

              <div class="heading">
                <h2> Login !</h2>
              
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    maxlength="10"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Nom</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="text"
                    maxlength="10"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Prenom</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="number"
                    maxlength="10"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Age</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="text"
                    maxlength="10"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Matricule</label>
                </div>

                <input type="submit" value="Se Connecter" class="sign-btn" />
              </div>
              <div class="creer">
                  <h6>Creer un Compte?</h6>
                  <a href="#" class="toggle">Sing Up</a>
              </div>
            </form>

            <form action="Ajout.php" autocomplete="off" class="sign-up-form" method="post"enctype="multipart/form-data" >
              <div class="heading">
                <h2>Creer !</h2>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    maxlength="10"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="nom"
                  />
                  <label for="nom" >Nom</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="text"
                    maxlength="10"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="prenom"
                  />
                  <label for="prenom" >Prenom</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="number"
                    maxlength="10"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="age"
                  />
                  <label  for="age">Age</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="text"
                    maxlength="10"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="matricule"
                  />
                  <label for="matricule" >Matricule</label>
                </div>

                <input type="submit" value="Creer" class="sign-btn" />
              </div>
              <div class="creer">
                <h6>Avez-vous un Compte?</h6>
                <a href="#" class="toggle">Sing in</a>
              </div>
            </form>
          </div>

          <div class="carousel">
            <button class="parcourir">Parcourir</button>
            <input type="file" id="fileInput" accept="image/*" style="display:none;" name="photo">            
            <div class="photo" id="photo">
              <div class="tuf">
                <img src="img/Admin.png" alt="" width="250px" height="200px">
              </div>
             
            </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
