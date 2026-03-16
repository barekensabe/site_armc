ARMC - Version dynamique sans changement du design public

Ce package garde le design du site grand public et rend les contenus dynamiques.

Principaux ajouts :
- Menus dynamiques depuis la table menus
- Slider dynamique depuis la table sliders
- Accès rapides dynamiques depuis la table quick_links
- Articles, pages, documents et statistiques dynamiques
- Formulaires publics : contact, alerte, plainte, newsletter
- Espace administration CRUD
- Correction de l'erreur SQL du menu : order_by('parent_id IS NULL', 'DESC', FALSE)

Accès administration :
- URL : /admin/login
- Email : admin@armc.bi
- Mot de passe : admin12345

Routes publiques principales :
- /actualites
- /actualites/{slug}
- /pages/{slug}
- /categorie/{slug}
- /documents
- /documents/{slug}
- /statistiques
- /contact
- /nous-alerter
- /plaintes

Important :
- Le front public a été conservé visuellement au maximum.
- Les contenus désactivés / non publiés ne remontent pas côté public.
