<?php
/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 15:24
 */
include_once "headband.html";
?>
<body>
    <h1>Welcome on homepage</h1>
    <?php foreach ($recipesList as $recipe){ ?>
        <div class="recipe-vignette row">
            <div class="col-md-3">
                <?php echo '<a href="index?action=display_recipe&idRecipe='.$recipe->getId().'">';
                    echo '<img name="path" src="'.$recipe->getPictures()[0].'" alt="mainPicture" class="img-thumbnail" width="300" height="200">'; ?>
                </a>
            </div>
            <div class="col-md-5">
                <?php echo '<a href="index?action=display_recipe&idRecipe='.$recipe->getId().'">'; ?>
                    <h3><?php echo $recipe->getName() ?></h3>
                </a>
                <p><?php echo $recipe->getDescription() ?></p>
                <h5>Level of difficulty : <?php echo $recipe->getDifficulty() ?></h5>
                <h5>Duration : <?php echo $recipe->getTime() ?></h5>
            </div>
        </div>
    <?php } ?>
</body>
