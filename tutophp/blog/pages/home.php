<div class="row">
    <div class="col-sm-8">
        <?php

        foreach (\app\Table\Article::getLast() as $post):?>
            <h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>
            <p><em><?= $post->categorie ?></em></p>
            <p><?= $post->extrait ?></p>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach(\app\Table\Categorie::all() as $categorie): ?>
                <li><a href="<?= $categorie->getUrl(); ?>"><?= $categorie->titre; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
