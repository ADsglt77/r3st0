<?php
$voirAimer = getAimerByIdR($idR, $mailU);

    if ($voirAimer) {
        echo "<h1>$leResto->nomR<a href='./?action=aimer&idR=$leResto->idR'><img class='aimer' src='images/aime.png' alt='je like ce restaurant'></a></h1>";
    } else {
        echo "<h1>$leResto->nomR<a href='./?action=aimer&idR=$leResto->idR'><img class='aimer' src='images/aimepas.png' alt='je ne like pas ce restaurant'></a></h1>";
    }
?>


<?php
    echo "<span id='note'>";
    for ($i = 1; $i <= 5; $i++) {
        echo "<img class='note' src='images/like.png' alt=''>";
    }
    echo "</span>";
?>

<section>
    <h3>Type de cuisine</h3>
    <ul id="tagFood">
    <?php
        foreach ($lesTypesCuisines as $unTypeCuisine){
        ?>
        <ul id="tagFood">
            <li class="tag">
                <span class="tag">#</span>
            <?php 
                echo $unTypeCuisine->libelleTC;
            ?>
            </li>		
        </ul>
        <?php
        }
        ?>	
    </ul>	
</section>
<section>
    <h3>Description</h3>  
    <?php
    echo $leResto->descR;
    ?>
</section>

<h2 id="adresse">
    Adresse
</h2>
<p>
    <?php
    echo $leResto->numAdrR;
    echo " ";
    echo $leResto->voieAdrR;
    echo "</br>";
    echo $leResto->cpR;
    echo " ";
    echo $leResto->villeR;
    ?>
</p>

<h2 id="photos">
    Photos
</h2>
<ul id="galerie">
    <?php
    foreach ($lesPhotos as $laPhoto){
    ?>
    <li>
        <?php
        echo "<img class='galerie' src='photos/$laPhoto->cheminP' alt=''>";
        ?>
    </li>  
<?php
    }
?>
</ul>

<h2 id="horaires">
    Horaires
</h2> 
<p>
    <?php
    echo $leResto->horairesR;
    ?>
</p>

<h2 id="crit">Critiques</h2>
<ul id="critiques">
    <?php
    foreach ($lesCritiques as $laCritique){
    ?>
    <li>
        <?php
        echo $laCritique->mailU,"</br>",$laCritique->note,"/5 ",$laCritique->commentaire;
        echo "</br>";
        echo "<a href='./?action=critiquer&idR=$leResto->idR'>Supprimer</a>";
        ?>
    </li>  
<?php
    }
?>
</ul>

