/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {

            // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
            var $container = $('div#personne_achatProduits');

            // On ajoute un lien pour ajouter un nouveau livre
            var $addLink = $('<a href="#" id="add_achatProduits" class="btn btn-success">Ajouter un produit</a>');
            $container.append($addLink);

            // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
            $addLink.click(function(e) {
                addProduit($container);
                e.preventDefault(); // évite qu'un # apparaisse dans l'URL
                return false;
            });


            // On définit un index unique pour nommer les champs qu'on va ajouter dynamiquement
            var index = $container.find(':input').length;

            // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un .
            if (index != 0)  {
                // Pour chaque livre déjà existant, on ajoute un lien de suppression
                $container.children('div').each(function() {
                    addDeleteLink($(this));
                });
            }

            // La fonction qui ajoute un formulaire Livre
            function addProduit($container) {
                // Dans le contenu de l'attribut « data-prototype », on remplace :
                // - le texte "__name__label__" qu'il contient par le label du champ
                // - le texte "__name__" qu'il contient par le numéro du champ
                var $prototype = $($container.attr('data-prototype').replace(/__name__label__/g, 'Produit n°' + (index+1))
                        .replace(/__name__/g, index));

                // On ajoute au prototype un lien pour pouvoir supprimer le livre
                addDeleteLink($prototype);

                // On ajoute le prototype modifié à la fin de la balise <div>
                $container.append($prototype);

                // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
                index++;
            }

            // La fonction qui ajoute un lien de suppression d'un livre
            function addDeleteLink($prototype) {
                // Création du lien
                $deleteLink = $('<a href="#" id="remove_achatProduits" class="btn btn-danger">Supprimer</a>');

                // Ajout du lien
                $prototype.append($deleteLink);

                // Ajout du listener sur le clic du lien
                $deleteLink.click(function(e) {
                    $prototype.remove();
                    e.preventDefault(); // évite qu'un # apparaisse dans l'URL
                    return false;
                });
            }
            })