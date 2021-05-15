document.getElementById("form-ctt").addEventListener("submit", function(e) {
    e.preventDefault();

    var erreur = false;
    var reponsectt = document.querySelector(".reponsectt");
    var btnctt = document.querySelector(".btn-valider-ctt");

    var prenom = document.getElementById("prenom-ctt");
    var nom = document.getElementById("nom-ctt");
    var email = document.getElementById("email-ctt");
    var message = document.getElementById("message-ctt");

    if (!prenom.value) {
        erreur = true;
        prenom.style = "animation: 1.5s; border: 2px solid #E74C3C;";
    } else {
        prenom.style = "animation: 1.5s; border: 2px solid #48C9B0;";
    }

    if (!nom.value) {
        erreur = true;
        nom.style = "animation: 1.5s; border: 2px solid #E74C3C;";
    } else {
        nom.style = "animation: 1.5s; border: 2px solid #48C9B0;";
    }
    
    if (!message.value) {
        erreur = true;
        message.style = "animation: 1.5s; border: 2px solid #E74C3C;";
    } else {
        message.style = "animation: 1.5s; border: 2px solid #48C9B0;";
    }

    if (!email.value) {
        erreur = true;
        email.style = "animation: 1.5s; border: 2px solid #E74C3C;";
    } else {
        email.style = "animation: 1.5s; border: 2px solid #48C9B0;";
    }

    if (erreur == false) {
        const postContact = async function (data) {
            let response = await fetch('https://bedrinedev.com/API/contact.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                body: JSON.stringify(data)
            });
            let responseData = await response.json();

            if (response.ok) {
                console.log(responseData);
                btnctt.className = "btn-valider-ctt-ok";
                btnctt.innerHTML = "Envoyé !";
                setTimeout(btncttAnimation, 8000);
                function btncttAnimation() {
                    document.querySelector(".btn-valider-ctt-ok").className = "btn-valider-ctt";
                    document.querySelector(".btn-valider-ctt").innerHTML = "Envoyer";
                }
            } else {
                console.log('Erreur du serveur :', response.status);
                reponsectt.innerHTML = "Erreur du serveur veuillez ressayer ultérieurement";
                reponsectt.style = "color: #E74C3C;";
            }
        }

        postContact({
            prenom: prenom.value,
            nom: nom.value,
            email: email.value,
            message: message.value,
        })
    } else {
        reponsectt.innerHTML = "Veuillez compléter : votre prénom, votre nom, votre email et le message !";
        reponsectt.style = "color: #E74C3C;";
    }
});