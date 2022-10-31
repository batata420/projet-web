function verif()
{
ch=f.cin.value;
if(!(ch.length==8))
 {
    alert("tappez cin");
    return false;
 }
if(!(ch.charAt(0)==0 || ch.charAt(0)==1))
 {
    alert("verifier cin");
    return false;
 }

nom=f.nom.value;
pre=f.prenom.value;
tel=document.getElementById('tel').value;
  if(!alpha(nom))
    {
      alert("uniquement lettre dans le nom");
      return false;
    }

    if(!alpha(pre))
    {
      alert("uniquement lettre dans le prenom");
      return false;
    }

    if(!Number(tel) || tel.length!=8)
     {
      alert("tel invalide");
      return false;
     }


ch=f.mdp.value;
ch1=f.cmdp.value;
if(!(ch==ch1))
 {
    alert("verifier le mot de passe");
    return false;
 }


}
