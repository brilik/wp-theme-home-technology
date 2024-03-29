<?php ar_the_view('breadcrumbs') ?>
<section class="box-questions">
    <div class="wrapper">
        <h1 class="title wow fadeInDown"><?php the_title(); ?></h1>
        <div class="box-questions__wrap">
            <div class="questions wow fadeInLeft" data-wow-delay=".2s">
                <?php foreach( $args['items'] as $key => $item ): ?>
                <?php $active = ($key === 0) ? ' active' : ''; ?>
                <div class="questions-row">
                    <div class="questions-row__top js-questions-row<?= $active; ?>">
                        <div class="questions-row__title"><?= $item['title']; ?></div>
                        <div class="questions-row__icon">
                            <i class="icon-arrow-top"></i>
                        </div>
                    </div>
                    <?php if( $item['faq'] ): ?>
                    <ul class="questions-list"<?= ($active)? ' style="display: block;"' : ''; ?>>
                        <?php foreach ($item['faq'] as $key2 => $value ): ?>
                        <?php $active = ( ($active) && (!$key2) ) ? ' active' : ''; ?>
                        <li class="questions-list__item<?= $active ?>">
                            <a href="<?= "#tab_$key"."-$key2"; ?>" class="questions-list__link"><?= get_the_title($value); ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="answers wow fadeInRight" data-wow-delay=".2s">
                <?php foreach( $args['items'] as $key => $item ): ?>
                <?php foreach ($item['faq'] as $key2 => $value ): ?>
                <div class="tab-cont<?= ($key || $key2) ? ' hide' : ''; ?>" id="<?= "tab_$key". "-$key2"; ?>">
                    <div class="questions-row__title"><?= get_the_title($value); ?></div>
                    <div class="answers__desc-wrap">
                        <p class="answers__desc"><?= get_post_field('post_content', $value); ?></p>
                    </div>
                    <div class="answers__link-wrap">
                        <div class="answers__link js-answers-more"><span>Подробнее</span><span>Свернуть</span></div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>