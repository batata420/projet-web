function notalpha(ch)
{i=0;
  do
  {
    if((ch.charAt(i)>"A" || ch.charAt(i)<"Z") && (ch.charAt(i)>"a" || ch.charAt(i)<"z"))
    {i++;}
    else
    {
      alert("uniquement des lettres");
      return false;
      
    }
  }while(i<ch.length);
}



function verif()
{
if(isNaN(f.cin.value) || f.cin.value.length!=8)
 {alert("saisir un cin valide svp");
  return false;
 }

nom=f.nom.value;
pre=f.prenom.value;
  if(notalpha(nom))
    {
      alert("uniquement lettre dans le nom");
      return false;
    }

    if(notalpha(pre))
    {
      alert("uniquement lettre dans le prenom");
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
