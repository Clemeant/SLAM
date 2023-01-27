public class Ville {

	/*******************************************************Atributes*****************************************************************/
	
	private String nomVille;
	private String nomPays;
	private int nbreHabitants; 
	private char categorie;
	private static int nbreVilles=0;

	/*******************************************************Constructeur*****************************************************************/

	//Constructeur par défaut 
	public Ville(){
		System.out.println("Création d'une ville !");
		this.nomVille = "Inconnue";							//Initailatisaiton des variables 
		this.nomPays = "Invonnu";
		this.nbreHabitants = 0;
		this.setCategorie();
		this.nbreVilles++;
	}
	
	//Constructeur avec paramètres
	public Ville(String nomVille, int nbreHabitants, String nomPays) {
		System.out.println("Création d'une ville avec des paramètres !");
		this.nomVille = nomVille;
		this.nomPays = nomPays;
		this.nbreHabitants = nbreHabitants; 
		this.setCategorie();
		this.nbreVilles++;
	}
	
	/*******************************************************Accesseurs / mutateurs*****************************************************************/
	
		public String getNomVille() {
			return this.nomVille;	
		}
		public void setNomVille(String nomVille) {
			this.nomVille=nomVille;
		}
		
		public String getNomPays() {
			return this.nomPays;
		}
		public void setNomPays(String nomPays) {
			this.nomPays=nomPays;
		}
		
		public int getNbreHabitants() {
			return this.nbreHabitants;
		}
		public void setNbreHabitants(int nbreHabitants) {
			this.nbreHabitants=nbreHabitants;
		}
		
		public char getCategorie() {
			return this.categorie;
		}
		private void setCategorie() {
			int bornesSuperieurs[] = {0, 1000, 10000, 100000, 500000, 1000000, 5000000, 10000000};
			char categories[] = {'?', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'};
			
			int i = 0;
			while (i < bornesSuperieurs.length && this.nbreHabitants > bornesSuperieurs[i]) {
				i++;
			}
			this.categorie = categories[i];
		}
		
		public static int getNbreVilles() {
			return nbreVilles;
		}
			
			
			
			
		/*******************************************************Méthodes*****************************************************************/

	
		//Retourne la description de la ville
		public String description() {
			 return this.getNomVille()+" est une ville de "+this.getNomPays()+", elle comporte : "+this.getNbreHabitants()+" habitants => elle est donc de catégorie : "+this.getCategorie();
		 }
		public String description(Ville v1) {
			return this.description()+"\n"+v1.description()+"\n"+this.comparer(v1);
		}
		
		//Retourne une chaîne de caractères selon le resultat de la comparaison 
		public String comparer(Ville v1){
			String str = new String();
			
			if (v1.getNbreHabitants() > this.getNbreHabitants())
				str = v1.getNomVille()+" est une ville plus peuplée que "+this.getNomVille();
			
			else
				str = this.getNomVille()+" est une ville plus peuplée que "+v1.getNomVille();
			return str;
		}


		
		 
		 
		
		
}
