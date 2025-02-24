let input = document.querySelector("input.hide");
let photo = document.querySelector(".preview .photo");
let para = document.querySelector(".preview p");
let label = document.querySelector("label.file");
if(input, photo, para, label) {
    input.addEventListener("change", updateImageDisplay);
}

function updateImageDisplay() {
    let curFiles = input.files;
    if(curFiles.length === 0) {
        para.textContent = "Aucun fichier séléctionné";
        label.textContent = "Ajouter une photo";
        photo.classList.add("hide");
    }
    else {
        file = curFiles[0];
        if(validFileType(file)) {
            photo.classList.remove("hide");
            para.textContent = `${file.name}, ${returnFileSize(file.size)}.`;
            photo.src = URL.createObjectURL(file);
            label.textContent = "Modifier la photo";
        }
        else {
            para.textContent = `${file.name}: Format invalide. Veuillez séléctionner une image.`;
            label.textContent = "Ajouter une photo";
            photo.classList.add("hide");
        }
    }
}

let fileTypes = [
    "image/apng",
    "image/bmp",
    "image/gif",
    "image/jpeg",
    "image/pjpeg",
    "image/png",
    "image/svg+xml",
    "image/tiff",
    "image/webp",
    "image/x-icon",
  ];
  
  function validFileType(file) {
    return fileTypes.includes(file.type);
  }

function returnFileSize(number) {
    if (number < 1024) {
      return `${number} bytes`;
    } else if (number >= 1024 && number < 1048576) {
      return `${(number / 1024).toFixed(1)} Ko`;
    } else {
      return `${(number / 1048576).toFixed(1)} Mo`;
    }
  }
  
function autocomplete(inp, tab) {
    let currentFocus;
    inp.addEventListener("input", function() {
        let val = this.value;
        closeAllLists();
        if (!val) {return false;}
        currentFocus = -1;
        let a = document.createElement("DIV");
        a.setAttribute("id", this.id + "-autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (let i=0; i<tab.length; i++) {
            if (tab[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                let b = document.createElement("DIV");
                b.innerHTML = "<strong>" + tab[i].substr(0, val.length) + "</strong>";
                b.innerHTML += tab[i].substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + tab[i] + "'>";
                b.addEventListener("click", function() {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    inp.addEventListener("keydown", function(event) {
        let x = document.getElementById(this.id + "-autocomplete-list");
        if(x) x = x.getElementsByTagName("div");
        if(event.keyCode == 40) {
            event.preventDefault();
            currentFocus++;
            addActive(x);
        }
        else if (event.keyCode == 38) {
            event.preventDefault();
            currentFocus--;
            addActive(x);
        }
        else if(event.keyCode == 13) {
            if(this.type == 'text'){
                event.preventDefault();
            }
            if(currentFocus > -1) {
                event.preventDefault();
                if (x) {
                    x[currentFocus].click();
                    currentFocus = -1;
                }
            }
        }
    });
    function addActive(x) {
        if(!x) {return false;}
        removeActive(x);
        if(currentFocus >= x.length) {currentFocus = 0;}
        if(currentFocus < 0) {currentFocus = (x.length-1);}
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(element) {
        let x = document.getElementsByClassName("autocomplete-items");
        for (let i = 0; i < x.length; i++) {
            if (element != x[i] && element != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    document.addEventListener("click", function(event) {
        closeAllLists(event.target);
    });
}

let liste_bancs = document.getElementById("liste-bancs");
if (liste_bancs) {
    liste_bancs = JSON.parse(liste_bancs.value);
}

let liste_equipements = document.getElementById("liste-equipements");
if(liste_equipements) {
    liste_equipements = JSON.parse(liste_equipements.value);
}

let liste_salles = document.getElementById("liste-salles");
if(liste_salles) {
    liste_salles = JSON.parse(liste_salles.value);
}

let rechercheBanc = document.getElementById("search-banc");
if(rechercheBanc) {
    autocomplete(rechercheBanc, liste_bancs);
}

let rechercheEquipement = document.getElementById("search-materiel");
if(rechercheEquipement) {
    autocomplete(rechercheEquipement, liste_equipements);
}

let saisieSalle = document.getElementById("ajout-banc-salle");
if(saisieSalle) {
    autocomplete(saisieSalle, liste_salles);
}

let refBanc = document.querySelector(".refBanc");
if(refBanc) {
    refBanc.addEventListener("change", function() {
        let url = new URL(window.location.href);
        let params = new URLSearchParams(url.search);
        let tab = this.value.split(', ');
        params.set("banc",  tab[0]);
        params.set("salle", tab[1]);
        document.location.href = "?" + params;
    });
}

let refMateriel = document.querySelector(".refMateriel");
if(refMateriel) {
    refMateriel.addEventListener("change", function() {
        let url = new URL(window.location.href);
        let params = new URLSearchParams(url.search);
        params.set("id",  this.value);
        document.location.href = "?" + params;
    });
}