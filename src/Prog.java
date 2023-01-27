
public class Prog {

	public static void main(String[] args) {
		
	
		Ville ville1=new Ville("Caen", 106230, "France");
		Ville ville2=new Ville("Paris", 3563865, "France");
		Ville ville3=new Ville("Kyoto", 5256843,"Japon");
		
		/*
		System.out.println(ville1.description());
		System.out.println(ville2.description());
		System.out.println(ville1.comparer(ville2));
		*/
		
		System.out.println(ville1.description());
		System.out.println(ville2.description());
		System.out.println(ville3.description());

		System.out.println(Ville.getNbreVilles());
		
		
		
		/*
		
		Ville ville1=new Ville("Caen", 106230, "France");
				
		System.out.println(ville1.getNomVille());
		System.out.println(ville1.getNomPays());
		System.out.println(ville1.getNbreHabitants());
		*/
		
		
		/*
		ville1.nomVille = "Caen";
		ville1.nomPays = "France";
		ville1.nbreHabitants = 106230;
		 */
		
		/*
		System.out.println(ville1.nomVille);
		System.out.println(ville1.nomPays);
		System.out.println(ville1.nbreHabitants);
		*/
		
	}

}


