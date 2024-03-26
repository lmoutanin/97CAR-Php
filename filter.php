
<?php
function filterchar($a)
{
    
    $nettoyage = htmlspecialchars($_POST[$a], ENT_QUOTES, 'UTF-8');
    return $nettoyage;
}
?>