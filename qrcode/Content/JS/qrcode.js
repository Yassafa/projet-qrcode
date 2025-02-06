let materiaux = document.querySelectorAll('.materiel');
for(let i = 0; i<materiaux.length; i++) {
    materiaux[i].addEventListener('click',function() {
        window.location.href = '?controller=infos_materiel';
    })
};

let boutonSignaler = document.getElementById('signaler');
if(boutonSignaler) {
    boutonSignaler.addEventListener('click',function() {
        window.location.href = '?controller=signal_anomalie';
    });
}

let boutonAjoutBanc = document.getElementById('ajout-banc');
if(boutonAjoutBanc) {
    boutonAjoutBanc.addEventListener('click',function() {
        window.location.href = '?controller=admin&action=ajout_banc';
    });
}

let boutonAjoutMateriel = document.getElementById('ajout-materiel');
if(boutonAjoutMateriel) {
    boutonAjoutMateriel.addEventListener('click',function() {
        window.location.href = '?controller=admin&action=ajout_materiel';
    });
}

let boutonSupBanc = document.getElementById('sup-banc');
if (boutonSupBanc) {
    boutonSupBanc.addEventListener('click',function() {
        window.location.href = '?controller=admin&action=supprimer_banc';
    });
}

let boutonSupMateriel = document.getElementById('sup-materiel');
if(boutonSupMateriel) {
    boutonSupMateriel.addEventListener('click',function() {
        window.location.href = '?controller=admin&action=supprimer_materiel';
    });
}

let boutonModifBanc = document.getElementById('modif-banc');
if(boutonModifBanc) {
    boutonModifBanc.addEventListener('click',function() {
        window.location.href = '?controller=admin&action=modifier_banc';
    });
}

let boutonModifMateriel = document.getElementById('modif-materiel');
if(boutonModifMateriel) {
    boutonModifMateriel.addEventListener('click',function() {
        window.location.href = '?controller=admin&action=modifier_materiel';
    });
}