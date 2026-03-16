<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>

   <main class="main-content">
          <!-- Article Section (provenant de Visite_Tunisie (1).html) -->
            <section class="article-content" id="article">
                <div class="container">
                    <div class="article-header">
                        <h1 class="article-title">Échange d'expériences entre l'ARMC Burundi et le Conseil du Marché Financier de Tunisie</h1>
                        <div class="article-meta">
                            <span><i class="fas fa-calendar-alt"></i> 13-17 Octobre 2025</span>
                            <span><i class="fas fa-map-marker-alt"></i> Tunis, Tunisie</span>
                            <span><i class="fas fa-tags"></i> Coopération internationale, Marché financier</span>
                        </div>
                    </div>
                    
                    <!-- Photo d'illustration -->
                    <div class="article-image">
                        <img src="<?=base_url()?>sites/default/files/communiques/TunisieV.png" alt="Échange d'expériences entre l'ARMC Burundi et le CMF Tunisie - Illustration de coopération internationale">
                        <div class="image-caption">Illustration: Coopération internationale dans le secteur financier</div>
                    </div>
                    
                    <div class="article-body">
                        <p>Dans le cadre du renforcement des connaissances, de l'accumulation d'expériences, mais aussi de la promotion de la coopération entre l'Autorité de Régulation du Marché des Capitaux (ARMC) et les institutions étrangères œuvrant dans le domaine du marché financier, une délégation de l'ARMC a effectué une mission de cinq jours à Tunis, en Tunisie, en date du 13 au 17 octobre 2025.</p>
                        
                        <p>Cette visite s'inscrivait dans le programme d'échange d'expériences visant à partager les bonnes pratiques et à renforcer les capacités institutionnelles. La délégation de l'ARMC était accompagnée des représentants du Ministère des finances, du Budget et de l'Economie Numérique, de la Banque de la République du Burundi et du Bureau d'Etudes Stratégiques et de Développement.</p>
                        
                        <p>Au cours de cette mission, la délégation burundaise a eu l'occasion de suivre plusieurs présentations sur le fonctionnement des départements du Conseil du Marché Financier tunisien (CMF), de la Bourse de Tunis, de Tunisie Clearing (dépositaire centrale des titres), de BH Invest (intermédiaire en bourse) et de l'Association Tunisienne des Investisseurs en Capital (ATIC).</p>
                        
                        <p>Des visites effectuées au sein de ces institutions ont permis aux membres de la délégation de découvrir le fonctionnement des différents services du marché financier. Des discussions enrichissantes et des éclaircissements ont porté sur leurs expériences et sur les stratégies adoptées non seulement pour améliorer le secteur financier, mais aussi pour le développer.</p>
                        
                        <p>Cela a favorisé un partage d'expériences concret et constructif, tenant compte également de la longévité de ces institutions, dont certaines totalisent près de cinquante ans d'existence. Les échanges ont permis de mieux comprendre les approches adoptées par les homologues tunisiens et d'identifier des pistes d'amélioration applicables dans le contexte du marché des capitaux du Burundi.</p>
                        
                        <p><strong>Parmi les enseignements majeurs figurent :</strong></p>
                        
                        <ul>
                            <li>La multiplication des outils adaptés aux moyens et à la culture burundaise en matière de marché financier ;</li>
                            <li>La mise en place de modules d'éducation financière dès le plus jeune âge.</li>
                        </ul>
                        
                        <p>Ces éléments, parmi d'autres, serviront à renforcer les processus internes dans le secteur financier et à redynamiser le marché des capitaux au Burundi, en développant de nouvelles initiatives appropriées.</p>
                        
                        <div class="conclusion">
                            <h3><i class="fas fa-handshake"></i> Perspectives de coopération</h3>
                            <p>Cette mission d'échange d'expériences a permis non seulement de renforcer les liens professionnels, mais aussi de consolider la vision d'un partenariat durable et efficace entre l'Autorité de Régulation du Marché des Capitaux du Burundi et les institutions tunisiennes visitées.</p>
                            <p><strong>De manière plus spécifique, il a été envisagé de mettre en place un cadre de collaboration entre l'Autorité de Régulation du Marché des Capitaux du Burundi (ARMC) et le Conseil du Marché Financier de Tunisie (CMF).</strong></p>
                        </div>
                    </div>
                    
                    <!-- Navigation entre articles - NOUVEAU -->
                    <div class="article-navigation">
                        <a href="#" class="nav-button disabled" id="prevArticle">
                            <i class="fas fa-arrow-left"></i> Article précédent
                        </a>
                        
                        <div class="publication-counter">
                            <span>1/8</span>
                            <i class="fas fa-book-open"></i> Dans la chronologie
                        </div>
                        
                        <a href="#" class="nav-button" id="nextArticle">
                            Article suivant <i class="fas fa-arrow-right"></i>
                        </a>
                        
                        <a href="<?=base_url()?>" class="nav-button back-home" id="backToHome">
                            <i class="fas fa-home"></i> Retour à l'accueil
                        </a>
                    </div>
                </div>
            </section>
        </main>

  <!-- Template Main JS File -->
 <?php include VIEWPATH . 'templete/footer_armc.php'; ?>
 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fonction pour afficher la date actuelle
            function updateCurrentDate() {
                const currentDate = new Date();
                const options = { day: '2-digit', month: '2-digit', year: 'numeric' };
                const formattedDate = currentDate.toLocaleDateString('fr-FR', options);
                const sidebarDateElement = document.getElementById('sidebarDate');
                
                if (sidebarDateElement) {
                    sidebarDateElement.innerHTML = formattedDate;
                }
            }
            
            // Contrôle de la bannière défilante (pour le nouveau header)
            const marqueeContent = document.getElementById('marqueeContent');
            const marqueeControl = document.getElementById('marqueeControl');
            if (marqueeControl) {
                const controlIcon = marqueeControl.querySelector('i');
                let isPaused = false;
                
                marqueeControl.addEventListener('click', function() {
                    if (isPaused) {
                        marqueeContent.style.animationPlayState = 'running';
                        controlIcon.className = 'fas fa-pause';
                        marqueeControl.title = 'Pause';
                    } else {
                        marqueeContent.style.animationPlayState = 'paused';
                        controlIcon.className = 'fas fa-play';
                        marqueeControl.title = 'Play';
                    }
                    isPaused = !isPaused;
                });
            }
            
            // Appeler la fonction pour afficher la date
            updateCurrentDate();
            
            // Smooth scroll pour les ancres
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if(targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Gestion de la navigation entre articles
            const currentArticleId = 1; // Article actuel (pour l'exemple)
            const totalArticles = 8; // Nombre total d'articles dans la chronologie
            
            const prevButton = document.getElementById('prevArticle');
            const nextButton = document.getElementById('nextArticle');
            const counterSpan = document.querySelector('.publication-counter span');
            
            if (counterSpan) {
                counterSpan.textContent = `${currentArticleId}/${totalArticles}`;
            }
            
            // Désactiver le bouton précédent si on est au premier article
            if (currentArticleId === 1 && prevButton) {
                prevButton.classList.add('disabled');
            }
            
            // Désactiver le bouton suivant si on est au dernier article
            if (currentArticleId === totalArticles && nextButton) {
                nextButton.classList.add('disabled');
            }
            
            // Simulation de navigation (à remplacer par des URLs réelles)
            if (prevButton && !prevButton.classList.contains('disabled')) {
                prevButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Rediriger vers l'article précédent
                    // window.location.href = `article_${currentArticleId - 1}.html`;
                    alert('Navigation vers article précédent (simulation)');
                });
            }
            
            if (nextButton && !nextButton.classList.contains('disabled')) {
                nextButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Rediriger vers l'article suivant
                    // window.location.href = `article_${currentArticleId + 1}.html`;
                    alert('Navigation vers article suivant (simulation)');
                });
            }
            
            // Bouton retour à l'accueil
            const homeButton = document.getElementById('backToHome');
            if (homeButton) {
                homeButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = 'index.html'; // Redirection vers la page d'accueil
                });
            }
        });
    </script>