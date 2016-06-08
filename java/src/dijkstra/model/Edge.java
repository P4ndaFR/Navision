package dijkstra.model;
/**
 * Classe de gestion des Liaisons entre noeuds
 * @author Vogella
 * @version 1.1
 */
public class Edge  {
  private final String id; 
  private final Vertex source;
  private final Vertex destination;
  private final int weight; 
  /**
   * Constructeur de la class.
   * @param id	Identifiant de la liaison
   * @param source	Noeud de départ de la liaison
   * @param destination	Noeud d'arrivé de la liaison 
   * @param weight	Poid de la liaison(longueur)
   */
  public Edge(String id, Vertex source, Vertex destination, int weight) {
    this.id = id;
    this.source = source;
    this.destination = destination;
    this.weight = weight;
  }
  /**
   * Getter id
   * @return id de la liaison
   */
  public String getId() {
    return id;
  }
  /**
   * Getter destination
   * @return Noeud de destination de la liaison
   */
  public Vertex getDestination() {
    return destination;
  }
  /**
   * Getter source
   * @return Noeud source de la liaison
   */
  public Vertex getSource() {
    return source;
  }
  /**
   * Getter poids
   * @return poids de la liaison
   */
  public int getWeight() {
    return weight;
  }
  
  /**
   * retourne la source et la destination de la liaison sous forme de chaine de caractère
   * @return poids de la liaison
   */
  @Override
  public String toString() {
    return source + " " + destination;
  }
  
  
} 