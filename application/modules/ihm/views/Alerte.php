<?php include VIEWPATH . 'templete/header_site_armc.php'; ?>

   <main class="main-content">
          <section class="contact-section" id="contact">
                <div class="container">
                    <div class="section-title">
                        <h2>Nous contacter</h2>
                        <p>Envoyez-nous un message directement par email</p>
                    </div>

                    <!-- Zone de notification (cachée par défaut) -->
                    <div id="notificationArea" style="display: none;"></div>

                    <div class="contact-container">
                        <!-- Informations de contact -->
                        <div class="contact-info" id="info">
                            <h3>ARMC Burundi</h3>
                            
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h4>Adresse</h4>
                                    <p>51, Boulevard du Japon<br>Immeuble MINFIN<br>Bujumbura, Burundi</p>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <i class="fas fa-phone-alt"></i>
                                <div>
                                    <h4>Téléphone</h4>
                                    <p>+257 22 21 17 12</p>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p>secretariatdirection@armc.bi</p>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h4>Horaires d'ouverture</h4>
                                    <p>Lundi - Vendredi : 07h30 - 17h30</p>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <i class="fas fa-globe"></i>
                                <div>
                                    <h4>Site web</h4>
                                    <p>www.armc.bi</p>
                                </div>
                            </div>
                        </div>

                        <!-- Formulaire de contact -->
                        <div class="contact-form">
                            <form id="emailForm" action="#" method="post">
                                <div class="form-group">
                                    <label for="name"><i class="fas fa-user"></i> Nom complet <span class="required-field"></span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom et prénom" required>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email"><i class="fas fa-envelope"></i> Email <span class="required-field"></span></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="votre@email.com" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone"><i class="fas fa-phone"></i> Téléphone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+257 XX XX XX XX">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="subject"><i class="fas fa-tag"></i> Sujet <span class="required-field"></span></label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Objet de votre message" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="message"><i class="fas fa-comment"></i> Message <span class="required-field"></span></label>
                                    <textarea class="form-control" id="message" name="message" placeholder="Tapez votre message ici..." required></textarea>
                                    <div class="form-text">Tous les champs marqués d'un astérisque (*) sont obligatoires.</div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="attachment"><i class="fas fa-paperclip"></i> Pièce jointe (optionnel)</label>
                                    <input type="file" class="form-control" id="attachment" name="attachment" accept=".pdf,.doc,.docx,.jpg,.png">
                                    <div class="form-text">Formats acceptés : PDF, DOC, DOCX, JPG, PNG. Max 5 Mo.</div>
                                </div>
                                
                                <button type="submit" class="submit-btn" id="submitBtn">
                                    <i class="fas fa-paper-plane"></i> Envoyer le message
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Bouton retour à l'accueil -->
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="index.html" class="back-home-btn">
                            <i class="fas fa-arrow-left"></i> Retour à l'accueil
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
            
            // Contrôle de la bannière défilante
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
            
            // Gestion du formulaire email
            const emailForm = document.getElementById('emailForm');
            const notificationArea = document.getElementById('notificationArea');
            const submitBtn = document.getElementById('submitBtn');
            
            function showNotification(type, message) {
                notificationArea.style.display = 'block';
                notificationArea.innerHTML = `
                    <div class="notification ${type}">
                        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                        <span>${message}</span>
                        <i class="fas fa-times close-btn" onclick="this.parentElement.parentElement.style.display='none'"></i>
                    </div>
                `;
                
                // Auto-cacher après 5 secondes
                setTimeout(() => {
                    notificationArea.style.display = 'none';
                }, 5000);
            }
            
            emailForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Récupération des valeurs du formulaire
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const subject = document.getElementById('subject').value.trim();
                const message = document.getElementById('message').value.trim();
                const attachment = document.getElementById('attachment').files[0];
                
                // Validation simple
                if (!name || !email || !subject || !message) {
                    showNotification('error', 'Veuillez remplir tous les champs obligatoires.');
                    return;
                }
                
                if (!email.includes('@') || !email.includes('.')) {
                    showNotification('error', 'Veuillez entrer une adresse email valide.');
                    return;
                }
                
                // Désactiver le bouton pendant l'envoi
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
                
                // Construction du mailto avec les données du formulaire
                const mailtoRecipient = 'secretariatdirection@armc.bi';
                const mailtoSubject = encodeURIComponent(subject);
                
                // Construction du corps du message
                let mailtoBody = encodeURIComponent(
                    `Nom: ${name}\n` +
                    `Email: ${email}\n` +
                    `Téléphone: ${phone || 'Non renseigné'}\n\n` +
                    `Message:\n${message}`
                );
                
                // Création du lien mailto
                let mailtoLink = `mailto:${mailtoRecipient}?subject=${mailtoSubject}&body=${mailtoBody}`;
                
                // Simulation d'envoi (car les pièces jointes ne fonctionnent pas avec mailto)
                setTimeout(() => {
                    // Ouvrir le client de messagerie par défaut
                    window.location.href = mailtoLink;
                    
                    // Réactiver le bouton
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Envoyer le message';
                    
                    // Afficher notification de succès
                    showNotification('success', 'Votre message a été préparé. Vérifiez votre client de messagerie pour l\'envoyer.');
                    
                    // Optionnel : réinitialiser le formulaire
                    // emailForm.reset();
                }, 1000);
            });
            
            // Gestion de la taille des fichiers
            document.getElementById('attachment').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const fileSize = file.size / 1024 / 1024; // en MB
                    if (fileSize > 5) {
                        showNotification('error', 'Le fichier est trop volumineux. Taille maximum : 5 Mo.');
                        this.value = ''; // Réinitialiser l'input
                    }
                }
            });
            
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
        });
    </script>