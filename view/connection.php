<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        form{
            background-color: lightgray;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<form method="POST" action="check" >
        <div id="div" class="container">
            <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong border-primary overflow-auto  align-middle"
                        style="border-radius: 2rem;" required>
                        <div class="card-body px-xl-5 px-3  py-5 text-center">
                            <h3 class="mb-5">S'identifier </h3>


                            <div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" autocomplete="off" class="form-control" id="floatingInput"
                                        placeholder="Nom d'utilisateur" style="border-radius: 1rem;" required>
                                    <label for="floatingInput">email</label>
                                    
                                </div>

                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floatingPassword"
                                        placeholder="Mote de passe" style="border-radius: 1rem;" required>
                                    <label for="floatingPassword">Mot de passe</label>
                                    
                                </div>

                            </div>
                            <pre></pre>
                            <button class="btn btn-outline-primary" name="login" type="submit"
                                style="height: 50px; width:100% ;border-radius: 1rem;">connection</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>