<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/21/13
 * Time: 11:10 PM
 */

$running_page="shop";
?>
<section>
    <br>

    <br>
    <br>
    <p><a class="btn btn-primary" href="index.php?module=admin_products&action=admin_products_show&log_out=1">Log Out</a></p>

    <?php
    if(!empty($autres_erreurs))
    {
        echo '<ul list-style-type="none" style="color:red;">'."\n";
        foreach($autres_erreurs as $e)
        {
            echo '<li>'.$e.'</li>'."\n";
        }
        echo '<ul>';
    }


    ?>

<div id="form">
    <form action="" method="post">
        <p style="text-align: center; color:#7A7A7A; padding-top:50px; padding-bottom:50px;" >



        <table id="entry">
            <tr>
                <td><input type="text" name="auteur" size="50%" placeholder="Auteur" value="<?php if(isset($news)) echo $news->auteur(); ?>" />
                    <?php if (isset($erreurs) && in_array(News::AUTEUR_INVALIDE, $erreurs)) echo '<span style="color:red;">L\'auteur est invalide.</span>'; ?></td>
            </tr>
            <tr>
                <td style="margin-left:0;"><input type="text" size="50%" name="titre" id="titre" placeholder="Titre"  value="<?php if(isset($news)) echo $news->titre(); ?>" />
                    <?php if (isset($erreurs) && in_array(News::TITRE_INVALIDE, $erreurs)) echo '<span style="color:red;">Le titre est invalide.</span>'; ?></td>
            </tr>

            <tr>
                <td>
                    <textarea rows="8" placeholder="Contenu de l'actualité" cols="60%" name="contenu"><?php if (isset($news)) echo $news->contenu(); ?></textarea><br />
                    <?php if (isset($erreurs) && in_array(News::CONTENU_INVALIDE, $erreurs)) echo '<span style="color:red;">Le contenu est invalide.</span>'; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <?php
                if(isset($news) && !$news->isNew())
                {
                    ?>

                    <input type="hidden" name="id" value="<?php echo $news->id(); ?>" />
                    <td align="center"><input id="submit" type="submit" value="Modifier" name="modifier" /></td>

                <?php
                }
                else
                {
                ?>

                <td align="center"><input id="submit" type="submit" value="Ajouter" name="submit" /></td>
            </tr>
        </table>
        <?php
        }

        ?>

        </p>
    </form>
</div>
<br>
    <?php
    if(isset($message))
        echo $message;
    ?>
<br>
<p style="text-align: center">Il y a actuellement <?php echo
    $manager->count(); ?> news.</p>
    <br>
    <br>
<table id="show">
    <tr>
        <th>Auteur</th>
        <th>Titre</th>
        <th>Date d'ajout</th>
        <th>Dernière modification</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($manager->getList() as $news)
        echo '
            <tr>
                <td>'. $news->auteur(). '</td>
                <td>'. $news->titre().'</td>
                <td>'. $news->dateAjout(). '</td>
                <td>'. ($news->dateAjout() == $news->dateModif() ? '-' : $news->dateModif()). '</td>
                <td><a href="index.php?module=admin&amp;action=admin&amp;modifier='. $news->id(). '">Modifier</a> | <a href="index.php?module=admin&amp;action=admin&amp;supprimer='.$news->id(). '">Supprimer</a></td>
            </tr>'. "\n";
    ?>
</table>
</section>

