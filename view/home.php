<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/let's%20Chat/home">Let's Chat</a>
            <form method="post" autocomplete="off" action="search" class="d-flex">
                <a type="button" data-bs-toggle="modal" data-bs-target="#friends"><i class="bi bi-people-fill "
                        style="font-size: 25px;"></i>
                    <div class="px-4">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#notification"><i class="bi bi-bell "
                                style="font-size: 24px;"></i>
                            <?php if(count($allinvitations) != 0 ){ ?> <span
                                class="position-absolute top-20 start-60 translate-middle p-1 bg-danger border border-light rounded-circle">
                            </span> <?php } ?>
                        </a>
                    </div>
                    <a type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?=$_SESSION['email']?>"
                        id="img"><img class="px-3" src="<?=$_SESSION['image']?>"
                            style="width:70px;height:auto; border-radius : 100%"></a>
                    <input class="form-control me-2" name="key" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <form method="post" autocomplete="off" action="request">
        <div class="container-fluid p-5">
            <table class="table table-hover text-center align-middle">
                <tbody>
                    <?php  if(isset($allUsers)){ foreach($allUsers as $user) { ?>
                    <tr>
                        <td><img src="<?=$user['image']?>" style="width:60px;height:auto; border-radius : 100%"></td>
                        <td><?=$user['email']?></td>
                        <td> <?php 
      foreach($invitations as $inv){
      if(($inv['reciver'] == $user['IDutilisateur'] && $inv['etat']=='accepted') or ($inv['sender'] == $user['IDutilisateur'] && $inv['etat']=='accepted')){ ?>
                            <button type="submit" class="btn btn-success" disabled name="request"
                                value="<?=$user['IDutilisateur']?>"><i class="bi bi-person-check px-2"></i></button>
                        </td>
                        <?php } } ?>
                        <td id="he">
                            <?php 
            $count = 0 ;
            foreach($invitations as $inv){
                if($inv['reciver'] == $user['IDutilisateur'] && $inv['etat']=='requested'){ ?>
                            <button type="submit" class="btn btn-secondary" disabled name="request"
                                value="<?=$user['IDutilisateur']?>">invited <i
                                    class="bi bi-hourglass px-2"></i></button>
                            <?php }elseif($inv['reciver'] == $user['IDutilisateur'] && $inv['etat']=='accepted'){ ?>
                            <button type="button" class="btn btn-outline-success" name="dialog" data-bs-toggle="modal"
                                data-bs-target="#message<?=$user["IDutilisateur"]?>"> Message <i
                                    class="bi bi-chat-dots px-2"></i></button>
                            <?php }elseif($inv['sender'] == $user['IDutilisateur'] &&  $inv['etat']=='accepted'){ ?>
                            <button type="button" class="btn btn-outline-success" name="dialog" data-bs-toggle="modal"
                                data-bs-target="#message<?=$user["IDutilisateur"]?>" id="m<?=$user['IDutilisateur']?>">
                                Message <i class="bi bi-chat-dots px-2"></i></button>
                            <?php }elseif($inv['sender'] == $user['IDutilisateur'] && $inv['etat']=='requested'){ ?>
                            <button type="button" class="btn btn-outline-warning" name="dialog" data-bs-toggle="modal"
                                data-bs-target="#notification">pending <i class="bi bi-clock-history px-2"></i></button>
                            <?php }else{
                    $count += 1 ;
                } 
            }
            if(sizeof($invitations) == $count ){  ?>
                            <button type="submit" class="btn btn-outline-primary" name="request"
                                value="<?=$user['IDutilisateur']?>">invite <i
                                    class="bi bi-person-plus px-2"></i></button>
                            <?php   }
        ?>
                        </td>
                    </tr>

                    <?php } }   ?>

                </tbody>
            </table>
        </div>
    </form>

    <?php if(isset($allUsers)){ foreach($allUsers as $user) { ?>
    <form method="post" autocomplete="off" action="send" >
        <div class="modal fade" id="message<?=$user['IDutilisateur']?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                <div class="modal-content" >
                    <div class="modal-header" >
                        <img class="px-3" src="<?=$user['image']?>"
                            style="width:70px;height:auto; border-radius : 100%">
                        <h5 class="modal-title" id="exampleModalLabel"><?=$user['email']?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="div<?=$user['IDutilisateur']?>">
                        <?php foreach ($allMessages as $message ){ if($message['reciverM'] == $_SESSION['id'] and  $message['senderM'] == $user['IDutilisateur']){ ?>
                        <legend><span class="p-2 m-1"
                                style="background-color:#7bd7f7; float:left;font-size:medium;font-weight: bold; border-radius: 0px 15px 15px 15px;"><?=$message['content']?></span>
                        </legend>
                        <?php }elseif($message['senderM'] == $_SESSION['id'] and  $message['reciverM'] == $user['IDutilisateur']){?>
                        <legend><span class="p-2 m-1"
                                style="background-color:#d7f77b; float:right;font-size:medium;font-weight: bold; border-radius: 15px 0px 15px 15px;"><?=$message['content']?></span>
                        </legend>
                        <?php } } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="text" name="message" class="form-control" id="exampleFormControlInput1"
                            placeholder="Message" style="width: 84%;">
                        <button type="submit" class="btn btn-primary" value="<?=$user['IDutilisateur']?>" name="send"><i
                                class="bi bi-send px-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php } } ?>

    <form method="post" autocomplete="off" action="accept">
        <div class="modal fade" id="notification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php if(count($allinvitations) != 0 ){ ?>
                        <table class="table table-hover text-center align-middle">
                            <tbody>
                                <?php  foreach($allinvitations as $not) { ?>
                                <tr>
                                    <td><img src="<?=$not['image']?>"
                                            style="width:60px;height:auto; border-radius : 100%"></td>
                                    <td><?=$not['email']?></td>
                                    <td><button type="submit" class="btn btn-outline-success" name="accept"
                                            value="<?=$not['IDinvitation']?>"><i class="bi bi-check-lg p-1 px-2"
                                                style="font-size: 20px;"></i></button>
                                        <button type="submit" class="btn btn-outline-danger" name="refuse"
                                            value="<?=$not['IDinvitation']?>"><i class="bi bi-x-lg p-1 px-2"
                                                style="font-size: 20px;"></i></button></< /td>

                                        <?php }  ?>

                            </tbody>
                        </table> <?php }else{ ?>
                        <div class="text-center py-3">
                            <i class="bi bi-stars " style="font-size: 30px;"> aucun notification</i>
                        </div>
                        <?php }  ?>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="friends" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Amis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover text-center align-middle">
                        <tbody>
                            <?php  if(isset($allUsers)){ foreach($allUsers as $user) { 
                                foreach($invitations as $inv){
                                    if($inv['reciver'] == $user['IDutilisateur'] && $inv['etat']=='accepted'){ ?>
                            <tr>
                                <td><img src="<?=$user['image']?>" style="width:60px;height:auto; border-radius : 100%">
                                </td>
                                <td><?=$user['email']?></td>
                                <td>
                                    <button type="submit" class="btn btn-success" disabled name="request"
                                        value="<?=$user['IDutilisateur']?>"><i
                                            class="bi bi-person-check px-2"></i></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#message<?=$user["IDutilisateur"]?>"><i
                                            class="bi bi-chat-dots px-2"></i></button>
                                </td>
                                <?php }elseif($inv['sender'] == $user['IDutilisateur'] && $inv['etat']=='accepted'){ ?>
                            <tr>
                                <td><img src="<?=$user['image']?>" style="width:60px;height:auto; border-radius : 100%">
                                </td>
                                <td><?=$user['email']?></td>
                                <td>
                                    <button type="submit" class="btn btn-success" disabled name="request"
                                        value="<?=$user['IDutilisateur']?>"><i
                                            class="bi bi-person-check px-2"></i></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#message<?=$user["IDutilisateur"]?>"><i
                                            class="bi bi-chat-dots px-2"></i></button>
                                </td>
                            </tr>

                            <?php } } } }  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>