using System;
public class Moto:Vehicule, IEnginMotorise
{

  public Moto (string marque, string modele)
  {
    Marque = marque;
    Modele = modele;
  }
  
  public Moto (string immatriculation)
  {
      Immatriculation = immatriculation;
  }
  public void Demarrer ()
  {
    Console.WriteLine ("${Immatriculation} :Coup de Kick !");
  }
}
