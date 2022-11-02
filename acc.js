function cin()
{
  if(f.cin.value.length!=8)
   {
    alert("tappez un cin valide");
    return false;
   }
}

function nom()
{
  document.getElementById("n").value=document.getElementById("n").value.replace(/[^a-z]/,"");
}

function prenom()
{
  document.getElementById("p").value=document.getElementById("p").value.replace(/[^a-z]/,"");
}

function mail()
{
    em=document.getElementById("e").value;
    if(/.com$/.test(em)==false)
    {
        alert("mail invalide");
    }
}

function verif()
{
  if(f.cin.value.length!=8)
    {
      alert("tappez un cin valide");
      return false;
    }

  if(isNaN(f.tel.value)||f.tel.value.length!=8)
    {
    alert("tappez un tel valide");
    return false;
    }

  ch=f.mdp.value;
  ch1=f.cmdp.value;
  if(ch!=ch1)
   {
    alert("mot de passe invalide");
    return false;
   }
}