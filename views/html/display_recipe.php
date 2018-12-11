<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 06/12/2018
 * Time: 19:42
 */
include_once "headband.html";
?>
<body>
    <div class="display-recipe">
        <h1><?php echo $recipe->getName() ?></h1>
        <?php echo '<img name="path" src="'.$recipe->getPictures()[0].'" alt="mainPicture" class="img-thumbnail" width="200" height="100">'; ?>
        <p><?php echo $recipe->getDescription() ?></p>
        <h5>Level of difficulty : <?php echo $recipe->getDifficulty() ?></h5>
        <h5>Duration : <?php echo $recipe->getTime() ?></h5>
        <h3>Ingredients : </h3>
        <?php
            for($i=0;$i<count($recipe->getIngredients());$i++){
                echo '<div class="ingredient row">';
                    echo '<div class="col-md-1">';
                        echo '<img name="path" src="'.$recipe->getIngredients()[$i]->getPicture().'" alt="..." class="img-thumbnail" width="50" height="50">';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                        echo '<p>'.$recipe->getIngredients()[$i]->getName().'</p>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                        echo '<p>'.$recipe->getIngredients()[$i]->getQuantity().'</p>';
                    echo '</div>';
                echo '</div>';
            }
        ?>

        <h3>Steps : </h3>
        <?php
            for($i=0;$i<count($recipe->getSteps());$i++){
                echo '<div class="step">';
                    echo '<h5>Step '.$i.' : '.$recipe->getSteps()[$i]->getName().'</h5>';
                    echo '<p>'.$recipe->getSteps()[$i]->getDescription().'</p>';
                echo '</div>';
            }
        ?>

    </div>
</body>
