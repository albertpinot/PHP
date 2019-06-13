
<?php
/**
 * Nous voulons juste hacher notre mot de passe en utiliant l'algorithme par défaut.
 * Actuellement, il s'agit de BCRYPT, ce qui produira un résultat sous forme de chaîne de
 * caractères d'une longueur de 60 caractères.
 *
 * Gardez à l'esprit que DEFAULT peut changer dans le temps, aussi, vous devriez vous
 * y préparer en autorisant un stockage supérieur à 60 caractères (255 peut être un bon choix)
 */
    $hash=password_hash("rasmuslerdorf", PASSWORD_DEFAULT);

    if (password_verify('rasmusledorf', $hash)) {
        echo 'Le mot de passe est valide !';
    } else {
        echo 'Le mot de passe est invalide.';
    }
?>
