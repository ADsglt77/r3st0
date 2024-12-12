<h1>Liste des restaurants</h1>

<?php
foreach ($lesRestos as $unResto)
{  
    $laPhoto = getLaPhotoByIdR($unResto->idR);
    $lesTypesCuisine = getLesTypesCuisinebyIdR($unResto->idR);
?>
<div class="card">
    <div class="photoCard">
    <?php
    echo "<img src='photos/$laPhoto->cheminP'>";
    ?>
    </div>
    <?php
    echo "<a href='./?action=detail&idR=$unResto->idR'>$unResto->nomR</a>";
    ?>
    <br>
    <?php
    echo $unResto->numAdrR;
    echo " ";
    echo $unResto->voieAdrR;
    ?>
    <br>
    <?php
    echo $unResto->cpR;
    echo " ";
    echo $unResto->villeR;
    ?>
    
    <div class="tagCard">
    <?php
        foreach ($lesTypesCuisine as $lesTypesCuisine){
        ?>
        <ul id="tagFood">
            <li class="tag">
                <span class="tag">#</span>
            <?php 
                echo $lesTypesCuisine->libelleTC;
            ?>
            </li>		
        </ul>
        <?php
        }
        ?>
    </div>
    
</div>
<?php
}
?>