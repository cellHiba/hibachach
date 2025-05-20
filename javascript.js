let xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        const savedXML = localStorage.getItem('bibliothequeXML');
        window.xmlDoc = savedXML 
            ? new DOMParser().parseFromString(savedXML, "text/xml")
            : this.responseXML;
        let livres = window.xmlDoc.getElementsByTagName("livre");
        let entre =`<table>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Prix</th>
                        </tr>`;

        for(let i=0;i<livres.length;i++){
            let titre =livres[i].getElementsByTagName("titre")[0].childNodes[0].nodeValue || "N/A";
            let Auteur=livres[i].getElementsByTagName("Auteur")[0].childNodes[0].nodeValue || "N/A";
            let prix=livres[i].getElementsByTagName("prix")[0].childNodes[0].nodeValue || "N/A";
            entre+= `<tr>
                         <td>${titre}</td>
                         <td>${Auteur}</td>
                         <td>${prix}</td>
                    </tr>`
        }
        entre+=`</table>`;
        entre+=`<h4 style="color:rgb(175, 76, 130")>ajouter un livre</h4>
                <label>Titre</label>
                <input type="text" id="Titre" >
                <label>Auteur</label>
                <input type="text" id="Auteur">
                <label>Prix</label>
                <input type="text" id="Prix">
                <button onclick="ajouter()">ajouter</button>
                <br>
                <h4 style="color:rgb(175, 76, 130)">changer le titre d'un Livre</h4>
                <label> l'encien titre</label>
                <input type="text" id="titre1">
                <label>Auteur</label>
                <input type="text" id="auteurx">
                <label>Nouveux Titre</label>
                <input type="text" id="titre2">
                <button onclick="changerTitre()">changer</button>
                <br>
                <h4 style="color:rgb(175, 76, 130)"> changer l'auteur d'un livre</h4>
                <label>Titre</label>
                <input type="text" id="titrex">
                <label> l'encien Auteur</label>
                <input type="text" id="auteur1">
                 <label>Nouveux Auteur</label>
                <input type="text" id="auteur2">
                <button onclick="changerAuteur()">changer</button>
                <br>
                <h4 style="color:rgb(175, 76, 130)">Ajouter un Attribut</h4>
                <label>Titre</label>
                <input type="text" id="titreC">
                <label>Auteur</label>
                <input type="text" id="auteurC">
                <label>Prix</label>
                <input type="text" id="prixC">
                <button onclick="changerATT()">changer</button>
                <br>
                <h4 style="color:rgb(175, 76, 130)">Afficher Attribut</h4>
                <label>Titre</label>
                <input type="text" id="titreA">
                <label>Auteur</label>
                <input type="text" id="auteurA">
                <label>Prix</label>
                <input type="text" id="prixA">
                <button onclick="affiche()">afficher</button>
                `
        document.getElementById("demo").innerHTML=entre;
    }
};
function sauvegarderLocal() {
    const xmlStr = new XMLSerializer().serializeToString(xmlDoc);
    localStorage.setItem('bibliothequeXML', xmlStr);
}
function ajouter(){  
  let livres = window.xmlDoc.getElementsByTagName("livre");
  var auteur=document.getElementById("Auteur").value;
  var titre=document.getElementById("Titre").value;
  var prix=document.getElementById("Prix").value
  if(auteur==="" || titre ==="" || prix==="" ){
    alert("entrer tout les champ");
    return;
  }
  var nlivre=xmlDoc.createElement("livre")
  var ntitre=xmlDoc.createElement("titre")
  var nAuteur=xmlDoc.createElement("Auteur")
  var nprix=xmlDoc.createElement("prix")
  ntitre.textContent=titre
  nAuteur.textContent=auteur
  nprix.textContent=prix
  nlivre.appendChild(ntitre)
  nlivre.appendChild(nAuteur)
  nlivre.appendChild(nprix)
  xmlDoc.documentElement.insertBefore(nlivre, livres[livres.length - 1]);

  sauvegarderLocal();
  

}
function changerTitre(){
    let livres=window.xmlDoc.getElementsByTagName("livre");
    let titre1=document.getElementById("titre1").value
    let titre2=document.getElementById("titre2").value
    let auteurx=document.getElementById("auteurx").value
    let m=false
    for(let i=0 ;i<livres.length;i++){
        if(livres[i].getElementsByTagName("titre")[0].childNodes[0].nodeValue===titre1  && livres[i].getElementsByTagName("Auteur")[0].childNodes[0].nodeValue===auteurx){
            livres[i].getElementsByTagName("titre")[0].childNodes[0].nodeValue=titre2
            sauvegarderLocal()
            m=true
            break;
        }
}
        if(m===false){alert("Aucune correspondance trouvée !")}

}
function changerAuteur(){
    let livres=window.xmlDoc.getElementsByTagName("livre");
    let auteur1=document.getElementById("auteur1").value
    let auteur2=document.getElementById("auteur2").value
    let titrex=document.getElementById("titrex").value
    let m=false
    for(let i=0;i<livres.length;i++){
        if(livres[i].getElementsByTagName("Auteur")[0].childNodes[0].nodeValue===auteur1 && livres[i].getElementsByTagName("titre")[0].childNodes[0].nodeValue===titrex){
            livres[i].getElementsByTagName("Auteur")[0].childNodes[0].nodeValue=auteur2
            sauvegarderLocal()
            m=true
            break;
            
        }
    }
    if(m===false){alert("Aucune correspondance trouvée !")}
    
}
function changerATT(){
    let titreC=document.getElementById("titreC").value
    let auteurC=document.getElementById("auteurC").value
    let prixC=document.getElementById("prixC").value
    let livres=window.xmlDoc.getElementsByTagName("livre")
    let m = false;
    for(let i=0;i<livres.length;i++){
        if( livres[i].getElementsByTagName("titre")[0].childNodes[0].nodeValue===titreC && livres[i].getElementsByTagName("Auteur")[0].childNodes[0].nodeValue===auteurC && livres[i].getElementsByTagName("prix")[0].childNodes[0].nodeValue===prixC){
            livres[i].getElementsByTagName("prix")[0].setAttribute('currency','dollars');
            sauvegarderLocal()
            m = true
            alert("avec succes")
            break;
        }
    }
    if(m===false){alert("Aucune correspondance trouvée !")}
}
function affiche(){
    let titreA=document.getElementById("titreA").value
    let auteurA=document.getElementById("auteurA").value
    let prixA=document.getElementById("prixA").value
    let livres=window.xmlDoc.getElementsByTagName("livre")
    for(let i=0;i<livres.length;i++){
        if( livres[i].getElementsByTagName("titre")[0].childNodes[0].nodeValue===titreA && livres[i].getElementsByTagName("Auteur")[0].childNodes[0].nodeValue===auteurA && livres[i].getElementsByTagName("prix")[0].childNodes[0].nodeValue===prixA){
            const attprix=livres[i].getElementsByTagName("prix")[0]?.getAttribute('currency');
            alert(attprix || "Aucun attribut currency trouvé")
            return;

        }
    }
    alert("Livre non trouvé ou ou attribut manquant")
}
  
xhttp.open("GET", "Xml.xml", true);
xhttp.send();