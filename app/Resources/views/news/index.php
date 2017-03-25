    <div class="col-md-10 col-md-offset-1">
        <?php if (!$data['news']): ?>
            <div class="text-center">
                <h2 class="alert-danger">Новини відсутні</h2>
            </div>
        <?php endif; ?>
        <?php foreach ($data['news'] as $news): ?>
            <div class="row">
                <h3><?php echo $news['title'] ?></h3>
                <p>
                    <?php echo $news['description'] ?>
                    <a href="<?php echo $news['link'] ?>">Детальніше</a>
                </p>
                <div>
                    <span class="badge"><?php echo $news['pub_date'] ?></span>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="text-center">
            <?php echo $data['pagination']->get(); ?>
        </div>
    </div>