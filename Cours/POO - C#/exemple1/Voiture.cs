using System;
public  class Voiture:Vehicule, IEnginMotorise
{
  public Voiture (string marque, string modele)
  {
    Marque = marque;
    Modele = modele;
  }
  
  public Voiture (string immatriculation)
  {
      Immatriculation = immatriculation;
  }
  public void Demarrer ()
  {
    Console.WriteLine ($"{Immatriculation} : Je tourne la clef !");
  }
}

public class PickUp : Voiture
{
  public PickUp(string marque, string modele) : base(marque,modele)
  {
 
  }
}

