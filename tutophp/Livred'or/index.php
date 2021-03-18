<?php
require 'vendor/autoload.php';
use App\Guestbook\GeustBook;
use App\Guestbook\Message;


$erreos=null;

if(isset($_POST['username'],$_POST['message'] )){
    $message=new Message($_POST['username'],$_POST['message']);
    {
        if($message->isvalid())
        {
            $gestbook=new GeustBook(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'messages');
            $gestbook->addMessage($message);
        }
        else
        {

            $erreos=$message->getErrors();
        }

    }

}

$message=$gestbook->getMessages();

?>
    <div class="container">
        <h1>Livre d'or </h1>


        <form method="POST" action="index.php">
            <div class="form-group">
                <?php if (!empty($erreos['username'])):  ?>
                    <div class="alert alert-danger">
                        <?= $erreos['username']?>
                    </div>
                <?php endif; ?>
                <input value="<?= $_POST['username'] ?? ''?>" type="text" name="username" placeholder="votre pseudo" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <?php if (!empty($erreos['message'])):  ?>
                    <div class="alert alert-danger">
                        <?= $erreos['message']?>
                    </div>
                <?php endif; ?>
                <textarea <?= htmlentities($_POST['message'] ?? '') ?>  name="message" placeholder="votre pseudo" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary">Envoyer</button>
        </form>

        <h1 class="mt-3">vos message</h1>

        <?php foreach ($message as $messages): ?>

            <?= $messages->toHtml() ?>

        <?php endforeach ?>

    </div>


<?php

require 'elements/footer.php';
?>